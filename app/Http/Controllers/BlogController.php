<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Str;
use App\Posts;
use App\TagsBlog;
use App\CategoriasBlog;
use App\User;
use App\Comentario;
use Carbon\Carbon;

class BlogController extends Controller
{
    //
    public function index(){
    	$posts = Posts::latest()->paginate(5);
    	$armazenamento = Storage::disk('gcs');
    	$autores = new User;
    	$categorias = CategoriasBlog::get();
    	$tags = TagsBlog::get();
    	return view('blog.public.index', compact('posts', 'armazenamento', 'autores', 'categorias', 'tags'));
    }

    public function postview($id){
    	$post = Posts::find($id);
    	$armazenamento = Storage::disk('gcs');
    	$autores = new User;
    	$categorias = CategoriasBlog::get();
    	$tags = TagsBlog::get();
    	$post->contador_views++;
    	$post->save();
        $comentarios = Comentario::where('id_post', '=', $post->id)->where('aprovado', '=', true)->get();
    	return view('blog.public.post', compact('post', 'armazenamento', 'autores', 'categorias', 'tags', 'comentarios'));
    }

    public function like($id){
    	$post = Posts::find($id);
    	$post->likes++;
    	$post->save();
    	return '<i class="fas fa-thumbs-up"></i> '.$post->likes." Curtidas";
    }

    public function categoria($id){
    	$categoria_esc = CategoriasBlog::find($id);
    	$posts = Posts::join('posts_categories', 'posts.id', '=', 'posts_categories.id_post')->select('posts.*')->where('id_categoria', '=', $id)->latest()->paginate(5);
    	$armazenamento = Storage::disk('gcs');
    	$autores = new User;
    	$categorias = CategoriasBlog::get();
    	$tags = TagsBlog::get();
    	return view('blog.public.categorias', compact('posts', 'armazenamento', 'autores', 'categorias', 'tags', 'categoria_esc'));
    }

    public function tag($id){
    	$tag_esc = TagsBlog::find($id);
    	$posts = Posts::join('posts_tags', 'posts.id', '=', 'posts_tags.id_post')->select('posts.*')->where('id_tag', '=', $id)->latest()->paginate(5);
    	$armazenamento = Storage::disk('gcs');
    	$autores = new User;
    	$categorias = CategoriasBlog::get();
    	$tags = TagsBlog::get();
    	return view('blog.public.tags', compact('posts', 'armazenamento', 'autores', 'categorias', 'tags', 'tag_esc'));
    }

    public function pesquisaNome(Request $request){
    	$posts = Posts::where('titulo', 'like', '%'.$request->nome.'%')->orwhere('body', 'like', '%'.$request->nome.'%')->latest()->paginate(5);
    	$armazenamento = Storage::disk('gcs');
    	$autores = new User;
    	$categorias = CategoriasBlog::get();
    	$tags = TagsBlog::get();
    	return view('blog.public.index', compact('posts', 'armazenamento', 'autores', 'categorias', 'tags'));
    }
}
