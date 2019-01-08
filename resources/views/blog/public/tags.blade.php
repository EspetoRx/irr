@extends('layouts.app')
@section('content')
	<div class="container-fluid blog-container">
		{{-- CABEÇALHO --}}
		<div class="jumbotron jumbotron-fluid jumbotron-background">
		  	<div class="container">
		  		<a href="/blog">
		    	<h5 class="display-4"><img src="{{asset('/images/logo.png')}}" class="logo-ext-navbar">Blog</h5></a>
		    	<p class="lead">Voltar para o blog <i class="fas fa-arrow-up"></i></p>
		  	</div>
		</div>

		{{-- CORPO DO DOCUMENTO --}}
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<br>
					<h1 class="text-center" style="font-size: 70px; color:black;"><i class="fa fa-hashtag"></i> {{$tag_esc->name}}</h1>
					
					<br>
					<hr>

					@foreach ($posts as $post)
					
						{{-- title --}}
						<a href="/blog/post/{{$post->id}}"><h1 class="mt-4">{{$post->titulo}}</h1></a>

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
			          	<script type="text/javascript">
			          		$(document).ready(function(){
			          			$('#content{{$post->id}}').ctTruncate({
			          				maxChars: 100,
			          				truncator: '\u2026',
			          			});
			          		});
			          	</script>
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
							<a class="btn btn-success btn-sm" href="/blog/post/{{$post->id}}"><i class="fa fa-eye"></i> Continuar lendo...</a>
						</div>
					@endforeach
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
				<div class="col-md-12">
					<hr>
					{{$posts->links()}}
					<br>
				</div>
			</div>
		</div>
		
	</div>
	
@endsection