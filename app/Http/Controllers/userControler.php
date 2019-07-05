<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\product;
use App\User;
use App\table_session;
use Session;
class userControler extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
    public function show()
    {
        // $this->get_session();
        // $prods=product::paginate(3);
        // return view('user.home',compact('prods'));
        return view('user.new');
    }
    public function add_to_card_by_session($id){
        $prod=product::find($id);
        //return $prod;
        if(!$prod) {
            Session::flash('info','Your cart is still empty.do some Shopping');
            return redirect()->back();
            //return "error";
        }
        $prod->quantity-=1;
        $prod->save();
        $prod_prise=$prod->price;
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    Auth::user()->id=> [
                        $id=>
                            [
                                "num" => 1,
                                "name" => $prod->name,
                                "price" => $prod->price,
                                "image" => $prod->image ,
                                "total" => $prod->price
                            ]
                    ]
            ];
            session()->put('cart', $cart);
            //return $cart;
            return redirect(route('save_session'));
        }
        // if cart not empty then check if this product exist then increment num
        if(isset($cart[Auth::user()->id])) {
                    if(isset($cart[Auth::user()->id][$id]))
                    {
                        $cart[Auth::user()->id][$id]['num']+=1;
                        $cart[Auth::user()->id][$id]['total']+=$prod->price;
                        session()->put('cart', $cart);
                        return redirect(route('save_session'));
                    }else{
                        $cart[Auth::user()->id][$id]=
                        [
                            "num" => 1,
                            "name" => $prod->name,
                            "price" => $prod->price,
                            "image" => $prod->image ,
                            "total" => $prod->price
                        ];
                   // }
               // }
            }
        }
       // if item not exist in cart then add to cart with quantity = 1
        $cart[Auth::user()->id][$id] = [
            "name" => $prod->name,
            "num" => 1,
            "price" => $prod->price,
            "image" => $prod->image,
            "total" => $prod->price
        ];
        session()->put('cart', $cart);
        return redirect(route('save_session'));
    }
    public function history(){
        $carts = session()->get('cart');
        if(!$carts){
            //return "no data";
            Session::flash('info','Your cart is still empty.do some Shopping');
            return redirect()->back();
        }
        else{
            //return $carts ;
        //return  view('user.history',compact('carts'));
        return  view('user.history',['carts'=>$carts[Auth::user()->id]]);
        }
    }
public function save_session(){
    // save session in database
    //$se=new table_session;
    //table_session::truncate();//want to clear it out for new data
    //return session()->get('cart');
    $carts = session()->get('cart');
    //return $carts;
    if(count($carts)>0){
        foreach ($carts as $key1=>$users){// loop for users
            $userid=$key1;
            //return $users;
            foreach ($users as $key2=>$prods){// loop for products
                $old= table_session::where('user_id',$key1)->where('prod_id',$key2)->first();
                if(isset($old)){
                    $old->name=$prods["name"];
                    $old->num=$prods["num"];
                    $old->price=$prods["price"];
                    $old->image=$prods["image"];
                    $old->total=$prods["total"];
                    $old->save();
                }else{
                    $se=new table_session;
                    $se->user_id=$key1 ;
                    $se->prod_id=$key2 ;
                    $se->name=$prods["name"];
                    $se->num=$prods["num"];
                    $se->price=$prods["price"];
                    $se->image=$prods["image"];
                    $se->total=$prods["total"];
                    $se->save();
                }
            }

        }
        return redirect(route('userhome'));
    }
}
public function get_session(){
    // get session from database into session
    $datas=table_session::where('user_id',Auth::user()->id)->get();
    //return $datas;
    //return $datas;
    //$se=new session;
    $cart = session()->get('cart');
     //return $carts ;
    if(count($datas)>0){
        foreach ($datas as $data){
            if(!$cart) {
                $cart = [
                    $data->user_id=> [
                        $data->prod_id=>
                            [
                                "num" => $data->num,
                                "name" => $data->name,
                                "price" => $data->price,
                                "image" => $data->image ,
                                "total" => $data->total
                            ]
                    ]
                ];
                session()->put('cart', $cart);
            }// if item not exist in cart then add to cart with quantity = 1
            elseif(isset($cart[$data->user_id])){
                $cart[$data->user_id][$data->prod_id]=[
                    "num" => $data->num,
                    "name" => $data->name,
                    "price" => $data->price,
                    "image" => $data->image ,
                    "total" => $data->total
                ];
            }

            session()->put('cart', $cart);
        }
        return redirect(route('userhome'));
    }
}
}
