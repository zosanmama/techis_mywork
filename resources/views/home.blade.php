@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
    <img src="../img/home_icon.svg" class="pr-3"  width=50px>
    <h4 class="pt-2">通知と記録</h4>
    </div>
@stop

@section('content')
<p>通知事項</p>
    <div class="card" style="width: 60rem;">
    <div class="card-body">
        <p>
        株式会社鉛筆さんのGW休業は、4月26日から5月7日です。<br>
        早め多めの発注をお願いします。
        </p>
    </div>
    </div>

<p>発注履歴</p>
   <div class="col-12">
    <table class="table table-dark">
        <thead>   
            <tr>
            <th class="text-center">日付</th>
            <th class="text-center">仕入れ先</th>
            <th class="text-center">発注額</th>
            <th class="text-center">発注詳細</tr>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td class="text-center">2024-03-10</td>
            <td class="text-center">株式会社鉛筆</td>
            <td class="text-center">66,500円</td>
            <td class="text-center">詳細</td>
        </tr>
        <tr>
        <td class="text-center">2024-03-10</td>
        <td class="text-center">株式会社鉛筆</td>
        <td class="text-center">66,500円</td>
        <td class="text-center">詳細</td>
        </tr>
        <tr>
        <td class="text-center">2024-03-10</td>
        <td class="text-center">株式会社鉛筆</td>
        <td class="text-center">66,500円</td>
        <td class="text-center">詳細</td>
        </tr>
        </tbody>
    </table>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
