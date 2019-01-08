<?php

namespace App\Http\Controllers;

use App\TagsBlog;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;

class TagsBlogController extends Controller
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
        $tags = TagsBlog::get();
        return view('blog.tags.tags', compact('blog', 'avatar', 'armazenamento', 'tags'));
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
        $new = new TagsBlog;
        $validatedData = $request->validate([
            'Nome' => 'min:3|unique:tags_blogs,name'
        ]);
        $new->name = $request->Nome;
        $new->save();
        $insert_success = ['Tag inserida com sucesso. =}'];
        return redirect('/tags_blog')->with('insert_success', $insert_success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \SPGSW\TagsBlog  $tagsBlog
     * @return \Illuminate\Http\Response
     */
    public function show(TagsBlog $tagsBlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SPGSW\TagsBlog  $tagsBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(TagsBlog $tagsBlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SPGSW\TagsBlog  $tagsBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tagsBlog)
    {
        //
        $new = TagsBlog::find($tagsBlog);
        $validatedData = $request->validate([
            'Nome' => 'min:3|unique:tags_blogs,name'
        ]);
        $new->name = $request->Nome;
        $new->save();
        $insert_success = ['Tag alterada com sucesso. =}'];
        return redirect('/tags_blog')->with('insert_success', $insert_success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SPGSW\TagsBlog  $tagsBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy($tagsBlog)
    {
        //
        $new = TagsBlog::find($tagsBlog);
        $new->delete();
        $insert_success = ['Tag excluída com sucesso. =}'];
        return redirect('/tags_blog')->with('insert_success', $insert_success);
    }
}
