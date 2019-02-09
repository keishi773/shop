@extends('layouts.admin')
@section('title', '商品の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>商品の編集</h2>
                <form action="{{ action('Admin\ShopController@update')}}"
                method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                      <ul>
                          @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                          @endforeach
                      </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="goods">商品名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control"
                            name="goods" value="{{ $good_form->goods }}"
                        </div>
                    </div>
            </div>
        </div>
    </div>
