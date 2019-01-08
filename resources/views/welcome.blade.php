<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Instituto de Referência em Resíduos</title>
    <!-- core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendorirr/fontawesome-free-5.6.1-web/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.transitions.css')}}" rel="stylesheet">
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('images/ico/favicon.ico')}}">

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    @csrf
</head><!--/head-->

<body id="home" class="homepage">

    @include('inc.welcome.header')

    <section id="main-slider">
        <div class="owl-carousel">
            <div class="item" style="background-image: url({{asset('images/slider/bg1.jpg')}});">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2>Gestão <span>correta</span> <br>de diferentes <br>tipos de resíduos.</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
             <div class="item" style="background-image: url({{asset('images/slider/bg2.jpg')}});">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 style="color: grey;">Soluções elegantes para o desenvolvimento <span>sustentável</span>.</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.owl-carousel-->
    </section><!--/#main-slider-->

    <section id="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Sobre</h2>
                <p class="text-center wow fadeInDown">O Instituto de Referência em Resíduos - IRR, é uma associação sem fins lucrativos constituída em <span>21 de abril de 2009.</span></p>
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <img class="img-responsive" src="images/main-feature.png" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left custom-media">
                            <i class="fas fa-user-ninja"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Missão</h4>
                            <p>Apoiar os poderes públicos, as empresas, e a sociedade civil na busca de soluções para o desenvolvimento sustentável.</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left custom-media">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Composição</h4>
                            <p>Possuímos uma equipe de Diretores e consultores associados com ampla experiência de mercado prontos para auxiliar e desenvolver as melhores práticas no que se refere a correta gestão de resíduos.</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left custom-media">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Objetivo</h4>
                            <p>Promover a articulação entre os setores público e privado, terceiro setor, comunidade acadêmica e sociedade civil na busca por alternativas para transformar resíduos em oportunidades de trabalho e renda, bem como a preservação dos recursos naturais.</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left custom-media">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Valores</h4>
                            <p><ul>
                                <li>
                                    Comprometimento;
                                </li>
                                <li>
                                    Ética;
                                </li>
                                <li>
                                    Inovação;
                                </li>
                                <li>
                                    Transparência;
                                </li>
                                <li>
                                    Cooperação;
                                </li>
                                <li>
                                    Cidadania.
                                </li>
                            </ul></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">ESTAMOS TRATANDO DE EMPREGOS <br>& <span>PRESERVAÇÃO AMBIENTAL</span></h2>
                <img class="img-responsive wow fadeIn" src="images/cta2/cta2-img.png" alt="" data-wow-duration="300ms" data-wow-delay="300ms">
            </div>
        </div>
    </section>

    <section id="work-process">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Desafios</h2>
                <p class="text-center wow fadeInDown">O IRR tem como desafio contribuir para a construção de sociedades sustentáveis por meio de ações que visam:</p>
            </div>

            <div class="row text-center">
                <div class="col-md-3 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="icon-circle">
                            <span>1</span>
                            <i class="fa fa-chart-line fa-2x"></i>
                        </div>
                        <h3>MELHORAR QUALIDADE DE VIDA</h3>
                    </div>
                </div>
                <div class="col-md-3 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="icon-circle">
                            <span>2</span>
                            <i class="fas fa-hand-holding-usd fa-2x"></i>
                        </div>
                        <h3>GERAR NOVAS FONTES DE TRABALHO E RENDA</h3>
                    </div>
                </div>
                <div class="col-md-3 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="icon-circle">
                            <span>3</span>
                            <i class="fas fa-recycle fa-2x"></i>
                        </div>
                        <h3>ESTIMULAR A REFLEXÃO E INCORPORAR VALORES E ATITUDES CORRETAS EM TERMOS AMBIENTAIS</h3>
                    </div>
                </div>
                <div class="col-md-3 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="icon-circle">
                            <span>4</span>
                            <i class="fas fa-trash-alt fa-2x"></i>
                        </div>
                        <h3>FOMENTAR A PROMOÇÃO DE INICIATIVAS VOLTADAS PARA RESÍDUOS</h3>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#work-process-->

    <section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Serviços</h2>
                <p class="text-center wow fadeInDown">Carteira de Produtos</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left custom-media">
                                <i class="far fa-lightbulb"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">CONSULTORIA E ASSESSORIA PARA  A GESTÃO INTEGRADA DOS RESÍDUOS SÓLIDOS URBANOS</h4>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left custom-media">
                                <i class="fas fa-pen-fancy"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">ELABORAÇÃO DE PROJETOS E CAPTÇÃO DE RECURSOS</h4>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left custom-media">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">FORMAÇÃO E ASSISTÊNCIA TÉCNICA A SISTEMAS ASSOCIATIVOS E COOPERATIVOS</h4>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                
                    <div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="media service-box">
                            <div class="pull-left custom-media">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">TREINAMENTO EM DESENVOLVIMENTO PROFISSIONAL E GERENCIAL</h4>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
                        <div class="media service-box">
                            <div class="pull-left custom-media">
                                <i class="fas fa-desktop"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">SISTEMATIZAÇÃO DE INDICADORES PARA APRIMORAMENTO DE PROCESSOS</h4>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="500ms">
                        <div class="media service-box">
                            <div class="pull-left custom-media">
                                <i class="far fa-handshake"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">ORGANIZAÇÃO DE FEIRAS, CONGRESSOS E EXPOSIÇÕES DE ARTE SUSTENTÁVEL</h4>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                </div>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#services-->

    <section id="meet-team">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Diretoria</h2>
                <p class="text-center wow fadeInDown">Membros da Diretoria</p>
            </div>

            <div class="row">
                <div class="col-sm-3 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('images/team/01.png')}}" width="100%">
                        </div>
                        <div class="team-info">
                            <h3>David Carlos Junqueira de Carvalho</h3>
                            <span>Diretor Presidente</span>
                        </div>
                        <p>Graduado em Matemática e Engenharia Civil com pós-graduação em Engenharia de Transporte. Foi fiscal supervisor e perito do CREA/MG, gerenciando diversas obras no estado. Foi pesquisador de Avaliação do Programa de Mobilização de Comunidades- PMC- Projeto BID/PMC/SERVAS em 18 municípios mineiros. </p>
                        <ul class="social-icons">
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('images/team/02.png')}}" width="100%">
                        </div>
                        <div class="team-info">
                            <h3>Leonardo Pereira Piló</h3>
                            <span>Diretor Vice Presidente</span>
                        </div>
                        <p>Artista Plástico de formação, Leo Piló apresenta trabalhos inusitados, feitos de materiais não convencionais, treinando olhares para novas possibilidades de construção a serem aplicadas na revisão de atitudes a partir da "Redução, Reciclagem e Reutilização".</p>
                        <ul class="social-icons">
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('images/team/03.png')}}" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Alessandra Santos Souza</h3>
                            <span>Diretora Administradora/ Financeira</span>
                        </div>
                        <p>Bacharel em Direito pela Escola Superior Dom Helder Câmara, com pós-graduação em Gestão da Qualidade Integrada ao Meio Ambiente pela PUC/MG. Consultora do Instituto de Referência em Resíduos – IRR, acumulou experiência em mais de 10 anos assessorando diversos municípios mineiros na gestão adequada dos resíduos sólidos urbanos com o foco na coleta seletiva com valorização social.</p>
                        <ul class="social-icons">
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('images/team/04.png')}}" width="100%">
                        </div>
                        <div class="team-info">
                            <h3>Camila Seixas</h3>
                            <span>Diretora Técnica de Projetos</span>
                        </div>
                        <p>Graduada em Ciências Econômicas e Relações Internacionais. Especialista em Gestão de Resíduos Sólidos. Mestre em Desenvolvimento Sustentável. Trabalhou em diversos projetos na área de gestão de resíduos em diferentes órgãos do Governo do Estado de Minas Gerais e na área de inclusão digital na Prefeitura de Belo Horizonte. Atualmente trabalha como consultora na área de gestão de resíduos.</p>
                        <ul class="social-icons">
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Consultores</h2>
                <p class="text-center wow fadeInDown">Conheça nossos incríveis consultores</p>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('images/team/05.png')}}" width="100%">
                        </div>
                        <div class="team-info">
                            <h3>Janice Pereira de Araújo Carvalho</h3>
                        </div>
                        <p>Graduada em História pela UEMG, é especialista em educação ambiental e mestre em Ciência Política pela UFMG. Foi Diretora de Capacitação de Recursos Humanos da Secretaria de Estado da Educação de Minas Gerais e professora do Curso de Pós-Graduação em Educação Ambiental da UEMG.</p>
                        <ul class="social-icons">
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('images/team/06.png')}}" alt="">
                        </div>
                        <div class="team-info">
                            <h3>José Aparecido Gonçalves</h3>
                        </div>
                        <p>Graduado em Filosofia, especialização em gestão de projetos. Um dos precursores da coleta seletiva com a inclusão produtiva dos catadores de materiais recicláveis. Há  mais  de vinte e cinco anos assessorado vários municípios de Minas Gerais e de outras regiões  do Brasil.</p>
                        <ul class="social-icons">
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('images/team/07.png')}}" width="100%">
                        </div>
                        <div class="team-info">
                            <h3>José Claudio Junqueira</h3>
                        </div>
                        <p>Engenheiro civil com especialização em Engenharia Sanitária pela UFMG. É Mestre em Saneamento e Urbanismo pela Escola Nacional de Saúde da França  e Doutor em Saneamento, Meio Ambiente e Recursos Hídricos pela UFMG. Foi Secretário Municipal de Meio Ambiente de Belo Horizonte e Pesquisador, Diretor e Presidente da Fundação Estadual do Meio Ambiente - FEAM.</p>
                        <ul class="social-icons">
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('images/team/08.png')}}" width="100%">
                        </div>
                        <div class="team-info">
                            <h3>Rosangela Moreira Gurgel Machado</h3>
                        </div>
                        <p>Engenheira civil com especialização em Engenharia Sanitária pela UFMG. É Mestre em Saneamento, Meio Ambiente e Recursos Hídricos pela UFMG. Foi Pesquisadora e coordenadora do Setor de Controle da Poluição do CETEC. Foi pesquisadora, Gerente de Qualidade dos Solos e Diretora de Gestão de Resíduos da Fundação Estadual do Meio Ambiente - FEAM.</p>
                        <ul class="social-icons">
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('images/team/09.png')}}" width="100%">
                        </div>
                        <div class="team-info">
                            <h3>Leonardo Gurgel Machado</h3>
                        </div>
                        <p>Advogado graduado pela PUC Minas e com LLM em Direito Empresarial pela FGV. Tem mais de cinco anos de atuação com licitações e contratos administrativos, tendo atuado no SEBRAE-SP e no SESC-MG, onde também participou da formatação e viabilização de diversos projetos nas áreas de saúde, meio ambiente, segurança alimentar e esportes.</p>
                        <ul class="social-icons">
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('images/team/10.png')}}" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Matteus Carvalho Ferreira</h3>
                        </div>
                        <p>Bacharel em Engenharia Ambiental pela Universidade Fumec e Bacharel em Ciências Biológicas pela Universidade Federal de Minas Gerais. Consultor do Instituto de Referência em Resíduos (IRR), possui pesquisas realizadas nas áreas de recuperação de áreas degradadas, educação ambiental, biologia da conservação, análise de impacto ambiental, legislação ambiental e gestão de resíduos sólidos com ênfase em compostagem.</p>
                        <ul class="social-icons">
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('images/team/11.png')}}" width="100%">
                        </div>
                        <div class="team-info">
                            <h3>Paulo Eduardo Gonçalves</h3>
                        </div>
                        <p>Graduado em Ciências Ambientais pela UFG, com MBA em Gerenciamento Estratégico de Projetos pela FUMEC. Tem proficiência no uso de geotecnologias como geoprocessamento e sensoriamento remoto com experiência acadêmica e profissional pela Universidade de Pádua, Itália. Foi consultor em geoprocessamento pela GEOPLANO, atuando na  Elaboração de Planos Diretores, e em Projetos de Aterros Sanitários Simplificados de vários municípios goianos.</p>
                        <ul class="social-icons">
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('images/team/12.png')}}" width="100%">
                        </div>
                        <div class="team-info">
                            <h3>Ricardo Botelho Tostes Ferreira</h3>
                        </div>
                        <p>Bacharel em Comunicação Social com ênfase em Relações Públicas pelo Centro Universitário Newton Paiva e especialista em Gestão Ambiental pela Universidade Fumec. Possui sólidos conhecimentos na elaboração, desenvolvimento e avaliação de projetos de comunicação e educação socioambiental com foco no consumo consciente de recursos naturais e na gestão de resíduos com experiência comprovada nos três setores. Atua nas seguintes áreas: Gestão Ambiental, Educação Ambiental, Comunicação Social, Mobilização, Gestão de Resíduos Sólidos, Coleta Seletiva, Indicadores Ambientais.</p>
                        <ul class="social-icons">
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#" style="padding-top: 7px;"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
    </section><!--/#testimonial-->

    <section id="blog">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Últimos Posts</h2>
                <p class="text-center wow fadeInDown">Fique ligado em todas as novidades aqui no nosso blog</p>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                        <article>
                            <header class="entry-header">
                                <div class="entry-thumbnail">
                                    @if ($posts[0]->midia == '1')
                                        <img class="img-responsive" src="{{asset($armazenamento->url($posts[0]->media_file))}}" alt="">
                                    @endif
                                    @if ($posts[0]->midia == '2')
                                        <div class="embed-responsive embed-responsive-16by9">
                      
                                            <iframe class="embed-responsive" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video-preview"></iframe>

                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                            var adress = youtube_parser('{{$posts[0]->media_file}}');
                                            $('#video-preview').attr('src', 'https://www.youtube.com/embed/' + adress);
                                            });
                                        </script>
                                    @endif
                                    
                                </div>
                                <div class="entry-date">{{$posts[0]->created_at->diffForHumans()}}</div>
                                <h2 class="entry-title"><a href="#">{{$posts[0]->titulo}}</a></h2>
                            </header>

                            <div class="entry-content" id="content{{$posts[0]->id}}">
                                <P>{!! $posts[0]->body !!}</P>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#content{{$posts[0]->id}}').ctTruncate({
                                            maxChars: 100,
                                            truncator: '\u2026',
                                        });
                                    });
                                </script>
                            </div>
                            <a class="btn btn-primary" href="/blog/post/{{$posts[0]->id}}">Continuar Lendo</a>

                            <footer class="entry-meta">
                                <span class="entry-author"><i class="fas fa-thumbs-up"></i> {{$posts[0]->likes}} Likes</span>
                                <span class="entry-category"><i class="fa fa-eye"></i> {{$posts[0]->contador_views}}</span>
                            </footer>
                        </article>
                    </div>
                </div><!--/.col-sm-6-->
                <div class="col-sm-6">
                    <div class="blog-post blog-large wow fadeInRight" data-wow-duration="300ms" data-wow-delay="0ms">
                        <article>
                            <header class="entry-header">
                                <div class="entry-thumbnail">
                                    @if ($posts[1]->midia == '1')
                                        <img class="img-responsive" src="{{asset($armazenamento->url($posts[1]->media_file))}}" alt="">
                                    @endif
                                    @if ($posts[1]->midia == '2')
                                        <div class="embed-responsive embed-responsive-16by9">
                      
                                            <iframe class="embed-responsive" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video-preview"></iframe>

                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                            var adress = youtube_parser('{{$posts[1]->media_file}}');
                                            $('#video-preview').attr('src', 'https://www.youtube.com/embed/' + adress);
                                            });
                                        </script>
                                    @endif
                                </div>
                                <div class="entry-date">{{$posts[1]->created_at->diffForHumans()}}</div>
                                <h2 class="entry-title"><a href="#">{{$posts[1]->titulo}}</a></h2>
                            </header>

                            <div class="entry-content" id="content{{$posts[1]->id}}">
                                <P>{!! $posts[1]->body !!}</P>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#content{{$posts[1]->id}}').ctTruncate({
                                            maxChars: 100,
                                            truncator: '\u2026',
                                        });
                                    });
                                </script>
                            </div>
                            <a class="btn btn-primary" href="/blog/post/{{$posts[1]->id}}">Continuar Lendo</a>

                            <footer class="entry-meta">
                                <span class="entry-author"><i class="fas fa-thumbs-up"></i> {{$posts[1]->likes}} Likes</span>
                                <span class="entry-category"><i class="fa fa-eye"></i> {{$posts[1]->contador_views}}</span>
                            </footer>
                        </article>
                    </div>
                </div><!--/.col-sm-6-->
            </div>
            <div class="footer col-md-12 text-center">
                <br>
                <a href="/blog" class="btn btn-primary btn-sm">Acesse o Blog completo!</a>
            </div>
        </div>
    </section>

    <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Entre em contato conosco</h2>
                <p class="text-center wow fadeInDown">Se interessou pelos nossos serviços ou pela nossa incrível equipe? Envie-nos uma mensagem</p>
            </div>
        </div>
    </section><!--/#get-in-touch-->


    <section id="contact">
        <div id="google-map" style="height:650px" data-latitude="-19.935569" data-longitude="-43.933888"></div>
        <div class="container-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8" >
                        <div class="contact-form" style="margin-top: 5px !important;">
                            <h3>Informações para contato</h3>

                            <address>
                              <strong>Instituto de Referência em Resíduos</strong><br>
                              Rua dos Inconfidentes, nº 867<br>
                              2º andar, Bairro Savassi<br>
                              Belo Horizonte/MG CEP:30.140-120 <a href="https://www.google.com/maps/place/Rua+dos+Inconfidentes,+867+-+2%C2%BA+andar+-+Funcion%C3%A1rios,+Belo+Horizonte+-+MG,+30140-120/@-19.9375297,-43.9294896,17z/data=!3m1!4b1!4m5!3m4!1s0xa699c133333329:0x27bbeeb15bb29b20!8m2!3d-19.9375297!4d-43.9273009"><i class="fas fa-map-marked-alt"></i></a><br>
                              Telefone: (31) 2532-2483 <br>
                              E-mail: <a href="mailto:irr.instituto@gmail.com">irr.instituto@gmail.com</a>
                            </address>

                            <form id="main-contact-form" method="post" action="/contato">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="Nome" id="nome" class="form-control" placeholder="Nome" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="Email" id="email" class="form-control" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="Assunto" id="assunto" class="form-control" placeholder="Assunto" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="Mensagem" id="mensagem" class="form-control" rows="8" placeholder="Mensagem" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Enviar Mensagem</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#bottom-->

    @include('inc.welcome.footer')

    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBsgcW-chgD_19mR7Uw89xwhbWPjGMO4Bs "></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/mousescroll.js')}}"></script>
    <script src="{{asset('js/smoothscroll.js')}}"></script>
    <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('js/jquery.inview.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/jquery.ct-truncate.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <script type="text/javascript">
        function youtube_parser(url){
            var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
            var match = url.match(regExp);
            return (match&&match[7].length==11)? match[7] : false;
        }
    </script>

</body>
</html>