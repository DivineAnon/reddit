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
<div class="uk-container uk-margin-small-top uk-margin-medium-bottom">
    <div class="uk-grid uk-margin-small-top" uk-grid>
        <div class="uk-width-expand">
            <div
                class="thread-card uk-card uk-card-default uk-card-small uk-card-body z-depth-15 uk-margin-top hoverable"
                style="border-radius: 10px;">
                <div class="uk-grid" uk-grid>
                    <div class="uk-width-auto">
                        <div class="uk-width-1-1">
                            <form id="upvote{{$data->id}}" action="{{route('upvote')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="thread_key" value="{{$data->thread_key}}">
                                <button type="button"
                                        @if(\Illuminate\Support\Facades\Auth::check()) onclick="$('#upvote{{$data->id}}').submit()"
                                        @else onclick="warning_toast('Please login first before you can vote.')"
                                        @endif @if(\Illuminate\Support\Facades\Auth::check() && $data->getVoteStatusAttribute(\Illuminate\Support\Facades\Auth::user()->id) == 'voted') class="uk-icon-button"
                                        disabled uk-tooltip="You have voted"
                                        @else class="uk-icon-button" @endif uk-icon="arrow-up"></button>
                            </form>
                        </div>
                        <div class="uk-width-1-1">
                            <p class="grey-text-3 font-bold uk-text-center"
                               style="margin-top: 15px;margin-bottom: 10px;">{{$data->getVoteAttribute()}}</p>
                        </div>
                        <div class="uk-width-1-1">
                            <form action="{{route('downvote')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="thread_key" value="{{$data->thread_key}}">
                                <button type="button"
                                        @if(\Illuminate\Support\Facades\Auth::check()) onclick="$('#downvote{{$data->id}}').submit()"
                                        @else onclick="warning_toast('Please login first before you can vote.')"
                                        @endif @if(\Illuminate\Support\Facades\Auth::check() && $data->getVoteStatusAttribute(\Illuminate\Support\Facades\Auth::user()->id) == 'voted') class="uk-icon-button"
                                        disabled uk-tooltip="title: You have voted; pos: bottom"
                                        @else class="uk-icon-button" @endif uk-icon="arrow-down"></button>
                            </form>
                        </div>
                    </div>
                    <div class="uk-width-1-2 uk-width-expand">
                        <div class="uk-margin">
                            <p class="grey-text font-light" style="font-size: 0.9rem">Posted by <a href="{{route('profile_page', $data->creator()->first()->name)}}"
                                                                                                   class="accent-color font-regular">{{$data->creator->name}}</a>
                                • {{\Illuminate\Support\Carbon::parse($data->created_at)->diffForHumans()}} <span
                                    uk-icon="icon: commenting" class="uk-position-right"
                                    style="padding-top:20px;padding-right:20px;height: 20px;"></span><span
                                    class="disqus-comment-count uk-position-right"
                                    style="padding-top: 20px;padding-right:20px;right: 30px;height: 20px;"
                                    data-disqus-url="{{route('thread_detail', $data->thread_key)}}"></span></p>
                            <a href="#" class="grey-text-3 font-extrabold"
                               style="font-size: 19px;top: -15px;position:relative">{{$data->title}}</a>
                            @if($data->thread_type == 0)
                                @if(!empty($data->article))
                                    <p class="grey-text-1 font-light"
                                       style="margin-top: -10px;">{{\Illuminate\Support\Str::limit(strip_tags($data->article), 160, '[..]')}}</p>
                                @endif
                            @elseif($data->thread_type == 1)p
                            <img data-src="{{asset('img/thread_images/'.$data->image)}}" width="90%"
                                 class="z-depth-15"
                                 height="auto" uk-img style="margin-bottom: 30px;border-radius: 10px;" alt="">
                            @elseif($data->thread_type == 2)
                                <iframe class="z-depth-15" src="{{$data->video_embed_link}}" title="Thread embed video"
                                        width="90%" height="400"
                                        style="margin-bottom: 30px;border-radius: 10px;"></iframe>
                            @endif
                            <div class="tags" style="margin-bottom: 10px;">
                                @if(!empty($data->brand_id))
                                    <a href="{{route('brand_home', $data->brand->name)}}"
                                       class="brand-chip uk-border-rounded white-text bg-gradient-noshadow"
                                       style="font-size: 13px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;background-color: #eee;text-decoration: none">{{$data->brand->name}}</a>
                                @endif
                                @if(!empty($data->gadget_id))
                                    <a href="{{url('forum/brand/' . $data->brand->name, $data->gadget->slug)}}"
                                       class="brand-chip uk-border-rounded white-text bg-gradient-noshadow"
                                       style="font-size: 13px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;background-color: #eee;text-decoration: none">{{$data->gadget->name}}</a>
                                @endif
                            </div>
                            <div id="disqus_thread" style="margin-top: 50px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-1-3">
            @if(!empty($data->brand->id) || !empty($data->gadget->id))
                <div class="uk-card uk-card-default uk-card-small uk-margin-top uk-card-body z-depth-15"
                     style="border-radius: 10px;z-index: 500;">
                    <div class="uk-padding-small">
                        @if(!empty($data->brand->id))
                            <div class="uk-text-center">
                                <img src="{{asset('img/brand_logo/'.$data->brand->image)}}" uk-img
                                     style="height: 30px;display: inline-block;margin-bottom: 20px;"
                                     alt="">
                            </div>
                        @endif
                        <hr class="uk-divider-icon">
                        @if(!empty($data->gadget->id))
                            <div class="gadget-detail">
                                <div class="headerz">
                                    <img src="{{asset('img/no_gadget.svg')}}" uk-img
                                         style="height: 70px;display: inline-block"
                                         alt="">
                                    <p class="font-heavy grey-text-4"
                                       style="display:inline-block;position:relative;top: 5px;left: 10px;font-size: 20px;">{{$data->gadget->name}}</p>
                                </div>
                                <div style="margin-top: 20px;">
                                    <ul class="uk-list uk-list-divider font-light grey-text-1"
                                        style="font-size: 0.9rem;">
                                        <li>Released : <span
                                                class="font-bold grey-text-3">{{$data->gadget->year_released}}</span>
                                        </li>
                                        <li>Price : <span
                                                class="font-bold grey-text-3">Rp. {{number_format($data->gadget->price, 0, '.', '.')}}</span>
                                        </li>
                                        <li>Screen Size : <span
                                                class="font-bold grey-text-3">{{$data->gadget->screen_size}} Inch</span>
                                        </li>
                                        <li>Resolution : <span
                                                class="font-bold grey-text-3">{{$data->gadget->resolution}} Pixels</span>
                                        </li>
                                        <li>Camera : <span
                                                class="font-bold grey-text-3">{{$data->gadget->camera_pixel}} MP</span>
                                        </li>
                                        <li>RAM : <span class="font-bold grey-text-3">{{$data->gadget->ram}} GB</span>
                                        </li>
                                        <li>Chip : <span class="font-bold grey-text-3">{{$data->gadget->chip}}</span>
                                        </li>
                                        <li>Battery : <span
                                                class="font-bold grey-text-3">{{$data->gadget->battery}} mAh</span>
                                        </li>
                                        <li>OS : <span class="font-bold grey-text-3">{{$data->gadget->os}}</span></li>
                                        <li>Storage : <span
                                                class="font-bold grey-text-3">{{$data->gadget->storage}} GB</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
            <div class="uk-card uk-card-default uk-card-small uk-margin-top uk-card-body z-depth-15"
                 uk-sticky="offset: 80; bottom: #top"
                 style="border-radius: 10px;z-index: 500;">
                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == "admin")
                    <div class="uk-padding-small">
                        <p class="font-extrabold grey-text-3 uk-text-center"
                           style="font-size: 18px;">Find this thread not proper? <br><span
                                class="accent-color">Ban this thread!</span></p>
                        <div class="uk-text-center">
                            <form id="ban_thread"
                                  onsubmit="event.preventDefault();comfirm_popup(this, 'Are you sure want to ban this thread? The community will not be able to see this thread anymore.')"
                                  action="{{route('ban_thread')}}" method="post"
                                  enctype="multipart/form-data">
                                <button type="submit"
                                        class="uk-button uk-button-default tm-button-default uk-icon uk-text-capitalize font-extrabold white-text uk-border-rounded bg-gradient"
                                        style="border: none;">
                                    Ban!
                                </button>
                                @csrf
                                <input type="hidden" name="thread_key" value="{{$data->thread_key}}">
                            </form>
                        </div>
                    </div>
                @else
                    <div class="uk-padding-small">
                        <p class="font-extrabold grey-text-3 uk-text-center"
                           style="font-size: 18px;">Find this thread disturbing?<br>Don't hesitate to <span
                                class="accent-color">report!</span></p>
                        <div class="uk-text-center">
                            <button type="button"
                                    class="uk-button uk-button-default tm-button-default uk-icon uk-text-capitalize font-extrabold white-text uk-border-rounded bg-gradient"
                                    style="border: none;">
                                Report
                            </button>
                            <div
                                uk-dropdown="animation: uk-animation-slide-top-small;pos: bottom-justify;mode: click;offset: 20"
                                style="border-radius: 10px;" class="z-depth-13">
                                @if($report_status == 0)
                                    <p class="grey-text-3 font-extrabold">Why are you reporting this post?</p>
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li>
                                            <a onclick="@if(\Illuminate\Support\Facades\Auth::check()) $('#spam_report').submit() @else warning_toast('You need to login before you can report a thread') @endif"
                                               href="#">It's a spam</a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li>
                                            <a onclick="@if(\Illuminate\Support\Facades\Auth::check()) $('#inappropriate_report').submit() @else warning_toast('You need to login before you can report a thread') @endif"
                                               href="#">It's inapproriate</a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li><a href="#"
                                               @if(\Illuminate\Support\Facades\Auth::check()) uk-toggle="target: #modal-report"
                                               @else onclick="warning_toast('Please login first before you can make a thread.')"
                                                @endif>Other reason</a></li>
                                    </ul>
                                @else
                                    <p class="grey-text-3 font-extrabold">You already reported this thread</p>
                                @endif
                            </div>
                            <form id="spam_report" action="{{route('spam_report')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="thread_key" value="{{$data->thread_key}}">
                            </form>
                            <form id="inappropriate_report" action="{{route('inappropriate_report')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="thread_key" value="{{$data->thread_key}}">
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div id="modal-report" uk-modal>
    <div class="uk-modal-dialog" style="border-radius: 20px !important;">
        <button class="uk-modal-close-default uk-icon-button" type="button" uk-close></button>
        <div class="uk-modal-body" style="border-radius: 20px !important;">
            <h2 class="uk-modal-title font-heavy grey-text-4" style="font-size: 1.9rem;">Report a thread</h2>
            <form action="{{route('other_report')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="uk-inline uk-width-1-1" style="margin-top: 20px;">
                    <label class="uk-form-label" for="form-stacked-text" style="position: relative;bottom: 10px;">Your
                        reason</label>
                    <textarea class="form-looks font-light uk-textarea" name="other_reason"
                              placeholder="ketik alasan disini" style="min-height: 150px;" required></textarea>
                </div>
                <input type="hidden" name="thread_key" value="{{$data->thread_key}}">
                <button class="uk-button bg-gradient white-text uk-border-rounded uk-margin-medium-top"
                        type="submit">Submit
                </button>
            </form>
        </div>
    </div>
</div>
@section('js')
    @include('layouts.js')
@show
<script>

    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configur ation-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function () { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://digitalk-1.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
</body>
</html>
