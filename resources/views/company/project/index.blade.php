@extends('company.index')

@section('assets')
<link rel="stylesheet" href="{{ mix('css/company/common/index.css') }}">
<link rel="stylesheet" href="{{ mix('css/company/project/index.css') }}">
@endsection

@section('sidebar')
<div class="sidebar__container">
    <div class="sidebar__container__wrapper">
        <aside class="menu menu__container">
            <div class="menu__container--label">
                <div class="menu-label">
                    fms
                </div>
            </div>
            <ul class="menu-list menu menu__container__menu-list">
                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="dashboard"><i class="fas fa-chart-bar"></i>Dashboard</a></li>
                <li class="isActive"><a href="project"><i class="fas fa-envelope"></i>プロジェクト</a></li>
                <li><a href="task"><i class="fas fa-tasks"></i>タスク</a></li>
                <li><a href="document"><i class="fas fa-newspaper"></i>書類</a></li>
                <li><a href="#"><i class="fas fa-user-circle"></i>パートナー</a></li>
                <li><a href="#"><i class="fas fa-calendar-alt"></i>Calendar</a></li>
                <li><a href="#"><i class="fas fa-question"></i>Heip Center</a></li>
                <li><a href="#"><i class="fas fa-cog"></i>設定</a></li>
            </ul>
        </aside>
    </div>
</div>
@endsection

@section('content')
<div class="main__container">
    <div class="main__container__wrapper">
        <div class="top-container">
            <h1 class="top-container__title">プロジェクト</h1>
            <div>
                <p class="control has-icons-left">
                    <input class="search-project input" type="text" placeholder="Search project">
                    <span class="icon is-small is-left">
                    <i class="fas fa-search"></i>
                    </span>
                </p>
            </div>
            <div class="control">
                <a href="project/create"><button class="button btn">プロジェクト作成</button></a>
            </div>
        </div>

        <div class="project-container">
            <h2 class="project-container__item__title">プロジェクト</h2>
            <div class="project-container__item">
                <ul class="project-container__item__list">
                    <li>プロジェクト</li>
                    <li>担当者</li>
                    <li>パートナー</li>
                    <li>タスク</li>
                    <li>期限</li>
                    <li>予算</li>
                    <li>請求額</li>
                </ul>
            </div>

            <div class="project-container__content">
                @foreach( $projects as $project )
                <a class="show-link" href="project/{{ $project->id }}">
                    <ul class="item-list project-container__content__list" >
                        <li class="item-list project-container__content__list__name">{{ $project->name }}</li>
                        <li>
                            <p>{{ $project->company->representive_name }}</p>
                        </li>
                        <li>
                            @foreach( $project->projectPartners as $projectPartner )
                            <p>{{ $projectPartner->partner->name }}</p>
                            @endforeach
                        </li>
                        <li>
                            {{ $task_count_arr[$loop->index] }}件
                        </li>
                        <li>{{ $project->ended_at->format('Y年m月d日 H時') }}</li>
                        <li>¥{{ number_format($project->budget) }}</li>
                        <li>¥{{ number_format($project->price) }}</li>
                    </ul>
                </a>
                @endforeach
            </div>

            <div class="project-container__content__showmore">
                <p id="showmore_btn" class="project-container__content__showmore__btn">もっと見る<i class="arrow fas fa-angle-down"></i></p>
            </div>
        </div> 
    </div>
</div>
@endsection
