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
                <h5 class="grey-text-4 font-heavy" style="font-size: 1.8rem;">+ Edit Brand</h5>
                <form action="{{ route('brands.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1">
                            <label class="uk-form-label" for="form-stacked-text">Brand Name</label>
                            <input class="uk-input uk-border-rounded font-light" placeholder="Enter Brand name" value="{{$data->name}}" name="name" type="text" required>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-margin" uk-margin>
                            <label class="uk-form-label" for="form-stacked-text">Brand Logo</label>
                            <div uk-form-custom="target: true" class="uk-width-1">
                                <input type="file" name="image">
                                <input class="uk-input uk-border-rounded uk-form-width-medium" type="text" placeholder="{{$data->image}}" disabled>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                            class="uk-button uk-button-default tm-button-default uk-icon uk-text-capitalize font-extrabold white-text uk-border-rounded bg-gradient"
                            style="border: none;margin-bottom: 10px;">
                        Submit
                    </button>
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
