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
    <div class="headerz" style="margin-top: 0px;margin-bottom: 20px;">
        <img src="{{asset('img/no_brand.svg')}}" class="uk-animation-scale-up" uk-img
             style="height: 100px;display: inline-block;animation-delay: 0.7s" alt="">
        <p class="font-heavy grey-text-4 uk-animation-slide-left"
           style="display:inline-block;position:relative;top: 15px;left: 20px;animation-delay: 1s;font-size: 40px;">
            Popular Gadgets<span
                class="accent-color">.</span></p>
    </div>
    <div id="latest_threads" uk-slider class="uk-padding-small uk-margin-medium-top uk-margin-large-bottom">
        <div class="uk-position-relative uk-visible-toggle uk-light">
            <ul class="uk-slider-items uk-child-width-1-1 uk-grid">
                @foreach($popular_gadget as $b)
                    <li class="uk-width-1-4">
                        <div
                            class="uk-card uk-card-default uk-card-body uk-border-rounded uk-padding-small z-depth-15" style="padding-left: 30px;padding-right: 30px;padding-bottom: 30px;border-radius: 10px;">
                            <div class="uk-grid" uk-grid>
                                <div class="uk-width-1-1">
                                    <a href="{{url('forum/brand/' . $b->brand->name . "/" . $b->slug)}}"
                                       class="grey-text-3 font-extrabold"
                                       style="font-size: 1.3rem;margin-bottom: 0px;display: block;position:relative;top: 20px;">
                                        {{\Illuminate\Support\Str::limit($b->name, 150, '...')}}
                                    </a>
                                    <a href="{{url('forum/brand/' . $b->brand->name . "/" . $b->slug)}}" class="brand-chip uk-align-left font-bold uk-text-uppercase uk-display-block grey-text-1"
                                       style="font-size: 1rem;letter-spacing: 1px;margin-bottom: 20px;margin-top: 20px;">{{$b->brand->name}}</a>
                                    <a href="{{url('forum/brand/' . $b->brand->name . "/" . $b->slug)}}" class="brand-chip uk-align-left white-text bg-gradient-noshadow uk-border-rounded uk-display-block"
                                       style="font-size: 13px;padding-left: 10px;padding-right: 10px;padding-top: 4px;padding-bottom: 3px;">+{{$b->countThread()}}
                                        Threads</a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <a class="uk-position-center-left uk-position-small uk-icon-button bg-gradient uk-hidden-hover" href="#"
               uk-slidenav-previous uk-slider-item="previous" style="padding: 13px;transform: scale(1.2)"></a>
            <a class="uk-position-center-right uk-position-small uk-icon-button bg-gradient uk-hidden-hover" href="#"
               uk-slidenav-next uk-slider-item="next" style="padding: 13px;transform: scale(1.2)"></a>

        </div>

    </div>
    <hr class="uk-divider-icon">
    <div class="headerz" style="margin-top: 0px;margin-bottom: 20px;">
        <img src="{{asset('img/person.svg')}}" class="uk-animation-scale-up" uk-img
             style="height: 100px;display: inline-block;animation-delay: 0.7s" alt="">
        <p class="font-heavy grey-text-4 uk-animation-slide-left"
           style="display:inline-block;position:relative;top: 15px;left: 20px;animation-delay: 1s;font-size: 40px;">
            King of threads<span
                class="accent-color">.</span></p>
    </div>
    <div id="latest_image_threads" uk-slider class="uk-padding-small uk-margin-medium-top uk-margin-large-bottom">
        <div class="uk-position-relative uk-visible-toggle uk-light">
            <ul class="uk-slider-items uk-child-width-1-1 uk-grid">
                @forelse($popular_user as $user)
                    <li class="uk-width-1-4">
                        <div class="uk-card uk-card-default uk-card-small uk-card-body z-depth-15" style="border-radius: 10px;z-index: 500;">
                            <div class="uk-padding-small uk-text-center">
                                <div class="uk-align-center"
                                     style="height:100px;width: 100px;background-image: url({{asset($user->getAvatarAttribute())}});background-position: center;background-size: cover;background-repeat: no-repeat;border-radius: 100px;"
                                     alt=""></div>
                                <div style="margin-top: 20px;">
                                    <a href="{{route('profile_page', $user->name)}}" class="grey-text-3 font-extrabold uk-text-capitalize" style="font-size: 19px;position: relative;top: -10px;">{{$user->name}}</a>
                                    <div class="tags" style="margin-bottom: 10px;margin-top: 10px;">
                                        <a href="" onclick="event.preventDefault()"
                                           class="brand-chip uk-border-rounded white-text bg-gradient-noshadow"
                                           style="font-size: 13px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;background-color: #eee;text-decoration: none">{{$user->getThreadCount()}} Threads</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                @endforelse
            </ul>

            <a class="uk-position-center-left uk-position-small uk-icon-button bg-gradient uk-hidden-hover" href="#"
               uk-slidenav-previous uk-slider-item="previous" style="padding: 13px;transform: scale(1.2)"></a>
            <a class="uk-position-center-right uk-position-small uk-icon-button bg-gradient uk-hidden-hover" href="#"
               uk-slidenav-next uk-slider-item="next" style="padding: 13px;transform: scale(1.2)"></a>

        </div>

    </div>
    <hr class="uk-divider-icon">
    <div class="headerz" style="margin-top: 0px;margin-bottom: 20px;">
        <img src="{{asset('img/article_thread.svg')}}" class="uk-animation-scale-up" uk-img
             style="height: 100px;display: inline-block;animation-delay: 0.7s" alt="">
        <p class="font-heavy grey-text-4 uk-animation-slide-left"
           style="display:inline-block;position:relative;top: 15px;left: 20px;animation-delay: 1s;font-size: 40px;">
            Popular Threads<span
                class="accent-color">.</span></p>
        <a href="{{route('popular_thread_article')}}"
           class="uk-button uk-button-default tm-button-default uk-text-capitalize font-extrabold white-text uk-border-rounded bg-gradient uk-float-right"
           style="border: none;top: 40px;position:relative;">
            Show More
        </a>
    </div>
    <div id="latest_threads" uk-slider class="uk-padding-small uk-margin-medium-top uk-margin-large-bottom">
        <div class="uk-position-relative uk-visible-toggle uk-light">
            <ul class="uk-slider-items uk-child-width-1-1 uk-grid">
                @forelse($latest_threads as $t)
                    <li class="uk-width-1-3" style="width: calc(100% * 1 / 2.5);">
                        <div class="uk-width-1-1">
                            <div
                                class="thread-card uk-card uk-card-default uk-card-small uk-card-body z-depth-15 hoverable"
                                style="border-radius: 10px;z-index: 15;">
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
                                                        style="background-color: #f8f8f8;color: #999;"
                                                        disabled uk-tooltip="You have voted"
                                                        @else class="uk-icon-button"
                                                        style="background-color: #f8f8f8;color: #999;"
                                                        @endif uk-icon="arrow-up"></button>
                                            </form>
                                        </div>
                                        <div class="uk-width-1-1">
                                            <p class="grey-text-3 font-bold uk-text-center"
                                               style="margin-top: 15px;margin-bottom: 10px;">{{$t->getVoteAttribute()}}</p>
                                        </div>
                                        <div class="uk-width-1-1">
                                            <form action="{{route('downvote')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="thread_key" value="{{$t->thread_key}}">
                                                <button type="button"
                                                        @if(\Illuminate\Support\Facades\Auth::check()) onclick="$('#downvote{{$t->id}}').submit()"
                                                        @else onclick="warning_toast('Please login first before you can vote.')"
                                                        @endif @if(\Illuminate\Support\Facades\Auth::check() && $t->getVoteStatusAttribute(\Illuminate\Support\Facades\Auth::user()->id) == 'voted') class="uk-icon-button"
                                                        style="background-color: #f8f8f8;color: #999;" disabled
                                                        uk-tooltip="title: You have voted; pos: bottom"
                                                        @else class="uk-icon-button"
                                                        style="background-color: #f8f8f8;color: #999;"
                                                        @endif uk-icon="arrow-down"></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="uk-width-expand">
                                        <div class="uk-margin">
                                            <p class="grey-text font-light" style="font-size: 0.9rem">Posted by
                                                <a href="{{route('profile_page', $t->creator()->first()->name)}}" class="accent-color font-regular">{{$t->creator->name}}</a>
                                                • {{ \Carbon\Carbon::parse($t->created_at)->diffForHumans()}}</p>
                                            <a href="{{route("thread_detail", $t->thread_key)}}"
                                               class="grey-text-3 font-extrabold"
                                               style="font-size: 18px;top: -15px;position:relative">{{$t->title}}</a>
                                            @if($t->thread_type == 0)
                                                @if(!empty($t->article))
                                                    <p class="grey-text-1 font-light"
                                                       style="margin-top: -5px;">{{\Illuminate\Support\Str::limit(strip_tags($t->article), 160, '[..]')}}</p>
                                                @endif
                                            @elseif($t->thread_type == 1)
                                                <img data-src="{{asset('img/thread_images/'.$t->image)}}" width="100%"
                                                     class="z-depth-15"
                                                     height="auto" uk-img
                                                     style="margin-bottom: 30px;border-radius: 10px;margin-top: 10px;"
                                                     alt="">
                                            @elseif($t->thread_type == 2)
                                                <iframe class="z-depth-15" src="{{$t->video_embed_link}}"
                                                        title="Thread embed video"
                                                        width="100%" height="250px"
                                                        style="margin-bottom: 30px;border-radius: 10px;margin-top: 10px;"></iframe>
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
                    </li>
                @empty
                @endforelse
            </ul>

            <a class="uk-position-center-left uk-position-small uk-icon-button bg-gradient uk-hidden-hover" href="#"
               uk-slidenav-previous uk-slider-item="previous" style="padding: 13px;transform: scale(1.2)"></a>
            <a class="uk-position-center-right uk-position-small uk-icon-button bg-gradient uk-hidden-hover" href="#"
               uk-slidenav-next uk-slider-item="next" style="padding: 13px;transform: scale(1.2)"></a>

        </div>

    </div>
    <hr class="uk-divider-icon">
    <div class="headerz" style="margin-top: 0px;margin-bottom: 20px;">
        <img src="{{asset('img/image_threads.svg')}}" class="uk-animation-scale-up" uk-img
             style="height: 100px;display: inline-block;animation-delay: 0.7s" alt="">
        <p class="font-heavy grey-text-4 uk-animation-slide-left"
           style="display:inline-block;position:relative;top: 15px;left: 20px;animation-delay: 1s;font-size: 40px;">
            Popular Image Threads<span
                class="accent-color">.</span></p>
        <a href="{{route('popular_thread_image')}}"
           class="uk-button uk-button-default tm-button-default uk-text-capitalize font-extrabold white-text uk-border-rounded bg-gradient uk-float-right"
           style="border: none;top: 40px;position:relative;">
            Show More
        </a>
    </div>
    <div id="latest_image_threads" uk-slider class="uk-padding-small uk-margin-medium-top uk-margin-large-bottom">
        <div class="uk-position-relative uk-visible-toggle uk-light">
            <ul class="uk-slider-items uk-child-width-1-1 uk-grid">
                @forelse($latest_image_threads as $t)
                    <li class="uk-width-1-3" style="width: calc(100% * 1 / 2.5);">
                        <div class="uk-width-1-1">
                            <div
                                class="thread-card uk-card uk-card-default uk-card-small uk-card-body z-depth-15 hoverable"
                                style="border-radius: 10px;z-index: 15;">
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
                                                        style="background-color: #f8f8f8;color: #999;"
                                                        disabled uk-tooltip="You have voted"
                                                        @else class="uk-icon-button"
                                                        style="background-color: #f8f8f8;color: #999;"
                                                        @endif uk-icon="arrow-up"></button>
                                            </form>
                                        </div>
                                        <div class="uk-width-1-1">
                                            <p class="grey-text-3 font-bold uk-text-center"
                                               style="margin-top: 15px;margin-bottom: 10px;">{{$t->getVoteAttribute()}}</p>
                                        </div>
                                        <div class="uk-width-1-1">
                                            <form action="{{route('downvote')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="thread_key" value="{{$t->thread_key}}">
                                                <button type="button"
                                                        @if(\Illuminate\Support\Facades\Auth::check()) onclick="$('#downvote{{$t->id}}').submit()"
                                                        @else onclick="warning_toast('Please login first before you can vote.')"
                                                        @endif @if(\Illuminate\Support\Facades\Auth::check() && $t->getVoteStatusAttribute(\Illuminate\Support\Facades\Auth::user()->id) == 'voted') class="uk-icon-button"
                                                        style="background-color: #f8f8f8;color: #999;" disabled
                                                        uk-tooltip="title: You have voted; pos: bottom"
                                                        @else class="uk-icon-button"
                                                        style="background-color: #f8f8f8;color: #999;"
                                                        @endif uk-icon="arrow-down"></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="uk-width-expand">
                                        <div class="uk-margin">
                                            <p class="grey-text font-light" style="font-size: 0.9rem">Posted by
                                                <a href="{{route('profile_page', $t->creator()->first()->name)}}" class="accent-color font-regular">{{$t->creator->name}}</a>
                                                • {{ \Carbon\Carbon::parse($t->created_at)->diffForHumans()}}</p>
                                            <a href="{{route("thread_detail", $t->thread_key)}}"
                                               class="grey-text-3 font-extrabold"
                                               style="font-size: 18px;top: -15px;position:relative">{{$t->title}}</a>
                                            @if($t->thread_type == 0)
                                                @if(!empty($t->article))
                                                    <p class="grey-text-1 font-light"
                                                       style="margin-top: -5px;">{{\Illuminate\Support\Str::limit(strip_tags($t->article), 160, '[..]')}}</p>
                                                @endif
                                            @elseif($t->thread_type == 1)
                                                <img data-src="{{asset('img/thread_images/'.$t->image)}}" width="100%"
                                                     class="z-depth-15"
                                                     height="auto" uk-img
                                                     style="margin-bottom: 30px;border-radius: 10px;margin-top: 10px;"
                                                     alt="">
                                            @elseif($t->thread_type == 2)
                                                <iframe class="z-depth-15" src="{{$t->video_embed_link}}"
                                                        title="Thread embed video"
                                                        width="100%" height="250px"
                                                        style="margin-bottom: 30px;border-radius: 10px;margin-top: 10px;"></iframe>
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
                    </li>
                @empty
                @endforelse
            </ul>

            <a class="uk-position-center-left uk-position-small uk-icon-button bg-gradient uk-hidden-hover" href="#"
               uk-slidenav-previous uk-slider-item="previous" style="padding: 13px;transform: scale(1.2)"></a>
            <a class="uk-position-center-right uk-position-small uk-icon-button bg-gradient uk-hidden-hover" href="#"
               uk-slidenav-next uk-slider-item="next" style="padding: 13px;transform: scale(1.2)"></a>

        </div>

    </div>
    <hr class="uk-divider-icon">
    <div class="headerz" style="margin-top: 0px;margin-bottom: 20px;">
        <img src="{{asset('img/video_threads.svg')}}" class="uk-animation-scale-up" uk-img
             style="height: 100px;display: inline-block;animation-delay: 0.7s" alt="">
        <p class="font-heavy grey-text-4 uk-animation-slide-left"
           style="display:inline-block;position:relative;top: 15px;left: 20px;animation-delay: 1s;font-size: 40px;">
            Popular Video Threads<span
                class="accent-color">.</span></p>
        <a href="{{route('popular_thread_video')}}"
           class="uk-button uk-button-default tm-button-default uk-text-capitalize font-extrabold white-text uk-border-rounded bg-gradient uk-float-right"
           style="border: none;top: 40px;position:relative;">
            Show More
        </a>
    </div>
    <div id="latest_video_threads" uk-slider class="uk-padding-small uk-margin-medium-top">
        <div class="uk-position-relative uk-visible-toggle uk-light">
            <ul class="uk-slider-items uk-child-width-1-1 uk-grid">
                @forelse($latest_video_threads as $t)
                    <li class="uk-width-1-3" style="width: calc(100% * 1 / 2.5);">
                        <div class="uk-width-1-1">
                            <div
                                class="thread-card uk-card uk-card-default uk-card-small uk-card-body z-depth-15 hoverable"
                                style="border-radius: 10px;z-index: 15;">
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
                                                        style="background-color: #f8f8f8;color: #999;"
                                                        disabled uk-tooltip="You have voted"
                                                        @else class="uk-icon-button"
                                                        style="background-color: #f8f8f8;color: #999;"
                                                        @endif uk-icon="arrow-up"></button>
                                            </form>
                                        </div>
                                        <div class="uk-width-1-1">
                                            <p class="grey-text-3 font-bold uk-text-center"
                                               style="margin-top: 15px;margin-bottom: 10px;">{{$t->getVoteAttribute()}}</p>
                                        </div>
                                        <div class="uk-width-1-1">
                                            <form action="{{route('downvote')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="thread_key" value="{{$t->thread_key}}">
                                                <button type="button"
                                                        @if(\Illuminate\Support\Facades\Auth::check()) onclick="$('#downvote{{$t->id}}').submit()"
                                                        @else onclick="warning_toast('Please login first before you can vote.')"
                                                        @endif @if(\Illuminate\Support\Facades\Auth::check() && $t->getVoteStatusAttribute(\Illuminate\Support\Facades\Auth::user()->id) == 'voted') class="uk-icon-button"
                                                        style="background-color: #f8f8f8;color: #999;" disabled
                                                        uk-tooltip="title: You have voted; pos: bottom"
                                                        @else class="uk-icon-button"
                                                        style="background-color: #f8f8f8;color: #999;"
                                                        @endif uk-icon="arrow-down"></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="uk-width-expand">
                                        <div class="uk-margin">
                                            <p class="grey-text font-light" style="font-size: 0.9rem">Posted by
                                                <a href="{{route('profile_page', $t->creator()->first()->name)}}" class="accent-color font-regular">{{$t->creator->name}}</a>
                                                • {{ \Carbon\Carbon::parse($t->created_at)->diffForHumans()}}</p>
                                            <a href="{{route("thread_detail", $t->thread_key)}}"
                                               class="grey-text-3 font-extrabold"
                                               style="font-size: 18px;top: -15px;position:relative">{{$t->title}}</a>
                                            @if($t->thread_type == 0)
                                                @if(!empty($t->article))
                                                    <p class="grey-text-1 font-light"
                                                       style="margin-top: -5px;">{{\Illuminate\Support\Str::limit(strip_tags($t->article), 160, '[..]')}}</p>
                                                @endif
                                            @elseif($t->thread_type == 1)
                                                <img data-src="{{asset('img/thread_images/'.$t->image)}}" width="100%"
                                                     class="z-depth-15"
                                                     height="auto" uk-img
                                                     style="margin-bottom: 30px;border-radius: 10px;margin-top: 10px;"
                                                     alt="">
                                            @elseif($t->thread_type == 2)
                                                <iframe class="z-depth-15" src="{{$t->video_embed_link}}"
                                                        title="Thread embed video"
                                                        width="100%" height="250px"
                                                        style="margin-bottom: 30px;border-radius: 10px;margin-top: 10px;"></iframe>
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
                    </li>
                @empty
                @endforelse
            </ul>

            <a class="uk-position-center-left uk-position-small uk-icon-button bg-gradient uk-hidden-hover" href="#"
               uk-slidenav-previous uk-slider-item="previous" style="padding: 13px;transform: scale(1.2)"></a>
            <a class="uk-position-center-right uk-position-small uk-icon-button bg-gradient uk-hidden-hover" href="#"
               uk-slidenav-next uk-slider-item="next" style="padding: 13px;transform: scale(1.2)"></a>

        </div>

    </div>
</div>
@section('js')
    @include('layouts.js')
@show
</body>
</html>
