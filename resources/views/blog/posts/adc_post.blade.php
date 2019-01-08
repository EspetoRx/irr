@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item">
      		<a href="/home">Blog</a>
    	</li>
    	<li class="breadcrumb-item active">Post </li>
  	</ol>
  	@include('inc.errors')
  	<div class="card mb-3">
        <div class="card-header">
        	<i class="fas fa-file-invoice"></i>
        	Adicionar Novo Post
        </div>
        <form action="" method="post" id="postagem" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
        	<div class="row">
        		<div class="col-md-8">
        			<div class="form-group card">
        				<div class="card-header">
        					<label for="Título" style="margin-bottom: 0px;"><h1 style="margin-bottom: 0px;">Título do post</h1></label>
        				</div>
        				<div class="cad-body">
	        				<div class="form-line">
	        					<input type="text" name="Título" class="form-control" id="Título" value="{{old('Título')}}" required>
	        				</div>
        				</div>
        			</div>
        			<div class="form-group card">
        				<div class="card-header">
        					<h1>Mídia destaque</h1>
        				</div>
                <nav>
                  <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                    @if (old('midia') != null && old('midia') == '0')
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Nenhuma</a>
                      <input type="hidden" name="midia" id="midia" value="0">
                    @else
                      <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Nenhuma</a>
                    @endif
                    @if(old('midia') != null && old('midia') == '1')
                      <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Foto</a>
                      <input type="hidden" name="midia" id="midia" value="1">
                    @else
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Foto</a>
                    @endif
                    @if (old('midia') != null && old('midia') == '2')
                      <a class="nav-item nav-link active" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="true">Vídeo</a>
                      <input type="hidden" name="midia" id="midia" value="2">
                    @else
                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Vídeo</a>
                    @endif
                    @if (old('midia') == null)
                      <input type="hidden" name="midia" id="midia" value="0">
                    @endif
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"></div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="container">
                      <div class="row">
                          <div class="col-md-2 text-center">
                            <br>
                              <label for="photo" class="btn btn-secondary btn-sm">
                                  <i class="fa fa-camera-retro"></i> Imagem
                              </label>
                              <input type="file" name="photo" id="photo" style="display: none;" accept="image/*" onchange="readURL4(this)">
                          </div>
                          <dir class="col-md-10 text-center">
                              <img src="" id="img-output-post"style="width: 100%">
                          </dir>
                      </div>
                    </div>            
                  </div>
                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                      <div class="container">
                          <div class="row">
                              <div class="col-md-12">
                                  <label for="video">
                                    <i class="fa fa-video"></i> Insira o URL do vídeo (somente YouTube):
                                  </label>
                                  <input type="text" name="video" id="video" class="form-control" placeholder="https://www.youtube.com/watch?v=6-UWGGhuc3I">
                                  <br>
                              </div>
                              <div class="col-md-12 embed-responsive embed-responsive-16by9" id="video-output-post">
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
        			</div>
        		</div>
        		<div class="col-md-4">
        			<div class="card">
        				<div class="card-header">
	        				<h1>Categorias & Tags</h1>
	        			</div>
	        			<div class="card-body">
	        				<div class="form-group">
                    <label for="categorias">
                      Categorias
                    </label>
		        				<div class="dropdown-mul-1">
                      <select class="js-example-basic-multiple1"  name="categorias[]" id="categorias" multiple="multiple">
                        @foreach ($categorias as $categoria)
                          <option value="{{$categoria->id}}">
                            {{$categoria->name}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <script type="text/javascript">
                      $(document).ready(function() {
                          $('.js-example-basic-multiple1').select2({
                             placeholder: "Categorias",
                             width: "100%",
                          });
                      });
                    </script>
		        			</div>
                  <div class="form-group">
                    <label for="tags">
                      Tags
                    </label>
                    <div class="dropdown-mul-1">
                      <select class="js-example-basic-multiple2"  name="tags[]" id="tags" multiple>
                        @foreach ($tags as $tag)
                          <option value="{{$tag->id}}">
                            {{$tag->name}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <script type="text/javascript">
                      $(document).ready(function() {
                          $('.js-example-basic-multiple2').select2({
                             placeholder: "Tags",
                             width: "100%",
                          });
                      });
                    </script>
                  </div>
	        			</div>
        			</div>
        		</div>
            <div class="col-md-8">
              <div class="form-group">
                <div class="card">
                  <div class="card-header">
                    <h1>Digite aqui seu texto incrível! =}</h1>
                  </div>
                  <div class="card-body">
                    <textarea class="summernote" id="texto" name="texto" cols="30" rows="10"></textarea>
                    <script>
                      $(document).ready(function() {
                          $('.summernote').summernote({
                            height: 500,
                            lang: "pt-BR",
                          });
                      });
                    </script>
                  </div>                
                </div>
              </div>
            </div>
        	</div>
        </div>
        <div class="card-footer text-center">
        	<a href="/home" class="btn btn-danger">
            <i class="fa fa-trash"></i> Cancelar
          </a>&nbsp;
          <button  class="btn btn-warning" value="0" id="preview">
        		<i class="fa fa-eye"></i> Visualizar Prévia
            <script type="text/javascript">
              $('#preview').on('click', function(){
                $('#postagem').attr('action', '/post_preview');
                $('#postagem').attr('target', '_blank');
                $('#postagem').submit();
              });
            </script>
        	</button>&nbsp;
        	<button class="btn btn-success" id="postar">
        		<i class="fa fa-paper-plane"></i> Postar
            <script type="text/javascript">
              $('#postar').on('click', function(){
                $('#postagem').attr('action', '/posts');
                $('#postagem').attr('target', '');
                $('#postagem').submit();
              });
            </script>
        	</button>
        </div>
        </form>
    </div>
</div>
@endsection