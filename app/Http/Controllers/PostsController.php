<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;
use DB;
use Carbon\Carbon;
use App\CategoriasBlog;
use App\TagsBlog;
use App\User;
use App\Comentario;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $blog = 'active';
        $armazenamento = Storage::disk('gcs');
        $autenticado = Auth::user();
        $avatar = $armazenamento->url('users/'.$autenticado->avatar);
        $categorias = CategoriasBlog::get();
        $tags = TagsBlog::get();
        $posts = Posts::get();
        return view('blog.posts.index', compact('blog', 'avatar', 'armazenamento', 'categorias', 'tags', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $blog = 'active';
        $armazenamento = Storage::disk('gcs');
        $autenticado = Auth::user();
        $avatar = $armazenamento->url('users/'.$autenticado->avatar);
        $categorias = CategoriasBlog::get();
        $tags = TagsBlog::get();
        return view('blog.posts.adc_post', compact('blog', 'avatar', 'armazenamento', 'categorias', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $armazenamento = Storage::disk('gcs');
        $validatedData = $request->validate([
            'Título' => 'required|min:3',
            'midia' => 'required',
            'categorias' => 'required|min:1',
            'tags' => 'required|min:1',
            'texto' => 'required',
        ]);

        if($request->midia == '1'){
            if($request->hasFile('photo')&&$request->file('photo')->isValid()){
                $imagem = $request->photo;
                $name = 'post'.time().'.'.$imagem->getClientOriginalExtension();
                $upload = $armazenamento->putFileAs('blog/', $imagem, $name, ['visibility' => 'public']);
                $fullURL = 'blog/'.$name;
            }
        }else if($request->midia == '2'){
            if ($request->video != '') {
                $validatedData = $request->validate([
                    'video' => 'required|url',
                ]);
                $fullURL = $request->video;
            }            
        }

        $texto_conteudo = $request->texto;

        $dom = new \DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->loadHtml( utf8_decode($texto_conteudo), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $texto_conteudo = $dom->savehtml($dom->documentElement);

        $post = new Posts;
        $post->titulo = $request->Título;
        $post->midia = $request->midia;
        if($request->midia == 1 || $request->midia == 2){
            $post->media_file = $fullURL;
        }
        $post->body = $texto_conteudo;
        $post->save();

        $categorias = $request->categorias;
        foreach($categorias as $categoria){
            DB::table('posts_categories')->insert(
                ['id_post' => $post->id, 'id_categoria' => $categoria]
            );
        }

        $tags = $request->tags;
        foreach($tags as $tag){
            DB::table('posts_tags')->insert(
                ['id_post' => $post->id, 'id_tag' => $tag]
            );
        }

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SPGSW\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($posts)
    {
        //
        $blog = 'active';
        $armazenamento = Storage::disk('gcs');
        $autenticado = Auth::user();
        $avatar = $armazenamento->url('users/'.$autenticado->avatar);
        $categorias = CategoriasBlog::get();
        $tags = TagsBlog::get();
        $post = Posts::find($posts);
        $categorias_escolhidas = DB::table('posts_categories')->where('id_post', '=', $post->id)->get();
        $tags_escolhidas = DB::table('posts_tags')->where('id_post', '=', $post->id)->get();
        //dd($categorias_escolhidas);
        $categoria = new CategoriasBlog;
        $tag = new TagsBlog;
        $comentarios = Comentario::where('id_post', '=', $post->id)->where('aprovado', '=', true)->get();
        return view('blog.posts.post_view', compact('blog', 'avatar', 'armazenamento', 'categorias', 'tags', 'post', 'categorias_escolhidas', 'categoria', 'tags_escolhidas', 'tag', 'comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SPGSW\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($posts)
    {
        //
        $blog = 'active';
        $armazenamento = Storage::disk('gcs');
        $autenticado = Auth::user();
        $avatar = $armazenamento->url('users/'.$autenticado->avatar);
        $categorias = CategoriasBlog::get();
        $tags = TagsBlog::get();
        $post = Posts::find($posts);
        $categorias_escolhidas = DB::table('posts_categories')->where('id_post', '=', $post->id)->get();
        $tags_escolhidas = DB::table('posts_tags')->where('id_post', '=', $post->id)->get();
        //dd($categorias_escolhidas);
        $categoria = new CategoriasBlog;
        $tag = new TagsBlog;
        return view('blog.posts.post_edit', compact('blog', 'avatar', 'armazenamento', 'categorias', 'tags', 'post', 'categorias_escolhidas', 'categoria', 'tags_escolhidas', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SPGSW\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $posts)
    {
        //
        $armazenamento = Storage::disk('gcs');
        $validatedData = $request->validate([
            'Título' => 'required|min:3',
            'midia' => 'required',
            'categorias' => 'required|min:1',
            'tags' => 'required|min:1',
            'texto' => 'required',
        ]);
        $post = Posts::find($posts);
        if($request->midia == '1'){
            if($request->hasFile('photo')&&$request->file('photo')->isValid()){
                $imagem = $request->photo;
                $name = 'post'.time().'.'.$imagem->getClientOriginalExtension();
                $upload = $armazenamento->putFileAs('blog/', $imagem, $name, ['visibility' => 'public']);
                $fullURL = 'blog/'.$name;
            }else{
                $fullURL = $post->media_file;
            }
        }else if($request->midia == '2'){
            if ($request->video != '') {
                $validatedData = $request->validate([
                    'video' => 'required|url',
                ]);
                $fullURL = $request->video;
            }            
        }

        $texto_conteudo = $request->texto;

        $dom = new \DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->loadHtml( utf8_decode($texto_conteudo), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $texto_conteudo = $dom->savehtml($dom->documentElement);

        
        $post->titulo = $request->Título;
        $post->midia = $request->midia;
        if($request->midia == 1 || $request->midia == 2){
            $post->media_file = $fullURL;
        }
        $post->body = $texto_conteudo;
        $post->save();

        DB::table('posts_categories')->where('id_post', '=', $post->id)->delete();

        $categorias = $request->categorias;
        foreach($categorias as $categoria){
            DB::table('posts_categories')->insert(
                ['id_post' => $post->id, 'id_categoria' => $categoria]
            );
        }

        DB::table('posts_tags')->where('id_post', '=', $post->id)->delete();

        $tags = $request->tags;
        foreach($tags as $tag){
            DB::table('posts_tags')->insert(
                ['id_post' => $post->id, 'id_tag' => $tag]
            );
        }

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SPGSW\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($posts)
    {
        //
        $post = Posts::find($posts);
        DB::table('posts_categories')->where('id_post', '=', $post->id)->delete();
        DB::table('posts_tags')->where('id_post', '=', $post->id)->delete();
        $post->delete();
        return redirect('/posts');
        
    }

    public function preview(Request $request)
    {
        //
        $armazenamento = Storage::disk('gcs');
        $validatedData = $request->validate([
            'Título' => 'required|min:3',
            'midia' => 'required',
            'texto' => 'required'
        ]);

        $titulo = $request->Título;
        if($request->midia == '0'){
            $return_midia = 0;
        }else if($request->midia == '1'){
            $return_midia = 1;
            if($request->hasFile('photo')&&$request->file('photo')->isValid()){
                $imagem = $request->photo;
                $name = 'temp'.time().'.'.$imagem->getClientOriginalExtension();
                $upload = $armazenamento->putFileAs('temp/', $imagem, $name, ['visibility' => 'public']);
                $fullURL = 'temp/'.$name;
            }else{
                $return_midia = 0;
                $fullURL = null;
            }
        }else if($request->midia == '2'){
            if ($request->video != '') {
                $return_midia = 2;
                $fullURL = $request->video;
            }else{
                $return_midia = 0;
            }
            
        }

        $texto_conteudo = $request->texto;

        $dom = new \DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->loadHtml( utf8_decode($texto_conteudo), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $texto_conteudo = $dom->savehtml($dom->documentElement);

        $categorias_escolhidas = $request->get('categorias');
        $categorias = new CategoriasBlog;
        $tags_escolhidas = $request->get('tags');
        $tags = new TagsBlog;

        return view('blog.posts.post_preview', compact('titulo', 'return_midia', 'armazenamento', 'fullURL', 'texto_conteudo', 'categorias', 'categorias_escolhidas', 'tags_escolhidas', 'tags'));
    }
}
