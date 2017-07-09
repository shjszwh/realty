<html>
<head>
	<title>应用程序名称 - @yield('title')</title>
	<meta name="csrf-token" id="csrf" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">
	<link rel="stylesheet" href="{{  mix('css/app.css')  }}">
	@yield('css')
	<script>
		var STATUS = {
			auth_guest:{{Auth::guest() ? 'true' : 'false'}}
		};
		var USER = {
			name: '{{Auth::user() ? Auth::user()->name : ''}}',
			csrf_token: '{{csrf_token()}}'
		};
		var minHeight;
		document.onload = function () {
			minHeight = document.body.clientHeight;
		}
	</script>
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
	var minHeight = 400;
	function setMinHeight() {
		minHeight = window.innerHeight;
		console.log(minHeight);
		document.getElementById('container').style.minHeight = (minHeight - 230) + 'px';
	}
	document.body.onload = setMinHeight;
	window.onresize = setMinHeight;
	var URL = {
		tags: '{{ route('tags.index') }}',
		home: '{{ route('home') }}',
		articles: '{{ route('articles.index') }}',
		celebrities: '{{ route('celebrities.index') }}',
		my: {
			profile: {
				show: '{{ route('profile') }}',
				update: '{{ route('profileApi') }}',
			},
			articles: {
				index: '{{ route('my-articles.index') }}',
				create: '{{ route('my-articles.create') }}',
				store: '{{ route('my-articles.store') }}'
			},
			dirs: {
				index: '{{ route('my-dirs.index') }}',
				create: '{{ route('my-dirs.create') }}',
				store: '{{ route('my-dirs.store') }}'
			},
			tags: {
				index: '{{ route('my-tags.index') }}',
				create: '{{ route('my-tags.create') }}',
				store: '{{ route('my-tags.store') }}'
			}
		},
		login: "{{ route('login') }}",
		register: "{{ route('register') }}",
		logout: "{{ route('logout') }}"
	}
</script>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
@yield('js')
</body>
</html>