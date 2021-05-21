<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
 
class CategoryController extends Controller
{
    public function index()
    {
       // $categories = Category::all();
      // $products =Category::Count('id')->get();
       $categories_nbr = Category::all()->count();
        $categories = Category::paginate(5);
        return view('categories.index', compact('categories','categories_nbr'));
    }

    public function destroy(Category $category)
    {
       $category->delete();
       return back()->with('info', 'Category destroyed');
    }

    public function create()
     {  
        return view('categories.create');
     }

     public function store(CategoryRequest $request)
     {
         Category::create($request->all());
         return  redirect(route('categories.index'))->with('info', 'Category Added Successfully');
      
     }
     public function show(){
       // return redirect(route('categories.index'));
        return abort(404);
     }
     public function edit(){
     // return redirect(route('categories.index'));
      return abort(404);
   }
   public function update(){
      //return redirect(route('categories.index'));
      return abort(404);
   }
}
