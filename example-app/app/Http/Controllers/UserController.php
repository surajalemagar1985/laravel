<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\UserValidation;
use App\Models\UserDetail;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showcategory=Category::orderBy('id','asc')->get();
        return view('user.homepage',['showcategory'=>$showcategory]);
    }

    public function contact()
    {
        $showcategory=Category::orderBy('id','asc')->get();
        return view('user.contact',['showcategory'=>$showcategory]);
    }
    public function services()
    {
        $showcategory=Category::orderBy('id','asc')->get();
        $showproduct=Product::orderBy('id','desc')->get();
        return view('user.services',['showproduct'=>$showproduct,'showcategory'=>$showcategory]);
    }
    public function testimonial()
    {
        $showcategory=Category::orderBy('id','asc')->get();
         $showproduct=Product::orderBy('id','desc')->get();
        return view('user.testimonialpage',['showcategory'=>$showcategory,'showproduct'=>$showproduct]);
    }
    public function about()
    {
        $showcategory=Category::orderBy('id','asc')->get();
        return view('user.about',['showcategory'=>$showcategory]);
    }

    public function productbycategory($id)
    {
        $showcategory=Category::orderBy('id','asc')->get();
        $show=Category::find($id);
        return view('user.productbycategory',compact('show','showcategory'));
    }
    public function singleproduct($id)
    {
         $showcategory=Category::withCount('products')->get();
         $recent = Product::orderBy('id','desc')->limit(5)->get();
        $show=Product::find($id);
        return view('user.singleproduct',compact('show','showcategory','recent'));

    }
    public function searchproduct(Request $request)
    {
        $search = $request->get('search');
        $showcategory=Category::withCount('products')->get();
        $show = Product::where('product_name','like','%'.$search.'%')->get();
        return view('user.searchproduct',compact('showcategory','show'));
    }

     public function storeuserdetails(UserValidation $request)
    {
        UserDetail::create([
            'user_name'=>$request->get('fname'),
            'user_email'=>$request->get('email'),
            'gender'=>$request->get('gender'),
            'password'=>bcrypt($request->get('pass'))
        ]);
        $request->session()->flash('msg','registration successful');
        return redirect()->back();

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
