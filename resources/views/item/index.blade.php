@extends('layouts.app')

@section('title', 'ユーザー一覧')

@section('content')
    <div class="container">
        <h1>ユーザー一覧</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <span>ユーザー名</span>
                        <a href="{{ route('users.index', ['sort' => 'name', 'direction' => 'asc']) }}">
                            <img src="{{ asset('img/arrow-up.svg') }}" width="15">
                        </a>
                        <a href="{{ route('users.index', ['sort' => 'name', 'direction' => 'desc']) }}">
                            <img src="{{ asset('img/arrow-down.svg') }}" width="15">
                        </a>
                    </th>
                    <th>
                        <span>社員番号</span>
                        <a href="{{ route('users.index', ['sort' => 'employeeid', 'direction' => 'asc']) }}">
                            <img src="{{ asset('img/arrow-up.svg') }}" width="15">
                        </a>
                        <a href="{{ route('users.index', ['sort' => 'employeeid', 'direction' => 'desc']) }}">
                            <img src="{{ asset('img/arrow-down.svg') }}" width="15">
                        </a>
                    </th>
                    <th>
                        <span>支店番号</span>
                        <a href="{{ route('users.index', ['sort' => 'branchid', 'direction' => 'asc']) }}">
                            <img src="{{ asset('img/arrow-up.svg') }}" width="15">
                        </a>
                        <a href="{{ route('users.index', ['sort' => 'branchid', 'direction' => 'desc']) }}">
                            <img src="{{ asset('img/arrow-down.svg') }}" width="15">
                        </a>
                    </th>
                    <th>
                        <span>権限</span>
                        <a href="{{ route('users.index', ['sort' => 'permission', 'direction' => 'asc']) }}">
                            <img src="{{ asset('img/arrow-up.svg') }}" width="15">
                        </a>
                        <a href="{{ route('users.index', ['sort' => 'permission', 'direction' => 'desc']) }}">
                            <img src="{{ asset('img/arrow-down.svg') }}" width="15">
                        </a>
                    </th>
                    <th>
                        <span>ステータス</span>
                        <a href="{{ route('users.index', ['sort' => 'status', 'direction' => 'asc']) }}">
                            <img src="{{ asset('img/arrow-up.svg') }}" width="15">
                        </a>
                        <a href="{{ route('users.index', ['sort' => 'status', 'direction' => 'desc']) }}">
                            <img src="{{ asset('img/arrow-down.svg') }}" width="15">
                        </a>
                    </th>
                    <th>登録日時</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->employeeid }}</td>
                        <td>{{ $user->branchid }}</td>
                        <td>{{ $user->permission }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
