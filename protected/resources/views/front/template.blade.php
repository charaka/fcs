<!DOCTYPE html>
<html>
    @include('front.layout.meta')
    <body>
        <div id="mainNavbar">
            <!-- Menu -->
            @include('front.layout.menu')
            <!-- End Menu -->
        </div>
        <div id="mainContent">
            @yield('content')
        </div>
        @include('front.layout.footer')
        @include('front.layout.script')
        @yield('script')
    </body>
</html>