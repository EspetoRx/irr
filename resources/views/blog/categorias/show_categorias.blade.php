@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item">
      		<a href="/home">Blog</a>
    	</li>
    	<li class="breadcrumb-item active">Categorias 
				<a class="dropdown" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <i class="fa fa-search"></i>
				</a>

				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
				    <form method="post" action="/achaCategoria" class="px-4 py-3">
				    	@csrf
				    	<div class="form-group">
				    		<label for="procura_categoria">Categoria</label>
				    		<div class="input-group">
				    			<input type="text" name="procura_categoria" class="form-control" id="procura_categoria">
				    			<div class="input-group-append">
				    				<button class="btn btn-primary" type="submit">
				    					<i class="fas fa-search"></i>
				    				</button>
				    			</div>
				    		</div>
				    	</div>
				    </form>
				</div>
    	</li>
  	</ol>
  	@include('inc.errors')
  	<div class="card mb-3">
        <div class="card-header">
    	    <i class="fa fa-gem"></i>
        	Categorias do Blog
    		<div class="float-right">
              	<div class="dropleft">
				  	<button class="btn btn-primary btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    	<i class="far fa-plus-square"></i> Adicionar
				  	</button>
				    <div class="dropdown-menu">
					  	<form method="post" action="/categorias_blog" class="px-4 py-3" id="adiciona-user" enctype="multipart/form-data">
					  		@csrf
            				<p class="dropdown-header" style="color:black">Adicionar Categoria do Blog</p>
            				<div class="dropdown-divider"></div>
						    <div class="form-group">
						      <label for="Nome">Nome</label>
						      <input type="text" class="form-control" id="Nome" name="Nome" placeholder="Nome da categoria.">
						    </div>
						    <div class="form-group">
						      <label for="Slug">Slug</label>
						      <input type="text" class="form-control" id="Slug" name="Slug" placeholder="Texto inspirativo da categoria.">
						    </div>
						    <div class="form-group text-center">
						      <label for="image" class="btn btn-secondary" id="btn-img-id"><i class="fa fa-camera-retro"></i> Imagem</label>
						      <input type="file" class="form-control" id="image" name="image" style="display: none;" onchange="readURL2(this)" accept="image/*">
						    </div>
					    	<div class="form-group text-center">
					      		<button type="submit" class="btn btn-primary">Adicionar</button>
					    	</div>
					  	</form>
					</div>
				</div>
            </div>
      	</div>
            <div class="card-body">
              	<div class="row">
              		@foreach ($categorias as $categoria)
              			<div class="col-xl-4 col-sm-6 mb-3">
				      		<div class="card o-hidden h-100">
				      			<img class="card-img-top" src="{{$armazenamento->url('categorias/'.$categoria->image)}}">
					      		<div class="card-header">
					      			<h1>{{$categoria->name}}</h1>
					      		</div>
					        	<div class="card-body text-center">
					          		{{$categoria->slug}}
					        	</div>
					        	<div class="card-footer clearfix small z-1">
					        		<button class="btn btn-danger btn-sm" type="button" data-placement="right" title="Excluir categoria." data-toggle="modal" data-target="#excluiModal{{$categoria->id}}">
									    <i class="fa fa-trash"></i> Excluir
								  	</button>
								  	<button class="btn btn-warning btn-sm" type="button" data-placement="right" title="Excluir categoria." data-toggle="modal" data-target="#alteraModal{{$categoria->id}}">
									    <i class="fas fa-pen"></i> Editar
								  	</button>
					        	</div>
					      	</div>
					    </div>
				    	<div class="modal fade" id="alteraModal{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="Alteração de Tipo Usuário" aria-hidden="true">
     						<div class="modal-dialog" role="document">
        						<div class="modal-content">
        							<div class="modal-header">
            							<h2 class="modal-title" id="exampleModalLabel">Alterar Categoria do Blog</h2>
            							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
              								<span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
            							</button>
          							</div>
      								<form method="post" action="/categorias_blog/{{$categoria->id}}" class="px-4 py-3" id="altera_user{{$categoria->id}}" enctype="multipart/form-data">
                						@csrf
                						{{ method_field('PATCH') }}
         								<div class="modal-body">
                							<div class="form-group">
                								<img class="card-img-top" src="{{$armazenamento->url('categorias/'.$categoria->image)}}" id="img-output-cat{{$categoria->id}}">
                								<br>
                								<br>
                  								<label for="Nome">Nome</label>
                  								<input type="text" class="form-control" id="Nome" name="Nome" value="{{$categoria->name}}"><br>
                 								<label for="Slug">Slug</label>
                  								<input type="text" class="form-control" id="Slug" name="Slug" value="{{$categoria->slug}}"><br>
						      					<label for="image{{$categoria->id}}" class="btn btn-secondary" id="btn-img-alter-id{{$categoria->id}}"><i class="fa fa-camera-retro"></i> Imagem</label>
						      					<input type="file" class="form-control" id="image{{$categoria->id}}" name="image_cat" style="display: none;"  accept="image/*" onchange="readURL3(this, {{$categoria->id}})">
                							</div>
          								</div>
         								<div class="modal-footer">
            								<button class="btn btn-outline-primary" type="button" data-dismiss="modal">Cancelar</button>
            								<button type="submit" class="btn btn-primary">Alterar</button>
          								</div>
          							</form>
        						</div>
      						</div>
   						</div>
   						<div class="modal fade" id="excluiModal{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="Alteração de Tipo Usuário" aria-hidden="true">
     						<div class="modal-dialog" role="document">
        						<div class="modal-content">
        							<div class="modal-header">
            							<h2 class="modal-title" id="exampleModalLabel">Quer excluir esta categoria?</h2>
            							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
              								<span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
            							</button>
          							</div>
      								<form method="post" action="/categorias_blog/{{$categoria->id}}" class="px-4 py-3" id="altera_user{{$categoria->id}}" enctype="multipart/form-data">
                						@csrf
                						{{ method_field('DELETE') }}
         								<div class="modal-body">
                							<div class="form-group">
                								<img class="card-img-top" src="{{$armazenamento->url('categorias/'.$categoria->image)}}" id="img-output-cat{{$categoria->id}}">
                								<br>
                								<br>
                  								<label for="Nome">Nome</label>
                  								<input type="text" class="form-control" id="Nome" name="Nome" value="{{$categoria->name}}" disabled="true"><br>
                 								<label for="Slug">Slug</label>
                  								<input type="text" class="form-control" id="Slug" name="Slug" value="{{$categoria->slug}}" disabled="true"><br>
                							</div>
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
            </div>
            <div class="card-footer small text-muted">{{$pagination_status}}
            	<div class="row align-content-center float-right">
              	<div class="col-sm-12 col-md-12" align="right">
              		<div id="dataTable_paginate" class="dataTables_paginate paging_simple_numbers">
              			{{$categorias->links()}}
              		</div>
              	</div>
              </div></div>
          </div>
  </div>
@endsection