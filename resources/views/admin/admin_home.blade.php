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
                    <p class="white-text font-light uk-text-center" style="margin-top: 10px;">Kamu telah memfilter
                        <span
                            class="font-extrabold">20 thread</span> dan menyelesaikan <span
                            class="font-extrabold">33 report</span> hari ini. Keep up the good work!</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body z-depth-15"
                     style="border-radius: 6px;padding:20px 20px;">
                    <img src="{{asset('img/no_thread.svg')}}" class="uk-align-center" style="height: 120px;" alt="">
                    <p class="font-extrabold grey-text-4 uk-text-center" style="font-size: 30px;margin-bottom: 0px;margin-top: 0px;top: -20px;position:relative;">
                        {{$thread_count}}</p>
                    <p class="grey-text font-light uk-text-center" style="margin-top: -20px;">Thread di buat user</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body z-depth-15"
                     style="border-radius: 6px;padding:20px 20px;">
                    <img src="{{asset('img/no_brand.svg')}}" class="uk-align-center" style="height: 120px;" alt="">
                    <p class="font-extrabold grey-text-4 uk-text-center" style="font-size: 30px;margin-bottom: 0px;margin-top: 0px;top: -20px;position:relative;">
                        {{$brand_count}}</p>
                    <p class="grey-text font-light uk-text-center" style="margin-top: -20px;">Brand terdaftar</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body z-depth-15"
                     style="border-radius: 6px;padding:20px 20px;">
                    <img src="{{asset('img/no_gadget.svg')}}" class="uk-align-center" style="height: 120px;" alt="">
                    <p class="font-extrabold grey-text-4 uk-text-center" style="font-size: 30px;margin-bottom: 0px;margin-top: 0px;top: -20px;position:relative;">
                        {{$gadget_count}}</p>
                    <p class="grey-text font-light uk-text-center" style="margin-top: -20px;">Gadget terdaftar</p>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    @include('layouts.js')
@show
{{--<script type="text/javascript">--}}
{{--    var options = {--}}
{{--        chart: {--}}
{{--            height: 100, type: "area", toolbar: {--}}
{{--                show: !1--}}
{{--            }--}}
{{--            , sparkline: {--}}
{{--                enabled: !0--}}
{{--            }--}}
{{--            , grid: {--}}
{{--                show: !1, padding: {--}}
{{--                    left: 0, right: 0--}}
{{--                }--}}
{{--            }--}}
{{--        }--}}
{{--        , colors: ["#ec454f"], dataLabels: {--}}
{{--            enabled: !1--}}
{{--        }--}}
{{--        , stroke: {--}}
{{--            curve: "smooth", width: 2.5--}}
{{--        }--}}
{{--        , fill: {--}}
{{--            type: "gradient", gradient: {--}}
{{--                shadeIntensity: .9, opacityFrom: .7, opacityTo: .5, stops: [0, 80, 100]--}}
{{--            }--}}
{{--        }--}}
{{--        , series: [{--}}
{{--            name: "Jumlah Total", data: [10, 15, 20, 25, 49]--}}
{{--        }--}}
{{--        ], xaxis: {--}}
{{--            labels: {--}}
{{--                show: !1--}}
{{--            }--}}
{{--            , axisBorder: {--}}
{{--                show: !1--}}
{{--            }--}}
{{--        }--}}
{{--        , yaxis: [{--}}
{{--            y: 0, offsetX: 0, offsetY: 0, padding: {--}}
{{--                left: 0, right: 0--}}
{{--            }--}}
{{--        }--}}
{{--        ], tooltip: {--}}
{{--            x: {--}}
{{--                show: !1--}}
{{--            }--}}
{{--        }--}}
{{--    };--}}

{{--    var chart = new ApexCharts(document.querySelector("#thread-chart"), options);--}}
{{--    var chart_brand = new ApexCharts(document.querySelector("#brand-chart"), options);--}}
{{--    var chart_gadget = new ApexCharts(document.querySelector("#gadget-chart"), options);--}}

{{--    chart.render();--}}
{{--    chart_brand.render();--}}
{{--    chart_gadget.render();--}}
{{--</script>--}}
</body>
</html>
