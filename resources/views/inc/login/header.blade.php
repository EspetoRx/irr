<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/"><img src="{{asset('images/logo.png')}}" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
               @if (Auth::user())
               &nbsp;
               <li class="nav-item"><a class="btn btn-primary" href="/home"><i class="fas fa-home"></i> {{ __('Início') }}</a></li>&nbsp;
               {{-- <li class="nav-item"><div class="dropdown">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-users"></i> Usuários
                  </button>
                  <div class="dropdown-menu dropdown-menu-center dropdown-menu-right">
                   <a class="btn btn-success" href="#"><i class="fas fa-user"></i> Perfis</a>
                   <div class="dropdown-divider"></div>
                   <a class="btn btn-success" href="/users/create"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrar usuário</a>
                  </div>
                </div></li>&nbsp; --}}
                <li class="nav-item"><div class="dropdown">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-file"></i> Blog
                  </button>
                  <div class="dropdown-menu dropdown-menu-center dropdown-menu-right">
                   <a class="btn btn-success" href="/categorias_blog"><i class="fas fa-gem"></i> Categorias</a>&nbsp;
                   <div class="dropdown-divider"></div>
                   <a class="btn btn-success" href="/tags_blog"><i class="fas fa-hashtag"></i> Tags</a>&nbsp;
                   <div class="dropdown-divider"></div>
                   <a class="btn btn-success" href="/posts"><i class="fas fa-code"></i> Posts</a>&nbsp;
                   <div class="dropdown-divider"></div>
                   <a class="btn btn-success" href="/comentarios"><i class="fas fa-comments"></i> Comentários</a>
                  </div>
                </div></li>&nbsp;
                <li class="nav-item"><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> {{ __('Sair') }}</a></li>
               @else
                    <a href="/" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Voltar ao Site</a>
               @endif
            </ul>
        </div>
    </nav>
</header>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h2 class="modal-title" id="exampleModalLabel">Tem certeza que deseja sair?</h2>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
</button>
</div>
<div class="modal-body"><p>Selecione "Sair" abaixo para sair do sistema.</p></div>
<div class="modal-footer">
<button class="btn btn-outline-primary" type="button" data-dismiss="modal">Cancelar</button>
<a class="btn btn-outline-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
</div>
</div>