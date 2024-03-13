@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>簡単発注</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-30">
                    @foreach ($filteredItems as $supplier => $items)
                    <p>仕入先
                    <h3 class="m-50 pt-50">{{ $supplier }}</h2>
                    </p>
                    <table class="table text-nowrap">
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
                            @php
                                $total = 0;
                             @endphp
                            @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td> <!-- 番号を表示 -->
                                <td class="text-center">{{ $item->item_name }}</td>
                                <td class="text-center"> {{ number_format($item->order_guide)}} </td>
                                <td class="text-center"> {{ number_format($item->purchase_price)}}</td>
                                <td class="text-center"> {{ number_format($item->order_guide * $item->purchase_price) }} </td>
                            </tr>
                            @php
                                 $total += $item->order_guide * $item->purchase_price;
                             @endphp
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right">合計：</td>
                                <td class="text-center">{{ number_format($total) }}</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="5">
                                    <a href="#" class="btn btn-danger">この内容で発注</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                    <div class="text-left">
                    <a href="{{ route('item.index') }}" class="btn btn-secondary">戻る</a>
                    </div>
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
