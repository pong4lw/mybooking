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
        <form action="{{ url('/user/setting/password_update_confort') }}" method="POST">
@csrf
            <div class="mb-3">パスワードの変更</div>
            <div  class="mb-3">

                <input name="password" type="password" value="{{ $user->password }}"></div>

            <div class="button-wrapper"><input class="button" type="submit" value="変更"></div>
        </div>
        </form>        
    @endsection
    @section('footer_js')
@endsection