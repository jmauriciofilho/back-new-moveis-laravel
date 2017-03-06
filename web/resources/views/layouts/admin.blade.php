<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="{!! csrf_token() !!}">
    <title>{!! trans('admin/layout.page_title_admin') !!} | @yield('title') </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="/assets/admin/css/admin.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        @include('admin.navbar')
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            @include('admin.sidebar')
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            @yield('header')
        </section>

        @include('admin.request-errors')

        <section class="content">
            @yield('content')
        </section>
    </div>

    <footer class="main-footer">
        @include('admin.footer')
    </footer>
</div>

<script src="/assets/admin/js/admin.js"></script>
@yield('scripts')

</body>
</html>