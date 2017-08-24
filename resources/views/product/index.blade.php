<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@extends('layouts.default')
@section('content')


<section class="col-md-12 body">
	<div class="col-md-offset-2 col-md-8 nindex">
		@include('shared.messages')
		<div id="prototal">
			<h3>产品展示 <span>/Product</span></h3>
			@if(Auth::check())
				<a href="{{ route('product_create') }}"><button class="btn btn-primary">添加产品</button></a>
			@endif
			@foreach($products as $product)
			<div class="clear"></div>
			<div class="pro-box">
				<p><a href="{{ $product->pro_href }}" target="_blank">{{ $product->pro_name }}</a></p>
				<p>{{ $product->pro_href }}</p>
				@if(Auth::check())
				<button class="btn btn-danger" onclick="delete_product('{{ $product->pro_name }}','{{ route('product_delete', $product->id) }}')" style="float: right;">删除</button>
				<form action="{{ route('product_edit', $product->id) }}" method="post">
					{{ csrf_field() }} 
					<button class="btn btn-primary" style="float: right;">修改</button>
				</form>
				@endif
				<div class="clear"></div>
			</div>
				
			@endforeach
			</div>
		</div>
	</div>
</section>
@include('product._modals')
<script>
	function delete_product(name,route) {
		$("#delete-product-name1").html(name);
		$("#delete-product-name2").attr('action',route);
		$("#modal-product-delete").modal("show");
	}
</script>
@endsection