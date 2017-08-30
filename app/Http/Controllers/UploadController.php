<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\UploadsManager;

use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\UploadNewFolderRequest;
use Illuminate\Support\Facades\File;

use Auth;
use App\Models\Picture;

class UploadController extends Controller
{
	protected $manager;

	public function __construct(UploadsManager $manager) {
		$this->manager = $manager;
	}

	public function index(Request $request) {
		$folder = $request->get('folder');
		$data = $this->manager->folderInfo($folder);
		$pics = Picture::all();
		if(Auth::check()) {
			return view('upload.index', compact('pics'),$data);
		} else {
			return redirect('login');
		}
	}

	public function UploadFile(UploadFileRequest $request) {
		$pic = new Picture;
		$pic->pic_href = $request->pic_href;
		$file = $_FILES['file'];
		$fileName = $request->get('file_name');
		$fileName = $fileName ?: $file['name'];
		$path = str_finish($request->get('folder'), '/').$fileName;
		$content = File::get($file['tmp_name']);
		$pic->pic_content = $fileName;
		$result = $this->manager->saveFile($path, $content);
		if ($result === true) {
			$pic->save();
			return redirect()->back()->withSuccess('图片上传成功');
		} else {
			return redirect()->back()->withDanger('图片已存在');
		}
		
	}

	public function DeleteFile(Request $request, $id) {
		$pic=Picture::findOrFail($id);
		$del_file = $request->get('del_file');
		$path = $request->get('folder').'/'.$del_file;
		$result = $this->manager->deleteFile($path);
		if ($result === true) {
			$pic->delete();
			return redirect()->back()->withSuccess('图片删除成功');
		}
		$error = $result ? : "图片删除失败";
		return redirect()->back()->withDanger([$error]);
	}

	public function update(Request $request, $id) {
		$pic = Picture::findOrFail($id);
		$pic->pic_href = $request->pic_href;
		$pic->save();
		session()->flash('success','链接修改成功');
		return redirect('upload');
	}
}
