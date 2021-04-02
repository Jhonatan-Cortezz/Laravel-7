<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        //
        $posts = Post::orderBy('id', 'desc')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        //para crear una subcateoria necesito mandar a que categoria pertenece
        $categories = Category::pluck('name', 'id');
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:post|max:60',
            'slug'=>'required|unique:post|max:20',
            'user_id'=>'required|integer',
            'category_id'=>'required',
            'abstract'=>'required|max:500',
            'body'=>'required',
            'status'=>'required|intege',
            'image'=>'image|dimensions:min_width=1200,max_width=1200,min_height=490,max_height=490|mimes:jpeg,jpg,png',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nombre = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta, $nombre);

            $urlImage = '/images/'.$nombre;
        }
        $post = new Post;
        // generate slug
        $post->user_id = e($request->user_id);
        $post->category_id = e($request->category_id);
        $post->name = e($request->name);
        $post->slug = Str::slug($request->name);
        $post->abstract = e($request->abstract);
        $post->body = e($request->body);
        $post->status = e($request->status);

        $post->save();
        $post->image()->create($urlImage);
        return redirect()->route('posts.index')->with('info', 'Agregado correctamente');
    }

    public function show(Post $category)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->firstOrFail();

        // para el select de la tabla categoria
        $categories = Category::pluck('name', 'id');
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:60',
            'slug'=>'required|max:20',
            'user_id'=>'required|integer',
            'category_id'=>'required',
            'abstract'=>'required|max:500',
            'body'=>'required',
            'status'=>'required|intege',
            'image'=>'image|dimensions:min_width=1200,max_width=1200,min_height=490,max_height=490|mimes:jpeg,jpg,png',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nombre = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta, $nombre);

            $urlImage = '/images/'.$nombre;
        }

        $post = Post::findOrFail($id);
        $post->user_id = e($request->user_id);
        $post->category_id = e($request->category_id);
        $post->name = e($request->name);
        $post->slug = Str::slug($request->name);
        $post->abstract = e($request->abstract);
        $post->body = e($request->body);
        $post->status = e($request->status);

        $post->save();
        $post->image()->create($urlImage);
        return redirect()->route('posts.index')->with('info', 'Actualizado correctamente');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id)->delete();
        return redirect()->route('posts.index')->with('info', 'Eliminado correctamente');
    }
}
