<header id="header">
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="{{asset('images/logo.png')}}" alt="logo"></a>
            </div>
			
            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="scroll active"><a href="#home"><i class="fas fa-home"></i> Início</a></li>
                    <li class="scroll"><a href="#features"><i class="fas fa-briefcase"></i> Sobre</a></li>
                    <li class="scroll"><a href="#services"><i class="fas fa-concierge-bell"></i> Serviços</a></li>
                    <li class="scroll"><a href="#meet-team"><i class="fas fa-users"></i> Membros</a></li>
                    <li class="scroll"><a href="#blog"><i class="fas fa-blog"></i> Blog</a></li> 
                    <li class="scroll"><a href="#get-in-touch"><i class="fas fa-envelope"></i> Contato</a></li>
                    @if (!Auth::user())
                        <li><a href="/login"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                        </ul>
                    @else
                        <li><a href="/login"><i class="fas fa-sign-in-alt"></i> Acesso</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> {{ __('Sair') }}</a></li>
                        </ul>
                        <!-- Logout Modal-->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">Tem certeza que deseja sair?</h2>
                        </div>
                        <div class="modal-body"><p>Selecione "Sair" abaixo para sair do sistema.</p></div>
                        <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-success" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                        </div>
                        </div>
                        </div>
                    @endif                        
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header><!--/header-->