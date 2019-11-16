@extends('user.layout')
    @section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/user/setting') }}">プロフィール</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/user/setting/mail') }}">メール</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/user/setting/receive') }}">通知設定</a></li>
        </ol>
        <!-- Example DataTables Card-->
        <form action="{{ url('/user/setting_confort') }}" method="GET">
        <div class="mb-3">
            <div class="mb-3" name="image" value="{{ $user->image }}"></div>

            <div class="mb-3"><h3>氏名</h3></div>
            <div class="mb-3"><input name="name" type="text" value="{{ $user->name }}"></div>

            <div class="mb-3"><h3>電話番号</h3></div>
            <div  class="mb-3"><input name="tel" type="text" value="{{ $user->tel }}"></div>

            <div class="mb-3"><h3>住所</h3></div>
            <div class="mb-3"><input type="text" value="{{ $user->address }}" name="address"></div>

            <div class="mb-3"><h3>緊急連絡先</h3></div>
            <div class="mb-3"><input name="tel2" type="text" value="{{ $user->tel2 }}"></div>

            <div class="button-wrapper"><input class="button" type="submit" value="編集"></div>
        </div>
        </form>
    @endsection
    @section('footer_js')
@endsection
