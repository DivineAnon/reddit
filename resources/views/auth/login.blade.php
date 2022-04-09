@section('head')
    @include('layouts.head')
@show
<body class="font-regular">
@section('loader')
    @include('layouts.loader')
@show
<div class="uk-container">
    <div
        class="uk-card uk-card-default uk-card-body uk-border-rounded z-depth-15 uk-position-center"
        style="border-radius: 20px;width: 400px;">
        <a class="uk-align-center uk-text-center uk-logo font-heavy grey-text-4" href="{{route('welcome')}}"
           style="transform: scale(1.1);margin-top: 10px">
            <span class="uk-text-middle" style="font-size: 1.7rem;">Digitalk<span class="accent-color">.</span></span>
            <span class="uk-text-middle brand-chip white-text font-bold bg-gradient-noshadow uk-border-rounded"
                  style="font-size: 0.8rem;padding-left: 10px;padding-right: 10px;padding-top: 6px;padding-bottom: 5px;">Admin</span>
        </a>
        <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
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
                    class="uk-button uk-align-center uk-button-default tm-button-default uk-icon uk-text-capitalize font-extrabold white-text uk-border-rounded bg-gradient"
                    style="border: none;">
                Sign In
            </button>
        </form>
    </div>
</div>
@section('js')
    @include('layouts.js')
@show
