<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    // Create Home Page
    public function index(Request $request){
        // Check if the user is authenticated
        if (auth()->check()) {
            // Fetch products of the authenticated user and apply filtering and pagination
            $products = Product::where('user_id', auth()->id())
                ->latest()
                ->filter(request(['tag', 'search']))
                // ->paginate(4)
                ;
        } else {
            // If not authenticated, fetch all products and apply filtering and pagination
            $products = Product::latest()
                ->filter(request(['tag', 'search']))
                // ->paginate(4)
                ;
        }

        return view('products.index', compact('products'));
    }


    // Show Single Product
    public function single_product(Product $product) {
        return view('products.single-product', [
            'product' => $product
        ]);
    }
    // Show Edit Product Screen
    public function edit_screen(Product $product) {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    // Show Create Form
    public function create_screen() {
       return view('products.create');
    }

    // Store Product To Database
    public function store(Request $request) {
        try {
            $formFields = $request->validate([
                'title' => 'required',
                'company' => ['required', Rule::unique('products', 'company')],
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'required',
                'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable', 
            ]);

            $formFields['logo'] = $request->hasFile('logo') ? $request->file('logo')->store('logos', 'public') : 'url(images/no-image.png)';

            if(auth()->id() !== null) {
                $formFields['user_id'] = auth()->id();
            };

            Product::create($formFields);
    
            return redirect('/')->with('message', 'Product Created successfully!');


        } catch (Exception $e) {
            return redirect('/')->back()->with('error', 'Error creating product: ' . $e->getMessage() );
        }
    }

    // Update Product
    public function  update(Request $request, Product $product) {
        try{
            $formFields = $request->validate([
                'title' => 'required',
                'company' => ['required'],
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'required',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            ]);

            if ($request->hasFile('logo')) {
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            }

            if(auth()->id() !== null) {
                $formFields['user_id'] = auth()->id();
            };
            $product->update($formFields);
            
            return back()->with('message', 'Product updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating product: ' . $e->getMessage());
        }
    }

    // Delete Product
    public function destroy(Product $product){
        try {
            $product->delete();
            return redirect('/')->with('message', 'Product deleted successfully.');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error delete product: ' . $e->getMessage());
        }
    }

    // Manage Product
    public function manage() {
        return view('products.manage', ['products' => auth()->user()->products()->get()]);
    }
}
