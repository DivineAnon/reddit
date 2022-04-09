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
        <img src="@if($type == 1) {{asset('img/image_threads.svg')}} @elseif($type == 2) {{asset('img/video_threads.svg')}} @elseif($type == 0) {{asset('img/article_thread.svg')}} @endif" class="uk-animation-scale-up" uk-img
             style="height: 100px;display: inline-block;animation-delay: 0.7s" alt="">
        <p class="font-heavy grey-text-4 uk-animation-slide-left"
           style="display:inline-block;position:relative;top: 15px;left: 20px;animation-delay: 1s;font-size: 40px;">
            Popular @if($type == 1) Image @elseif($type == 2) Video @endif Threads<span
                class="accent-color">.</span></p>
    </div>
    <div id="search_result" class="uk-grid uk-margin-medium-top" uk-grid="masonry: true">
        @forelse($latest_threads as $t)
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
    @include('layouts.pagination', ['paginator' => $latest_threads])
</div>
@section('js')
    @include('layouts.js')
@show
</body>
</html>
