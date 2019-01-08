<?php

use App\Posts;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$posts = Posts::orderBy('created_at', 'desc')->take(2)->get();
	$armazenamento = Storage::disk('gcs');
	//dd($posts);
    return view('welcome', compact('posts', 'armazenamento'));
});

Auth::routes();

Route::match(['get', 'post'], 'register', function(){
    return abort(404);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth']], function(){

	Route::resource('categorias_blog', 'CategoriasBlogController');
	Route::post('achaCategoria', 'CategoriasBlogController@achar');
	Route::resource('tags_blog', 'TagsBlogController');
	Route::resource('posts', 'PostsController');
	Route::post('post_preview', 'PostsController@preview');
	Route::get('comentarios', 'GerenciaComentariosController@index');
	Route::get('comentarios/{id}/aprovar', 'GerenciaComentariosController@aprovar');
	Route::get('comentarios/{id}/excluir', 'GerenciaComentariosController@excluir');
	Route::resource('users', 'UserController');

});

Route::get('/blog', 'BlogController@index');
Route::get('/blog/post/{id}', 'BlogController@postview');
Route::get('/blog/post/{id}/like', 'BlogController@like');
Route::get('/blog/categoria/{id}', 'BlogController@categoria');
Route::get('/blog/tag/{id}', 'BlogController@tag');
Route::post('/blog/search', 'BlogController@pesquisaNome');
Route::resource('/comentario', "ComentarioController");
Route::post('/contato', 'ContatoController@sendContactMail');