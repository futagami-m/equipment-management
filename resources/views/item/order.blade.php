@extends('adminlte::page')

@section('title', '注文')

@section('content_header')
    <h1>注文</h1>
@stop

@section('content')
<div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>
                        <div class="form-group">
                            <label for="name">注文数</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
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
                            <input type="number" class="form-control" id="quantity" name="quantity">
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