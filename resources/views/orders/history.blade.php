@extends('adminlte::page')

@section('title', '注文履歴')

@section('content_header')
<!-- CSSの読み込み -->
<link rel="stylesheet" href="/css/custom.css">

<div class="header">
    <h1>注文履歴</h1>

    <div class="wrapper m-4" >
        <div class="post-search-form col-md-6">
        <form class="form-inline" action="{{ route('history') }}" method="get" style = "text-align:right;">
            <div class="form-group d-flex">
                <select name="type" class="form-control text-muted">
                    <option value="" selected>種別</option>
                    @foreach(\App\Models\Item::TYPE as $key => $val)
                                <option value="{{ $key }}"
                                @if ($key == 0) selected @endif>
                                {{ $val['label'] }}
                                
                                </option>
                                @endforeach
                </select>
                <input type="text" name="keyword"  class="form-control" placeholder="キーワードを入力">
                <input type="submit" value="検索" class="btn btn-primary">
            </div>
        </form>
        </div>
    </div>
</div>
@stop

@section('content')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="orders/add" class="btn btn-default">新規注文</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>品名</th>
                                <th>注文数</th>
                                <th>仕入先</th>
                                <th>@sortablelink('deadline', '納期')</th>
                                <th>注文者</th>
                                <th>@sortablelink('created_at', '注文日')</th>
                                <th>登録者</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->order_quantity}}</td>
                                    <td>{{ $value->supplier }}</td>
                                    <td>{{ $value->deadline }}</td>
                                    <td>{{ $value->order_name }}</td>
                                    <td>{{ $value->created_at}}</td>
                                    <td>{{ $value->ordered_name}}</td>
                                    
                                    <td><div class="card-tools">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-append">
                                                <a href="{{ url('orders/edit/'.$value->id) }}" class="btn btn-default">更新</a>
                                            </div>
                                        </div>
                                    </td>
                                   
                                    <td><div class="card-tools">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-append">
                                                <a href="orders/historyDelete/{{$value->id}}" class="btn btn-danger">削除</a>
                                            </div>
                                        </div>
                                    </td>        
                    </div>      
                                    
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <a class="pagetop" href="#">
    <div class="pagetop__arrow"></div></a>





@stop

@section('css')
@stop

@section('js')
@stop