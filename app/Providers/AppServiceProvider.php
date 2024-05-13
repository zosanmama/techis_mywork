<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        if (\App::environment(['production']) || \App::environment(['develop'])) {
            \URL::forceScheme('https');
        }

        Validator::replacer('required', function ($message, $attribute, $rule, $parameters) {
            $attributes = [
                'item_name' => '商品名',
                'detail' => '詳細',
                'in_stock' => '在庫数',
                'appr_inventory' => '適正在庫',
                'avr_daily_sales' => '平均日次売上',
                'delivery_days' => '納品日数',
                'supplier' => '仕入れ先',
                'purchase_price' => '仕入価格',
            ];
        
            // $attributeに一致する属性名が$attributes内に存在するかチェック
            if (array_key_exists($attribute, $attributes)) {
                return str_replace(':name', $attributes[$attribute], $message);
            }
        
            // 属性名が見つからない場合は、元のメッセージを返す
            return $message;
        });
        
        Validator::replacer('max', function ($message, $attribute, $rule, $parameters) {
            $attributes = [
                'item_name' => '商品名',
                'detail' => '詳細',
                'in_stock' => '在庫数',
                'appr_inventory' => '適正在庫',
                'avr_daily_sales' => '平均日次売上',
                'delivery_days' => '納品日数',
                'supplier' => '仕入れ先',
                'purchase_price' => '仕入価格',
            ];
        
            return str_replace(':attribute', $attributes[$attribute], $attributes[$attribute] . 'は' . $parameters[0] . '文字以内で入力してください。');
        });
        
        Validator::replacer('numeric', function ($message, $attribute, $rule, $parameters) {
            $attributes = [
                'item_name' => '商品名',
                'detail' => '詳細',
                'in_stock' => '在庫数',
                'appr_inventory' => '適正在庫',
                'avr_daily_sales' => '平均日次売上',
                'delivery_days' => '納品日数',
                'supplier' => '仕入れ先',
                'purchase_price' => '仕入価格',
            ];
            return str_replace(':attribute', $attributes[$attribute], $attributes[$attribute] . 'は数値で入力してください。');
        });
        
        Validator::replacer('gt', function ($message, $attribute, $rule, $parameters) {
            $attributes = [
                'item_name' => '商品名',
                'detail' => '詳細',
                'in_stock' => '在庫数',
                'appr_inventory' => '適正在庫',
                'avr_daily_sales' => '平均日次売上',
                'delivery_days' => '納品日数',
                'supplier' => '仕入れ先',
                'purchase_price' => '仕入価格',
            ];
            return str_replace(':attribute', $attributes[$attribute], $attributes[$attribute] . 'は0より大きい値を入力してください。');
        });
        
        Validator::replacer('digits_between', function ($message, $attribute, $rule, $parameters) {
            $attributes = [
                'item_name' => '商品名',
                'detail' => '詳細',
                'in_stock' => '在庫数',
                'appr_inventory' => '適正在庫',
                'avr_daily_sales' => '平均日次売上',
                'delivery_days' => '納品日数',
                'supplier' => '仕入れ先',
                'purchase_price' => '仕入価格',
            ];
            return str_replace(':attribute', $attributes[$attribute], $attributes[$attribute] . 'は' . $parameters[0] . 'から' . $parameters[1] . '桁の数字で入力してください。');
        });
    }
}