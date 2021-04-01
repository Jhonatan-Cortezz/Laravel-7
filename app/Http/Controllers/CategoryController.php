<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        //
        $categories = Category::orderBy('id', 'desc')->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        //
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories|max:20',
            'module'=>'required|max:20'
        ]);

        $category = new Category;

        // generate slug
        $category->name = e($request->name);
        $category->module = e($request->module);
        $category->slug = Str::slug($request->name);

        $category->save();

        return redirect()->route('categories.index')->with('info', 'Agregado correctamente');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:20',
            'module'=>'required|max:20'
        ]);

        $category = Category::findOrFail($id);
        $category->name = e($request->name);
        $category->module = e($request->module);
        $category->slug = Str::slug($request->name);

        $category->save();

        return redirect()->route('categories.index')->with('info', 'Actualizado correctamente');
    }

    public function destroy(Category $category)
    {
        //
    }
}
