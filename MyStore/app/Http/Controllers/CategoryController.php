<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory($parentId = 0)
    {
        $data = $this->category->all();
        $recusive = new \App\Components\Recusive($data); // Sử dụng Recusive (theo hình ảnh bạn gửi)
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function create()
    {
        $data = $this->category->all();
        $htmlOption = $this->getCategory(); // Mặc định $parentId = 0
        return view('category.add', compact('data', 'htmlOption'));
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('category.edit', compact('category', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được cập nhật!');
    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index')->with('success', 'Danh mục đã được xóa!');
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate();
        return view('category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được tạo!');
    }
}
