<html>
	<head>
		<meta charset="utf-8">
		<title>江苏海道企服电子商务有限公司</title>
		<link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
		<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">
		<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
		<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.css')}}">
		<link rel="stylesheet" href="{{asset('css/login.css')}}">
	</head>
	<body>
		
		<form action="{{ route('login') }}" method="post" class="login-box">
			{{ csrf_field() }}
			<img src="{{asset('images/logo_admin.jpg')}}" alt="">
			@include('shared.errors')
			@include('shared.messages')
			<!-- <label>邮箱</label> -->
			<div class="input-group margin-bottom-sm">
				<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
				<input class="form-control" type="text" placeholder="Email address" name="email">
			</div>
			<!-- <label>密码</label> -->
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
				<input class="form-control" type="password" placeholder="Password" name="password">
			</div>
			<button class="btn btn-primary">登录</button>
		</form>
	</body>
</html>