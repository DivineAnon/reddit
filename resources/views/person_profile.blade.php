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
<div class="uk-container uk-margin-medium-top uk-margin-medium-bottom">
    <div class="uk-padding" style="background: #f5f5f5;border-radius: 20px;">
        <div class="z-depth-12 uk-animation-toggle white uk-animation-scale-up" tabindex="0"
             style="padding: 5px 20px;border-radius: 30px;display: inline-block;animation-delay: 0.3s">
            <img class="uk-align-center" src="{{asset('img/admin.svg')}}"
                 style="height: 60px;margin-top: 24px;margin-bottom: 35px;" alt="">
        </div>
        <p class="font-regular grey-text uk-heading-small uk-animation-slide-left uk-animation-toggle"
           style="display: inline-block;top: -50px;left: 20px;position: relative;animation-delay: 0.6s">p/<span
                class="uk-text-capitalize font-heavy grey-text-4">{{$user->name}}</span>
            <span
                class="accent-color">.</span></p>
        <img src="{{asset('img/person.svg')}}" class="uk-animation-scale-down" uk-img
             style="height: 170px;top: -15px;float: right;position:relative;animation-delay: 1s"
             alt="">
    </div>
    <p class="grey-text-1 font-regular uk-text-capitalize uk-margin-medium-top">{{$user->name}}'s Threads :</p>
    <div class="uk-grid uk-margin-small-top" uk-grid>
        <div class="uk-width-expand">
            @forelse($threads as $t)
                <div
                    class="thread-card uk-card uk-card-default uk-card-small uk-card-body z-depth-15 uk-margin-bottom hoverable"
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
                                <p class="grey-text font-light" style="font-size: 0.9rem">Posted by <a href="{{route('profile_page', $t->creator()->first()->name)}}" class="accent-color font-regular">{{$t->creator->name}}</a>
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
                                    <img data-src="{{asset('img/thread_images/'.$t->image)}}" width="90%"
                                         class="z-depth-15"
                                         height="auto" uk-img style="margin-bottom: 30px;border-radius: 10px;" alt="">
                                @elseif($t->thread_type == 2)
                                    <iframe class="z-depth-15" src="{{$t->video_embed_link}}" title="Thread embed video"
                                            width="90%" height="400"
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
            @empty
                <div class="uk-text-center">
                    <img src="{{asset('img/no_thread.svg')}}" uk-img style="height: 170px;margin-top: 40px;" alt="">
                    <p class="grey-text-3 font-extrabold" style="font-size: 25px;">No thread yet.</p>
                    <p class="grey-text-1 font-regular" style="font-size: 17px;margin-top: -15px;">no thread made with
                        this brand.</p>
                </div>
            @endforelse
            @include('layouts.pagination', ['paginator' => $threads])
        </div>
        <div class="uk-width-1-3">
            <div class="uk-card uk-card-default uk-card-small uk-card-body z-depth-15"
                 uk-sticky="offset: 110; bottom: #top" style="border-radius: 10px;z-index: 500;">
                <div class="uk-padding-small uk-text-center">
                    <div class="uk-align-center"
                        style="height:100px;width: 100px;background-image: url({{asset($user->getAvatarAttribute())}});background-position: center;background-size: cover;background-repeat: no-repeat;border-radius: 100px;"
                        alt=""></div>
                    <div style="margin-top: 20px;">
                        <p class="grey-text-3 font-heavy uk-text-capitalize" style="font-size: 21px;position: relative;top: -10px;">{{$user->name}}</p>
                        <p class="grey-text-1 font-light" style="font-size: 1rem;position: relative;top: -25px;">digitalk.com/p/{{$user->name}}</p>
                        <div class="tags" style="margin-bottom: 10px;margin-top: -20px;">
                            <a href="" onclick="event.preventDefault()"
                               class="brand-chip uk-border-rounded white-text bg-gradient-noshadow"
                               style="font-size: 13px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;background-color: #eee;text-decoration: none">{{$user->getThreadCount()}} Threads</a><br><br>
                            <a href="" onclick="event.preventDefault()"
                               class="brand-chip uk-border-rounded grey-text-2"
                               style="font-size: 13px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;background-color: #eee;text-decoration: none">{{$user->getUpvoteCount()}} Up vote</a>
                            <a href="" onclick="event.preventDefault()"
                               class="brand-chip uk-border-rounded grey-text-2"
                               style="font-size: 13px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;background-color: #eee;text-decoration: none">{{$user->getDownvoteCount()}} Down vote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    @include('layouts.js')
@show
<script type="text/javascript">
    $('.thread-tab-post').addClass('uk-active');
    $('#post').show();
    $('#image').hide();
    $('#video').hide();

    function imageTabOpen() {
        $('.thread-tab-post').removeClass('uk-active');
        $('.thread-tab-image').addClass('uk-active');
        $('.thread-tab-video').removeClass('uk-active');
        $('#post').hide();
        $('#image').show();
        $('#video').hide();
    }

    function videoTabOpen() {
        $('.thread-tab-post').removeClass('uk-active');
        $('.thread-tab-image').removeClass('uk-active');
        $('.thread-tab-video').addClass('uk-active');
        $('#post').hide();
        $('#image').hide();
        $('#video').show();
        brand.blade.php
    }

    function postTabOpen() {
        $('.thread-tab-post').addClass('uk-active');
        $('.thread-tab-image').removeClass('uk-active');
        $('.thread-tab-video').removeClass('uk-active');
        $('#post').show();
        $('#image').hide();
        $('#video').hide();
    }
</script>
</body>
</html>
