<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }



    public function store(CategoryRequest $request)
    {
        $category = $request->only('name');
        Category::create($category);
        return redirect('/categories')->with('message', 'カテゴリを作成しました');
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->input('name')
        ]);
        return redirect('/categories')->with('message', 'カテゴリを更新しました');
    }

    public function destroy(Request $request, $id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/categories')->with('message', 'カテゴリを削除しました');
    }
}
