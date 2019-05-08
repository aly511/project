<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use App\Http\Controllers\Auth;
use App\product;
class adminControler extends Controller
{
    public function __construct()
    {
        // if ( Auth::check() && Auth::user()->role=='user' )
        // {
        //     //return $next($request);
        // }
        if (Auth::user()->role=='user' )
        {
            return route('login') ;
        }
        else{$this->middleware('auth');}
       // $user=session()->get('user_role');
        //($this->middleware('auth')&&($user=='user' )) ;
    }
    public function insert_page()
    {
        return view('admin.add_new');
    }
    public function show()
    {
        //$prods=product::all();
        // $prods=product::latest()->paginate(4);// from last
        $prods=product::paginate(2);// from begin
        // return view('products_view',compact('prods'));
        //return $prods;
        return view('admin.home',compact('prods'));
    }
    public function data_valid(Request $request){
        $messages=[
        'name'=>'name is required',
        'img'=>'img is required',
        'price'=>'price is required',
        'quantity'=>'quantity is required',
        ];
        $this->validate($request,[
        'name'=>'required',
        'img'=>'required|image',
        'price'=>'required|numeric',
        'quantity'=>'required|numeric',
        ],$messages);
        return $request->all();
    }
    public function add(Request $request)
    {
        $this->data_valid($request);
        $prod=new product;
        $prod->name=$request->input('name');
        $file=$request->file('img');
        $filename=$file->getClientOriginalName();
        $file->move('images',$filename);
        $prod->image=$filename;
        $prod->price=$request->input('price');
        $prod->quantity=$request->input('quantity');
       // $prod->user_id=Auth::user()->id;
        // {{Auth::user()->id }}
        $prod->save();
        //return back();
         //return $prod;
         return redirect(route('adminhome'));
    }
    public function view_edit($id){
        $prod=product::find($id);
         //return $prod;
        return view('admin.edit_page',compact('prod'));
    }
    // public function edit_ssession($id,Request $request){
    //     //return $idd;
    //     $cart = session()->get('cart');
    //     //return $cart;
    //     $cart[$id]['name']=$request->input('name');
    //     $cart[$id]['price']=$request->input('price');
    // }
    public function edit($id,Request $request)
    {
        //return $id;
        //$this->edit_ssession($id,$request);
        $prod=product::find($id);
        $prod->name=$request->input('name');
        $prod->price=$request->input('price');
        $prod->quantity=$request->input('quantity');
        $prod->save();

        //edit session
        $cart = session()->get('cart');
        // return $cart;
        $cart[$id]['name']=$request->input('name');
        $cart[$id]['price']=$request->input('price');
        session()->put('cart', $cart);
        //return $cart;
        return redirect(route('adminhome'));
    }

    public function delete($id)
    {
        $prod=product::find($id);
        $prod->delete();
        // deletet session
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        //return  $cart ;
        //session()->forget('cart['.$id.']');
        return redirect(route('adminhome'));
    }
}
