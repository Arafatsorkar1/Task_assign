<!doctype html>
<html lang="en">

@include('Includes.head')


<body>

<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    @include('Includes.nev')
    {{--    @include('Admin.Includes.UIdesign')--}}
    <div class="app-main">
        @include('Includes.Sidebar.mainsidebar')
        <div class="app-main__outer">
            <div class="app-main__inner">
                @yield('body')



            </div>
        </div>
    </div>
</div>
@include('Includes.Sidebar.serviceStatus')
<div class="app-drawer-overlay d-none animated fadeIn"></div>
@include('Includes.footer')

@include('Includes.js')





</body>
</html>
