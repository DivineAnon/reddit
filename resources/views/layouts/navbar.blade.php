<div uk-sticky
     class="uk-navbar-container tm-navbar-container uk-sticky uk-active uk-sticky-below uk-sticky-fixed white z-depth-16">
    <div class="uk-container uk-container-expand">
        <nav class="uk-navbar">
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo font-heavy grey-text-4" href="{{route('welcome')}}">
                    <img src="{{asset('img/digitalk_logo2.svg')}}" uk-img style="height: 40px;margin-right: 10px;"
                         alt="">
                    <span class="uk-text-middle" style="font-size: 1.7rem;">Digitalk<span class="accent-color">.</span></span>
                </a>
            </div>
            <div class="uk-navbar-right">
                <div class="uk-navbar-item uk-visible@m">
                    <form action="{{route('search')}}" onsubmit="event.preventDefault()"
                          class="uk-search uk-search-navbar" method="get" enctype="multipart/form-data"
                          style="background-color: #f5f5f5;border-radius: 30px;padding-left: 10px;padding-right: 10px;">
                        <span uk-search-icon></span>
                        <input class="uk-search-input font-bold" name="q" type="search"
                               uk-toggle="target: #modal-search"
                               placeholder="Search for thread..." style="font-size: 0.9rem;">
                    </form>
                </div>
                <ul class="uk-navbar-nav uk-visible@m">
                    <li><a href="{{route('threads')}}" class="uk-text-capitalize font-extrabold @if (request()->segment(1) == 'threads') accent-color @else grey-text-3 @endif" style="font-size: 1rem; @if (request()->segment(1)  == 'threads') border-bottom: 3px solid #ec454f @endif">Threads</a>
                    </li>
                    <li><a href="{{route('forum')}}" class="uk-text-capitalize font-extrabold @if (request()->segment(1) == 'forum') accent-color @else grey-text-3 @endif" style="font-size: 1rem; @if (request()->segment(1) == 'forum') border-bottom: 3px solid #ec454f @endif">Forum</a></li>
                    <li><a href="{{route('popular')}}" class="uk-text-capitalize font-extrabold @if (request()->segment(1) == 'popular') accent-color @else grey-text-3 @endif" style="font-size: 1rem; @if (request()->segment(1) == 'popular') border-bottom: 3px solid #ec454f @endif">Popular</a>
                    </li>
                </ul>
                <div class="uk-navbar-item uk-visible@m">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="account" style="top: 10px;right: 20px;cursor: pointer;padding-left: 30px;border-left: 1px solid #ddd">
                            <img src="{{asset('img/user.svg')}}"
                                 style="height: 40px;width: 40px;border-radius: 40px;margin-right: 10px;" uk-img alt="">
                            <span class="brand-chip font-extrabold uk-text-capitalize uk-text-middle grey-text-3"
                                  style="font-size: 14px;">{{\Illuminate\Support\Facades\Auth::user()->name}} <span
                                    uk-icon="icon: chevron-down" type="button"
                                    style="margin-left: 10px;margin-right: 10px;"></span></span>
                        </div>
                        <div
                            uk-dropdown="animation: uk-animation-slide-top-small;pos: bottom-justify;mode: click;offset: 30"
                            style="border-radius: 6px;z-index: 1000 !important;top: 100px !important;"
                            class="z-depth-13">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-nav-header font-extrabold" style="letter-spacing: 0.5px;">OPTIONS</li>
                                <li><a class="font-light" href="#">Manage Profile</a></li>
                                <li><a class="font-light" href="{{route('my_thread')}}">My Threads</a></li>
                                <li>
                                    <a href="{{route('logout')}}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                       class="uk-button uk-text-capitalize font-extrabold white-text uk-button-small uk-border-rounded bg-gradient"
                                       style="border: none;margin-top: 20px;">
                                        Sign Out
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}"
                                      onsubmit="event.preventDefault();comfirm_popup(this, 'Apakah kamu yakin ingin Sign Out?');"
                                      method="POST" style="display: none;">
                                    {{ csrf_field() }}</form>
                            </ul>
                        </div>
                    @else
                        <a href="#" style="margin-right: 15px;" uk-toggle="target: #modal-login"
                           class="uk-button uk-button-default tm-button-default uk-icon uk-text-capitalize font-extrabold grey-text-2 uk-border-rounded">
                            Sign In
                        </a>
                        <a href="#" uk-toggle="target: #modal-sign-up"
                           class="uk-button uk-button-default tm-button-default uk-icon uk-text-capitalize font-extrabold white-text uk-border-rounded bg-gradient"
                           style="border: none;">
                            Sign Up
                        </a>
                    @endif
                </div>
                <a uk-navbar-toggle-icon="" href="#offcanvas" uk-toggle=""
                   class="uk-navbar-toggle uk-hidden@m uk-icon uk-navbar-toggle-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                         data-svg="navbar-toggle-icon">
                        <rect y="9" width="20" height="2"></rect>
                        <rect y="3" width="20" height="2"></rect>
                        <rect y="15" width="20" height="2"></rect>
                    </svg>
                </a>
            </div>
        </nav>
    </div>
