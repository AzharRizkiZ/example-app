<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        $products = Product::latest()->paginate(5);

        if(Auth::check()){
            return view('products.index', compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
        }
  
        return redirect("login")->withError('Opps! You do not have access');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|RedirectResponse
    {
        if(Auth::check()){
            return view('products.create');
        }
  
        return redirect("login")->withError('Opps! You do not have access');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        if(Auth::check()){
            return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
        }
  
        return redirect("login")->withError('Opps! You do not have access');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View|RedirectResponse
    {
        if(Auth::check()){
            return view('products.show',compact('product'));
        }
  
        return redirect("login")->withError('Opps! You do not have access');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View|RedirectResponse
    {
        if(Auth::check()){
            return view('products.edit',compact('product'));
        }
  
        return redirect("login")->withError('Opps! You do not have access');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        if(Auth::check()){
            return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
        }
  
        return redirect("login")->withError('Opps! You do not have access');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();


        if(Auth::check()){
            return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
        }
  
        return redirect("login")->withError('Opps! You do not have access');
    }
}
