@section('head')
    @include('layouts.head')
@show
<body class="font-regular">
@section('loader')
    @include('layouts.loader')
@show
<div class="loading-wrapper bg-gradient-no-interactive uk-position-fixed"
     style="width: 100%;;height: 100vh;z-index: 1000;">
    <div class="loading uk-position-center" style="margin-top: -50px;">
        <div class="loading__ring">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px"
                 y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve"><path
                    d="M85.5,42c-0.2-0.8-0.5-1.7-0.8-2.5c-0.3-0.9-0.7-1.6-1-2.3c-0.3-0.7-0.6-1.3-1-1.9c0.3,0.5,0.5,1.1,0.8,1.7  c0.2,0.7,0.6,1.5,0.8,2.3s0.5,1.7,0.8,2.5c0.8,3.5,1.3,7.5,0.8,12c-0.4,4.3-1.8,9-4.2,13.4c-2.4,4.2-5.9,8.2-10.5,11.2  c-1.1,0.7-2.2,1.5-3.4,2c-0.5,0.2-1.2,0.6-1.8,0.8s-1.3,0.5-1.9,0.8c-2.6,1-5.3,1.7-8.1,1.8l-1.1,0.1L53.8,84c-0.7,0-1.4,0-2.1,0  c-1.4-0.1-2.9-0.1-4.2-0.5c-1.4-0.1-2.8-0.6-4.1-0.8c-1.4-0.5-2.7-0.9-3.9-1.5c-1.2-0.6-2.4-1.2-3.7-1.9c-0.6-0.3-1.2-0.7-1.7-1.1  l-0.8-0.6c-0.3-0.1-0.6-0.4-0.8-0.6l-0.8-0.6L31.3,76l-0.2-0.2L31,75.7l-0.1-0.1l0,0l-1.5-1.5c-1.2-1-1.9-2.1-2.7-3.1  c-0.4-0.4-0.7-1.1-1.1-1.7l-1.1-1.7c-0.3-0.6-0.6-1.2-0.9-1.8c-0.2-0.5-0.6-1.2-0.8-1.8c-0.4-1.2-1-2.4-1.2-3.7  c-0.2-0.6-0.4-1.2-0.5-1.9c-0.1-0.6-0.2-1.2-0.3-1.8c-0.3-1.2-0.3-2.4-0.4-3.7c-0.1-1.2,0-2.5,0.1-3.7c0.2-1.2,0.3-2.4,0.6-3.5  c0.1-0.6,0.3-1.1,0.4-1.7l0.1-0.8l0.3-0.8c1.5-4.3,3.8-8,6.5-11c0.8-0.8,1.4-1.5,2.1-2.1c0.9-0.9,1.4-1.3,2.2-1.8  c1.4-1.2,2.9-2,4.3-2.8c2.8-1.5,5.5-2.3,7.7-2.8s4-0.7,5.2-0.6c0.6-0.1,1.1,0,1.4,0s0.4,0,0.4,0h0.1c2.7,0.1,5-2.2,5-5  c0.1-2.7-2.2-5-5-5c-0.2,0-0.2,0-0.3,0c0,0-0.2,0.1-0.6,0.1c-0.4,0-1,0-1.8,0.1c-1.6,0.1-4,0.4-6.9,1.2c-2.9,0.8-6.4,2-9.9,4.1  c-1.8,1-3.6,2.3-5.4,3.8C26,21.4,25,22.2,24.4,23c-0.2,0.2-0.4,0.4-0.6,0.6c-0.2,0.2-0.5,0.4-0.6,0.7c-0.5,0.4-0.8,0.9-1.3,1.4  c-3.2,3.9-5.9,8.8-7.5,14.3l-0.3,1l-0.2,1.1c-0.1,0.7-0.3,1.4-0.4,2.1c-0.3,1.5-0.4,2.9-0.5,4.5c0,1.5-0.1,3,0.1,4.5  c0.2,1.5,0.2,3,0.6,4.6c0.1,0.7,0.3,1.5,0.4,2.3c0.2,0.8,0.5,1.5,0.7,2.3c0.4,1.6,1.1,3,1.7,4.4c0.3,0.7,0.7,1.4,1.1,2.1  c0.4,0.8,0.8,1.4,1.2,2.1c0.5,0.7,0.9,1.4,1.4,2s0.9,1.3,1.5,1.9c1.1,1.3,2.2,2.7,3.3,3.5l1.7,1.6c0,0,0.1,0.1,0.1,0.1c0,0,0,0,0,0  c0,0,0,0,0,0l0.1,0.1l0.1,0.1h0.2l0.5,0.4l1,0.7c0.4,0.2,0.6,0.5,1,0.7l1.1,0.6c0.8,0.4,1.4,0.9,2.1,1.2c1.4,0.7,2.9,1.5,4.4,2  c1.5,0.7,3.1,1,4.6,1.5c1.5,0.3,3.1,0.7,4.7,0.8c1.6,0.2,3.1,0.2,4.7,0.2c0.8,0,1.6-0.1,2.4-0.1l1.2-0.1l1.1-0.1  c3.1-0.4,6.1-1.3,8.9-2.4c0.8-0.3,1.4-0.6,2.1-0.9s1.3-0.7,2-1.1c1.3-0.7,2.6-1.7,3.7-2.5c0.5-0.4,1-0.9,1.6-1.3l0.8-0.6l0.2-0.2  c0,0,0.1-0.1,0.1-0.1c0.1-0.1,0,0,0,0v0.1l0.1-0.1l0.4-0.4c0.5-0.5,1-1,1.5-1.5c0.3-0.3,0.5-0.5,0.8-0.8l0.7-0.8  c0.9-1.1,1.8-2.2,2.5-3.3c0.4-0.6,0.7-1.1,1.1-1.7c0.3-0.7,0.6-1.2,0.9-1.8c2.4-4.9,3.5-9.8,3.7-14.4C87.3,49.7,86.6,45.5,85.5,42z"></path></svg>
        </div>
        <div class="loading__ring">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px"
                 y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve"><path
                    d="M85.5,42c-0.2-0.8-0.5-1.7-0.8-2.5c-0.3-0.9-0.7-1.6-1-2.3c-0.3-0.7-0.6-1.3-1-1.9c0.3,0.5,0.5,1.1,0.8,1.7  c0.2,0.7,0.6,1.5,0.8,2.3s0.5,1.7,0.8,2.5c0.8,3.5,1.3,7.5,0.8,12c-0.4,4.3-1.8,9-4.2,13.4c-2.4,4.2-5.9,8.2-10.5,11.2  c-1.1,0.7-2.2,1.5-3.4,2c-0.5,0.2-1.2,0.6-1.8,0.8s-1.3,0.5-1.9,0.8c-2.6,1-5.3,1.7-8.1,1.8l-1.1,0.1L53.8,84c-0.7,0-1.4,0-2.1,0  c-1.4-0.1-2.9-0.1-4.2-0.5c-1.4-0.1-2.8-0.6-4.1-0.8c-1.4-0.5-2.7-0.9-3.9-1.5c-1.2-0.6-2.4-1.2-3.7-1.9c-0.6-0.3-1.2-0.7-1.7-1.1  l-0.8-0.6c-0.3-0.1-0.6-0.4-0.8-0.6l-0.8-0.6L31.3,76l-0.2-0.2L31,75.7l-0.1-0.1l0,0l-1.5-1.5c-1.2-1-1.9-2.1-2.7-3.1  c-0.4-0.4-0.7-1.1-1.1-1.7l-1.1-1.7c-0.3-0.6-0.6-1.2-0.9-1.8c-0.2-0.5-0.6-1.2-0.8-1.8c-0.4-1.2-1-2.4-1.2-3.7  c-0.2-0.6-0.4-1.2-0.5-1.9c-0.1-0.6-0.2-1.2-0.3-1.8c-0.3-1.2-0.3-2.4-0.4-3.7c-0.1-1.2,0-2.5,0.1-3.7c0.2-1.2,0.3-2.4,0.6-3.5  c0.1-0.6,0.3-1.1,0.4-1.7l0.1-0.8l0.3-0.8c1.5-4.3,3.8-8,6.5-11c0.8-0.8,1.4-1.5,2.1-2.1c0.9-0.9,1.4-1.3,2.2-1.8  c1.4-1.2,2.9-2,4.3-2.8c2.8-1.5,5.5-2.3,7.7-2.8s4-0.7,5.2-0.6c0.6-0.1,1.1,0,1.4,0s0.4,0,0.4,0h0.1c2.7,0.1,5-2.2,5-5  c0.1-2.7-2.2-5-5-5c-0.2,0-0.2,0-0.3,0c0,0-0.2,0.1-0.6,0.1c-0.4,0-1,0-1.8,0.1c-1.6,0.1-4,0.4-6.9,1.2c-2.9,0.8-6.4,2-9.9,4.1  c-1.8,1-3.6,2.3-5.4,3.8C26,21.4,25,22.2,24.4,23c-0.2,0.2-0.4,0.4-0.6,0.6c-0.2,0.2-0.5,0.4-0.6,0.7c-0.5,0.4-0.8,0.9-1.3,1.4  c-3.2,3.9-5.9,8.8-7.5,14.3l-0.3,1l-0.2,1.1c-0.1,0.7-0.3,1.4-0.4,2.1c-0.3,1.5-0.4,2.9-0.5,4.5c0,1.5-0.1,3,0.1,4.5  c0.2,1.5,0.2,3,0.6,4.6c0.1,0.7,0.3,1.5,0.4,2.3c0.2,0.8,0.5,1.5,0.7,2.3c0.4,1.6,1.1,3,1.7,4.4c0.3,0.7,0.7,1.4,1.1,2.1  c0.4,0.8,0.8,1.4,1.2,2.1c0.5,0.7,0.9,1.4,1.4,2s0.9,1.3,1.5,1.9c1.1,1.3,2.2,2.7,3.3,3.5l1.7,1.6c0,0,0.1,0.1,0.1,0.1c0,0,0,0,0,0  c0,0,0,0,0,0l0.1,0.1l0.1,0.1h0.2l0.5,0.4l1,0.7c0.4,0.2,0.6,0.5,1,0.7l1.1,0.6c0.8,0.4,1.4,0.9,2.1,1.2c1.4,0.7,2.9,1.5,4.4,2  c1.5,0.7,3.1,1,4.6,1.5c1.5,0.3,3.1,0.7,4.7,0.8c1.6,0.2,3.1,0.2,4.7,0.2c0.8,0,1.6-0.1,2.4-0.1l1.2-0.1l1.1-0.1  c3.1-0.4,6.1-1.3,8.9-2.4c0.8-0.3,1.4-0.6,2.1-0.9s1.3-0.7,2-1.1c1.3-0.7,2.6-1.7,3.7-2.5c0.5-0.4,1-0.9,1.6-1.3l0.8-0.6l0.2-0.2  c0,0,0.1-0.1,0.1-0.1c0.1-0.1,0,0,0,0v0.1l0.1-0.1l0.4-0.4c0.5-0.5,1-1,1.5-1.5c0.3-0.3,0.5-0.5,0.8-0.8l0.7-0.8  c0.9-1.1,1.8-2.2,2.5-3.3c0.4-0.6,0.7-1.1,1.1-1.7c0.3-0.7,0.6-1.2,0.9-1.8c2.4-4.9,3.5-9.8,3.7-14.4C87.3,49.7,86.6,45.5,85.5,42z"></path></svg>
        </div>
    </div>
    <p class="white-text font-heavy uk-text-large uk-position-center" style="margin-top: 100px;font-size: 30px;">Tunggu
        bentar...</p>
