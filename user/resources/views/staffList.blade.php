<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lobby</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/index') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth


                </div>

            @endif

            <div class="content">
                <div class="title m-b-md">

                </div>
■ 支店業務                
<br>管理人登録 管理人権限の変更 スタッフメニューの変更<br>
<br>

<br>■ スタッフ新規登録<br>

<br>■ 顧客とスタッフのマッチング<br>
                   <div class="links"><a href="{{ url('/customers/search') }}">顧客情報検索</a></div>

                     <div class="links"><a href="{{ url('/customers/') }}">スタッフ未決定 顧客一
                    覧</a></div> 

                    <div class="links"><a href="{{ url('/customers/staff') }}">スタッフ情報検索</a></div>

<div class="links"><a href="{{ url('/contact') }}">スタッフへのお知らせ編集
</a></div>


<br>■ 決済<br>

                    <div class="links"><a href="{{ url('/customers/search') }}">未決済の顧客情報検索</a></div>

                    <div class="links"><a href="{{ url('/customers/search') }}">決済履歴</a></div>

<br>■ 問い合わせ <br>
                    <div class="links"><a href="{{ url('/customers/staff') }}">顧客問い合わせ</a></div>

                    <div class="links"><a href="{{ url('/customers/staff') }}">スタッフ問い合わせ履歴</a></div>

<br>
■ 給与計算<br>
    


 



                </div>
        </div>
    </body>
</html>
