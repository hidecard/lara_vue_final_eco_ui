<?php

namespace App\Http\Controllers;

use App\Helper\Response;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartInfo(Request $request)
    {
        $userId = $request->header('id');
        $cart = Cart::with('product:id,name,image,size,price') // Eager load the product and select required columns
            ->where('user_id', $userId) // Filter by user ID
            ->get(['id', 'product_id', 'quantity']); // Select specific cart fields

        return $cart;
    }

    public function addCart(Request $request)
    {
        $userId = $request->header('id');
        $productId = $request->input('productID');
        $quantity = $request->input('quantity');

        $existCart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existCart) {
            $existCart->quantity += $quantity;
            if ($existCart->quantity < 1) {
                $existCart->delete();
            } else {
                $existCart->save();
            }

        } else {
            $cart = new Cart();
            $cart->user_id = $userId;
            $cart->product_id = $productId;
            $cart->quantity = $quantity;
            $cart->save();
        }
        return Response::success();
    }

    public function removeCartItem(Request $request)
    {
        $userId = $request->header('id');
        $productId = $request->input('productID');
        $cart = Cart::where('user_id', $userId)->where('product_id', $productId)
            ->first();
        if ($cart) {
            $cart->delete();
            return Response::success('Item removed from cart');
        } else {
            return Response::error('Item not found in cart');
        }
    }

}
