<?php

namespace App\Http\Controllers;

use App\Models\{Category, Product};
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name = null)
    {/*
        $products = Product::paginate(5);
        $categories = Category::all();
        return view('products.index', compact('products','categories'));
*/
        $query = $name ? Category::whereName($name)->firstOrFail()->products() : Product::query();
        $products = $query->paginate(5);
        $categories = Category::all();
        return view('products.index', compact('products', 'categories', 'name'));
    }

    function get_ajax_data(Request $request)
    {
     if($request->ajax())
     {
      $products = Product::paginate(5);
      return view('products.paginate', compact('products'))->render();
     }
     return redirect()->route('products.index');
   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index')->with('info', 'Product addes successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
{
   //$category=  $product->category();
   $category = $product->category->name;
    return view('products.show', compact('product','category'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
       $product->update($request->all());
       return redirect()->route('products.show',$product->id)->with('info', 'Product  success update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('info', 'Le Produita bien été supprimé dans la base de données.');
    }
}
