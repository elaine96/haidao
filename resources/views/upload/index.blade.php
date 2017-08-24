<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@extends('layouts.default')
@section('content')

<div class="body col-md-offset-2 col-md-8">
	<div class="container-fluid">
		<div class="row page-title-row">
			<div class="col-md-6">
				<h3 class="pull-left">上传图片(此处图片为轮播图片)</h3>
				<div class="pull-left">

				</div>
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
							<th>图片名称</th>
							<th>上传时间</th>
							<th>图片大小</th>
							<th data-sortable="false">操作</th>
						</tr>
					</thead>
					<tbody>

					@foreach ($files as $file)
						<tr>
							<td>
								<a href="{{ $file['webPath'] }}">
									@if (is_image($file['mimeType']))
									<i class="fa fa-file-image-o fa-lg fa-fw"></i>
									@else
									<i class="fa fa-file-o fa-lg fa-fw"></i>
									@endif
									{{ $file['name'] }}
								</a>
							</td>
							<td>{{ $file['modified']->format('j-M-y g:ia') }}</td>
							<td>{{ human_filesize($file['size']) }}</td>
							<td>
								<button type="button" class="btn btn-danger" onclick="delete_file('{{ $file['name'] }}')">
									删除
								</button>

								@if (is_image($file['mimeType']))
									<button type="button" class="btn btn-success" onclick="preview_image('{{ $file['webPath'] }}')">
										<i class="fa fa-eye fa-lg"></i>
										预览
									</button>
								@endif
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
	function delete_file(name) {
		$("#delete-file-name1").html(name);
		$("#delete-file-name2").val(name);
		$("#modal-file-delete").modal("show");
	}

	function preview_image(path) {
		$("#preview-image").attr("src", path);
		$("#modal-image-view").modal("show");
	}

	$(function() {
		$("#uploads-table").DataTable();
	});
</script>
@endsection