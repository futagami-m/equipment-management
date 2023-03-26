@extends('adminlte::page')

@section('title', '注文')

@section('content_header')
    <h1>注文</h1>
@stop

@section('content')

<div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <form action="{{ url('/orders/addOrder')}}" method="post"> 
                    @csrf

                    <input type="hidden" name="ordered_name" value="{{$user->name}}">
                    <input type="hidden"  id="type" name="type" value="{{$item->type}}">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">品名</label><h3>{{$item->name}}</h3>
                            <input type="hidden" class="form-control" id="name" name="name" value="{{$item->name}}">
                        </div>
                        <div class="form-group">
                            <label for="name">在庫数</label><h3>　{{$item->quantity}}</h3>
    
                        </div>
                        <div class="form-group">
                            <label for="name">注文数</label>
                            <input type="number" class="form-control" id="order_quantity" name="order_quantity" placeholder="20">
                        </div>
                        <div class="form-group">
                            <label for="name">仕入先</label>
                            <input type="text" class="form-control" id="supplier" name="supplier" placeholder="モノタロウ">
                        </div>
                        <div class="form-group">
                            <label for="name">納期</label>
                            <input type="date" class="form-control" id="deadline" name="deadline">
                        </div>
                        <div class="form-group">
                            <label for="name">注文者</label>
                            <input type="text" class="form-control" id="order_name" name="order_name" placeholder="二神さん">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" style="margin-bottom:10px;">注文</button> 
                        <div>
                        <a href="/items" class="btn btn-outline-info " role="button">戻る</a>
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