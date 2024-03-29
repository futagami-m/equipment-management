@extends('adminlte::page')

@section('title', '更新画面')

@section('content_header')
<h1>更新</h1>
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
                <form action="{{ url('/items/itemEdit')}}" method="post"> 
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="hidden" name="updated_name" value="{{$user->name}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">品名</label>
                            <input type="text" class="form-control" id="name" name="name" maxlength="100" value="{{$item->name}}">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select class="form-control" id="type" name="type" >                         
                                @foreach(\App\Models\Item::TYPE as $key => $val)
                                <option value="{{ $key }}"
                                @if ($key == $item->type) selected @endif>
                                {{ $val['label'] }}
                                
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">在庫数</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{$item->quantity}}">
                        </div>
                        


                        <div class="form-group">
                            <label for="detail">詳細</label><small id="detailHelpInline" class="text-muted">　注文日時や仕入れ先など記入して下さい。</small>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{$item->detail}}">
                        </div>
                    </div>
                    
                    <div class="card-footer block1" style="text-align:left;">
                        <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">更新</button> 
                    
                </form>    
                    <div>    
                        <a href="/items" class="btn btn-outline-info " role="button">戻る</a>
                    </div>  
                <form action="{{ url('/items/delete/'.$item->id) }}" style="text-align:right;">
                    <button  class="btn btn-danger" >削除</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop