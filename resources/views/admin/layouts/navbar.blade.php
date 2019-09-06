<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-white fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{url('admin/')}}">MyBooking</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse bg-white" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

<!--
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
-->

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="スタッフ検索">
                <a class="nav-link" href="{{ url('/admin') }}">
                    <i class="fa fa-fw fa-user-o"></i>
                    <span class="nav-link-text">ダッシュボード</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="カレンダー">
                <a class="nav-link" href="{{ url('/admin/schedule') }}">
            
               <i class="fa fa-calendar" aria-hidden="true"></i>

                    <span class="nav-link-text">カレンダー</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="ユーザー">
                <a class="nav-link" href="{{ url('/admin/user') }}">
     <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="nav-link-text">ユーザー</span>
                </a>
            </li>            

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="スタッフ">
                <a class="nav-link" href="{{ url('/admin/staff') }}">
                    <i class="fa fa-fw fa-user-o"></i>
                    <span class="nav-link-text">スタッフ</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="メニュー">
                <a class="nav-link" href="{{ url('/admin/services') }}">
                    <i class="fa fa-fw fa-address-book-o"></i>

                    <span class="nav-link-text">メニュー</span>
                </a>
            </li>
<!--
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="メニュー">
                <a class="nav-link" href="{{ url('/admin/waitting') }}">
                    <i class="fa fa-fw fa-building-o"></i>

                    <span class="nav-link-text">シフト</span>
                </a>
            </li>
-->
<!--
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="ヘルプセンター">
                <a class="nav-link" href="{{ url('/admin/help') }}">
                    <i class="fa fa-fw fa-book"></i>
                    <span class="nav-link-text">ヘルプセンター</span>
                </a>
            </li>
-->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="設定">
                <a class="nav-link" href="{{ url('/admin/setting') }}">
                    <!--<i class="fa fa-fw fa-ticket"></i>-->
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span class="nav-link-text">設定</span>
                </a>
            </li>

        </ul>




        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>メニュー開閉
                </a>
            </li>
        </ul>

@auth
        <ul class="navbar-nav　bg-white ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/notification')}}">
                    <i class="fa fa-fw fa-sign-out"></i>通知一覧</a>
            </li>
        </ul>

        <ul class="navbar-nav　bg-white ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/user')}}/{{ $user->id }}">
                    <i class="fa fa-fw fa-user-o"></i>プロフィール編集</a>
            </li>
        </ul>

        <ul class="navbar-nav　bg-white ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
@endauth

    </div>
</nav>
