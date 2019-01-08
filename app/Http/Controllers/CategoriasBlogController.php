<?php

namespace App\Http\Controllers;

use App\CategoriasBlog;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;

class CategoriasBlogController extends Controller
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
        $categorias = CategoriasBlog::paginate(6);
        $pagination_status = "Mostrando de ".$categorias->firstItem()." a ".$categorias->lastItem()." de um total de ".$categorias->total()." entradas.";
        return view('blog.categorias.show_categorias', compact('blog', 'avatar', 'armazenamento', 'categorias', 'pagination_status', 'armazenamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $validatedData = $request->validate([
            'Nome' => 'required|min:3|max:254',
            'Slug' => 'required|min:3|max:254',

        ]);

        $novo = new CategoriasBlog;
        $novo->name = $request->Nome;
        $novo->slug = $request->Slug;

        if($request->hasFile('image')&&$request->file('image')->isValid()){
            $armazenamento = Storage::disk('gcs');
            $imagem = $request->file('image');
            $name = 'categoriasblog'.time().'.'.$imagem->getClientOriginalExtension();
            $photo = Image::make($imagem)->resize(300, 300, function($constraint){
                $constraint->aspectRatio();
            });
            $saved_img_uri = $photo->dirname.'/'.$photo->basename;
            $upload = $armazenamento->putFileAs('categorias/', new File($saved_img_uri), $name,'public');
            $novo->image = $name;
            $photo->destroy();
            unlink($saved_img_uri);

        }

        $novo->save();

        $insert_success = ['Categoria inserida com sucesso.'];
        return redirect('/categorias_blog')->with('insert_success', $insert_success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SPGSW\CategoriasBlog  $categoriasBlog
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriasBlog $categoriasBlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SPGSW\CategoriasBlog  $categoriasBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriasBlog $categoriasBlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SPGSW\CategoriasBlog  $categoriasBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoriasBlog)
    {
        //
        $novo = CategoriasBlog::find($categoriasBlog);
        
        if($request->Nome != $novo->name){
            $validatedData = $request->validate([
                'Nome' => 'required|min:3|max:254|unique:categorias_blogs,name',
                'Slug' => 'required|min:3|max:254',

            ]);
        }else{
            $validatedData = $request->validate([
                'Nome' => 'required|min:3|max:254',
                'Slug' => 'required|min:3|max:254',

            ]);
        }
        
        $novo->name = $request->Nome;
        $novo->slug = $request->Slug;

        if($request->hasFile('image_cat')&&$request->file('image_cat')->isValid()){
            $armazenamento = Storage::disk('gcs');
            $imagem = $request->file('image_cat');
            $name = 'categoriasblog'.time().'.'.$imagem->getClientOriginalExtension();
            $photo = Image::make($imagem)->resize(300, 300, function($constraint){
                $constraint->aspectRatio();
            });
            $saved_img_uri = $photo->dirname.'/'.$photo->basename;
            $upload = $armazenamento->putFileAs('categorias/', new File($saved_img_uri), $name,'public');
            $novo->image = $name;
            $photo->destroy();
            unlink($saved_img_uri);

        }

        $novo->save();

        $insert_success = ['Categoria alterada com sucesso.'];
        return redirect('/categorias_blog')->with('insert_success', $insert_success);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SPGSW\CategoriasBlog  $categoriasBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoriasBlog)
    {
        //
        $novo = CategoriasBlog::find($categoriasBlog);
        $novo->delete();
        $insert_success = ['Categoria removida com sucesso.'];
        return redirect('/categorias_blog')->with('insert_success', $insert_success);
    }

    public function achar(Request $request){
        $categorias = CategoriasBlog::where('name', 'LIKE', $request->procura_categoria)->orwhere('slug', 'LIKE', $request->procura_categoria)->paginate(6);
        $blog = 'active';
        $armazenamento = Storage::disk('gcs');
        $autenticado = Auth::user();
        $avatar = $armazenamento->url('users/'.$autenticado->avatar);
        $pagination_status = "Mostrando de ".$categorias->firstItem()." a ".$categorias->lastItem()." de um total de ".$categorias->total()." entradas.";
        return view('blog.categorias.show_categorias', compact('blog', 'avatar', 'armazenamento', 'categorias', 'pagination_status', 'armazenamento'));
    }
}
