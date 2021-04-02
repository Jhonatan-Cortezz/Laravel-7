<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        //
        $tags = Tag::orderBy('id', 'desc')->paginate(15);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        //
        $categories = Category::pluck('name', 'id');
        return view('admin.tags.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:tags|max:20',
        ]);

        $tag = new Tag;

        // generate slug
        $tag->name = e($request->name);
        $tag->category_id = e($request->category_id);
        $tag->slug = Str::slug($request->name);

        $tag->save();

        return redirect()->route('tags.index')->with('info', 'Agregado correctamente');
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit($id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        $categories = Category::pluck('name', 'id');
        return view('admin.tags.edit', compact('tag', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:20',
        ]);

        $tag = Tag::findOrFail($id);
        $tag->name = e($request->name);
        $tag->category_id = e($request->category_id);
        $tag->slug = Str::slug($request->name);

        $tag->save();

        return redirect()->route('tags.index')->with('info', 'Actualizado correctamente');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id)->delete();
        return redirect()->route('tags.index')->with('info', 'Eliminado correctamente');
    }
}
