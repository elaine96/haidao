<div class="modal fade" id="modal-file-upload">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ route('upload') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="folder" value="{{ $folder }}">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						×
					</button>
					<h4 class="modal-title">上传图片</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="file" class="col-sm-3 control-label" style="margin-top: 10px;">
							文件
						</label>
						<div class="col-md-8">
							<div class="uploader white">
								<input type="text" class="filename" readonly="readonly"/>
								<input type="button"  class="button" value="浏览..."/>
								<input type="file" size="30" name="file" id="file" accept="image/*" />
							</div>
						</div>
						<p class="col-md-offset-2 col-md-8">为保证图片质量，必须上传1522*800的图片</p>
					</div>
					<input type="hidden" id="file_name" name="file_name" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						取消
					</button>
					<button type="submit" class="btn btn-primary">
						上传图片
					</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="modal-image-view">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					×
				</button>
				<h4 class="modal-title">图片预览</h4>
			</div>
			<div class="modal-body">
				<img id="preview-image" src="x" class="img-responsive">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					取消
				</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-file-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					×
				</button>
				<h4 class="modal-title">请确认</h4>
			</div>
			<div class="modal-body">
				<p class="lead">
					<i class="fa fa-question-circle fa-lg"></i>
					你确定要删除
					<kbd><span id="delete-file-name1">file</span></kbd>
					文件?
				</p>
			</div>
			<div class="modal-footer">
				<form method="POST" action="/upload/file">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="folder" value="{{ $folder }}">
					<input type="hidden" name="del_file" id="delete-file-name2">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						取消
					</button>
					<button type="submit" class="btn btn-danger">
						删除
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
$(function(){
	$("input[type=file]").change(function(){
		$(this).parents(".uploader").find(".filename").val($(this).val());
	});
	$("input[type=file]").each(function(){
		if($(this).val()==""){
			$(this).parents(".uploader").find(".filename").val("没有选择文件...");
		}
	});
});
</script>