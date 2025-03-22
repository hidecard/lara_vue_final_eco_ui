<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WishListController extends Controller
{
    public function wishList(Request $request)
    {
        $userId = $request->header('id');
        $products = WishList::with(['product:id,name,category_id,image,price,sale_price,status,slug', 'product.category:id,slug'])
            ->where('user_id', $userId)
            ->select('id', 'product_id')->orderByDesc('id')->get();

        return Inertia::render('Frontend/Profile/WishList', ['products' => $products]);
    }

    public function addWishList(Request $request)
    {
        $validatedRequest = $request->validate([
            'product_id' => 'required|int',
        ]);

        try {
            $wishList = WishList::where('product_id', $request->input('product_id'))->where('user_id', $request->header('id'))->first();
            if ($wishList) {
                return back();
            } else {
                WishList::create([
                    'user_id' => $request->header('id'),
                    'product_id' => $validatedRequest['product_id'],
                ]);
                return back();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something Wrong!']);
        }
    }

    public function removeWishListItem(Request $request)
    {
        $userId = $request->header('id');
        $wishItem = WishList::where('id', $request->input('wishItem_id'))
            ->where('user_id', $userId)
            ->first();
        if ($wishItem) {
            $wishItem->delete();
            return back();
        } else {
            return back()->withErrors(['message' => 'Item not found']);
        }
    }
}
