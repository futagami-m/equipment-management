@extends('adminlte::page')

@section('title', '注文履歴')

@section('content_header')
    <h1>注文履歴</h1>

<div class="wrapper m-4" >
        <div class="post-search-form col-md-6">
        <form class="form-inline" action="{{ route('history') }}" method="get" style = "text-align:right;">
            <div class="form-group d-flex">
                <select name="type" class="form-select text-muted w-25 bg-light" aria-label="Default select example">
                    <option value="" selected>種別を選択</option>
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


@stop

@section('content')








@stop

@section('css')
@stop

@section('js')
@stop