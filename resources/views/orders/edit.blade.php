@extends('adminlte::page')

@section('title', '注文編集画面')

@section('content_header')

<div class="header1"></div>
<h1>注文編集画面</h1>
@stop

@section('content')
  
<div class="row">
        <div class="col-md-10">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form action="{{ url('/orders/orderEdit')}}" method="post"> 
                    @csrf
                    <input type="hidden" name="id" value="{{$order->id}}">
            

                    <div class="card-body">
                         <div class="form-group">
                            <label for="name">品名</label><h3>{{$order->name}}</h3>
                        </div>
                        <div class="form-group">
                            <label for="name">注文数</label>
                            <input type="number" class="form-control" id="order_quantity" name="order_quantity" value="{{$order->order_quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="name">仕入先</label>
                            <input type="text" class="form-control" id="supplier" name="supplier" value="{{$order->supplier}}">
                        </div>
                        <div class="form-group">
                            <label for="name">納期</label>
                            <input type="date" class="form-control" id="deadline" name="deadline" value="{{$order->deadline}}">
                        </div>
                        <div class="form-group">
                            <label for="name">注文者</label><h3>{{$order->order_name}}</h3>
                        </div>
                        
                    </div>
                    
                    <div class="card-footer block1" style="text-align:center;">
                        <button type="submit" class="btn btn-primary w-25" style="margin-bottom: 10px;">更新</button>                       
                </form>    

                
                    <div>    
                        <a href="/orders" class="btn btn-outline-info btn-sm w-25" role="button">戻る</a>
                    </div>    
                <form action="{{ url('/orders/historyDelete/'.$order->id) }}" style="text-align:right;">
                        <button  class="btn btn-danger">削除</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@stop

@section('css')
@stop

@section('js')
@stop



