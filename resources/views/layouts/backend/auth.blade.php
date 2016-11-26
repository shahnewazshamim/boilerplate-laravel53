<!DOCTYPE html>
<html lang="en">
@include('layouts.backend.common.head')
<body class="login-page">
@include('layouts.backend.common.auth-top-bar')
@yield('content')
@include('layouts.backend.common.auth-footer')
@include('layouts.backend.common.auth-foot')
</body>
</html>