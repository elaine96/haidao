<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@extends('layouts.default')
@section('content')

<div class="body col-md-offset-2 col-md-8">
	<div class="container-fluid">
		<div class="row page-title-row">
			@include('shared.messages')
			<div class="col-md-6">
				<h3 class="pull-left">上传图片(此处图片为轮播图片)</h3>
			</div>
			<div class="col-md-6 text-right">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-file-upload">
					<i class="fa fa-upload"></i> 上传
				</button>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">



				<table id="uploads-table" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>图片</th>
							<th>链接</th>
							<th data-sortable="false">操作</th>
						</tr>
					</thead>
					<tbody>

					@foreach($pics as $pic)
						<tr>
							<td>
								<i class="fa fa-file-image-o fa-lg fa-fw"></i>
								{{ $pic->pic_content }}
							</td>
							<td>{{ $pic->pic_href }}</td>
							<td>
								<button type="button" class="btn btn-danger" onclick="delete_file('{{ $pic->pic_content }}','{{ route('pic_delete', $pic->id) }}')">
									删除
								</button>
								<button type="button" class="btn btn-success" onclick="preview_image('/uploads/{{ $pic->pic_content }}')">
									<i class="fa fa-eye fa-lg"></i>
									预览
								</button>
								<button type="button" class="btn btn-success" onclick="modify_link('{{ $pic->pic_href }}','{{ route('pic_update', $pic->id) }}')">
									修改链接
								</button>
							</td>
						</tr>
					@endforeach
					
					<p>注：图片名称不要重复，轮播顺序按上传顺序展示，添加轮播图片请按上传按钮，请谨慎操作删除按钮</p>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@include('upload._modals')
<script>
	function delete_file(name,route) {
		$("#delete-file-name1").html(name);
		$("#delete-file-name2").val(name);
		$("#delete-file-route").attr('action',route);
		$("#modal-file-delete").modal("show");
	}

	function preview_image(path) {
		$("#preview-image").attr("src", path);
		$("#modal-image-view").modal("show");
	}

	function modify_link(name,route) {
		$("#modify-link-name").val(name);
		$("#modify-link-route").attr('action',route);
		$("#modal-modify-link").modal("show");
	}

	$(function() {
		$("#uploads-table").DataTable();
	});
</script>
@endsection