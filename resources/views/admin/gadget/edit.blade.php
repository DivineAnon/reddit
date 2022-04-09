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
                <h5 class="grey-text-4 font-heavy" style="font-size: 1.8rem;">+ Edit Gadget</h5>
                <form action="{{ route('gadgets.update', $data->id) }}" class="uk-grid" uk-grid method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">Gadget Name</label>
                        <input class="uk-input uk-border-rounded font-light" placeholder="name"
                               name="name" type="text" value="{{$data->name}}" required>
                    </div>
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">Brand</label>
                        <select class="uk-select uk-border-rounded" name="brand_id" id="form-stacked-select">
                            <option value="{{$data->brand_id}}" selected>Selected : {{$data->brand->name}}</option>
                            @foreach($brand as $b)
                                @if($data->brand_id != $b->id)
                                    <option value="{{$b->id}}">{{$b->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">Price (Rp)</label>
                        <input class="uk-input uk-border-rounded font-light" placeholder="rupiah"
                               name="price" min="100000" value="{{$data->price}}" type="number" required>
                    </div>
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">Year Released</label>
                        <input class="uk-input uk-border-rounded font-light" placeholder="year"
                               name="year_released" min="1990" value="{{$data->year_released}}" type="number" required>
                    </div>
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">Screen Size (inch)</label>
                        <input class="uk-input uk-border-rounded font-light" placeholder="inch"
                               name="screen_size" value="{{$data->screen_size}}" type="text" required>
                    </div>
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">Resolution</label>
                        <input class="uk-input uk-border-rounded font-light" placeholder="pixels"
                               name="resolution" value="{{$data->resolution}}" type="text" required>
                    </div>
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">Camera Pixel (MP)</label>
                        <input class="uk-input uk-border-rounded font-light" placeholder="pixels"
                               name="camera_pixel" min="1" value="{{$data->camera_pixel}}" type="number" required>
                    </div>
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">RAM (GB)</label>
                        <input class="uk-input uk-border-rounded font-light" placeholder="GB"
                               name="ram" min="1" value="{{$data->ram}}" type=number required>
                    </div>
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">Chip</label>
                        <input class="uk-input uk-border-rounded font-light" placeholder="name"
                               name="chip" value="{{$data->chip}}" type="text" required>
                    </div>
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">Battery (mAh)</label>
                        <input class="uk-input uk-border-rounded font-light" placeholder="mAh"
                               name="battery" min="500" value="{{$data->battery}}" type="number" required>
                    </div>
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">OS</label>
                        <input class="uk-input uk-border-rounded font-light" placeholder="OS" name="os"
                               value="{{$data->os}}" type="text" required>
                    </div>
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">Storage (GB)</label>
                        <input class="uk-input uk-border-rounded font-light" placeholder="GB"
                               name="storage" value="{{$data->storage}}" type="text" required>
                    </div>
                    <div class="uk-inline uk-width-1-2">
                        <label class="uk-form-label" for="form-stacked-text">Image (Optional)</label>
                        <div uk-form-custom="target: true" class="uk-width-1">
                            <input type="file" name="image">
                            <input class="uk-input uk-border-rounded" @if(!empty($data->image)) value="{{$data->image}}"
                                   @endif type="text" placeholder="Select file" disabled>
                        </div>
                    </div>
                    <div class="uk-inline uk-width-1-2"></div>
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
