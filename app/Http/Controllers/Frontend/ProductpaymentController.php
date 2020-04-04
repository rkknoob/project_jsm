<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Model\Product;
use Session;

class ProductpaymentController extends Controller
{
    public function index()
    {

    }

    public function pgform()
    {
        return view('frontend/Order.send_order');
    }
    public function cart(Request $request)
    {
        $product = Product::find($request->id);

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if (!$duplicates->isEmpty()) {
            $cartItems = Cart::content();
            return view('frontend/Payment.Cart_view')->with('cart', $cartItems);
        }
      //  $addproduct = Cart::add($request->id, $request->name, 1, $request->price)->associate(Product::class);
      //  $test = Cart::add($request->id, $request->name, 1, $request->price, ['img' => $request->image]);
       $test = Cart::add($request->id, $request->name, 1, $request->price,0, ['img' => $request->image]);
        $cartItems = Cart::content();

        return view('frontend/Payment.Cart_view')->with('cart', $cartItems);

    }
}
