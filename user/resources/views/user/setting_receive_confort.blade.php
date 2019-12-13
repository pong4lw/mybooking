@extends('user.layout')
    @section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/user/setting') }}">プロフィール</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/user/setting/mail') }}">メール</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/user/setting/receive') }}">通知設定</a></li>

        </ol>
        <h3>通知設定</h3>
        <!-- Example DataTables Card-->
        <div class="mb-3">
            <form action="{{ url( 'user/setting/receive_confort' ) }}" method="GET">
            <div class="mb-3">通知メールの受信</div>
            <div  class="mb-3">
                <input name="receive" type="radio" <?php if($user->is_receive == '1'){?> checked="checked"  <?php }?> value="1">有効
                <input name="receive" type="radio" <?php if($user->is_receive == '0'){?> checked="checked" <?php }?> value="0">無効
            </div>

            <div class="button-wrapper"><input class="button" type="submit" value="確定"></div>
            </form>
        </div>
    @endsection
    @section('footer_js')
@endsection
