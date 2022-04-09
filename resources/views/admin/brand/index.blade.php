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
        <div class="uk-width-1" style="margin-top: 30px;">
            <div class="uk-card uk-card-default uk-card-body z-depth-15"
                 style="border-radius: 6px;padding:20px 20px;">
                <h5 class="grey-text-4 font-heavy" style="font-size: 1.8rem;display: inline">Manage Brands</h5>
                <a class="uk-button bg-gradient white-text uk-border-rounded uk-align-right"
                   style="margin-bottom: 50px;" href="{{route('brands.create')}}">+ Add</a>
                <table class="uk-table uk-table-divider" id="datatable">
                    <thead>
                    <tr>
                        <th style="font-weight: 500;">ID</th>
                        <th style="font-weight: 500;">Nama Brand</th>
                        <th style="font-weight: 500;">Logo</th>
                        <th style="font-weight: 500;">Created At</th>
                        <th style="font-weight: 500;">Action</th>
                    </tr>
                    </thead>
                    @foreach($data as $v)
                        <tr>
                            <td>BR000{{$v['id']}}</td>
                            <td>{{$v['name']}}</td>
                            <td>
                                <img src="{{asset('img/brand_logo/'.$v['image'])}}" style="height: 30px;" alt="">
                            </td>
                            <td class="font-light grey-text text-darken-1">{{\Carbon\Carbon::parse($v['created_at'])->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('brands.edit', $v['id'])}}" class="uk-icon-button" uk-icon="pencil"></a>
                                <form id="delete{{$v['id']}}" method="post"
                                      onsubmit="event.preventDefault();comfirm_popup(this, 'Are you sure want to delete this?');"
                                      action="{{route('brands.delete', $v['id'])}}"
                                      style="display: inline">
                                    @csrf
                                    <input type="hidden" value="{{$v['id']}}"
                                           name="id">
                                    <button type="submit"
                                            class="uk-icon-button"
                                            uk-icon="trash"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
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
