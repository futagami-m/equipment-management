@extends('adminlte::page')

@section('title', '注文')

@section('content_header')
    <h1>注文</h1>
@stop

@section('content')
<input type="hidden" name="id" value="{{$item->id}}">
<div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">商品名</label><span>{{$item->name}}</span>
                            <input type="hidden" class="form-control" id="name" name="name" value="{{$item->name}}">
                        </div>
                        <div class="form-group">
                            <label for="name">在庫数</label><span>{{$item->quantity}}</span>
                            <input type="hidden" class="form-control" id="quantity" name="quantity" value="{{$item->quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="name">注文数</label>
                            <input type="number" class="form-control" id="ordered_quantity" name="ordered_quantity">
                        </div>
                        <div class="form-group">
                            <label for="name">仕入先</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>
                        <div class="form-group">
                            <label for="name">納期</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>
                        <div class="form-group">
                            <label for="name">注文者</label>
                            <input type="text" class="form-control" id="ordered_name" name="ordered_name">
                        </div>
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