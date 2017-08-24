<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@extends('layouts.default')
@section('content')


<section class="col-md-12 body">
	<div class="col-md-offset-2 col-md-8 nindex">
		@include('shared.messages')
		<div id="newstotal">
			<h3>新闻动态 <span>/News</span></h3>
			@if(Auth::check())
				<a href="{{ route('news_create') }}"><button class="btn btn-primary">添加新闻</button></a>
			@endif
			<div id="news">
				@foreach($newses as $news)
					<div class="onenews">
						<div class="newdate">
							{{ $news->created_at->year }}.{{ $news->created_at->month }}
							<p>{{ $news->created_at->day }}</p>
						</div>
						<a href="{{ url('news/'.$news->id) }}">
							<p class="title">
								{{ $news->news_title }}
							</p>
						</a>
						<a href="{{ url('news/'.$news->id) }}">
							<div class="msgs">
								{!! $news->news_content !!}
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</a>
						@if(Auth::check())
						<div class="indexbtn">
							{{ method_field('DELETE') }}
							{{ csrf_field() }} 
							<button class="btn btn-danger ReButton" style="float: right;" onclick="delete_news('{{ $news->news_title }}','{{ route('news_delete', $news->id) }}')">删除</button>
							<!-- id="btn-{{$news->id}}" -->
							<form action="{{ route('news_edit', $news->id) }}" method="post">
								{{ csrf_field() }} 
								<button class="btn btn-primary" style="float: right;">修改</button>
							</form>
						</div>
						@endif
						<div class="clear"></div>
					</div>
				@endforeach
				{!! $newses->links() !!}
			</div>
		</div>
		<div class="clear"></div>
	</div>
</section>
@include('news._modals')
<script>
	function delete_news(name,route) {
		$("#delete-news-name1").html(name);
		$("#delete-news-name2").attr('action',route);
		$("#modal-news-delete").modal("show");
	}
</script>
<script>
	// $('.ReButton').click(function(){
	// 	var newsid=($(this).attr('id').replace(/btn\-/i,''));

	// 	if(confirm("确定要删除么？")){
	// 		$.ajax({
	// 			url:"/news/"+newsid,
	// 			type:'post',
	// 			success:function(){
	// 				window.location.reload();
	// 			}
	// 		})
	// 	}
	// })
</script>

@endsection