<html>
<head>
	<title>@yield('title','realty')</title>
	<meta name="csrf-token" id="csrf" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">
	<link rel="stylesheet" href="{{  mix('css/app.css')  }}">
	@yield('css')
	<script>
		var STATUS = {
			auth_guest:{{Auth::guest() ? 'true' : 'false'}}
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
		<realty-nav></realty-nav>
	</div>

	<div id="container">
		<div class="el-row">
			<div class="el-col el-col-3" id="myNav">
				<el-menu default-active="1" class="el-menu-vertical-demo" style="min-height: 80%;">
					<el-menu-item index="1">
						<i class="el-icon-setting"></i>
						<a class="el-button el-button--text" :href="url.my.profile.show">个人信息</a>
					</el-menu-item>
					<el-menu-item index="2">
						<i class="el-icon-document"></i>
						<a class="el-button el-button--text" :href="url.my.articles.index">我的文章</a>
					</el-menu-item>
					<el-menu-item index="2">
						<i class="el-icon-date"></i>
						<a class="el-button el-button--text" :href="url.my.tags.index">我的标签</a>
					</el-menu-item>
					<el-menu-item index="3">
						<i class="el-icon-star-on"></i>
						<a class="el-button el-button--text" :href="url.my.dirs.index">我的目录</a>
					</el-menu-item>
				</el-menu>
			</div>
			<el-col :span="21" id="my">
				@yield('content')
			</el-col>
		</div>
	</div>

	<div id="realtyBoot">
		<realty-boot></realty-boot>
	</div>
</div>
<script>
	var minHeight = 400;
	function setMinHeight() {
		minHeight = window.innerHeight;
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
<script src="{{  mix('js/app.js')  }}"></script>
<script src="{{  mix('js/nav.js')  }}"></script>
@yield('js')
</body>
</html>