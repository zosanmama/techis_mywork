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

    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required',
            // 他のバリデーションルールを追加
        ]);

        Suppliers::create($request->all());

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier created successfully.');
    }

}
