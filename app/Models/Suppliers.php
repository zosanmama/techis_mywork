<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'supplier_rubi',
        'supplier_address',
        'supplier_phone',
        'supplier_email',
        'supplier_note',
    ];
}
