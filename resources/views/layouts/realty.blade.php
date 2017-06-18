<html>
<head>
    <title>应用程序名称 - @yield('title')</title>
    <meta name="csrf-token" id="csrf" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">
    <link rel="stylesheet" href="{{  mix('css/app.css')  }}">
    @yield('css')
    <script>
        var URL = {
            login: "{{ route('login') }}",
            register: "{{ route('register') }}",
            logout: "{{ route('logout') }}"

        };
        var STATUS = {
            auth_guest:{{Auth::guest() ? 'true' : 'false'}},
        }
        var USER = {
            name: '{{Auth::user() ? Auth::user()->name : ''}}',
            csrf_token: '{{csrf_token()}}'
        }
    </script>
</head>
<body>
<div id="realty">
    <div id="realtyNav">
        <realty-nav>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">登录</a></li>
                    <li><a href="{{ route('register') }}">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    安全退出
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </realty-nav>
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