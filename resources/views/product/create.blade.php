<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@extends('layouts.default')
@section('content')


<section class="col-md-12 body">
	<div class="col-md-offset-2 col-md-8 news-box">
		<form action="{{ route('product_store') }}" method="post">
			{{ csrf_field() }}
			@include('shared.messages')
			@include('shared.errors')
			<div class="form-group pron">
				<label for="title" class="col-sm-2 control-label">
					名称
				</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="pro_name">
				</div>
			</div>
			<div class="clear"></div>
			<div class="form-group proh">
				<label for="title" class="col-sm-2 control-label">
					链接
				</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="pro_href">
					<div class="probtn">
						<a href="{{ route('product') }}"><button class="btn btn-default" type="button">取消</button></a>
						<button class="btn btn-primary">提交</button>
					</div>
				</div>
			</div>
			
		</form>
	</div>
</section>