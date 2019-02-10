//商品の登録ページ
@extends('layouts.admin')

@section('title', '商品の登録ページ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>商品の登録</h2>
                <form action="{{ action('Admin\ShopController@create')}}"
                method="post" enctype="multipart/form-data">

                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>
                            {{ $e }}
                        </li>
                    @endforeach
                </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2" for="goods">商品名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="goods"
                        value="{{ old('goods') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="price">値段</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" name="price"
                        value="{{ old('price') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="body">説明文</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="body" rows="20">
                            {{ old('body') }}
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="title">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="追加">
            </form>
            </div>
        </div>
    </div>
@endsection
