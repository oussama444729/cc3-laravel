<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getProductsByCategory(Category $category){
        $categories = Category::all();
        $products = $category->products ;
         return view('products.by-category', compact('categories','products'));
    }
}
