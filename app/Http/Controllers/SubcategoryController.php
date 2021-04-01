<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function index()
    {
        //
        $subcategories = Subcategory::orderBy('id', 'desc')->paginate(15);
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        //para crear una subcateoria necesito mandar a que categoria pertenece
        $categories = Category::pluck('name', 'id');
        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:subcategories|max:20',
        ]);

        $subcategory = new Subcategory;

        // generate slug
        $subcategory->category_id = e($request->category_id);
        $subcategory->name = e($request->name);
        $subcategory->slug = Str::slug($request->name);

        $subcategory->save();

        return redirect()->route('subcategories.index')->with('info', 'Agregado correctamente');
    }

    public function show(Subcategory $category)
    {
        //
    }

    public function edit($id)
    {
        $subcategory = Subcategory::where('id', $id)->firstOrFail();

        // para el select de la tabla categoria
        $categories = Category::pluck('name', 'id');
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:20',
        ]);

        $subcategory = Subcategory::findOrFail($id);
        $subcategory->name = e($request->name);
        $subcategory->slug = Str::slug($request->name);

        $subcategory->save();

        return redirect()->route('subcategories.index')->with('info', 'Actualizado correctamente');
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id)->delete();
        return redirect()->route('subcategories.index')->with('info', 'Eliminado correctamente');
    }
}
