<div class="z-depth-15 uk-position-fixed" style="width: 260px;height: 100vh;">
    <div class="side-menu-container" style="padding: 20px;">
        <a class="uk-align-center uk-text-center uk-logo font-heavy grey-text-4" href="{{route('welcome')}}">
            <span class="uk-text-middle" style="font-size: 1.7rem;">Digitalk<span class="accent-color">.</span></span>
            <span class="uk-text-middle brand-chip white-text font-bold bg-gradient-noshadow uk-border-rounded"
                  style="font-size: 0.8rem;padding-left: 10px;padding-right: 10px;padding-top: 6px;padding-bottom: 5px;">@if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                    Admin @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'super_admin') Super @endif</span>
        </a>
        <ul class="uk-nav uk-nav-default">
            @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                <li><a href="{{route('admin')}}"
                       class="@if (request()->segment(1) . '/' . request()->segment(2) == 'admin/') bg-gradient white-text @else side-nav-link @endif transisi"
                       style="border-radius: 6px;padding: 10px 15px 10px 20px;font-size: 1rem;"><span
                            class="uk-margin-small-right" uk-icon="icon: home"></span> <span class="uk-text-middle">Dashboard</span></a>
                    @if(request()->segment(1) . '/' . request()->segment(2) != 'admin/')
                        <span style="float: right;margin-top: -33px;left: -10px;position: relative"
                              uk-icon="icon: chevron-right"></span>
                    @endif
                </li>
                <li class="uk-nav-header grey-text" style="letter-spacing: 1.5px;font-size: 0.8rem;margin-top: 35px;">
                    MANAGE
                </li>
                <li><a href="{{route('brands.index')}}"
                       class="@if (request()->segment(1) . '/' . request()->segment(2) == 'admin/manage_brands') bg-gradient white-text @else side-nav-link @endif transisi"
                       @if (request()->segment(1) . '/' . request()->segment(2) == 'admin/manage_brands') style="border-radius: 6px;padding: 10px 15px 10px 20px;font-size: 1rem;margin-bottom: 10px;margin-top: 10px;" @endif>
                        <span class="uk-margin-small-right" uk-icon="icon: tag"></span>
                        <span class="uk-text-middle">Brand</span></a>
                    @if (request()->segment(1) . '/' . request()->segment(2) != 'admin/manage_brands')
                        <span style="float: right;margin-top: -33px;left: -10px;position: relative"
                              uk-icon="icon: chevron-right"></span>
                    @endif
                </li>
                <li><a href="{{route('gadgets.index')}}"
                       class="@if (request()->segment(1) . '/' . request()->segment(2) == 'admin/manage_gadgets') bg-gradient white-text @else side-nav-link @endif transisi"
                       @if (request()->segment(1) . '/' . request()->segment(2) == 'admin/manage_gadgets') style="border-radius: 6px;padding: 10px 15px 10px 20px;font-size: 1rem;margin-bottom: 10px;margin-top: 10px;" @endif>
                        <span class="uk-margin-small-right" uk-icon="icon: phone"></span>
                        <span class="uk-text-middle">Gadget</span></a>
                    @if (request()->segment(1) . '/' . request()->segment(2) != 'admin/manage_gadgets')
                        <span style="float: right;margin-top: -33px;left: -10px;position: relative"
                              uk-icon="icon: chevron-right"></span>
                    @endif
                </li>
                <li><a href="{{route('filter.index')}}"
                       class="@if (request()->segment(1) . '/' . request()->segment(2) == 'admin/manage_threads') bg-gradient white-text @else side-nav-link @endif transisi"
                       @if (request()->segment(1) . '/' . request()->segment(2) == 'admin/manage_threads') style="border-radius: 6px;padding: 10px 15px 10px 20px;font-size: 1rem;margin-bottom: 10px;margin-top: 10px;" @endif>
                        <span class="uk-margin-small-right" uk-icon="icon: hashtag"></span>
                        <span class="uk-text-middle">Threads</span></a>
                    @if (request()->segment(1) . '/' . request()->segment(2) != 'admin/manage_threads')
                        <span style="float: right;margin-top: -33px;left: -10px;position: relative"
                              uk-icon="icon: chevron-right"></span>
                    @endif
                </li>
                <li><a href="{{route('reports.index')}}"
                       class="@if (request()->segment(1) . '/' . request()->segment(2) == 'admin/manage_reports') bg-gradient white-text @else side-nav-link @endif transisi"
                       @if (request()->segment(1) . '/' . request()->segment(2) == 'admin/manage_reports') style="border-radius: 6px;padding: 10px 15px 10px 20px;font-size: 1rem;margin-bottom: 10px;margin-top: 10px;" @endif>
                        <span class="uk-margin-small-right" uk-icon="icon: pull"></span>
                        <span class="uk-text-middle">Reports</span></a>
                    @if (request()->segment(1) . '/' . request()->segment(2) != 'admin/manage_reports')
                        <span style="float: right;margin-top: -33px;left: -10px;position: relative"
                              uk-icon="icon: chevron-right"></span>
                    @endif
                </li>
                <li><a href="{{route('users.index')}}"
                       class="@if (request()->segment(1) . '/' . request()->segment(2) == 'admin/manage_users') bg-gradient white-text @else side-nav-link @endif transisi"
                       @if (request()->segment(1) . '/' . request()->segment(2) == 'admin/manage_users') style="border-radius: 6px;padding: 10px 15px 10px 20px;font-size: 1rem;margin-bottom: 10px;margin-top: 10px;" @endif>
                        <span class="uk-margin-small-right" uk-icon="icon: users"></span>
                        <span class="uk-text-middle">Users</span></a>
                    @if (request()->segment(1) . '/' . request()->segment(2) != 'admin/manage_users')
                        <span style="float: right;margin-top: -33px;left: -10px;position: relative"
                              uk-icon="icon: chevron-right"></span>
                    @endif
                </li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->role == 'super_admin')
                <li><a href="{{route('super_admin')}}"
                       class="@if (request()->segment(1) . '/' . request()->segment(2) == 'super_admin/') bg-gradient white-text @else side-nav-link @endif transisi"
                       style="border-radius: 6px;padding: 10px 15px 10px 20px;font-size: 1rem;"><span
                            class="uk-margin-small-right" uk-icon="icon: home"></span> <span class="uk-text-middle">Dashboard</span></a>
                    @if(request()->segment(1) . '/' . request()->segment(2) != 'super_admin/')
                        <span style="float: right;margin-top: -33px;left: -10px;position: relative"
                              uk-icon="icon: chevron-right"></span>
                    @endif
                </li>
                <li class="uk-nav-header grey-text" style="letter-spacing: 1.5px;font-size: 0.8rem;margin-top: 35px;">
                    MANAGE
                </li>
                <li><a href="{{route('admins.index')}}"
                       class="@if (request()->segment(1) . '/' . request()->segment(2) == 'super_admin/manage_admins') bg-gradient white-text @else side-nav-link @endif transisi"
                       @if (request()->segment(1) . '/' . request()->segment(2) == 'super_admin/manage_admins') style="border-radius: 6px;padding: 10px 15px 10px 20px;font-size: 1rem;margin-bottom: 10px;margin-top: 10px;" @endif>
                        <span class="uk-margin-small-right" uk-icon="icon: users"></span>
                        <span class="uk-text-middle">Admins</span></a>
                    @if (request()->segment(1) . '/' . request()->segment(2) != 'super_admin/manage_admins')
                        <span style="float: right;margin-top: -33px;left: -10px;position: relative"
                              uk-icon="icon: chevron-right"></span>
                    @endif
                </li>
            @endif
        </ul>
    </div>
</div>
