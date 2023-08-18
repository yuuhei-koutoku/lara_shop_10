<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Item;

class CartController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $total_price = 0;

        // カート内の各商品ごとの情報を取得し、設定する
        foreach ($cart_items as $cart_item) {
            // カートに入っている商品のIDを取得する
            $item_id = $cart_item->item_id;

            // 商品の情報を取得する
            $item = Item::findOrFail($item_id);

            // 取得した商品情報を、カート内の商品に対して、動的に設定する
            $cart_item->name = $item->name;
            $cart_item->price = $item->price;
            $cart_item->image = $item->image;

            // 合計金額の計算
            $total_price += $item->price * $cart_item->num;
        }

        return view('carts.index', compact('cart_items', 'total_price'));
    }

    public function add(Request $request)
    {
        Cart::create([
            'user_id' => Auth::id(),
            'item_id' => $request->item_id,
            'num' => 1
        ]);

        return to_route('cart.index');
    }

    public function softDelete($id)
    {
        Cart::findOrFail($id)->delete();

        return to_route('cart.index');
    }
}
