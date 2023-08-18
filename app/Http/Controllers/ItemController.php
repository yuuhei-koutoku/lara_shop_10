<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::query();
        $categories = Category::all();

        if (isset($request->category) && $request->category !== '0') {
            $items = $items->where('category_id',  $request->category);
        }

        if (isset($request->keyword)) {
            $keyword = $request->keyword;
            $items = $items->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', "%{$request->keyword}%")
                      ->orWhere('detail', 'LIKE', "%{$request->keyword}%");
            });
        } else {
            $keyword = '';
        }

        $items = $items->get();

        return view('items.index', compact('items', 'categories', 'keyword'));
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);

        return view('items.show', compact('item'));
    }
}
