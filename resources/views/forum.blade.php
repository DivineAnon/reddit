@section('head')
    @include('layouts.head')
@show
<body class="font-regular">
@section('loader')
    @include('layouts.loader')
@show
@section('navbar')
    @include('layouts.navbar')
@show
<div class="uk-container uk-margin-medium-top uk-margin-large-bottom">
    <div class="headerz" style="margin-top: -20px;">
        <img src="{{asset('img/no_gadget.svg')}}" class="uk-animation-scale-up" uk-img
             style="height: 150px;display: inline-block;animation-delay: 0.3s" alt="">
        <p class="font-heavy grey-text-4 uk-heading-small uk-animation-slide-left"
           style="display:inline-block;position:relative;top: 15px;left: 10px;animation-delay: 0.6s">Forum<span
                class="accent-color">.</span></p>
    </div>
    <div class="uk-child-width-expand@s uk-text-center uk-margin-medium-top" uk-grid
         uk-height-match="target: > div > .uk-card">
        @forelse($brands as $b)
            <div class="uk-width-1-5">
                <div
                    class="uk-card uk-card-default card-brand hoverable uk-card-body uk-border-rounded uk-padding-small z-depth-15"
                    style="padding-bottom: 30px;border-radius: 10px;">
                    <a href="{{route('brand_home', $b->name)}}">
                        <img class="uk-align-center img-carz z-depth-15 white" src="{{asset('img/brand_logo/'.$b->image)}}"
                             style="height: 55px;margin-top: 24px;margin-bottom: 35px;position:relative;padding: 13px;border-radius: 6px"
                             alt="">
                    </a>
                    <div class="chipz">
                        <a href="{{route('brand_home', $b->name)}}" class="brand-chip uk-border-rounded grey-text-2"
                           style="font-size: 13px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;background-color: #eee;text-decoration: none;position:relative;">{{$b->countGadget()}}
                            Gadgets</a><br><br>
                    </div>
                    <div class="chipz-2">
                        <a href="{{route('brand_home', $b->name)}}"
                           class="brand-chip uk-border-rounded white-text bg-gradient-noshadow"
                           style="font-size: 13px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;background-color: #eee;text-decoration: none;position:relative;">{{$b->countThread()}}
                            Threads</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="uk-text-center">
                <img src="{{asset('img/no_gadget_3.svg')}}" uk-img style="height: 170px;margin-top: 30px;" alt="">
                <p class="grey-text-3 font-extrabold" style="font-size: 25px;">No Brand Registered</p>
                <p class="grey-text-1 font-regular" style="font-size: 17px;margin-top: -15px;">no brand that has been
                    registered by the admin.</p>
            </div>
        @endforelse
    </div>
</div>
@section('js')
    @include('layouts.js')
@show
</body>
</html>
