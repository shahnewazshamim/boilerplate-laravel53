<!DOCTYPE html>
<html lang="en">
@include('layouts.backend.common.head')
<body>
@include('layouts.backend.common.top-bar')
<div id="wrapper">
    @include('layouts.backend.common.left-side-nav')
    @include('layouts.backend.common.right-side-panel')
    <div id="content" class="page-content clearfix">
        @yield('content')
    </div>
    @include('layouts.backend.common.footer')
</div>
<!-- Back to top -->
<div id="back-to-top"><a href="#">Back to Top</a></div>
@include('layouts.backend.common.foot')
</body>
</html>
