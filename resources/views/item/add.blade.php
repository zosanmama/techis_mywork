@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="brand">ブランド名</label>
                            <input type="text" class="form-control" id="brand" name="brand" placeholder="ブランド名">
                        </div>
                        <div class="form-group">
                            <label for="item_name">商品名</label>
                            <input type="text" class="form-control" id="item_name" name="item_name" placeholder="商品名">
                        </div>
                        <div class="form-group">
                            <label for="item_image">商品画像</label>
                            <input type="file" class="form-control-file" id="item_image" name="item_image">
                        </div>
                        <div class="radio-button-container">
                            <label>ステータス</label><br>
                            <input type="radio" id="active" name="status" value="active" checked>
                            <label for="active"  class="mr-3">有効</label>
                            <input type="radio" id="inactive" name="status" value="inactive">
                            <label for="inactive" class="mr-3">無効</label>
                        </div>

                        <div class="radio-button-container">
                            <label>種別</label><br>
                            <input type="radio" id="pencil" name="type_id" value="pencil">
                            <label for="pencil"  class="mr-3">鉛筆</label>
                            <input type="radio" id="eraser" name="type_id" value="eraser">
                            <label for="eraser" class="mr-3">消しゴム</label>
                            <input type="radio" id="ruler" name="type_id" value="ruler">
                            <label for="ruler" class="mr-3">ものさし</label>
                            <input type="radio" id="pen" name="type_id" value="pen">
                            <label for="pen" class="mr-3">万年筆</label>
                        </div>
                        <div class="form-group">
                            <label for="item_color_id">商品色</label>
                            <input type="text" class="form-control" id="item_color_id" name="item_color_id" placeholder="商品色">
                        </div>
                        <div class="form-group">
                            <label for="item_size_id">商品サイズ</label>
                            <input type="text" class="form-control" id="item_size_id" name="item_size_id" placeholder="商品サイズ">
                        </div>
                        <div class="form-group">
                            <label for="item_material_id">商品素材</label>
                            <input type="text" class="form-control" id="item_material_id" name="item_material_id" placeholder="商品素材">
                        </div>
                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>
                        <div class="form-group">
                            <label for="unit">販売単位</label>
                            <input type="text" class="form-control" id="unit" name="unit" placeholder="販売単位">
                        </div>
                        <div class="form-group">
                            <label for="sell_price">販売価格</label>
                            <input type="text" class="form-control" id="sell_price" name="sell_price" placeholder="販売価格">
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-3">
                            <label for="in_stock">在庫数</label>
                            <input type="text" class="form-control" id="in_stock" name="in_stock" placeholder="現在庫数">  
                            </div>
                            <div class="form-group col-3">
                            <label for="appr_inventory">適正在庫数</label>
                            <input type="text" class="form-control" id="appr_inventory" name="appr_inventory" placeholder="確保希望在庫数">  
                            </div>
                            <div class="form-group col-3">
                            <label for="avr_daily_sales">平均日次販売数</label>
                            <input type="text" class="form-control" id="avr_daily_sales" name="avr_daily_sales" placeholder="平均日次販売数">  
                            </div>
                            <div class="form-group col-3">
                            <label for="delivery_days">納品日数</label>
                            <input type="text" class="form-control" id="delivery_days" name="delivery_days" placeholder="発注から納品まで">  
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-6">
                                <label for="supplier_id">発注先</label>
                                <input type="text" class="form-control" id="supplier_id" name="supplier_id" placeholder="発注先">
                            </div>
                            <div class="form-group col-3">
                                <label for="purchase_price">仕入価格</label>
                                <input type="text" class="form-control" id="purchase_price" name="purchase_price" placeholder="仕入価格">
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                        <a href="{{ route('item.index') }}" class="btn btn-secondary">戻る</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
