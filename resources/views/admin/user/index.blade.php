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
                <h5 class="grey-text-4 font-heavy" style="font-size: 1.8rem;margin-bottom: 45px;">Manage User</h5>
                <table class="uk-table uk-table-divider" id="datatable">
                    <thead>
                    <tr>
                        <th style="font-weight: 500;">Username</th>
                        <th style="font-weight: 500;">Email</th>
                        <th style="font-weight: 500;">Thread Made</th>
                        <th style="font-weight: 500;">Created At</th>
                        <th style="font-weight: 500;">Action</th>
                    </tr>
                    </thead>
                    @foreach($data as $v)
                        <tr>
                            <td class="uk-text-capitalize">
                                {{$v->name}}
                            </td>
                            <td>
                                {{$v->email}}
                            </td>
                            <td>
                                {{$v->thread_made}} Threads
                            </td>
                            <td class="font-light grey-text text-darken-1">{{\Carbon\Carbon::parse($v->created_at)->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('profile_page', $v->name)}}" target="_blank" class="uk-icon-button"
                                   uk-tooltip="title: View; pos: bottom" uk-icon="push"></a>
                                @if($v->thread_status == 0)
                                    <form id="ban{{$v->id}}" method="post"
                                          onsubmit="event.preventDefault();comfirm_popup(this, 'Are you sure want to ban this user from making thread?');"
                                          action="{{route('users.ban', $v->id)}}"
                                          style="display: inline">
                                        @csrf
                                        <input type="hidden" value="{{$v->id}}"
                                               name="id">
                                        <button type="submit" uk-tooltip="title: Ban User; pos: bottom"
                                                uk-icon="minus-circle"
                                                class="uk-icon-button"></button>
                                    </form>
                                @elseif($v->thread_status == 1)
                                    <form id="unban{{$v->id}}" method="post"
                                          onsubmit="event.preventDefault();comfirm_popup(this, 'Are you sure want to unban this user?');"
                                          action="{{route('users.unban', $v->id)}}"
                                          style="display: inline">
                                        @csrf
                                        <input type="hidden" value="{{$v->id}}"
                                               name="id">
                                        <button type="submit" uk-tooltip="title: Unban User; pos: bottom" style="color: #fff"
                                                uk-icon="minus-circle"
                                                class="uk-icon-button bg-gradient-noshadow"></button>
                                    </form>
                                @endif
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
