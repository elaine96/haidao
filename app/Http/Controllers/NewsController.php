<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\News;
use App\Models\Product;
use App\Models\Picture;
use App\Providers\UploadsManager;
class NewsController extends Controller
{
	protected $manager;

	public function __construct(UploadsManager $manager)
	{
		$this->manager = $manager;
	}

	public function home(Request $request) {
		$newses = News::orderBy('id', 'desc')->paginate(4);
		$products = Product::all();
		$pictures = Picture::all();
		$folder = $request->get('folder');
		$data = $this->manager->folderInfo($folder);
		return view('home',compact('newses','products','pictures'),$data);
	}

	public function index() {
		$newses = News::orderBy('id', 'desc')->paginate(4);
		$products = Product::all();
		return view('news.index',compact('newses','products'));
	}

	public function create() {
		if(Auth::check()) {
			return view('news.create');
		} else {
			return redirect('login');
		}
	}

	public function store(Request $request) {
		$news = new News;
		$news->news_title = $request->news_title;
		$news->news_content = $request->news_content;
		if ($news->news_title != null && $news->news_content != null) {
			if (News::where(['news_title'=> $news->news_title])->first()) {
				session()->flash('danger','新闻已经存在');
				return redirect('news_create');
			} else {
				$news->save();
				$newses = News::all();
				session()->flash('info','新闻添加成功');
				return redirect('news');
			}
			
		} else {
			session()->flash('danger','标题和内容不能为空');
			return redirect('news_create');
		}
	}

	public function show($id) {
		$news = News::findOrFail($id);
		$products = Product::all();
		return view('news/show',compact('news', 'products'));
	}

	public function edit($id) {
		if(Auth::check()) {
			$news = News::findOrFail($id);
			return view('news/edit',compact('news'));
		} else {
			return redirect('login');
		}
	}

	public function update(Request $request, $id) {
		$news = News::findOrFail($id);
		$news->news_title = $request->news_title;
		$news->news_content = $request->news_content;
		if ($news->news_title != null && $news->news_content != null) {
			$news->save();
			$newses = News::all();
			session()->flash('info','新闻修改成功');
			return redirect('news');
		} else {
			session()->flash('danger','标题和内容不能为空');
			return redirect('news_edit');
		}
	}

	public function destroy($id) {
		$news=News::findOrFail($id);
		$news->delete();
		session()->flash('info','新闻删除成功!');
		return redirect('news');
	}
}
