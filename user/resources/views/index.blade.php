@extends('user.layout')
    @section('user.content')

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"></a>
            </li>

            <li class="breadcrumb-item active"></li>
        </ol>
        <div class="card mb-3">
            <ul style="list-style: none;">
                <li><a href="{{ url('/user/reservation') }}">新規予約</a></li>

                <li><a href="{{ url('/user/schedule') }}">予約確認</a></li>
                
                <li><a href="{{ url('/user/product') }}">チケット</a></li>
                
                <li><a href="{{ url('/user/setting') }}">設定</a></li>

            </ul>
        </div>
    @endsection
    @section('footer_js')
@endsection
