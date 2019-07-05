<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\product;
use App\User;
use App\table_session;
use Session;
class adminControler extends Controller
{
    public function __construct()
    {
        $this->middleware('admin') ;
    }
    public function insert_page()
    {
        return view('admin.add_new');
    }
    public function show()
    {
        $prods=product::paginate(3);
        return view('admin.home',compact('prods'));
    }
    public function data_valid(Request $request){
        $messages=[
        'name'=>'pllease enter name',
        'img'=>'pllease enter imaage',
        'price'=>'please enter price',
        'quantity'=>'please enter quantity',
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
        $prod->image=$filename;
        $prod->price=$request->input('price');
        $prod->quantity=$request->input('quantity');
        $prod->save();
        Session::flash('success','data created successfuly.');
        return redirect(route('adminhome'));
    }
    public function view_edit($id)
    {
        $prod=product::find($id);
        return view('admin.edit_page',compact('prod'));
    }
    public function edit(  
    )
    {
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
        Session::flash('success','data edited successfuly.');
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
