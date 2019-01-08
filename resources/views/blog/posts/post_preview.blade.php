@extends('layouts.app')

@section('content')
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4">{{$titulo}}</h1>

          <hr>

          <!-- Date/Time -->
          <p>Postado em: {{Date('d/m/Y H:m:s')}}</p>


          <hr>

          <!-- Preview Image -->
          @if ($return_midia == 1)
          	<img class="img-fluid rounded" src="{{$armazenamento->url($fullURL)}}" alt="">
          	<hr>
          @elseif($return_midia == 2)
          <div class="embed-responsive embed-responsive-16by9">
          	
          
          	<iframe class="embed-responsive" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video-preview"></iframe>

      	  </div>
      	  <hr>
          @endif
          

          <!-- Post Content -->
          <div id="content" class="row">
          	<div class="col-md-12">
          		{!! $texto_conteudo !!}
          	</div>
          </div>

          <hr>

          <!-- Categorias -->
          <div class="row">
          <div class="col-md-6">
          	@if (isset($categorias_escolhidas))
          	Categorias: <br>
	          @foreach ($categorias_escolhidas as $categoria_escolhida)
	          	<a class="btn btn-sm btn-secondary" href="/blog/categoria/{{$categoria_escolhida}}" style="margin-top: 10px;"><i class="far fa-gem"></i> {{$categorias->find($categoria_escolhida)->name}}</a>
	          @endforeach
          	@endif
          </div>
          <!-- Tags -->
          <div class="col-md-6 text-TIGHT">
          	@if (isset($tags_escolhidas))
          	Tags: <br>
	          @foreach ($tags_escolhidas as $tag_escolhida)
	          	<a class="btn btn-sm btn-secondary" href="/blog/tag/{{$tag_escolhida}}" style="margin-top: 10px;"><i class="fa fa-hashtag"></i> {{$tags->find($tag_escolhida)->name}}</a>
	          @endforeach
	        @endif
          </div>
          </div>

          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Deixe um comentário:</h5>
            <div class="card-body">
              <form>
              	<div class="form-group">
              		<label for="nome">Nome</label>
              		<input type="text" name="nome" placeholder="Entre com seu nome..." id="nome" class="form-control">
              	</div>
              	<div class="form-group">
              		<label for="email">E-mail</label>
              		<input type="text" name="email" placeholder="Email privado" id="email" class="form-control">
              	</div>
                <div class="form-group">
                	<label for="comentario">Comentário</label>
                  <textarea class="form-control" rows="3" name="comentario" id="comentario" style=""></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-comment"></i> Comentar</button>
              </form>
            </div>
          </div>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
              <div class="card my-4">
                <h5 class="card-header">Procurar</h5>
                <form action="/blog/search" method="post">
                  @csrf
                <div class="card-body">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Procurar..." required name="nome">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </div>
                </form>
              </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header"><i class="far fa-gem"></i> Categorias</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="list-unstyled mb-0">
                    @foreach ($categorias->get() as $categoria)
                    <li>
                    	<a href="/blog/categoria/{{$categoria->id}}"><i class="far fa-gem"></i> {{$categoria->name}}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header"><i class="fa fa-hashtag"></i> Tags</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="list-unstyled mb-0">
                    @foreach ($tags->get() as $tag)
                    <li>
                    	<a href="/blog/tag/{{$tag->id}}"><i class="fa fa-hashtag"></i> {{$tag->name}}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection