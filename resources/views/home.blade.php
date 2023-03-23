@extends('adminlte::page')

@section('title', '備品管理システム')

@section('content_header')
<!-- CSSの読み込み -->
<link rel="stylesheet" href="/css/custom.css">

    <h1>通知</h1>
@stop

@section('content')
<div style="display:flex;">
    <div class="card" style="width:21rem;">
        <img class ="bd-placeholder-img card-img-top" width="100%" height="180" src="/images/office1.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text></img>
        <div class="card-body">
            <h5 class="card-title">以下の備品が在庫僅少です</h5>
            <p class="card-text">
            @foreach ($items as $value)
            <ul class="list-group list-group-flush">
            <li class="list-group-item">●{{ $value->name }}&nbsp => 残り{{ $value->quantity }}個&nbsp</li>
            @if ($loop->iteration === 5)
            @break
            @endif
            @endforeach
            </ul>
            </p>
            <div style="text-align:center;">
                <a href="/items" class="btn btn-primary w-50">在庫一覧へ</a>
            </div>
        </div>
          
    </div>

    <div class="card" style="width: 24rem; margin-left:10px;">
        <img class ="bd-placeholder-img card-img-top" width="100%" height="180" src="/images/office2.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text></img>
        <div class="card-body">
            <h5 class="card-title">新規注文履歴</h5>
            <p class="card-text">
            @foreach ($order as $value1)
            <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $value1->order_name }} さんが&nbsp{{ $value1->name }}を&nbsp{{ $value1->order_quantity }}個注文しました</li>
            @if ($loop->iteration === 5)
            @break
            @endif
            @endforeach
            </ul>
            </p>
            <div style="text-align:center;">
                <a href="/orders" class="btn btn-primary w-50">注文履歴へ</a>
            </div>    
        </div>
          
    </div>
    
</div>    
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

