@extends('adminlte::page')

@section('title', '仕入先登録')

@section('content_header')
    <h1>仕入先登録</h1>
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
                            <label for="supplier_name">仕入先名</label>
                            <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="仕入先名">
                        </div>
                        <div class="form-group">
                            <label for="supplier_rubi">仕入先名かな</label>
                            <input type="text" class="form-control" id="supplier_rubi" name="supplier_rubi" placeholder="仕入先名かな">
                        </div>
                        <div class="form-group">
                            <label for="supplier_address">仕入先住所</label>
                            <input type="text" class="form-control" id="supplier_address" name="supplier_address" placeholder="仕入先住所">
                        </div>
                        <div class="form-group">
                            <label for="supplier_phone">仕入先電話番号</label>
                            <input type="text" class="form-control" id="supplier_phone" name="supplier_phone" placeholder="仕入先電話番号">
                        </div>
                        <div class="form-group">
                            <label for="supplier_email">仕入先メールアドレス</label>
                            <input type="text" class="form-control" id="supplier_email" name="supplier_email" placeholder="仕入先メールアドレス">
                        </div>
                        <div class="form-group">
                            <label for="supplier_note">メモ</label>
                            <input type="text" class="form-control" id="supplier_note" name="supplier_note" placeholder="メモ">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                        <a href="{{ route('supplier.index') }}" class="btn btn-secondary">戻る</a>
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
