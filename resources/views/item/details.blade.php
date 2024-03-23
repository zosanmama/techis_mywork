@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
    <h1>商品詳細</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品情報</h3>
                </div>
                     @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                    <div class="form-group">
                        <label for="item_name" class="col-2">商品名:　</label><p class="col-4" style="display: inline;">{{ $item->item_name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-2">ステータス:　</label>
                        <p style="display: inline;">
                        @if($item->status === "active")
                            有効
                        @elseif($item->status === "inactive")
                            無効
                        @else
                            <!-- ステータスが active または inactive 以外の場合に表示する内容 -->
                            不明なステータス
                        @endif
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-2">種別:　</label>
                        <p style="display: inline;">
                        @if($item->type === "pencil")
                            鉛筆
                        @elseif($item->type === "eraser")
                            消しゴム
                        @elseif($item->type === "ruler")
                            ものさし
                        @elseif($item->type === "pen")
                            万年筆
                        @else
                            不明な種別
                        @endif
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="detail" class="col-2">詳細:　</label><p style="display: inline;">{{ $item->detail }}</p>
                    </div>
                    <div class="form-group">
                        <label for="in_stock" class="col-2">在庫数:　</label><p style="display: inline;">{{ $item->in_stock }}</p>
                    </div>
                    <div class="form-group">
                        <label for="appr_inventory" class="col-2">適正在庫数:　</label><p style="display: inline;">{{ $item->appr_inventory }}</p>
                    </div>
                    <div class="form-group">
                        <label for="avr_daily_sales" class="col-2">平均日次販売数:　</label><p style="display: inline;">{{ $item->avr_daily_sales }}</p>
                    </div>
                    <div class="form-group">
                        <label for="delivery_days" class="col-2">納品日数:　</label><p style="display: inline;">{{ $item->delivery_days }}</p>
                    </div>
                    <div class="form-group">
                        <label for="supplier" class="col-2">発注先:　</label><p style="display: inline;">{{ $item->supplier }}</p>
                    </div>
                    <div class="form-group">
                        <label for="purchase_price" class="col-2">仕入価格:　</label><p style="display: inline;">{{ $item->purchase_price }}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('item.edit', $item->id) }}" class="btn btn-primary">編集</a>
                    <form method="POST" action="{{ route('item.destroy', $item->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                    <a href="{{ route('item.index') }}" class="btn btn-secondary">戻る</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
