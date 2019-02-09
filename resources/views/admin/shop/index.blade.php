@extends('layouts.admin')
@section('title', '登録済み商品の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>商品一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ShopController@add') }}" role="button" class="btn btn-primary">新規登録</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ShopController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value={{ $cond_title }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">商品名</th>
                                <th width="20%">価格</th>
                                <th width="30%">説明文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $good)
                                <tr>
                                    <th>{{ $good->id }}</th>
                                    <th>{{ str_limit($good->goods, 100) }}</th>
                                    <th>{{ str_limit($good->price, 100) }}</th>
                                    <th>{{ str_limit($good->body, 200) }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
