<html>
<head>
    <title>应用程序名称 - @yield('title')</title>
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">
    <link rel="stylesheet" href="{{  mix('css/app.css')  }}">
    @yield('css')
</head>
<body>
<div id="realty">
    <div id="realtyNav">
        <realty-nav></realty-nav>
    </div>

    <div id="container">
        @yield('content')
    </div>

    <div id="realtyBoot">
        <realty-boot></realty-boot>
    </div>
</div>
<script>

</script>
<script src="{{  mix('js/app.js')  }}"></script>
@yield('js')
</body>
</html>