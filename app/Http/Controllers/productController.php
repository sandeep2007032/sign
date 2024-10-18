<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;

class productController extends Controller
{
    //

 

    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
        $user = Auth::user(); // Get the authenticated user
        return view('product.index', ['products' => $products, 'user' => $user]);
    }

    public function create()
    {
        return view('product.create');
    }




    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|numeric|digits:2',
            'gender' => 'required|string|max:255',
           
           
           
            'phone' => 'required|digits:10',
            
        ]);


        /// for user id fetch and store user id of who loigin

        $data['user_id'] = Auth::id();

        product::create($data);

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }
    public function edit(Product $product)
    {
        return view('product.edit', ['product' => $product]);
    }
    public function update(Product $product, Request $request)
{
    // Validate only the required fields: name, age, gender, and phone
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'nullable|numeric',
        'gender' => 'required|string|max:255',
        'phone' => 'required|digits:10', // Ensuring phone is exactly 10 digits
    ]);

    // Update only the relevant fields in the product
    $product->update($data);

    return redirect()->route('product.index')->with('success', 'Product updated successfully');
}

public function destroy(Product $product)
    {
        // Delete the photo if exists
      

        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }

}
