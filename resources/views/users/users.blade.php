@extends('adminlte::page')

@section('title', 'ユーザー管理')

@section('content_header')
    <h1>ユーザー管理</h1>
@stop
      
        <!-- CSSの読み込み -->
    <link rel="stylesheet" href="css/mfstyle.css">
    
@section('content')
 <body class="users">
    <div style="width:750px; margin:50px auto; text-align:center;">
    <div>
        <table class="table table-bordered" margin-top=10px;>
      

        <tr>
            <th style ="width:50px; ">ID</th>
            <th style ="width:150px;">名前</th>
            <th style ="width:250px;">メールアドレス</th>
            <th style ="width:150px;">ステータス</th>
        </tr>
       
        </div>
        @foreach($users as $value)
        <tr>
            
            <td>{{$value->id}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->email}}</td>
            <td>@if($value->role == 1)
             管理者@endif</td>

            <td><a href="users/edit/{{$value->id}}"><button class="btn btn-info btn-block btn-sm">編集</button></a></td>
            @can('admin-higher')
            <td><a href="/memberDelete/{{$value->id}}"><button class="btn btn-info btn-block btn-sm">削除</button></a></td>
            @endcan
        </tr>
        @endforeach
        </div>
    </table>
    </div>
   
   
 </body>
 
 <a class="pagetop" href="#">
    <div class="pagetop__arrow"></div></a>
@stop

@section('css')
@stop

@section('js')
@stop