</div>
@section('navbar')
    @include('layouts.navbar')
@show
<div class="uk-container uk-margin-medium-top uk-margin-large-bottom">
    <div
        class="uk-card uk-card-default uk-card-body uk-border-rounded bg-gradient-noshadow uk-animation-scale-down delay-animation"
        style="border-radius: 20px;">
        <div class="uk-container">
            <img src="{{asset('img/header.png')}}" uk-img style="height: 400px;z-index: -1;"
                 class="uk-position-bottom-right" alt="">
            <h3 class="white-text font-heavy uk-heading-medium uk-position-z-index">Lagi pengen<br>bahas gadget apa?
            </h3>
            <div class="uk-child-width-expand@s uk-text-center uk-margin-medium-top" uk-grid>
                @foreach($banner as $b)
                    <div>
                        <div
                            class="uk-card uk-card-default uk-card-body uk-border-rounded uk-padding-small background-darken-1"
                            style="z-index: 100;">
                            <a href="{{url('forum/brand/' . $b->brand->name . "/" . $b->slug)}}"
                               class="white-text font-extrabold uk-text-left"
                               style="font-size: 1.2rem;margin-bottom: 0px;display: block">
                                {{\Illuminate\Support\Str::limit($b->name, 25, '...')}}
                            </a>
                            <span class="brand-chip uk-align-left font-bold uk-text-uppercase"
                                  style="font-size: 11px;color: #e6e6e6;letter-spacing: 1px;margin-bottom: 20px;">
                            {{$b->brand->name}}</span>
                            <span
                                class="right brand-chip uk-align-left accent-color-background-3 grey-text-3 uk-border-rounded"
                                style="font-size: 13px;color: #e6e6e6;padding-left: 10px;padding-right: 10px;padding-top: 4px;padding-bottom: 3px;">+{{$b->countThread()}} Threads</span>
                        </div>
                    </div>
                @endforeach
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-padding-small"
                         style="background-color: rgba(0,0,0,0.1);box-shadow: none;display: none">Item
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-padding-small"
                         style="background-color: rgba(0,0,0,0.1);box-shadow: none;display: none">Item
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="headerz" style="margin-top: 40px;margin-bottom: 20px;">
        <img src="{{asset('img/no_thread.svg')}}" class="uk-animation-scale-up" uk-img
             style="height: 100px;display: inline-block;animation-delay: 0.7s" alt="">
        <p class="font-heavy grey-text-4 uk-animation-slide-left"
           style="display:inline-block;position:relative;top: 15px;left: 20px;animation-delay: 1s;font-size: 40px;">
            Hot Threads<span
                class="accent-color">.</span></p>
    </div>
    <div id="search_result" class="uk-grid" uk-grid="masonry: true">
        @forelse($hot_threads as $t)
            <div class="uk-width-1-2">
                <div
                    class="thread-card uk-card uk-card-default uk-card-small uk-card-body z-depth-15 hoverable"
                    style="border-radius: 10px;">
                    <div class="uk-grid" uk-grid>
                        <div class="uk-width-auto">
                            <div class="uk-width-1-1">
                                <form id="upvote{{$t->id}}" action="{{route('upvote')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="thread_key" value="{{$t->thread_key}}">
                                    <button type="button"
                                            @if(\Illuminate\Support\Facades\Auth::check()) onclick="$('#upvote{{$t->id}}').submit()"
                                            @else onclick="warning_toast('Please login first before you can vote.')"
                                            @endif @if(\Illuminate\Support\Facades\Auth::check() && $t->getVoteStatusAttribute(\Illuminate\Support\Facades\Auth::user()->id) == 'voted') class="uk-icon-button"
                                            disabled uk-tooltip="You have voted"
                                            @else class="uk-icon-button" @endif uk-icon="arrow-up"></button>
                                </form>
                            </div>
                            <div class="uk-width-1-1">
                                <p class="grey-text-3 font-bold uk-text-center"
                                   style="margin-top: 15px;margin-bottom: 10px;">{{$t->getVoteAttribute()}}</p>
                            </div>
                            <div class="uk-width-1-1">
                                <form action="{{route('downvote')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="thread_key" value="{{$t->thread_key}}">
                                    <button type="button"
                                            @if(\Illuminate\Support\Facades\Auth::check()) onclick="$('#downvote{{$t->id}}').submit()"
                                            @else onclick="warning_toast('Please login first before you can vote.')"
                                            @endif @if(\Illuminate\Support\Facades\Auth::check() && $t->getVoteStatusAttribute(\Illuminate\Support\Facades\Auth::user()->id) == 'voted') class="uk-icon-button"
                                            disabled uk-tooltip="title: You have voted; pos: bottom"
                                            @else class="uk-icon-button" @endif uk-icon="arrow-down"></button>
                                </form>
                            </div>
                        </div>
                        <div class="uk-width-1-2 uk-width-expand">
                            <div class="uk-margin">
                                <p class="grey-text font-light" style="font-size: 0.9rem">Posted by <a href="{{route('profile_page', $t->creator()->first()->name)}}"
                                                                                                       class="accent-color font-regular">{{$t->creator->name}}</a>
                                    • {{\Illuminate\Support\Carbon::parse($t->created_at)->diffForHumans()}} <span
                                        uk-icon="icon: commenting" class="uk-position-right"
                                        style="padding-top:20px;padding-right:20px;height: 20px;"></span><span
                                        class="disqus-comment-count uk-position-right"
                                        style="padding-top: 20px;padding-right:20px;right: 30px;height: 20px;"
                                        data-disqus-url="{{route('thread_detail', $t->thread_key)}}"></span></p>
                                <a href="{{route('thread_detail', $t->thread_key)}}" class="grey-text-3 font-extrabold"
                                   style="font-size: 19px;top: -15px;position:relative">{{$t->title}}</a>
                                @if($t->thread_type == 0)
                                    @if(!empty($t->article))
                                        <p class="grey-text-1 font-light"
                                           style="margin-top: -10px;">{{\Illuminate\Support\Str::limit(strip_tags($t->article), 160, '[..]')}}</p>
                                    @endif
                                @elseif($t->thread_type == 1)
                                    <img data-src="{{asset('img/thread_images/'.$t->image)}}" width="95%"
                                         class="z-depth-15"
                                         height="auto" uk-img style="margin-bottom: 30px;border-radius: 10px;" alt="">
                                @elseif($t->thread_type == 2)
                                    <iframe class="z-depth-15" src="{{$t->video_embed_link}}" title="Thread embed video"
                                            width="95%" height="250px"
                                            style="margin-bottom: 30px;border-radius: 10px;"></iframe>
                                @endif
                                <div class="tags" style="margin-bottom: 10px;">
                                    @if(!empty($t->brand_id))
                                        <a href="{{route('brand_home', $t->brand->name)}}"
                                           class="brand-chip uk-border-rounded white-text bg-gradient-noshadow"
                                           style="font-size: 13px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;background-color: #eee;text-decoration: none">{{$t->brand->name}}</a>
                                    @endif
                                    @if(!empty($t->gadget_id))
                                        <a href="{{url('forum/brand/' . $t->brand->name, $t->gadget->slug)}}"
                                           class="brand-chip uk-border-rounded white-text bg-gradient-noshadow"
                                           style="font-size: 13px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;background-color: #eee;text-decoration: none">{{$t->gadget->name}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="uk-width-1-1">
                <div class="uk-text-center">
                    <img src="{{asset('img/search.svg')}}" uk-img style="height: 250px;margin-top: -30px;" alt="">
                    <p class="grey-text-3 font-extrabold" style="font-size: 25px;">No hot thread</p>
                    <p class="grey-text-1 font-regular" style="font-size: 17px;margin-top: -15px;">thread data is
                        empty.</p>
                </div>
            </div>
        @endforelse
    </div>
    @include('layouts.pagination', ['paginator' => $hot_threads])
</div>
@section('js')
    @include('layouts.js')
@show
</body>
</html>
