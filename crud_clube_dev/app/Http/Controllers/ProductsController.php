<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    public function create() 
    {
        return view('products.create_form');
    }

    //Stores the product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);

        $products = $request->all();
        
        if ($request->hasFile('image')) { //if returns a file
            $destination_path = 'public/images/products'; //sets the destination
            $image = $request->file('image'); 
            $image_name = $image->getClientOriginalName();  //gets file name 
            $path = $request->file('image')->storeAs($destination_path, $image_name);    //stores the file 

            $products['image'] = $image_name;
            $products['image_path'] = $destination_path.'/'.$image_name;
        }

        //extracting all products from table
        Products::create($products);

        return redirect('products');
    }

    //View that lists all the registered products 
    public function show() 
    {
        //gets all the products from table
        $products = Products::all();
        return view('products.show', ['products' => $products]);
    }

    //View with the form that edits the registered product
    public function edit($id) 
    {
        $products = Products::findOrFail($id);

        return view('products.edit_form', ['products' => $products]);

    }

    //Updating the product
    public function update(Request $request, $id) 
    {
        $products = Products::findOrFail($id);

        $products->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price, 
        ]);

        if ($request->hasFile('image')) {            

            $destination_path = 'public/images/products'; //sets the destination
            $image = $request->file('image'); 
            $image_name = $image->getClientOriginalName();  //gets file name 
            $path = $request->file('image')->storeAs($destination_path, $image_name);    //stores the file 

            $products['image'] = $image_name;
            $products['image_path'] = $destination_path.'/'.$image_name;

            $products->update([
                'image' => $products['image'],
                'image_path' => $products['image_path']
            ]);
        }

        return redirect('products');
    }

    //Deletes the Registered product
    public function destroy($id) {
        $products = Products::findOrFail($id);
        $products->delete();

        return redirect('products');
    }
    
}
