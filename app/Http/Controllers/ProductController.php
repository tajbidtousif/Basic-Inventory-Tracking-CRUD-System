<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()  
    {
        return view('products.index', [
            'products'=> Product::get()
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'images' => 'required|mimes:jpg,jpeg,png,gif|max:10000'
        ]);

        $imageName = time() . '.' . $request->file('images')->extension();
        $request->images->move(public_path('products'), $imageName);

        $product = new Product;
        $product->image = $imageName;
        $product->setAttribute('product_name', $request->name);
        $product-> description = $request->description;

        $product->save();
        return back()->withSuccess('product created successfully!!!');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('products.edit', ['product' => $product]);
    }


    public function update(Request $request, $id){
     //validate
     $request->validate([
        'name' => 'required',
        'description' => 'required',
        'images' => 'nullable|mimes:jpg,jpeg,png,gif|max:10000'
    ]);

    $product = Product::find($id);

    if(isset($request->images)){

    $imageName = time() . '.' . $request->file('images')->extension();
    $request->images->move(public_path('products'), $imageName);
    $product->image = $imageName;
    }
    
    $product->setAttribute('product_name', $request->name);
    $product-> description = $request->description;

    $product->save();
    return back()->withSuccess('product Updated successfully!!!');
    }

    public function destroy($id){
        $product = Product::find($id);
    
        if ($product) {
            $product->delete();
            return back()->withSuccess('Product deleted successfully!');
        } else {
            return back()->withErrors('Product not found.');
        }
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view("products.show",compact("product"));
    }
    
}