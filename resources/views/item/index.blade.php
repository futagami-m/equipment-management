@extends('adminlte::page')

@section('title', '在庫一覧')

@section('content_header')
<!-- CSSの読み込み -->
<link rel="stylesheet" href="/css/custom.css">


<div class="header">
    <h1>在庫一覧</h1> 
    
    <div class="wrapper m-4" >
        <div class="post-search-form col-md-6">
        <form class="form-inline" action="{{ route('index') }}" method="get" style = "text-align:right;">
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">新規登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                
                                <th>品名</th>
                                <th>種別</th>
                                <th>@sortablelink('quantity', '在庫数')</th>
                                <th>詳細</th>
                                <th>@sortablelink('date', '更新日')</th>
                                <th>更新者</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type_label }}</td>
                                    
                                    <td @if($item->quantity < 10) style= "color:red;" @endif>{{$item->quantity}}</td>
                                    
                                    <td><a style="color:black;" class="d-inline-block" data-bs-toggle="tooltip" title="{{$item->detail}}">{{ Str::limit($item->detail, 10, '...') }}</a></td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>{{$item->updated_name}}</td>
                                    <td><div class="card-tools">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-append">
                                                <a href="{{ url('items/edit/'.$item->id) }}" class="btn btn-default card1">更新</a><a href="{{ url('orders/order/'.$item->id) }}" class="btn btn-default card1">注文</a>
                                            </div>
                                        </div>
                                    </td>
                                   
                                    <td><div class="card-tools">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-append">
                                                <a href="{{ url('items/delete/'.$item->id) }}" class="btn btn-danger">削除</a>
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
