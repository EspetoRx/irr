@extends('layouts.app')
@section('content')
	<meta property="og:url"           content="{{url()->current()}}" />
    <meta property="og:type"          content="Website" />
    <meta property="og:title"         content="Instituto de Referênciam em Resíduos" />
    <meta property="og:description"   content="Acesse esta notícia no nosso site! =D" />
    @if ($post->media == 0)
    	<meta property="og:image"         content="{{asset('images/logo.png')}}" />
    @endif
    @if ($post->media == 1)
    	<meta property="og:image"         content="{{$armazenamento->url($post->media_file)}}" />
    @endif
    @if ($post->media == 2)
    	<meta property="og:image"         content="{{asset('images/logo.png')}}" />
    @endif
    
	<div class="container-fluid blog-container">
		{{-- CABEÇALHO --}}
		<div class="jumbotron jumbotron-fluid jumbotron-background">
		  	<div class="container">
		  		<a href="/blog">
		    	<h5 class="display-4"><img src="{{asset('images/logo.png')}}" alt="logo" class="logo-ext-navbar">Blog</h5></a>
		    	<p class="lead">Voltar para o blog <i class="fas fa-arrow-up"></i></p>
		  	</div>
		</div>

		{{-- CORPO DO DOCUMENTO --}}
		<div class="container">
			<br>
			@include('inc.errors')
			<div class="row">
				<div class="col-md-8">
					
						{{-- title --}}
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
			          	<div id="content{{$post->id}}" class="row">
				          	<div class="col-md-12">
				          		{!! $post->body !!}
				          	</div>
			          	</div>
						<hr>
						<div class="row">
							<div class="col-md-6">
								Categorias:&nbsp;
								@php
									$categorias_deste_post = DB::table('posts_categories')->where('id_post', '=', $post->id)->get();
								@endphp	
								@foreach ($categorias_deste_post as $cat)
									@foreach ($categorias as $categoria)
										@if ($cat->id_categoria == $categoria->id)
											<a class="btn btn-sm btn-secondary" href="/blog/categoria/{{$categoria->id}}"><i class="far fa-gem"></i> {{$categoria->name}}</a>&nbsp;
										@endif
									@endforeach
								@endforeach
							</div>
							<div class="col-md-6">
								Tags:&nbsp;
								@php
									$tags_deste_post = DB::table('posts_tags')->where('id_post', '=', $post->id)->get();
								@endphp	
								@foreach ($tags_deste_post as $tagc)
									@foreach ($tags as $tag)
										@if ($tagc->id_tag == $tag->id)
											<a class="btn btn-sm btn-secondary" href="/blog/tag/{{$tag->id}}"><i class="fa fa-hashtag"></i> {{$tag->name}}</a>&nbsp;
										@endif
									@endforeach
								@endforeach
							</div>
						</div>
						<hr>
						<div class="col-md-12 text-center">

							<!-- Load Facebook SDK for JavaScript -->
							  <div id="fb-root"></div>
							  <script>(function(d, s, id) {
							    var js, fjs = d.getElementsByTagName(s)[0];
							    if (d.getElementById(id)) return;
							    js = d.createElement(s); js.id = id;
							    js.src = "http://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0";
							    fjs.parentNode.insertBefore(js, fjs);
							  }(document, 'script', 'facebook-jssdk'));</script>

							  <!-- Your share button code -->
							  <div class="fb-share-button" 
							    data-href="{{url()->current()}}" 
							    data-layout="button_count">
							  </div>

							  <btn class="btn btn-sm btn-primary socialbtn" disabled><i class="far fa-eye"></i> {{$post->contador_views}} @if ($post->contador_views == '1')
					  			Visualização
					  		@else Visualizações @endif</btn>

					  		<a href="whatsapp://send?text={{url()->current()}}" class="btn btn-sm btn-success socialbtn"><i class="fab fa-whatsapp"></i> Compartilhar (Somente celular)</a>

					  		<button class="btn btn-primary btn-sm socialbtn" id="like"><i class="far fa-thumbs-up"></i> {{$post->likes}} Curtidas </button>
	
					  		
					  		

					  		<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button btn btn-primary btn-sm socialbtn" data-show-count="false" ><i class="fab fa-twitter"></i> Tweetar</a>
					  		<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
						</div>
						<hr>
						<script type="text/javascript">
					  		$("document").ready(function () {
							    $("#like").click(function (e) {
							            e.preventDefault();
							            $.ajax({
							                url: "/blog/post/{{$post->id}}/like",
							                type: "GET",
							                data: "data",
							                success: function (data) {
							                    $("#like").html(data);
							                },
							                error: function (jXHR, textStatus, errorThrown) {
							                    alert(errorThrown);
							                }
							            }); // AJAX Get Jquery statment
							    }); // Click effect     
							}); //Begin of Jquery Statement 
							</script>
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
              <i class="fas fa-user-circle fa-3x"></i> &nbsp;&nbsp;&nbsp;
              <div class="media-body">
                <h5 class="mt-0">{{$comentario->nome}}</h5>
                {{$comentario->comentario}}
              </div>
            </div>
            <hr>
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
		</div>
		
	</div>
	
@endsection