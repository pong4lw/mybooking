@extends('user.layout')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/user/setting') }}">プロフィール</a></li>
    <li class="breadcrumb-item active"><a href="{{ url('/user/setting/mail') }}">メール</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/user/setting/receive') }}">通知設定</a></li>

</ol>
<!-- Example DataTables Card-->
<form action="{{ url('/user/setting/mail_confort') }}" method="GET">

    <div class="mb-3">
        <div class="mb-3"><h4>メール・パスワード</h4></div>
        <div class="mb-3">メールアドレスの変更</div>
        <div  class="col-md-6">

            <div class="mb-3">現在のメールアドレス</div>
            <div class="mb-3">{{ $user->email }}</div>
            <br>
            <div class="mb-3">新しいメールアドレス</div>
            <div class="mb-3"><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email_send" value="{{ $user->email }}" required autocomplete="email"></div>

            <div class="mb-3">再入力</div>
            <div class="mb-3"><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email_send" value="" required autocomplete="email"></div>
        </div>
        <div class="button-wrapper"><input class="btn_back" type="button" value="戻る"><input class="button" type="submit" value="確定"></div>
    </form>

<!--
        <div class="mb-3">パスワードの変更</div>
        <div class="col-md-6">

          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
            </div>
            <div class="button-wrapper"><input class="button" type="submit" value="変更"></div>
        </div>
    -->
</form>
@endsection
@section('footer_js')
<script type="text/javascript">
    $('.btn_back').click(function(){
        location.href="{{url('user/setting/mail')}}";
    });
</script>

@endsection
