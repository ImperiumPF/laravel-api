@extends('layouts.app')

@section('content')

<body class="template-page sidebar-collapse">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- End Navbar -->
        <div class="wrapper">
        <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true" style="background-image: url(../assets/images/convento.jpg);">
            </div>
            <div class="container">
                <div class="content-center">
                    <h1 class="title">Imperium</h1>
                    <div class="text-center">
                        <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-about-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">Quem somos n&oacute;s?</h2>
                        <h5 class="description">N&oacute;s somos dois estudantes lutando para ter uma boa nota no projeto de final de curso. Para isso resolvemos fazer este projeto.</h5>
                    </div>
                </div>
                <div class="separator separator-primary"></div>
                <div class="section-story-overview">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="image-container image-left" style="background-image: url(../assets/images/vaticano.jpg)">
                                <!-- First image on the left side -->
                                <p class="blockquote blockquote-primary">"O que importa &eacute; o que interessa"
                                    <br>
                                    <br>
                                    <small>-Tatiana Sena</small>
                                </p>
                            </div>
                            <!-- Second image on the left side of the article -->
                            <div class="image-container" style="background-image: url(../assets/images/coreto.jpg)"></div>
                        </div>
                        <div class="col-md-5">
                            <!-- First image on the right side, above the article -->
                            <div class="image-container image-right" style="background-image: url(../assets/images/trevi.jpg)"></div>
                            <h3>Para que serve realmente o Imperium?</h3>
                            <p>O Imperium vem resolver alguns problemas com os quais j&aacute; nos depar&aacute;mos, entre eles, o que visitar numa cidade tendo uma janela de tempo apertada.
							</p>
                            <p>
                                1&deg;- Escolhe o tempo que tens disponivel</br>
								2&deg;- Seleciona os locais mais interessantes para ti</br>
								3&deg;- Visita e ganha pontos!
							</p>
                            <p>Ganha med&aacute;lhas por quantos mais locais visitares, tenta desbloquear todas as med&aacute;lhas e ganha pontos bonus. Troca os teus pontos na loja por ofertas fant&aacutesticas!!
							</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-team text-center">
            <div class="container">
                <h2 class="title">A nossa equipa</h2>
                <div class="team">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="team-player">
                                <img src="../assets/images/canoso.jpg" alt="Thumbnail Image" class="rounded-circle img-fluid img-raised">
                                <h4 class="title">Jo&atilde;o Canoso</h4>
                                <p class="category text-primary">Jack of all trades</p>
                                <p class="description">Faz de tudo na &aacute;rea da programa&ccedil;&atilde;o. Passa horas devolta do mesmo erro no c&oacute;digo at&eacute; estar resolvido. O design do trabalho tem se estar perfeito. O seu forte &eacute; PHP, Linux e Swift
								</p>
                                <a href="https://www.instagram.com/jpcanoso/" class="btn btn-primary btn-icon btn-round"><i class="fa fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/in/jo%C3%A3o-canoso-0001a6165/" class="btn btn-primary btn-icon btn-round"><i class="fa fa-linkedin"></i></a>
								<a href="https://www.instagram.com/jpcanoso/" class="btn btn-primary btn-icon btn-round"><i class="fa fa-github"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="team-player">
                                <img src="../assets/images/henrique.jpeg" alt="Thumbnail Image" class="rounded-circle img-fluid img-raised">
                                <h4 class="title">Henrique Bernardo</h4>
                                <p class="category text-primary">Does the boring stuff</p>
                                <p class="description">Faz de tudo um pouco, mas maiorit&aacute;riamente d&aacute; ideias e faz o que mais n&iacute;nguem quer fazer, neste caso, fazer testes automatizados para o software desenvolvido
								</p>
								<a href="https://www.instagram.com/freakmania/" class="btn btn-primary btn-icon btn-round"><i class="fa fa-instagram"></i></a>
                                <a href="https://www.facebook.com/profile.php?id=1714706862" class="btn btn-primary btn-icon btn-round"><i class="fa fa-facebook-square"></i></a>
                                <a href="https://www.linkedin.com/in/henrique-bernardo/" class="btn btn-primary btn-icon btn-round"><i class="fa fa-linkedin"></i></a>
                            </div>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-contact-us text-center">
            <div class="container">
                <h2 class="title">Queres dar-nos a tua opini&atilde;o?</h2>
                <p class="description">A tua opini&atilde;o &eacute; importante para n&oacute;s.</p>
                <div class="row">
                    <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                        <div class="input-group input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Nome...">
                        </div>
                        <div class="input-group input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_email-85"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Email...">
                        </div>
                        <div class="textarea-container">
                            <textarea class="form-control" name="name" rows="4" cols="80" placeholder="Mensagem..."></textarea>
                        </div>
                        <div class="send-button">
                            <a href="#pablo" class="btn btn-primary btn-round btn-block btn-lg">Enviar Mensagem</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer footer-default">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md">
                                MIT License
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed by
                    <a href="http://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                </div>
            </div>
        </footer>
    </div>

    </body>
@endsection