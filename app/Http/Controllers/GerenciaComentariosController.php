<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Comentario;

class GerenciaComentariosController extends Controller
{
    //
    public function index(){
    	$blog = 'active';
        $armazenamento = Storage::disk('gcs');
        $autenticado = Auth::user();
        $avatar = $armazenamento->url('users/'.$autenticado->avatar);
        $comentarios = Comentario::where('aprovado', '=', false)->get();
        return view('blog.comentarios.index', compact('blog', 'avatar', 'armazenamento', 'comentarios'));
    }

    public function aprovar($id){
    	$comentario = Comentario::find($id);
    	$comentario->aprovado = true;
    	$comentario->save();
    	return '<i class="fas fa-thumbs-up"></i> Aprovado';
    }

    public function excluir($id){
    	$comentario = Comentario::find($id);
    	$comentario->delete();
    	return '<i class="fas fa-thumbs-up"></i> Excluído';
    }
}
