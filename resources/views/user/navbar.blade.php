<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/user') }}">MyBooking</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="ダッシュボード">
                <a class="nav-link" href="{{ url('/user') }}">
                    <i class="fa fa-fw fa-bullhorn"></i>
                    <span class="nav-link-text">ダッシュボード</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="新規予約">
                <a class="nav-link" href="{{ url('/user/reservation') }}">
                    <i class="fa fa-fw fa-user-o"></i>
                    <span class="nav-link-text">新規予約</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="予約確認">
                <a class="nav-link" href="{{ url('/user/schedule') }}">
                    <i class="fa fa-fw fa-book"></i>
                    <span class="nav-link-text">予約確認</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="チケット">
                <a class="nav-link" href="{{ url('/user/product') }}">
                    <i class="fa fa-fw fa-ticket"></i>
                    <span class="nav-link-text">チケット</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="設定">
                <a class="nav-link" href="{{ url('/user/setting') }}">
                    <i class="fa fa-fw fa-address-book-o"></i>
                    <span class="nav-link-text">設定</span>
                </a>
            </li>

        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <!-- <a href="{{ url('/user/logout') }}" class="nav-link" data-toggle="modal" data-target="{{ url('/user/logout') }}"> -->
                 <a href="{{ route('logout') }}" class="nav-link">
                    <i class="fa fa-fw fa-sign-out"></i>  Logout</a>
            </li>
        </ul>
    </div>
</nav>
