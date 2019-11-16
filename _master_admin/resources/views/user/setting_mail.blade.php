@extends('user.layout')
    @section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/user/setting') }}">プロフィール</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/user/setting/mail') }}">メール</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/user/setting/receive') }}">通知設定</a></li>

        </ol>
        <!-- Example DataTables Card-->
        <div class="mb-3">
            <div class="mb-3">メール・パスワード</div>
            <div class="mb-3">メールアドレスの変更</div>
            <div  class="mb-3"><input name="email_send" type="text" value="{{ $user->email }}"></div>

            <div class="mb-3">パスワードの変更</div>
            <div  class="mb-3"><input name="password" type="text" value=""></div>

            <div class="button-wrapper"><input class="button" type="button" value="変更"></div>
        </div>
    @endsection
    @section('footer_js')
@endsection
