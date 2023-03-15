@extends('adminlte::page')

@section('title', 'ユーザー編集')

@section('content_header')
    <h1>ユーザー情報編集</h1>
@stop

@section('content')
<body class="edit">   
 <div class="border border-info round" style="margin:10px auto; padding:20px; width:400px;">

 <div style="width:320px; margin:60px auto; text-align:center;">
 
    <h4 class="name">アカウント編集 ID:{{$user->id}}</h4>
    @can('admin-higher')<p>(管理者画面)</p>@endcan
    <form action="/memberEdit" method="post">
    @csrf
<input type="hidden" value="{{$user->id}}" name = "id">

<!-- ログイン中の管理者かつ自分のID情報を表示する場合 または　利用者が自分のID情報を表示する場合-->
    @if((Auth::user()->role == 1 and $user->id == Auth::id()) or Auth::user()->role == 0)
    <input type="hidden" value="1" name = "type">
        <div style="text-align:left;">名前</div>    
        <div class="form-group">
            <input class="form-control" type="text" name="name" value="{{$user->name}}">
        </div>
        @if ($errors->has('name'))
        <p class="text-danger">{{$errors->first('name')}}</p>
        @endif    
        <div style="text-align:left;">メールアドレス</div>
        <div class="form-group">
            <input class="form-control" type="text" name="email" value="{{$user->email}}">
        </div>
        @if ($errors->has('email'))
        <p class="text-danger">{{$errors->first('email')}}</p>
        @endif
        
        <div style="text-align:left;">パスワード<span class="badge badge-danger ml-2">{{ __('必須') }}</span><small id="passwordHelpInline" class="text-muted">　8文字以上で入力して下さい</small></div>
        <div class="form-group">
            <input class="form-control" type="password" name="password">
        </div>
        @if ($errors->has('password'))
        <p class="text-danger">{{$errors->first('password')}}</p>
        @endif

        <div style="text-align:left;">パスワード確認<span class="badge badge-danger ml-2">{{ __('必須') }}</span></div>
        <div class="form-group">
            <input class="form-control" type="password" name="confirm_password" >
        </div>
        @if ($errors->has('confirm_password'))
            <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
        @endif
        <input type="hidden" name="role" value= "{{$user->role}}">
        
    
    <!-- 管理者が利用者のID画面を編集する場合 -->
    @else
    <input type="hidden" value="2" name = "type">
        <div style="text-align:left;">名前</div>{{$user->name}}
        <input type="hidden" value="{{$user->name}}" name = "name">
        <div style="text-align:left;">メールアドレス</div>
        {{$user->email}}
        <input type="hidden" value="{{$user->email}}" name = "email">
    @endif


    <div class="form-group">
        <input class="form-control" type="hidden" name="id" value="{{$user->id}}">
    </div>

    @can('admin-higher')
    <div style="text-align:left;">アクセス権限</div>
    <div class="check-box">
    <div class="form-check1">
      <label class="form-check-label">
      <input type="radio" name="role" value= "1" {{ $user->role == "1" ? "checked" : "" }}>管理者</label>
    </div>
    <div class="form-check2">
    <label class="form-check-label">
        <input type="radio" name="role" value= "0" {{ $user->role == "0" ? "checked" : "" }}>利用者
    </div>
    </div>
    @endcan
    <div class="form-group">
        <button type="submit" class="btn btn-info btn-block ">編集</button>
    </div>
    <!-- @can('admin-higher')
    <div class="form-group">
        <a href="/memberDelete/{{$user->id}}"><button type="button" class="btn btn-info btn-block">削除</button>
    </div>
    @endcan -->
     <a href="/users" class="btn btn-outline-info" role="button">ユーザー管理に戻る </a>
    
    </form>
 </div>   

</div>





@stop

@section('css')
@stop

@section('js')
@stop