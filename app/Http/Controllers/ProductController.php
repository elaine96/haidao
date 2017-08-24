<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\Product;

class ProductController extends Controller
{
	public function index() {
		$products = Product::orderBy('id', 'desc')->paginate(8);
		return view('product.index', compact('products'));
	}

	public function create() {
		if(Auth::check()) {
			return view('product.create');
		} else {
			return redirect('login');
		}
	}

	public function store(Request $request) {
		$product = new Product;
		$product->pro_name = $request->pro_name;
		$product->pro_href = $request->pro_href;
		if ($product->pro_name != null && $product->pro_href != null) {
			$product->save();
			session()->flash('info','产品添加成功');
			return redirect('product');
		} else {
			session()->flash('danger','名称和链接不能为空');
			return redirect('product_create');
		}
	}

	public function edit($id) {
		if (Auth::check()) {
			$product = Product::findOrFail($id);
			return view('product.edit', compact('product'));
		} else {
			return redirect('login');
		}
	}

	public function update($id, Request $request) {
		$product = Product::findOrFail($id);
		$product->pro_name = $request->pro_name;
		$product->pro_href = $request->pro_href;
		if ($product->pro_name != null && $product->pro_href != null) {
			$product->save();
			session()->flash('info','产品修改成功');
			return redirect('product');
		} else {
			session()->flash('danger','名称和链接不能为空');
			return redirect('product_create');
		}
	}

	public function destroy($id) {
		$product = Product::findOrFail($id);
		$product->delete();
		session()->flash('info','产品删除成功!');
		return redirect('product');
	}
}
