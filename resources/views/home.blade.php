@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
<section id="slider">
	<div class="DB_tab25">
		<ul class="DB_bgSet">
			@foreach ($pictures as $pic)
				<a href="{{ $pic->pic_href }}">
					<li>
						<img class="img" src="/uploads/{{ $pic->pic_content }}" alt="">
					</li>
				</a>
			@endforeach
		</ul>
		
		<ul class="DB_imgSet">
			@foreach ($pictures as $pic)
				<li></li>
			@endforeach
		</ul>
		<div class="DB_menuWrap">
			<ul class="DB_menuSet">
				@foreach ($pictures as $pic)
					<li>
						<img src="{{asset('images/btn_off.png')}}" />
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</section>

<div class="clear"></div>

<section id="section1">
	<div class="col-md-offset-1 col-md-10 intro">
		<h3>海道大事记</h3><span><a href="{{ route('news') }}">MORE</a></span>

		<div class="clear"></div>
		@foreach($newses as $news)
		<div class="col-md-3 intro">
			<div class="intro-box">
				<div class="date-box">
					<span>{{ $news->created_at->day }}</span><h6>{{ date_format($news->created_at,"Y.m") }}</h6>
				</div>
				<div class="news">
					<a href="{{ url('news/'.$news->id) }}"><div class="newst">{{ $news->news_title }}</div></a>
					<a href="{{ url('news/'.$news->id) }}"><div class="newsc">{!! $news->news_content !!}</div></a>
					<a href="{{ url('news/'.$news->id) }}">
						<button class="btn btn-primary">更多</button>
					</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</section>

<div class="clear"></div>

<section id="section2">
	<!-- <div class="col-md-1 buy"></div>
	<div class="col-md-10 buy">
		<div class="col-md-4 buy">
			<div class="buy-box">
				<i class="fa fa-coffee"></i>
			</div>
			<div class="buy-show">
				<div class="buyt">江苏海道企服电子商务有限公司</div>
				<div class="buyc">江苏海道企服电子商务有限公司江苏海道企服电子商务有限公司江苏海道企服电子商务有限公司江苏海道企服电子商务有限公司江苏海道企服电子商务有限公司</div>
			</div>
		</div>
		<div class="col-md-4 buy">
			<div class="buy-box">
				<i class="fa fa-id-card"></i>
			</div>
			<div class="buy-show">
				<div class="buyt">江苏海道企服电子商务有限公司</div>
				<div class="buyc">江苏海道企服电子商务有限公司江苏海道企服电子商务有限公司江苏海道企服电子商务有限公司江苏海道企服电子商务有限公司江苏海道企服电子商务有限公司</div>
			</div>
		</div>
		<div class="col-md-4 buy">
			<div class="buy-box">
				<i class="fa fa-tag"></i>
			</div>
			<div class="buy-show">
				<div class="buyt">江苏海道企服电子商务有限公司</div>
				<div class="buyc">江苏海道企服电子商务有限公司江苏海道企服电子商务有限公司江苏海道企服电子商务有限公司江苏海道企服电子商务有限公司江苏海道企服电子商务有限公司</div>
			</div>
		</div>
	</div>
	<div class="col-md-1 buy"></div> -->
</section>

<section id="section3" class="col-md-12">
	<!-- <ul class="ch-grid">
		<a href="#" target="_blank">
		<li>
			<div class="ch-item slideanim">
				<div class="ch-info-wrap">
					<div class="ch-info">
						<div class="ch-info-front ch-img-1"></div>
						<div class="ch-info-back">
							<h5>合作公司</h5>
						</div>
					</div>
				</div>
			</div>
		</li>
		</a>
		<a href="#" target="_blank">
		<li>
			<div class="ch-item slideanim">
				<div class="ch-info-wrap">
					<div class="ch-info">
						<div class="ch-info-front ch-img-2"></div>
						<div class="ch-info-back">
							<h5>合作公司</h5>
						</div>
					</div>
				</div>
			</div>
		</li>
		</a>
		<a href="#" target="_blank">
		<li>
			<div class="ch-item slideanim">
				<div class="ch-info-wrap">
					<div class="ch-info">
						<div class="ch-info-front ch-img-3"></div>
						<div class="ch-info-back">
							<h5>合作公司</h5>
						</div>
					</div>
				</div>
			</div>
		</li>
		</a>
	</ul> -->
	<div id="contacts" class="col-md-offset-1 col-md-10">
		<h3>联系我们</h3>
		<p><i class="fa fa-envelope"></i>&nbsp;<a href="mailto:haixingce@163.com">haixingce@163.com</a></p>
	</div>
</div>

</section>
<div class="clear"></div>
<script src="{{asset('js/jquery.DB_tabMotionBanner.min.js')}}"></script>
<script src="{{asset('js/echarts.js')}}"></script>
<script>
	// $(".buy-box").mouseover(function(){
	// 	$(this).next().slideDown();
	// 	$(this).children().slideUp();
	// });
	// $(".buy-show").mouseout(function(){
	// 	$(this).prev().children().slideDown();
	// 	$(this).slideUp();
	// });  
	$("p").children().remove("img");
