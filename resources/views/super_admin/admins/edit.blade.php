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
            <div class="uk-width-1-2" style="margin-top: 30px;">
                <div class="uk-card uk-card-default uk-card-body z-depth-15"
                     style="border-radius: 6px;padding:30px 20px;">
                    <h5 class="grey-text-4 font-heavy" style="font-size: 1.8rem;">+ Edit Admin</h5>
                    <form action="{{ route('admins.update', $data->id) }}" class="uk-grid" uk-grid method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="uk-inline uk-width-1-2">
                            <label class="uk-form-label" for="form-stacked-text">Username</label>
                            <input class="uk-input uk-border-rounded font-light" placeholder="name"
                                   name="name" type="text" value="{{$data->name}}" required>
                            @error('name')
                            <span class="accent-color font-light"
                                  style="top: 5px;font-size: 0.8rem;position:relative;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="uk-inline uk-width-1-2">
                            <label class="uk-form-label" for="form-stacked-text">Email</label>
                            <input class="uk-input uk-border-rounded font-light" placeholder="email"
                                   name="email" type="email" value="{{$data->email}}" required>
                            @error('email')
                            <span class="accent-color font-light"
                                  style="top: 5px;font-size: 0.8rem;position:relative;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="uk-inline uk-width-1-2">
                            <label class="uk-form-label" for="form-stacked-text">New Password</label>
                            <input class="uk-input uk-border-rounded font-light" placeholder="password"
                                   name="password" type="password">
                            @error('password')
                            <span class="accent-color font-light"
                                  style="top: 5px;font-size: 0.8rem;position:relative;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="uk-inline uk-width-1-2">
                            <label class="uk-form-label" for="form-stacked-text">Confirm New Password</label>
                            <input class="uk-input uk-border-rounded font-light" placeholder="retype password"
                                   name="confirm_password" type="password">
                            @error('confirm_password')
                            <span class="accent-color font-light"
                                  style="top: 5px;font-size: 0.8rem;position:relative;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="uk-inline uk-width-1-2">
                            <button type="submit"
                                    class="uk-button uk-button-default tm-button-default uk-icon uk-text-capitalize font-extrabold white-text uk-border-rounded bg-gradient"
                                    style="border: none;margin-bottom: 10px;">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@section('js')
    @include('layouts.js')
@show
<script>
    $('#datatable').dataTable();
</script>
</body>
</html>
