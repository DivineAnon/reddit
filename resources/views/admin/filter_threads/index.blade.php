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
                <h5 class="grey-text-4 font-heavy" style="font-size: 1.8rem;margin-bottom: 45px;">Today Threads</h5>
                <table class="uk-table uk-table-divider" id="datatable">
                    <thead>
                    <tr>
                        <th style="font-weight: 500;">Thread Key</th>
                        <th style="font-weight: 500;">Title</th>
                        <th style="font-weight: 500;">Created At</th>
                        <th style="font-weight: 500;">Action</th>
                    </tr>
                    </thead>
                    @foreach($data as $v)
                        <tr>
                            <td>{{$v->thread_key}}</td>
                            <td>
                                {{$v->title}}
                            </td>
                            <td class="font-light grey-text text-darken-1">{{\Carbon\Carbon::parse($v->created_at)->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('thread_detail', $v->thread_key)}}" class="uk-icon-button" uk-tooltip="title: View; pos: bottom" uk-icon="push"></a>
                                <form id="ban{{$v->id}}" method="post"
                                      onsubmit="event.preventDefault();comfirm_popup(this, 'Are you sure want to ban this?');"
                                      action="{{route('reports.ban', $v->id)}}"
                                      style="display: inline">
                                    @csrf
                                    <input type="hidden" value="{{$v->thread_key}}"
                                           name="thread_key">
                                    <button type="submit" uk-tooltip="title: Ban Thread; pos: bottom" uk-icon="minus-circle"
                                            class="uk-icon-button"></button>
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
