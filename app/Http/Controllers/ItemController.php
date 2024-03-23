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
    public function index(Request $request)
    {
        $sortField = $request->input('sort', 'item_name');
        $sortDirection = $request->input('direction', 'asc');
    
        $items = Item::orderBy($sortField, $sortDirection)->get();
    
        // 商品ごとに計算式を適用して新しい項目を追加
        foreach ($items as $item) {
            $order_guide = $item->appr_inventory - ($item->in_stock + $item->avr_daily_sales * $item->delivery_days);
            $item->order_guide = $order_guide;
        }
    
        return view('item.index', compact('items'));
    }
    public function order(Request $request)
    {
        $sortField = $request->input('sort', 'supplier');
        $sortDirection = $request->input('direction', 'asc');
    
        $items = Item::orderBy($sortField, $sortDirection)->get();

        // 商品ごとに計算式を適用して新しい項目を追加
        foreach ($items as $item) {
            $order_guide =($item->appr_inventory - $item->in_stock) + ($item->avr_daily_sales * $item->delivery_days);
            $item->order_guide = $order_guide;
        }
        // order_guideが0より大きいデータをフィルタリングし、supplierでグループ化
        $filteredItems = $items->filter(function ($item) {
            return $item->order_guide > 0;
        })->groupBy('supplier');

        return view('item.order', compact('filteredItems'));
    }
    

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $rules = [
                'item_name' => 'required|max:30',
                'detail' => 'required|max:100',
                'in_stock' => 'required|numeric|gt:0|digits_between:1,5',
                'appr_inventory' => 'required|numeric|gt:0|digits_between:1,5',
                'avr_daily_sales' => 'required|numeric|gt:0|digits_between:1,5',
                'delivery_days' => 'required|numeric|gt:0|digits_between:1,4',
                'supplier' => 'required|max:100',
                'purchase_price' => 'required|numeric|gt:0|digits_between:1,7',
            ];
            // エラーメッセージを定義
            $messages = [
                'item_name.required' => '商品名を入力してください。',
                'item_name.max' => '商品名は30文字以内で入力してください。',
                'detail.required' => '詳細を入力してください。',
                'detail.max' => '詳細は100文字以内で入力してください。',
                'in_stock.required' => '在庫数を入力してください。',
                'in_stock.numeric' => '在庫数は数値で入力してください。',
                'in_stock.gt' => '在庫数は0より大きい値を入力してください。',
                'in_stock.digits' => '在庫数は5桁以下の数字で入力してください。',
                'appr_inventory.required' => '適正在庫を入力してください。',
                'appr_inventory.numeric' => '適正在庫は数値で入力してください。',
                'appr_inventory.gt' => '適正在庫は0より大きい値を入力してください。',
                'appr_inventory.digits' => '承認在庫は5桁までの数字で入力してください。',
                'avr_daily_sales.required' => '平均日次売上を入力してください。',
                'avr_daily_sales.numeric' => '平均日次売上は数値で入力してください。',
                'avr_daily_sales.gt' => '平均日売上は0より大きい値を入力してください。',
                'avr_daily_sales.digits' => '平均日売上は5桁までの数字で入力してください。',
                'delivery_days.required' => '納品日数を入力してください。',
                'delivery_days.numeric' => '納品日数は数値で入力してください。',
                'delivery_days.gt' => '納品日数は0より大きい値を入力してください。',
                'delivery_days.digits' => '納品日数は4桁までの数字で入力してください。',
                'supplier.required' => '納品先を入力してください。',
                'supplier.max' => '納品先は100文字以内で入力してください。',
                'purchase_price.required' => '購入価格を入力してください。',
                'purchase_price.numeric' => '購入価格は数値で入力してください。',
                'purchase_price.gt' => '購入価格は0より大きい値を入力してください。',
                'purchase_price.digits' => '購入価格は7桁までの数字で入力してください。',
            ];

            // バリデーションを実行
            $validatedData = $request->validate($rules, $messages,['ja']);

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
                'supplier' => $request->supplier,
                'purchase_price' => $request->purchase_price,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    public function show(Item $item)
    {
        return view('item.details', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('item.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        // バリデーション
        $rules = [
            'item_name' => 'required|max:30',
            'detail' => 'required|max:100',
            'in_stock' => 'required|numeric|gt:0|digits_between:1,5',
            'appr_inventory' => 'required|numeric|gt:0|digits_between:1,5',
            'avr_daily_sales' => 'required|numeric|gt:0|digits_between:1,5',
            'delivery_days' => 'required|numeric|gt:0|digits_between:1,4',
            'supplier' => 'required|max:100',
            'purchase_price' => 'required|numeric|gt:0|digits_between:1,7',
        ];

        // バリデーションを実行
        $validatedData = $request->validate($rules);

        // フォームから送信されたデータを使用して商品情報を更新
        $item->update($validatedData);

        // 更新が完了したら、適切なリダイレクト先にリダイレクトする
        return redirect()->route('item.show', $item->id)->with('success', '商品情報が更新されました');
    }

    public function destroy(Item $item)
    {
            // 削除する商品の名前を取得
        $itemName = $item->item_name;

        $item->delete();

        // 削除が完了したら、適切なリダイレクト先にリダイレクトする
        return redirect()->route('item.index')->with('success', "商品名 $itemName を削除しました");
    }
}
