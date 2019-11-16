<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html"> </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="お知らせ">
                <a class="nav-link" href="{{ url('/notification') }}">
                    <i class="fa fa-fw fa-bullhorn"></i>
                    <span class="nav-link-text">お知らせ</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="ユーザー">
                <a class="nav-link" href="{{ url('/user') }}">
                    <i class="fa fa-fw fa-user-o"></i>
                    <span class="nav-link-text">ユーザー</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="カテゴリ">
                <a class="nav-link" href="{{ url('/category') }}">
                    <i class="fa fa-fw fa-building-o"></i>
                    <span class="nav-link-text">カテゴリ</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="小説">
                <a class="nav-link" href="{{ url('/novel') }}">
                    <i class="fa fa-fw fa-book"></i>
                    <span class="nav-link-text">小説</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="広告">
                <a class="nav-link" href="{{ url('/advertising') }}">
                    <i class="fa fa-fw fa-ticket"></i>
                    <span class="nav-link-text">広告</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="おすすめ小説">
                <a class="nav-link" href="{{ url('/recommend') }}">
                    <i class="fa fa-fw fa-address-book-o"></i>
                    <span class="nav-link-text">おすすめ小説</span>
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
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