</script>
<script type="text/javascript">
	var myChart = echarts.init(document.getElementById('section2'));
	option = {
		title : {
			text: '组织结构',
			x:'10%',
			y: '60px',
			textStyle: {
				fontSize: 25,
				fontWeight: 'normal'
			},
		},
		tooltip: {},
		animationDurationUpdate: 0,
		animationEasingUpdate: 'quinticInOut',
		label: {
			normal: {
				show: true,
				textStyle: {
					fontSize: 10
				},
			}
		},
		legend: {
			x: "80%",
			data: ["第一级", "第二级", '第三级','第四级']
		},
		series: [
			{
				color: ['#86D560', '#AF89D6', '#59ADF3', '#FF999A'],
				type: 'graph',
				layout: 'force',
				symbolSize: 60,
				focusNodeAdjacency: true,
				roam: false,
				categories: [{
					name: '第一级',
					
				}, {
					name: '第二级',
					
				}, {
					name: '第三级'
				}, {
					name: '第四级'
				}],
				label: {
					normal: {
						show: true,
						textStyle: {
							fontSize: 12
						},
					}
				},
				force: {
					repulsion: 400
				},
				//edgeSymbol: ['pin'],
				//edgeSymbolSize: [1, 10],
				edgeLabel: {
					normal: {
						show: true,
						textStyle: {
							fontSize: 6
						},
						formatter: "{c}"
					}
				},
				data: [ 
				{
					name: '总裁办',
					category: 0,
					label: 'aaa',
					url: 'http://www.baidu.com',
					draggable: true, 
				},
				{
					name: '财务部',
					category: 1,
					draggable: true, 
				},
				{
					name: '人事行政部',
					category: 1,
					draggable: true, 
				},
				{
					name: '项目部',
					category: 1,
					draggable: true,  
				},
				{
					name: '市场营销部',
					category: 1,
					draggable: true,
				},
				{
					name: '主办会计',
					category: 2,
					draggable: true,
				}, 
				
				{
					name: '会计',
					category: 2,
					draggable: true,
				}, 
				{
					name: '人事主管',
					category: 2,
					draggable: true,
				}, 
				
				
				{
					name: '档案管理员',
					category: 2,
					draggable: true,
				}, 
				{
					name: '网管',
					category: 2,
					draggable: true,
				}, 
				{
					name: '驾驶员',
					category: 2,
					draggable: true,
				}, 
				{
					name: '技术总监',
					category: 2,
					draggable: true,
				}, 
				{
					name: '项目经理',
					category: 2,
					draggable: true,
				}, 
				{
					name: '软件开发',
					category: 2,
					draggable: true,
				}, 
				{
					name: '客服专员',
					category: 2,
					draggable: true,
				}, 
				{
					name: '营销经理',
					category: 2,
					draggable: true,
				},
				{
					name: '营销专员',
					category: 2,
					draggable: true,
				},
				{
					name: '营销客服',
					category: 2,
					draggable: true,
				},
				{
					name: 'UI设计',
					category: 3,
					draggable: true,
				},
				{
					name: '技术开发',
					category: 3,
					draggable: true,
				},
				{
					name: '平面设计',
					category: 3,
					draggable: true,
				},
				{
					name: '交互设计',
					category: 3,
					draggable: true,
				},
				{
					name: '文案',
					category: 3,
					draggable: true,
				},
				],
				links: [{
					source: '总裁办',
					target: '财务部',
					value: ''
					
				},
				{
					source: '总裁办',
					target: '人事行政部',
					value: ''
				},
				{
					source: '总裁办',
					target: '项目部',
					value: ''
				},
				{
					source: '总裁办',
					target: '市场营销部',
					value: ''
				}, 
				{
					source: '财务部',
					target: '主办会计',
					value: ''
				}, 
				{
					source: '财务部',
					target: '会计',
					value: ''
				}, 
				{
					source: '人事行政部',
					target: '人事主管',
					value: ''		
				}, 
				{
					source: '人事行政部',
					target: '档案管理员',
					value: ''
				}, 
				{
					source: '人事行政部',
					target: '网管',
					value: ''
				}, 
				{
					source: '人事行政部',
					target: '驾驶员',
					value: ''
				}, 
				{
					source: '项目部',
					target: '技术总监',
					value: ''
				}, 
				{
					source: '项目部',
					target: '项目经理',
					value: ''
				}, 
				{
					source: '项目部',
					target: '软件开发',
					value: ''
				},
				{
					source: '项目部',
					target: '客服专员',
					value: ''
				},
				{
					source: '市场营销部',
					target: '营销经理',
					value: ''
				},
				
				{
					source: '市场营销部',
					target: '营销专员',
					value: ''
				},
				{
					source: '市场营销部',
					target: '营销客服',
					value: ''
				}, 
				{
					source: '软件开发',
					target: 'UI设计',
					value: ''
				}, 
				{
					source: '软件开发',
					target: '技术开发',
					value: ''
				}, 
				{
					source: '软件开发',
					target: '平面设计',
					value: ''
				}, 
				{
					source: '软件开发',
					target: '交互设计',
					value: ''
				}, 
				{
					source: '软件开发',
					target: '文案',
					value: ''
				}, 
				],
				lineStyle: {
					normal: {
						opacity: 0.7,
						width: 1,
						curveness: 0.1,
						length: '0.2',
					}
				}
			}
		]
	};
	window.onresize = myChart.resize;
	$("#section2").resize(myChart);
	myChart.setOption(option);
</script>
<script type="text/javascript">
	//使用jquery.DB_tabMotionBanner.min.js制作简易动画
	$('.DB_tab25').DB_tabMotionBanner({
		key: 'b28551',
		autoRollingTime: 6000,
		bgSpeed: 500,
		motion: {
			DB_1_1: { left: -50, opacity: 0, speed: 1000, delay: 1000 },
			DB_2_1: { top: 50, opacity: 0, speed: 1000, delay: 1000 },
			DB_3_1: { top: -50, opacity: 0, speed: 1000, delay: 1000 },
			end: null
		}
	});
</script>
@endsection