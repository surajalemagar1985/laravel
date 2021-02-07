<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductValidation;
use App\Models\UsesrDetail;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth:web');
     }


    public function index()
    {
        return view('admin.adminhome');
    }
    public function addcategory()
    {
        return view('admin.addcategory');
    }
    public function showproduct()
    {
        $showproduct=Product::orderBy('id','desc')->get();
        return view('admin.showproduct',['showproduct'=>$showproduct]);
    }
    public function showcategory()
    {
        $showcategory=Category::orderBy('id','desc')->get();
        return view('admin.showcategory',['showcategory'=>$showcategory]);

    }
    public function storecategory(Request $request)
    {
        Category::create([
         'category_name'=>$request->get('category')


        ]);
        $request->session()->flash('msg','Category added successfully');
        return redirect()->back();
    }
    public function addProduct()
    {
        $show=Category::orderBy('id','desc')->get();
        return view('admin.addproduct',['show'=>$show]);
    }


    public function storeProduct(ProductValidation $request)
    {
        $image=null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,999999).'_'.$file->getClientOriginalName();
            $file->move('admin/upload/products/',$image);
        }
        Product::create([
                'product_name'=>$request->get('pname'),
                'product_price'=>$request->get('price'),
                'product_description'=>$request->get('description'),
                'product_image'=>$image,
                'category_id'=>$request->get('category')   



        ]);
        $request->session()->flash('msg','Product added successfully');
        return redirect()->back();
    }
    public function editproduct($id)
    {
        $product=Product::find($id);
        $show=Category::orderBy('id','desc')->get();
        return view('admin.editproduct',compact('product'),['show'=>$show]);
    }


    public function updateproduct(Request $request,$id)
    {
        $product=Product::find($id);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,999999).'_'.$file->getClientOriginalName();
            $file->move('admin/upload/products/',$image);
            if($product->product_image){
                unlink('admin/upload/products/'.$product->product_image);
            }
            $product->product_image=$image;
        }
        $product->update([

            'product_name'=>$request->get('pname'),
                'product_price'=>$request->get('price'),
                'product_description'=>$request->get('description'),
                'category_id'=>$request->get('category')  


        ]);
        $request->session()->flash('msg','Product updated successfully');
        return redirect()->back();

    }

    public function deleteproduct(Request $request,$id)
    {
        $product=Product::find($id);
        if($product->product_image){
                unlink('admin/upload/products/'.$product->product_image);
            }
            $product->delete();
            $request->session()->flash('msg','Product deleted successfully');
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
