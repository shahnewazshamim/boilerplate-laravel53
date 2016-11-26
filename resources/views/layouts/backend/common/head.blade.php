<head>
    <meta charset="utf-8">
    <title>Web Boilerplate</title>
    <!-- Mobile specific metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Force IE9 to render in normal mode -->
    <!--[if IE]>
    <meta http-equiv="x-ua-compatible" content="IE=9"/><![endif]-->
    <meta name="author" content="Softyard LAB">
    <meta name="developer" content="Md. Shamim Shahnewaz">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="application-name" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = '<?php echo json_encode(['csrfToken' => csrf_token(),]); ?>';</script>
    <!-- Import google fonts - Heading first/ text second -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">
    <!-- Css files -->
    <!-- Icons -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet"/>
    <!-- Bootstrap stylesheets (included template modifications) -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet"/>
    <!-- Plugins stylesheets (all plugin custom css) -->
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet"/>
    <!-- Main stylesheets (template main css file) -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet"/>
    <!-- Custom stylesheets ( Put your own changes here ) -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet"/>
    <!-- Fav and touch icons -->

    <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
    <meta name="msapplication-TileColor" content="#3399cc"/>
</head>