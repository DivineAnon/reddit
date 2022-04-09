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
             style="padding: 10px 40px;border-radius: 30px;display: inline-block;animation-delay: 0.3s">
            <img class="uk-align-center" src="{{asset('img/brand_logo/'.$brands->image)}}"
                 style="height: 30px;margin-top: 24px;margin-bottom: 35px;" alt="">
        </div>
        <p class="font-heavy grey-text-4 uk-heading-small uk-animation-slide-left uk-animation-toggle"
           style="display: inline-block;top: -35px;left: 20px;position: relative;animation-delay: 0.6s">{{$brands->name}}
            <span
                class="accent-color">.</span></p>
        <ul class="uk-breadcrumb uk-animation-toggle uk-animation-slide-bottom"
            style="position:absolute;margin-top: -15px;animation-delay: 0.8s;">
            <li><a class="uk-text-capitalize" href="{{url(request()->segment(1))}}">{{request()->segment(1)}}</a></li>
            <li><a class="uk-text-capitalize" href="{{url(request()->segment(1))}}">{{request()->segment(2)}}</a></li>
            <li><a class="uk-text-capitalize"
                   href="{{url(request()->segment(1) . "/" . request()->segment(2) . "/" . request()->segment(3))}}">{{request()->segment(3)}}</a>
            </li>
        </ul>
        <img src="{{asset('img/no_brand.svg')}}" class="uk-animation-scale-down" uk-img
             style="height: 200px;top: -30px;float: right;position:relative;animation-delay: 1s"
             alt="">
    </div>
    <p class="grey-text-1 font-regular">{{$brands->name}} Threads :</p>
    <div id="modal-sections" uk-modal>
        <div class="uk-modal-dialog" style="border-radius: 20px !important;">
            <button class="uk-modal-close-default uk-icon-button" type="button" uk-close></button>
            <div class="uk-modal-body" style="border-radius: 20px !important;">
                <h2 class="uk-modal-title font-heavy grey-text-4" style="font-size: 1.9rem;">Create a thread</h2>
                <ul class="uk-child-width-expand" uk-tab>
                    <li class="thread-tab-post"><a onclick="postTabOpen()" href="#" class="font-bold grey-text-3"><span
                                class="uk-margin-small-right" uk-icon="icon: pencil"></span>Post</a></li>
                    <li class="thread-tab-image"><a onclick="imageTabOpen()" href="#"
                                                    class="font-bold grey-text-3"><span class="uk-margin-small-right"
                                                                                        uk-icon="icon: camera"></span>
                            Image</a></li>
                    <li class="thread-tab-video"><a onclick="videoTabOpen()" href="#"
                                                    class="font-bold grey-text-3"><span
                                class="uk-margin-small-right" uk-icon="icon: video-camera"></span> Video</a></li>
                </ul>
                <div id="post">
                    <form action="{{route('create_thread')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="uk-inline uk-width-1-1">
                            <input class="uk-input form-looks font-light" placeholder="Judul thread" minlength="20"
                                   style="height: 50px;font-size: 14px;" name="title" type="text" required>
                        </div>
                        <div class="uk-inline uk-width-1-1" style="margin-top: 30px;">
                            <label class="uk-form-label" for="form-stacked-text"
                                   style="position: relative;bottom: 10px;">Thread Article (Optional)</label>
                            <textarea class="form-looks font-light uk-textarea" name="article" minlength="20"
                                      placeholder="ketik artikel disini" style="min-height: 150px;"></textarea>
                        </div>
                        <input type="hidden" name="brand_id" value="{{$brands->id}}">
                        <input type="hidden" name="thread_type" value="0">
                        <input type="hidden" name="returnTo" value="{{url()->current()}}">
                        <button class="uk-button bg-gradient white-text uk-border-rounded uk-margin-medium-top"
                                type="submit">Submit
                        </button>
                    </form>
                </div>
                <div id="image">
                    <form action="{{route('create_thread')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="uk-inline uk-width-1-1">
                            <input class="uk-input form-looks font-light" placeholder="Judul thread" minlength="20"
                                   style="height: 50px;font-size: 14px;" name="title" type="text" required>
                        </div>
                        <div class="uk-inline uk-width-1-1" style="margin-top: 10px;">
                            <label class="uk-form-label" for="form-stacked-text">Image</label>
                            <div uk-form-custom="target: true" class="uk-width-1">
                                <input type="file" name="image" required>
                                <input class="uk-input font-light form-looks uk-border-rounded" type="text"
                                       style="height: 50px;font-size: 14px;"
                                       placeholder="Click to select image" disabled>
                            </div>
                        </div>
                        <input type="hidden" name="brand_id" value="{{$brands->id}}">
                        <input type="hidden" name="thread_type" value="1">
                        <input type="hidden" name="returnTo" value="{{url()->current()}}">
                        <button class="uk-button bg-gradient white-text uk-border-rounded uk-margin-medium-top"
                                type="submit">Submit
                        </button>
                    </form>
                </div>
                <div id="video">
                    <form action="{{route('create_thread')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="uk-inline uk-width-1-1">
                            <input class="uk-input form-looks font-light" placeholder="Judul thread" minlength="20"
                                   style="height: 50px;font-size: 14px;" name="title" type="text" required>
                        </div>
                        <div class="uk-inline uk-width-1-1" style="margin-top: 20px;">
                            <input class="uk-input form-looks font-light" placeholder="Link video (embed)"
                                   style="height: 50px;font-size: 14px;" name="video_embed_link" type="text" required>
                        </div>
                        <input type="hidden" name="brand_id" value="{{$brands->id}}">
                        <input type="hidden" name="thread_type" value="2">
                        <input type="hidden" name="returnTo" value="{{url()->current()}}">
                        <button class="uk-button bg-gradient white-text uk-border-rounded uk-margin-medium-top"
                                type="submit">Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-grid uk-margin-small-top" uk-grid>
        <div class="uk-width-expand">
            <div class="uk-card uk-card-default hoverable uk-card-small uk-card-body z-depth-15"
                 style="border-radius: 10px;">
                <div class="uk-grid" uk-grid>
                    <div class="uk-width-auto">
                        <div class="card-photo"
                             style="background-image: url({{asset('img/user.svg')}});"
                             uk-img alt="Profile Picture"></div>
                    </div>
                    <div class="uk-width-1-2 uk-width-expand">
                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: pencil"></span>
                                <input class="uk-input form-looks font-light"
                                       @if(\Illuminate\Support\Facades\Auth::check())
                                            @if(\Illuminate\Support\Facades\Auth::user()->thread_status == 0)
                                                uk-toggle="target: #modal-sections"
                                            @elseif(\Illuminate\Support\Facades\Auth::user()->thread_status == 1)
                                                onclick="warning_toast('You have been banned from making a thread by our admins.')"
                                            @endif
                                       @else
                                            onclick="warning_toast('Please login first before you can make a thread.')"
                                       @endif placeholder="Create a thread..." style="height: 50px;font-size: 14px;" name="email" type="text" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @forelse($threads as $t)
                <div
                    class="thread-card uk-card uk-card-default uk-card-small uk-card-body z-depth-15 uk-margin-top hoverable"
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
                                <p class="grey-text font-light" style="font-size: 0.9rem">Posted by <a
                                        href="{{route('profile_page', $t->creator()->first()->name)}}"
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
        </div>
        <div class="uk-width-1-3">
            <div class="uk-card uk-card-default uk-card-small uk-card-body z-depth-15"
                 uk-sticky="offset: 110; bottom: #top" style="border-radius: 10px;z-index: 500;">
                <div class="uk-padding-small">
                    <p class="grey-text-3 font-heavy" style="font-size: 20px;">{{$brands->name}} Devices :</p>
                    <div style="margin-top: 20px;">
                        @forelse($data as $v)
                            <a href="{{url('forum/brand/' . $v->brand->name . "/" . $v->slug)}}"
                               class="uk-button uk-button-small uk-button-default tm-button-default uk-icon uk-text-capitalize white-text uk-border-rounded bg-gradient-noshadow"
                               style="border: none;margin-right: 10px;margin-bottom: 15px;font-size: 0.8rem;">
                                {{$v->name}}
                            </a>
                        @empty
                            <div class="uk-text-center">
                                <img src="{{asset('img/no_gadget_3.svg')}}" uk-img
                                     style="height: 150px;margin-top: 30px;" alt="">
                                <p class="grey-text-3 font-extrabold" style="font-size: 18px;">No Device Registered</p>
                                <p class="grey-text-1 font-regular" style="font-size: 16px;margin-top: -20px;">no device
                                    for this
                                    brand.</p>
                            </div>
                        @endforelse
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
