@section('head')
    @include('layouts.head')
@show
<body class="font-regular">
@section('loader')
    @include('layouts.loader')
@show
@section('admin_nav')
    @include('layouts.admin_nav')
@show
<div class="admin-body" style="margin-left: 260px;">
    <div class="uk-container" style="padding-top: 20px;">
        @section('account_bar')
            @include('layouts.account_bar')
        @show
        <div class="uk-child-width-1-4 uk-text-center uk-grid-match" uk-grid
             uk-height-match="target: > div > .uk-card" style="margin-top: 30px;">
            <div class="uk-width-1-2">
                <div
                    class="uk-card uk-card-default uk-card-body uk-border-rounded bg-gradient-noshadow"
                    style="border-radius: 6px;padding-top: 20px;">
                    <img src="{{asset('img/decore-left.svg')}}" class="uk-position-top-left" style="height: 100px;"
                         alt="">
                    <img src="{{asset('img/decore-right.svg')}}" class="uk-position-top-right" style="height: 75px;"
                         alt="">
                    <img src="{{asset('img/reward.svg')}}" class="background-darken-1"
                         style="padding: 20px;height: 70px;border-radius: 70px;" alt="">
                    <p class="white-text font-heavy uk-text-center" style="font-size: 27px;margin-bottom: 0px;">
                        Hello, {{\Illuminate\Support\Facades\Auth::user()->name}}!</p>
                    <p class="white-text font-light uk-text-center" style="margin-top: 10px;">Kamu telah membuat
                        <span
                            class="font-extrabold">{{$created_today}} Akun</span> admin hari ini.<br>Keep up the good work!</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body z-depth-15"
                     style="border-radius: 6px;padding:20px 20px;">
                    <img src="{{asset('img/admin.svg')}}" class="uk-align-center" style="height: 120px;" alt="">
                    <p class="font-extrabold grey-text-4 uk-text-center" style="font-size: 30px;margin-bottom: 0px;margin-top: 0px;top: -20px;position:relative;">
                        {{$created_admin}} Akun</p>
                    <p class="grey-text font-light uk-text-center" style="margin-top: -20px;">Admin di buat</p>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    @include('layouts.js')
@show
</body>
</html>
