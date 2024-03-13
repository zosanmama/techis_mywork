<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all();

        foreach($items as $item){
            $order_guide = $item->appr_inventory - ($item->in_stock + $item->avr_daily_sales * $item->delivery_days);
            $item->order_guide = $order_guide;
        }
        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'item_name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'item_name' => $request->item_name,
                'status' => $request->status,
                'type' => $request->type,
                'detail' => $request->detail,
                'in_stock' => $request->in_stock,
                'appr_inventory' => $request->appr_inventory,
                'avr_daily_sales' => $request->avr_daily_sales,
                'delivery_days' => $request->delivery_days,
                'supplier' => $request->supplier
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }
}
