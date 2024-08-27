<div class="app-header header-shadow">
    <div class="app-header__logo">
        {{--        @php--}}
        {{--            $company = \App\Models\Admin\WebSetting\Company::first();--}}
        {{--        @endphp--}}
        <div class="logo-src">
            {{--            <img src="{{ asset(optional($company)->company_logo) }}" style="height: 40px; width: 150px ; margin: 2px" alt="Company Logo">--}}
            {{--<div style="font-size: 18px ; text-align: center; font-weight: bolder">{{$company->name}}</div>--}}
            <div style="font-size: 18px ; text-align: center; font-weight: bolder">
                {{--                <img src="{{ asset(optional($company)->company_logo) }}" style="height: 50px; width: 200px" alt="Company Logo">--}}
            </div>
        </div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
<span class="hamburger-box">

<span class="hamburger-inner"></span>
</span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
<span>
<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
<span class="btn-icon-wrapper">
<i class="fa fa-ellipsis-v fa-w-6"></i>
</span>
</button>
</span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            {{--fff--}}
        </div>
        <div class="app-header-right">

            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   class="p-0 btn">
                                    <img width="42" class="rounded-circle" src="{{auth()->user()->image}}" alt>
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                     class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-info">
                                            <div class="menu-header-image opacity-2"
                                                 style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                            <div class="menu-header-content text-left">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <img width="42" class="rounded-circle"
                                                                 src="{{ asset('assets/img/bt1.png') }}" alt="{{ auth()->user()->name }} Profile Picture">
                                                        </div>
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">{{auth()->user()->name}}</div>
                                                            <div class="widget-subheading opacity-8">{{auth()->user()->email}}</div>
                                                        </div>
                                                        <div class="widget-content-right mr-2">
                                                            <button
                                                                class="btn-pill btn-shadow btn-shine btn btn-focus">
                                                                <a href="#" class="  text-decoration-none"
                                                                   onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">
                                                                    Logout
                                                                </a>
                                                                <form action="{{ route('logout') }}" method="POST" id="logoutForm" style="display: none;">
                                                                    @csrf
                                                                </form>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading"> {{auth()->user()->name}}</div>
                            {{--                            <div class="widget-subheading"> VP People Manager</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-btn-lg">
                {{--                <button type="button" class="hamburger hamburger--elastic open-right-drawer"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>--}}
            </div>
        </div>
    </div>
</div>
