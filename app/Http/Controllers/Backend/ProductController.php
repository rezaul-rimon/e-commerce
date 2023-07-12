<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;  // use File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product ->product_name = $request->p_name;
        $product ->current_price = $request->c_price;
        $product ->prev_price = $request->p_price;
        $product ->product_description = $request->p_description;

       if($image = $request->file('p_image')){
            $customImageName = uniqid().'.'.$image->getClientOriginalExtension(); //time().'-'.uniqid().'.'.$image->getClientOriginalExtension()

            $image->move('uploads/product/', $customImageName);   
       }

       $product ->product_image = $customImageName;
       $product->save();
       return redirect()->route('product.manage');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $product = Product::all();

        return view('backend.product.manage', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('backend.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product ->product_name = $request->p_name;
        $product ->current_price = $request->c_price;
        $product ->prev_price = $request->p_price;
        $product ->product_description = $request->p_description;


        $deleteOldImage = "uploads/product/".$product->product_image;

        if($newImage = $request->file('p_image')){

            if(file_exists($deleteOldImage )){
                File::delete($deleteOldImage);
            }

            $newImageName = uniqid().'.'.$newImage->getClientOriginalExtension(); //time().'-'.uniqid().'.'.$image->getClientOriginalExtension()
            $newImage->move('uploads/product/', $newImageName);   

        }else{
            $newImageName  = $product->product_image;
        }

        $product ->product_image = $newImageName; //name send to database

        $product->update();
        return redirect()->route('product.manage');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $deleteOldImage = 'uploads/product/'.$product->product_image;

        if(file_exists($deleteOldImage)){
            File::delete($deleteOldImage);
        }

        $product->delete();
        return back();
        
    }


    // Active to inactive status 
    public function atoi($id){
        $product = Product::find($id);

        $product->status=0;
        $product->update();
        return back();
    }

    // inactive to active status
    public function itoa($id){
        $product = Product::find($id);

        $product->status=1;
        $product->update();
        return back();
    }

    // singleProduct
    public function singleProduct($id){
        $product = Product::find($id);
       return view('frontend.single-product', compact('product'));
    }


}
