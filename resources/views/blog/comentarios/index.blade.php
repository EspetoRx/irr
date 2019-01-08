@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item">
      		<a href="/home">Blog</a>
    	</li>
    	<li class="breadcrumb-item active">Comentários </li>
  	</ol>
  	@include('inc.errors')
  	<div class="card mb-3">
        <div class="card-header">
    	    <i class="far fa-comments"></i>
        	Comentários
      	</div>
        <div class="card-body">
        	<div class="table-responsive">
        		<table class="table table-bordered table-striped table-hover dataTable js-exportable" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Post ID</th>
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Comentário</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Post ID</th>
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Comentário</th>
                      <th>Ações</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@foreach ($comentarios as $comentario)
                  	  	<tr>
                  	  		<td>{{$comentario->id}}</td>
                  	  		<td>{{$comentario->id_post}}</td>
                  	  		<td>{{$comentario->nome}}</td>
                  	  		<td>{{$comentario->email}}</td>
                  	  		<td>{{$comentario->comentario}}</td>
                  	  		<td class="text-center">
                  	  			<button class="btn btn-success btn-sm" id="autorizar{{$comentario->id}}"><i class="fas fa-check"></i> Autorizar</button>
                  	  			<button class="btn btn-danger btn-sm" id="excluir{{$comentario->id}}"><i class="fa fa-trash"></i> Excluir</button>
                  	  			<script type="text/javascript">
                  	  			$("document").ready(function () {
							    $("#autorizar{{$comentario->id}}").click(function (e) {
							            e.preventDefault();
							            $.ajax({
							                url: "/comentarios/{{$comentario->id}}/aprovar",
							                type: "GET",
							                data: "data",
							                success: function (data) {
							                    $("#autorizar{{$comentario->id}}").html(data);
							                },
							                error: function (jXHR, textStatus, errorThrown) {
							                    alert(errorThrown);
							                }
							            	}); // AJAX Get Jquery statment
							    	}); // Click effect     
							    $("#excluir{{$comentario->id}}").click(function (e) {
							            e.preventDefault();
							            $.ajax({
							                url: "/comentarios/{{$comentario->id}}/excluir",
							                type: "GET",
							                data: "data",
							                success: function (data) {
							                    $("#excluir{{$comentario->id}}").html(data);
							                },
							                error: function (jXHR, textStatus, errorThrown) {
							                    alert(errorThrown);
							                }
							            	}); // AJAX Get Jquery statment
							    	}); // Click effect    
								});
                  	  			</script>
                  	  		</td>
                  	  	</tr>
                  	@endforeach  
                  </tbody>
                </table>
        	</div>
        </div>    
    </div>
</div>
@endsection