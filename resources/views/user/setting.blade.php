@extends('user.layout')
    @section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url($shopId.'/user/setting') }}">プロフィール</a></li>
            <li class="breadcrumb-item active"><a href="{{ url($shopId.'/user/setting/mail') }}">メール</a></li>
            <li class="breadcrumb-item"><a href="{{ url($shopId.'/user/setting/receive') }}">通知設定</a></li>
        </ol>
        <!-- Example DataTables Card-->
        <form action="{{ url($shopId.'/user/setting_update') }}" method="GET">
        <div class="mb-3">
            <div class="mb-3" name="image" value="{{ $user->image }}"></div>

            <div class="mb-3">氏名</div>
            <div class="mb-3"><h4>{{ $user->name }}</h4></div>

            <div class="mb-3">電話番号</div>
            <div  class="mb-3"><h4>{{ $user->tel }}</h4></div>

            <div class="mb-3">住所</div>
            <div class="mb-3"><h4>{{ $user->address }}</h4></div>

            <div class="mb-3">緊急連絡先</div>
            <div class="mb-3"><h4>{{ $user->tel2 }}</h4 ></div>

            <div class="button-wrapper"><input class="button" type="submit" value="編集"></div>
        </div>
        </form>
    @endsection
    @section('footer_js')
@endsection
