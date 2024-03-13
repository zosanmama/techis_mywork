@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>簡単発注</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">簡単発注</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-dark">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    @foreach ($filteredItems as $supplier => $items)
                    <h2 class="m-50 pt-50">{{ $supplier }}</h2>
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">番号</th>
                                <th scope="col" class="text-center">商品名</th>
                                <th scope="col" class="text-center">発注見込</th>
                                <th scope="col" class="text-center">単価</th>
                                <th scope="col" class="text-center">合計額</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td> <!-- 番号を表示 -->
                                <td class="text-center">{{ $item->item_name }}</td>
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
                                <td class="text-center" style="color: {{ $item->order_guide > 0 ? 'red' : 'black' }}; white-space: nowrap;">
                                    @if($item->order_guide <= 0)不要
                                    @elseif($item->order_guide > 0)
                                        {{ $item->order_guide}}
                                    @else
                                        要確認
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endforeach
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
