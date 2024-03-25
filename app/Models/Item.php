<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'item_image',
        'brand_id',
        'item_name',
        'status',
        'type_id',
        'item_color_id',
        'item_size_id',
        'item_material_id',
        'detail',
        'unit',
        'sell_price',
        'in_stock',
        'appr_inventory',
        'avr_daily_sales',
        'delivery_days',
        'supplier_id',
        'purchase_price',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
