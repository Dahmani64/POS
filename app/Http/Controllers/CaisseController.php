<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\{Product, Serveur}; 
class CaisseController extends Controller
{
    public function index(){
      $serveurs =  Serveur::all();
        $products = Product::simplePaginate(24);
        $categories = Category::simplePaginate(4);
        return view('caisse.index',compact('products','categories','serveurs'));
    }

    function productsByCategory($name, Request $request)
    {
     if($request->ajax())
      {
           $products = Category::whereName($name)->firstOrFail()->products()->simplePaginate(24);
           return view('caisse.products_paginate', compact('products'))->render();
     }
     return abort(404);
   }

   function products_ajax(Request $request)
    {
       if($request->ajax())
        {
           $products = Product::simplePaginate(24);
           // $products = Product::paginate(5);
           return view('caisse.products_paginate', compact('products'))->render();
         }
            return abort(404);
         
    }
function categories_ajax(Request $request)
    {
       if($request->ajax())
        {
           $categories = Category::simplePaginate(4);
           // $products = Product::paginate(5);
           return view('caisse.categories_paginate', compact('categories'))->render();
         }
         return abort(404);
    }


}
