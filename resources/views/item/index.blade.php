@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-dark">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">商品名</th>
                                <th class="text-center">ステータス</th>
                                <th class="text-center">種別</th>
                                <th class="text-center">在庫</th>
                                <th class="text-center">発注目安</th>
                                <th class="text-center">詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="text-center">{{ $item->item_name }}</td>
                                    <td class="text-center">
                                        @if($item->status == 'active')有効
                                        @elseif($item->status == 'inactive')無効
                                        @else
                                            {{ $item->status }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($item->status == 'pencil')鉛筆
                                        @elseif ($item->status == 'eraser')消しゴム
                                        @elseif ($item->status == 'ruler')ものさし
                                        @elseif ($item->status == 'pen')万年筆
                                        @else
                                            {{ $item->type }}
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->in_stock}}</td>
                                    <td class="text-center">{{ $item->order_guide}}</td>
                                    <td class="text-center">詳細ボタン</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
