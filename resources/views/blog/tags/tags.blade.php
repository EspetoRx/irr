@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item">
      		<a href="/home">Blog</a>
    	</li>
    	<li class="breadcrumb-item active">Tags </li>
  	</ol>
  	@include('inc.errors')
  	<div class="card mb-3">
        <div class="card-header">
    	    <i class="fas fa-hashtag"></i>
        	Tags do Blog
    		<div class="float-right">
              	<div class="dropleft">
				  	<button class="btn btn-primary btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    	<i class="far fa-plus-square"></i> Adicionar
				  	</button>
				    <div class="dropdown-menu">
					  	<form method="post" action="/tags_blog" class="px-4 py-3"  enctype="multipart/form-data">
					  		@csrf
            				<p class="dropdown-header" style="color:black">Adicionar Tag do Blog</p>
            				<div class="dropdown-divider"></div>
						    <div class="form-group">
						      <label for="Nome">Nome</label>
						      <input type="text" class="form-control" id="Nome" name="Nome" placeholder="Nome da tag.">
						    </div>
					    	<div class="form-group text-center">
					      		<button type="submit" class="btn btn-success">Adicionar</button>
					    	</div>
					  	</form>
					</div>
				</div>
            </div>
      	</div>
        <div class="card-body">
        	<div class="table-responsive">
        		<table class="table table-bordered table-striped table-hover dataTable js-exportable" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Criado Em</th>
                      <th>Atualizado em</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Criado Em</th>
                      <th>Atualizado em</th>
                      <th>Ações</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@foreach ($tags as $tag)
                  	  	<tr>
                  	  		<td>{{$tag->id}}</td>
                  	  		<td>{{$tag->name}}</td>
                  	  		<td>{{$tag->created_at->diffForHumans()}}</td>
                  	  		<td>{{$tag->updated_at->diffForHumans()}}</td>
                  	  		<td class="text-center">
                  	  			<button class="btn btn-warning btn-sm" title="Editar tag." data-toggle="modal" data-target="#alteraTag{{$tag->id}}"><i class="fas fa-pen"></i> Editar</button>
                  	  			<button class="btn btn-danger btn-sm" title="Excluir tag." data-toggle="modal" data-target="#excluiTag{{$tag->id}}"><i class="fa fa-trash"></i> Excluir</button>
                  	  		</td>
                  	  	</tr>
                  	@endforeach  
                  </tbody>
                </table>
        	</div>
        </div>    
    </div>
    @foreach ($tags as $tag)
    	<div class="modal fade" id="alteraTag{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="Alteração de Tipo Usuário" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title" id="exampleModalLabel">Alterar Tag do Blog</h2>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
						</button>
					</div>
					<form method="post" action="/tags_blog/{{$tag->id}}" class="px-4 py-3" id="altera_tag{{$tag->id}}" enctype="multipart/form-data">
						@csrf
						{{ method_field('PATCH') }}
						<div class="modal-body">
							<div class="form-group">
								<label for="Nome">Nome</label>
								<input type="text" class="form-control" id="Nome" name="Nome" value="{{$tag->name}}">
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-warning" type="button" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-success">Alterar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="excluiTag{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="Alteração de Tipo Usuário" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title" id="exampleModalLabel">Excluir Tag do Blog</h2>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
						</button>
					</div>
					<form method="post" action="/tags_blog/{{$tag->id}}" class="px-4 py-3" id="altera_tag{{$tag->id}}" enctype="multipart/form-data">
						@csrf
						{{ method_field('DELETE') }}
						<div class="modal-body">
							<div class="form-group">
								<label for="Nome">Nome</label>
								<input type="text" class="form-control" id="Nome" name="Nome" value="{{$tag->name}}" disabled="true">
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-warning" type="button" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-danger">Excluir</button>
						</div>
					</form>
				</div>
			</div>
		</div>
    @endforeach
</div>
@endsection