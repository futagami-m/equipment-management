@extends('adminlte::page')

@section('title', 'ユーザー管理')

@section('content_header')
    <h1>ユーザー一覧</h1>
@stop
      
       
    
@section('content')
<!-- CSSの読み込み -->
<link rel="stylesheet" href="/css/custom.css">

 <body class="users">
    <div style="width:750px; margin:50px auto; text-align:center;">
        <div>
            <table class="table table-bordered" margin-top=10px;>
      
             <thead>
                <tr>
                    <th style ="width:50px; ">ID</th>
                    <th style ="width:150px;">名前</th>
                    <th style ="width:250px;">メールアドレス</th>
                    @can('admin-higher')
                    <th style ="width:150px;">ステータス</th>
                    @endcan
                    <th style ="width:150px;"></th>
                </tr>
             </thead>

            <tbody>
        @foreach($users as $value)
                <tr>
            
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    @can('admin-higher')
                    <td>@if($value->role == 1)
                    管理者@endif</td>
                    @endcan
                    <td style="justify-content: space-between"><a href="users/edit/{{$value->id}}"><button class="btn btn-info btn-sm">編集</button></a>
                    @can('admin-higher')
                    <a href="/memberDelete/{{$value->id}}"><button class="btn btn-danger btn-sm">削除</button></a></td>
                    @endcan
                </tr>
            </tbody>
                @endforeach
        </div>
            </table>
    </div>
    @can('admin-higher')
    <a class="pagetop" href="#">
    <div class="pagetop__arrow"></div></a>
    @endcan
 </body>
 
 
@stop

@section('css')
@stop

@section('js')
@stop