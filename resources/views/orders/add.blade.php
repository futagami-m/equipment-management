@extends('adminlte::page')

@section('title', '新規注文')

@section('content_header')
    <h1>新規注文</h1>
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
                <form method="POST">
                    @csrf

                    <input type="hidden" name="ordered_name" value="{{$user->name}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">品名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
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
                            <label for="name">注文数</label>
                            <input type="number" class="form-control" id="order_quantity" name="order_quantity">
                        </div>
                        


                        <div class="form-group">
                            <label for="detail">仕入先</label>
                            <input type="text" class="form-control" id="supplier" name="supplier" placeholder="モノタロウ">
                        </div>

                        <div class="form-group">
                            <label for="date">納期</label>
                            <input type="date" class="form-control" id="deadline" name="deadline">
                        </div>
                        <div class="form-group">
                            <label for="name">注文者</label>
                            <input type="text" class="form-control" id="order_name" name="order_name">
                        </div>


                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">注文</button>
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
