<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\UploadsManager;

use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\UploadNewFolderRequest;
use Illuminate\Support\Facades\File;

use Auth;

class UploadController extends Controller
{
	protected $manager;

	public function __construct(UploadsManager $manager) {
		$this->manager = $manager;
	}

	public function index(Request $request) {
		$folder = $request->get('folder');
		$data = $this->manager->folderInfo($folder);
		if(Auth::check()) {
			return view('upload.index', $data);
		} else {
			return redirect('login');
		}
	}

	public function UploadFile(UploadFileRequest $request) {
		$file = $_FILES['file'];
		$fileName = $request->get('file_name');
		$fileName = $fileName ?: $file['name'];
		$path = str_finish($request->get('folder'), '/').$fileName;
		$content = File::get($file['tmp_name']);
		$result = $this->manager->saveFile($path, $content);
		if ($result === true) {
			return redirect()->back()->withSuccess('图片上传成功');
		}
		$error = $result ? : "图片上传失败";
		return redirect()->back()->withErrors([$error]);
	}

	public function DeleteFile(Request $request) {
		$del_file = $request->get('del_file');
		$path = $request->get('folder').'/'.$del_file;
		$result = $this->manager->deleteFile($path);
		if ($result === true) {
			return redirect()->back()->withSuccess('图片删除成功');
		}
		$error = $result ? : "图片删除失败";
		return redirect()->back()->withErrors([$error]);
	}
}
