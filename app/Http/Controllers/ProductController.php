<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function productView(Request $request, $categorySlug, $productSlug)
    {
        $product = Product::where('slug', $productSlug)
            ->with(['category:id,name,slug'])
            ->firstOrFail();

        return Inertia::render('Frontend/ProductPage', ['product' => $product]);
    }

    public function productInfo($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
}
