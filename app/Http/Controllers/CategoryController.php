<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function categoryView($categorySlug)
    {
        $category = Category::where("slug", $categorySlug)->firstOrFail();
        $products = Product::where('category_id', $category->id)
            ->select('id', 'name', 'image', 'price', 'sale_price', 'tag', 'slug', 'category_id')
            ->with(['category:id,name,slug'])
            ->get();

        return Inertia::render("Frontend/CategoryPage", ['products' => $products, 'category' => $category]);
    }
}
