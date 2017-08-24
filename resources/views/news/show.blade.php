<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@extends('layouts.default')
@section('content')

@include('shared.messages')
<div class="body col-md-12">
	<div class="col-md-offset-3 col-md-6">
		<h1>{{$news->news_title}}</h1>
		<div class="content">{!! $news->news_content !!}</div>
		
		@if(Auth::check())
		<div class="clear"></div>
		
		@endif
	</div>
</div>

@endsection