@extends('layouts.app')

@section('content')
<!-- Page Content -->
    <div class="container">
      @include('inc.errors')
      <div class="row">
        
        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4">{{$post->titulo}}</h1>

          <hr>

          <!-- Date/Time -->
          <p>Postado: {{$post->created_at->diffForHumans()}}, atualizado: {{$post->updated_at->diffForHumans()}}</p>


          <hr>

          <!-- Preview Image -->
          @if ($post->midia == 1)
          	<img class="img-fluid rounded" src="{{$armazenamento->url($post->media_file)}}" alt="">
          	<hr>
          @elseif($post->midia == 2)
          <div class="embed-responsive embed-responsive-16by9">
          	
          
          	<iframe class="embed-responsive" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video-preview"></iframe>

      	  </div>
          <script type="text/javascript">
            $(document).ready(function(){
              var adress = youtube_parser('{{$post->media_file}}');
              $('#video-preview').attr('src', 'https://www.youtube.com/embed/' + adress);
            });
          </script>
      	  <hr>
          @endif
          

          <!-- Post Content -->
          <div id="content" class="row">
          	<div class="col-md-12">
          		{!! $post->body !!}
          	</div>
          </div>

          <hr>

          <!-- Categorias -->
          <div class="row">
          <div class="col-md-6">
          	@if (isset($categorias_escolhidas))
          	Categorias: <br>
	          @foreach ($categorias_escolhidas as $categoria_escolhida)
	          	<a class="btn btn-sm btn-secondary" href="/blog/categoria/{{$categoria_escolhida->id}}" style="margin-top: 10px;"><i class="far fa-gem"></i> {{$categoria->find($categoria_escolhida->id_categoria)->name}}</a>
	          @endforeach
          	@endif
          </div>
          <!-- Tags -->
          <div class="col-md-6 text-TIGHT">
          	@if (isset($tags_escolhidas))
          	Tags: <br>
	          @foreach ($tags_escolhidas as $tag_escolhida)
	          	<a class="btn btn-sm btn-secondary" href="/blog/tag/{{$tag_escolhida->id}}" style="margin-top: 10px;"><i class="fa fa-hashtag"></i> {{$tag->find($tag_escolhida->id_tag)->name}}</a>
	          @endforeach
	        @endif
          </div>
          </div>

          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Deixe um comentário:</h5>
            <div class="card-body">
              <form action="/comentario" method="post"
              >
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">
              	<div class="form-group">
              		<label for="nome">Nome</label>
              		<input type="text" name="nome" placeholder="Entre com seu nome..." id="nome" class="form-control" value="{{old('nome')}}" required>
              	</div>
              	<div class="form-group">
              		<label for="email">E-mail</label>
              		<input type="email" name="email" placeholder="Email privado" id="email" class="form-control" required="required" value="{{old('email')}}">
              	</div>
                <div class="form-group">
                	<label for="comentario">Comentário</label>
                  <textarea class="form-control" rows="3" name="comentario" id="comentario" style="" required="required">{{old('comentario')}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-comment"></i> Comentar</button>
              </form>
            </div>
          </div>

          <!-- Single Comment -->
          @if (count($comentarios) == 0)
            <br>
            <h3 class="text-center">Não há comentários para serem exibidos. ={ <br>
            Seja o primeiro a comentar. =}</h3>
          @else
            @foreach ($comentarios as $comentario)
            <div class="media mb-4">
              <img class="d-flex mr-3 rounded-circle" src="{{$armazenamento->url('users/default.png')}}" width="50px" alt="">
              <div class="media-body">
                <h5 class="mt-0">{{$comentario->nome}}</h5>
                {{$comentario->comentario}}
              </div>
            </div>
            @endforeach
          @endif
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
                    @foreach ($categorias as $categoria)
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
                    @foreach ($tags as $tag)
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