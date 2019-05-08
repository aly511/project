<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\product;
use App\User;
class userControler extends Controller
{
    public function __construct()
    {
        if ((Auth::user()->role)=='admin' )
        {
            return route('login') ;
        }
        else{$this->middleware('auth');}
       // $user=session()->get('user_role');
        //($this->middleware('auth')&&($user=='user' )) ;
    }
    public function show()
    {
        //$prods=product::all();
        // $prods=product::latest()->paginate(4);// from last
        $prods=product::paginate(4);// from begin
        // return view('products_view',compact('prods'));
        //return $prods;
          return view('user.home',compact('prods'));
    }
    public function add_to_card_by_session($id){
        $prod=product::find($id);
        $prod->quantity-=1;
        $prod->save();
        if(!$prod) {
            return "error";
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
    if(!$cart) {
        $cart = [
                $id => [
                    "num" => 1,
                    "name" => $prod->name,
                    "price" => $prod->price,
                    "image" => $prod->image ,
                ]
        ];
        session()->put('cart', $cart);
        return redirect(route('userhome'));
    }
    // if cart not empty then check if this product exist then increment num
    if(isset($cart[$id])) {
        $cart[$id]['num']++;
        session()->put('cart', $cart);
        return redirect(route('userhome'));
    }
    // if item not exist in cart then add to cart with quantity = 1
    $cart[$id] = [
        "name" => $prod->name,
        "num" => 1,
        "price" => $prod->price,
        "image" => $prod->image
    ];

    session()->put('cart', $cart);
    return redirect(route('userhome'));
    }
    public function add_to_cart($id)
    {
       // $this->add_to_card_by_session($id);
        //return $id;
        //session()->put('prod_id',$id);
        //return session()->get('prod_id');
        $prod=product::find($id);
        $prod->quantity-=1;
        $prod->save();//products
        User::find(Auth::user()->id)->products()->attach($id);
        //return Auth::user()->id ;
        //return $prod->quantity;
        return redirect(route('userhome'));
    }
    public function history(){
        // by relation
        //$prods= User::find(Auth::user()->id)->products()->get();
       //return  view('user.history',compact('prods'));

       // by session
        $carts = session()->get('cart');
        if(!$carts){
            return "no data";
        }
        else{
            //$carts[2]="";
        //     unset($carts[1]);
        //     session()->put('cart', $carts);
        //    return $carts;
        return  view('user.history',compact('carts'));
        }


    }
}

