<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Inertia\Controller;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::select('name', 'slug', 'image')->get();

        $products = Product::where('status', 1)
            ->select('id', 'name', 'image', 'price', 'sale_price', 'tag', 'status', 'slug', 'category_id')
            ->with(['category:id,name,slug'])
            ->get();

        return Inertia::render('Frontend/Home', ['categories' => $categories, 'products' => $products]);
    }

    public function categoryList()
    {
        $categories = Category::select('name', 'slug')->get();
        return $categories;
    }

    

}
