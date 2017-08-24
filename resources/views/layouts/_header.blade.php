<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<!-- <i class="fa fa-gear fa-spin spin"></i> -->
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#subnavi">
				<span class="sr-only">切换导航</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<img src="{{asset('images/logo.png')}}" alt="">
			<a href="{{ route('login') }}"><div class="admin"></div></a>
		</div>
		
		<div class="collapse navbar-collapse" id="subnavi">
			<ul class="nav navbar-nav">
			@if(Auth::check())
				<li class="dropdown" style="float: right; margin-right: 10%;">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Admin <b class="caret"></b>
					</a>
					<ul class="dropdown-menu" style="float: right;">
						<li><a href="{{ route('news') }}">新闻管理</a></li>
						<li><a href="{{ route('product') }}">产品管理</a></li>
						<li><a href="{{ route('picture') }}">轮播管理</a></li>
						<li class="divider"></li>
						<li>
							<a id="logout" href="{{ route('logout') }}">
								<button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
							</a>
						</li>
					</ul>
				</li>
			@else
				<li><a href="{{ route('home') }}">网站首页</a></li>
				<li><a href="{{ route('news') }}">企业介绍</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						产品展示 <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						@foreach($products as $product)
							
							<li><a href="{{ $product->pro_href }}" target="_blank">{{ $product->pro_name }}</a></li>
							
						@endforeach
					</ul>
				</li>
				<li><a href="{{ route('home') }}#section2">组织结构</a></li>
				<li><a href="mailto:haixingce@163.com">联系我们</a></li>
			@endif
			</ul>
		</div>
	</div>
</nav>