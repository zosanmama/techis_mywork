@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header text-right px-2 py-2">
                <a href="{{ route('item.order') }}" class="btn mr-2 btn-success">簡単発注</a>
                <a href="{{ url('items/add') }}" class="btn btn-dark">商品登録</a>
            </div>
            @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">
                                        <span style="margin-right: 5px;">商品名</span>
                                        <a href="{{ route('item.index', ['sort' => 'item_name', 'direction' => 'asc']) }}">
                                            <img src="../img/arrow-up.svg" width="15">
                                        </a>
                                        <a href="{{ route('item.index', ['sort' => 'item_name', 'direction' => 'desc']) }}">
                                            <img src="../img/arrow-down.svg" width="15">
                                        </a>
                                </th>
                                <th scope="col" class="text-center">
                                    ステータス
                                    <a href="{{ route('item.index', ['sort' => 'status', 'direction' => 'asc']) }}">
                                        <img src="../img/arrow-up.svg" width="15">
                                    </a>
                                    <a href="{{ route('item.index', ['sort' => 'status', 'direction' => 'desc']) }}">
                                        <img src="../img/arrow-down.svg" width="15">
                                    </a>
                                </th>
                                <th scope="col" class="text-center">
                                    種別
                                    <a href="{{ route('item.index', ['sort' => 'type', 'direction' => 'asc']) }}">
                                        <img src="../img/arrow-up.svg" width="15">
                                    </a>
                                    <a href="{{ route('item.index', ['sort' => 'type', 'direction' => 'desc']) }}">
                                        <img src="../img/arrow-down.svg" width="15">
                                    </a>
                                </th>
                                <th scope="col" class="text-center">在庫</th>
                                <th scope="col" class="text-center">発注目安</th>
                                <th scope="col" class="text-center">詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="text-center"> {{ $item->item_name }}</td>
                                    <td class="text-center">
                                        @if($item->status == 'active')有効
                                        @elseif($item->status == 'inactive')無効
                                        @else
                                            {{ $item->status }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($item->type == 'pencil')鉛筆
                                        @elseif ($item->type == 'eraser')消しゴム
                                        @elseif ($item->type == 'ruler')ものさし
                                        @elseif ($item->type == 'pen')万年筆
                                        @else
                                            {{ $item->type }}
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->in_stock}}</td>
                                    <td class="text-center" style="color: {{ $item->order_guide < 0 ? 'red' : 'black' }}; white-space: nowrap;">
                                        @if($item->order_guide > 0)不要
                                        @elseif($item->order_guide < 0)
                                        {{ abs($item->order_guide) }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('item.show', $item->id) }} class="btn btn-secondary btn-sm"">詳細</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@stop

@section('css')
@stop

@section('js')
@stop
