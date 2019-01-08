@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item">
      		<a href="/home">Blog</a>
    	</li>
    	<li class="breadcrumb-item active">Posts </li>
  	</ol>
  	@include('inc.errors')
  	<div class="card mb-3">
  		<div class="card-header">
    	    <i class="fas fa-file-invoice"></i> 
        	Postagens do Blog
    		<div class="float-right">
			  	<a class="btn btn-primary btn-sm" href="/posts/create">
				    	<i class="far fa-plus-square"></i> Adicionar
			  	</a>
            </div>
      	</div>
  		<div class="card-body">
        	<div class="table-responsive">
        		<table class="table table-bordered table-striped table-hover dataTable js-exportable" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Título</th>
                      <th>Views</th>
                      <th>Likes</th>
                      <th>Criado Em</th>
                      <th>Atualizado em</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Título</th>
                      <th>Views</th>
                      <th>Likes</th>
                      <th>Criado Em</th>
                      <th>Atualizado em</th>
                      <th>Ações</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@foreach ($posts as $post)
                  	  	<tr>
                  	  		<td>{{$post->id}}</td>
                  	  		<td>{{$post->titulo}}</td>
                          <td>{{$post->contador_views}}</td>
                  	  		<td>{{$post->likes}}</td>
                  	  		<td>{{$post->created_at->diffForHumans()}}</td>
                  	  		<td>{{$post->updated_at->diffForHumans()}}</td>
                  	  		<td class="text-center">
                  	  			<a class="btn btn-success btn-sm" href="/posts/{{$post->id}}"><i class="far fa-eye"></i> Visualizar</a>
                  	  			<a class="btn btn-warning btn-sm" href="/posts/{{$post->id}}/edit"><i class="fas fa-pen"></i> Editar</a>
                  	  			<button class="btn btn-danger btn-sm" title="Excluir tag." data-toggle="modal" data-target="#excluiModal{{$post->id}}"><i class="fa fa-trash"></i> Excluir</button>
                  	  		</td>
                  	  	</tr>
                  	@endforeach  
                  </tbody>
                </table>
        	</div>
        </div> 
    </div>
    @foreach ($posts as $post)
    <div class="modal fade" id="excluiModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="Alteração de Tipo Usuário" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Quer excluir este post?</h2>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
              </div>
            <form method="post" action="/posts/{{$post->id}}" class="px-4 py-3" enctype="multipart/form-data">
                  @csrf
                  {{ method_field('DELETE') }}
              <div class="modal-body">
                    <h1>Título: {{$post->titulo}}</h1>
                </div>
              <div class="modal-footer">
                  <button class="btn btn-primary" type="button" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
              </form>
          </div>
        </div>
    </div>
    @endforeach
</div>
@endsection