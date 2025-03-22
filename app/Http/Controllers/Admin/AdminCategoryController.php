<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class AdminCategoryController extends Controller
{
    public function categoriesPage()
    {
        $categories = Category::withCount('products')->orderByDesc('id')->paginate(10);
        return inertia('Backend/Categories', ['categories' => $categories]);
    }

    public function createCategoryPage(Request $request)
    {
        return Inertia::render('Backend/AddCategory');
    }
    public function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'slug' => 'required|alpha_dash|unique:categories,slug',
            // 'description' => 'required',
            'image' => 'required|image|max:2048',
            // 'status' => 'boolean',
            // 'meta_title' => 'required|max:30',
            // 'meta_description' => 'required|max:100',
        ]);

        try {
            $category = new Category;
            $category->name = $request->name;
            $category->slug = $request->slug;
            // $category->description = $request->description;
            // $category->status = $request->status;
            // $category->meta_title = $request->meta_title;
            // $category->meta_description = $request->meta_description;

            $image = $request->file('image');
            $imageName = "category" . '-' . $request->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories'), $imageName);
            $category->image = $imageName;
            // dd($category);
            $category->save();

            return redirect()->back();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            dd($e->getMessage());
            // return back()->withErrors(['message' => 'Something Wrong!' . $e->getMessage() ]);
        }
    }

    public function editCategoryPage($id)
    {
        $category = Category::find($id);
        return inertia('Backend/EditCategory', ['category' => $category]);
    }

    public function editCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:30',
            'slug' => 'required|alpha_dash|unique:categories,slug,' . $request->id,
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'status' => 'boolean',
            'meta_title' => 'required|max:30',
            'meta_description' => 'required|max:100',
        ]);

        try {
            $category = Category::find($id);
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;
            $category->status = $request->status == null ? 0 : 1;
            $category->meta_title = $request->meta_title;
            $category->meta_description = $request->meta_description;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = "category" . '-' . $request->slug . '.' . $image->
                    getClientOriginalExtension();
                $image->move(public_path('images/categories'), $imageName);
                $category->image = $imageName;
            }

            if ($category->isDirty() || $request->hasFile('image')) {
                $category->save();
                return redirect()->back();
            }
            return redirect()->back();
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something Wrong']);
        }
    }

    public function deleteCategory($id)
    {
        try {
            $category = Category::find($id);
            if ($category) {
                $oldFile = public_path('images/categories/' . $category->image);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
                $category->delete();
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->withErrors(['message' => 'Something Wrong!']);
        }

    }
}
