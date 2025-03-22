<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequests;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class AdminProductController extends Controller
{
    public function productsPage()
    {
        $products = Product::with(['category:id,name,slug'])->orderByDesc('id')->paginate(10);
        return Inertia::render('Backend/Products', ['products' => $products]);
    }

    public function productCreatePage()
    {
        $categories = Category::select('id', 'name')->get();

        return Inertia::render('Backend/AddProduct', ['categories' => $categories]);
    }
    public function createProduct(ProductRequests $request)
    {

        $request->validated();
        // dd("hi");

        try {
            $product = new Product();
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->weight = $request->weight;

            $product->price = $request->price;
            $product->sale_price = $request->sale_price;

            $product->tag = $request->tag;
            $product->status = $request->status;
            $product->slug = $request->slug;


            $imagesName = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $fileName = 'product-img-' . time() . $index . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/products'), $fileName);
                    $imagesName[] = $fileName;
                }
            }
            $product->image = json_encode($imagesName);
            // dd($product);
            $product->save();

            return redirect()->back();

        } catch (\Exception $e) { 
            Log::error($e->getMessage());
            dd($e->getMessage());
            // return back()->withErrors(['message' => 'Something Wrong!']);
        }
    }

    public function editProductPage($id)
    {
        $product = Product::find($id);
        $categories = Category::select('id', 'name')->get();

        return Inertia::render('Backend/EditProduct', ['product' => $product, 'categories' => $categories]);

    }

    public function editProduct(ProductRequests $request)
    {
        $request->validated();

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->tag = $request->tag;
        $product->status = $request->status;
        $product->slug = $request->slug;

        $oldImg_Files = $product->image;

        if ($request->hasFile('images')) {
            $imagesName = [];
            foreach ($request->file('images') as $index => $image) {
                $fileName = 'product-img-' . time() . $index . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/products'), $fileName);
                $imagesName[] = $fileName;
            }
            $product->image = json_encode($imagesName);
        }
        if ($product->isDirty() || $request->hasFile('images')) {
            $product->save();

            foreach (json_decode($oldImg_Files) as $img) {
                $oldFile = public_path('images/products/' . $img);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }

            return redirect()->back();
        }

        return redirect()->back()->withErrors(['message' => 'Something Wrong!']);
    }
    public function deleteProduct($id)
    {
        try {
            $product = Product::find($id);
            if ($product) {
                foreach ((json_decode($product->image)) as $img) {
                    $oldFile = public_path('images/products/' . $img);
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }
                $product->delete();
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->withErrors(['message' => 'Something Wrong!']);
        }
    }

}