</div>
<div id="modal-login" class="uk-modal-full" uk-modal style="overflow-x: hidden;">
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default uk-icon-button" type="button" uk-close></button>
        <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
            <div class="uk-background-cover"
                 style="background-image: url({{asset('img/no_gadget_5.svg')}});background-position-x: -80px;"
                 uk-height-viewport></div>
            <div class="uk-padding-large">
                <p class="grey-text-4 font-heavy uk-text-center" style="font-size: 2.2rem;margin-bottom: 30px;">Welcome
                    back<span class="accent-color">.</span></p>
                <form action="{{ route('login') }}" method="post" enctype="multipart/form-data"
                      style="padding-left: 80px;padding-right: 80px;">
                    @csrf
                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <input class="uk-input form-looks font-light" placeholder="Email Address"
                                   style="height: 50px;font-size: 14px;" name="email" type="text" required>
                            @error('email')
                            <span class="accent-color font-light"
                                  style="top: 5px;font-size: 0.8rem;position:relative;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                            <input class="uk-input form-looks font-light" placeholder="Password"
                                   style="height: 50px;font-size: 14px;" name="password" type="password" required>
                            @error('password')
                            <span class="accent-color font-light"
                                  style="top: 5px;font-size: 0.8rem;position:relative;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                            class="uk-button uk-align-center uk-margin-medium-top uk-button-default tm-button-default uk-icon uk-text-capitalize font-extrabold white-text uk-border-rounded bg-gradient"
                            style="border: none;transform: scale(1.1)">
                        Sign In
                    </button>
                    <p class="grey-text-1 uk-text-center font-regular uk-margin-medium-top">Don't have an account? <a
                            href="#" uk-toggle="target: #modal-sign-up" class="font-extrabold accent-color">Sign Up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="modal-sign-up" class="uk-modal-full" uk-modal style="overflow-x: hidden;">
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default uk-icon-button" type="button" uk-close></button>
        <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
            <div class="uk-background-cover"
                 style="background-image: url({{asset('img/register.svg')}});background-position-x: -80px;"
                 uk-height-viewport></div>
            <div class="uk-padding-large">
                <p class="grey-text-4 font-heavy uk-text-center" style="font-size: 2.2rem;margin-bottom: 30px;">Make
                    your
                    account<span class="accent-color">.</span></p>
                <form action="{{ route('register_account') }}" method="post" enctype="multipart/form-data"
                      style="padding-left: 80px;padding-right: 80px;">
                    @csrf
                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <input class="uk-input form-looks font-light" placeholder="Username"
                                   style="height: 50px;font-size: 14px;" name="name" type="text" required>
                            @error('name')
                            <span class="accent-color font-light"
                                  style="top: 5px;font-size: 0.8rem;position:relative;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1">
                            <span class="uk-form-icon" uk-icon="icon: mail"></span>
                            <input class="uk-input form-looks font-light" placeholder="Email Address"
                                   style="height: 50px;font-size: 14px;" name="email" type="text" required>
                            @error('email')
                            <span class="accent-color font-light"
                                  style="top: 5px;font-size: 0.8rem;position:relative;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                            <input class="uk-input form-looks font-light" placeholder="Password"
                                   style="height: 50px;font-size: 14px;" name="password" type="password" required>
                            @error('password')
                            <span class="accent-color font-light"
                                  style="top: 5px;font-size: 0.8rem;position:relative;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                            <input class="uk-input form-looks font-light" placeholder="Confirm Password"
                                   style="height: 50px;font-size: 14px;" name="confirm_password" type="password"
                                   required>
                            @error('confirm_password')
                            <span class="accent-color font-light"
                                  style="top: 5px;font-size: 0.8rem;position:relative;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="returnTo" value="{{url()->current()}}">
                    <button type="submit"
                            class="uk-button uk-align-center uk-margin-medium-top uk-button-default tm-button-default uk-icon uk-text-capitalize font-extrabold white-text uk-border-rounded bg-gradient"
                            style="border: none;transform: scale(1.1)">
                        Sign Up
                    </button>
                    <p class="grey-text-1 uk-text-center font-regular uk-margin-medium-top">Already have an account? <a
                            href="#" uk-toggle="target: #modal-login" class="font-extrabold accent-color">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="modal-search" class="uk-modal-full" uk-modal style="overflow-x: hidden;">
    <div class="uk-modal-dialog" style="overflow-y: auto;min-height: 100vh">
        <button class="uk-modal-close-default uk-icon-button" type="button" uk-close></button>
        <div class="uk-grid-collapse uk-flex-middle" uk-grid>
            <div class="uk-width-expand">
                <img src="{{asset('img/search.svg')}}" style="height: 650px;top: -200px;left: -250px;z-index: -10"
                     class="uk-position-top-left" alt="">
                <div class="uk-padding-large">
                    <div class="uk-container uk-container-small">
                        <p class="grey-text-4 font-heavy uk-text-center" style="font-size: 3.2rem;margin-bottom: 30px;">
                            Search Thread<span class="accent-color">.</span></p>
                        <form action="{{route('search')}}" onsubmit="event.preventDefault()"
                              class="uk-search uk-search-navbar uk-align-center" method="get"
                              enctype="multipart/form-data"
                              style="background-color: #f5f5f5;border-radius: 30px;padding-left: 10px;padding-right: 10px;">
                            <span uk-search-icon style="left: 10px;"></span>
                            <input id="search_barz" class="uk-search-input font-bold" name="q" type="search"
                                   placeholder="Search..."
                                   style="font-size: 1rem;height: 50px;padding-left: 13%;border-radius: 30px !important;">
                        </form>
                        <div class="result" style="padding-top: 40px;">
                            <div id="search_result" class="uk-grid" uk-grid="masonry: true">
                                <div class="uk-width-1-1">
                                    <div class="uk-text-center">
                                        <img src="{{asset('img/search.svg')}}" uk-img style="height: 250px;margin-top: -30px;" alt="">
                                        <p class="grey-text-3 font-extrabold" style="font-size: 25px;">No Search found</p>
                                        <p class="grey-text-1 font-regular" style="font-size: 17px;margin-top: -15px;">please retype in the search bar.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

