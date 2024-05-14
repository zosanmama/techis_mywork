<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Suppliers::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function add(Request $request)
    {
         // POSTリクエストのとき
         if ($request->isMethod('post')) {
            // バリデーション
            $rules = [
                'supplier_name' => 'required|max:30',
                'supplier_phone'=> 'numeric|digits_between:10,11',
                'supplier_email' => 'email',
            ];

            //もともとあったヘルプコード
        $request->validate([
            'supplier_name' => 'required',
            // 他のバリデーションルールを追加
        ]);

        Suppliers::create($request->all());

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier created successfully.');
 //もともとのコードここまで
 
        //itemcontollerからコピー
               
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
                        'brand_id' => $request->brand_id,
                        'item_name' => $request->item_name,
                        'item_image' => $request->item_image,
                        'status' => $request->status,
                        'type_id' => $request->type_id,
                        'item_color_id' => $request->item_color_id,
                        'item_size_id' => $request->item_size_id,
                        'item_material_id' => $request->item_material_id,
                        'detail' => $request->detail,
                        'unit' => $request->unit,
                        'sell_price' => $request->sell_price,
                        'in_stock' => $request->in_stock,
                        'appr_inventory' => $request->appr_inventory,
                        'avr_daily_sales' => $request->avr_daily_sales,
                        'delivery_days' => $request->delivery_days,
                        'supplier_id' => $request->supplier_id,
                        'purchase_price' => $request->purchase_price,
                        'note' => $request->note,
                    ]);
        
                    return redirect('/items');
                }
        
                return view('item.add'); //こぴーここまで







    }

}
