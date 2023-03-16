@extends('adminlte::page')

@section('title', '編集画面')

@section('content_header')
<h1>編集画面</h1>
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
            <form action="/itemEdit" method="post"> 
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" maxlength="100" >
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select class="form-control" id="type" name="type" placeholder="文房具">                         
                        <option value="" selected disabled></option>
                        @foreach(\App\Models\Item::TYPE as $key => $val)
                            <option value="{{ $key }}">
                            {{ $val['label'] }}
                            </option>
                        @endforeach
                    </select>
                        </div>
                        <div class="form-group">
                            <label for="name">在庫数</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>
                        


                        <div class="form-group">
                            <label for="detail">詳細</label></span><small id="passwordHelpInline" class="text-muted">　注文日時や仕入れ先など記入して下さい。</small>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">編集</button> <button  class="btn btn-primary">削除</button>
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
