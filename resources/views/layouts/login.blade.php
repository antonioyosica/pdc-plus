<!doctype html>
<html class="no-js" lang="pt-AO">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{!!$titulo!!}</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('')}}assets/images/favicon.ico"> -->

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/vendor/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/vendor/bicon.min.css">
    <!-- Flat Icon CSS -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/vendor/flaticon.css">
    <!-- audio & video player CSS -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/plugins/plyr.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/plugins/slick.min.css">
    <!-- nice-select CSS -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/plugins/nice-select.css">
    <!-- perfect scrollbar css -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/plugins/perfect-scrollbar.css">
    <!-- light gallery css -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/plugins/lightgallery.min.css">
    <!-- light gallery css -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/plugins/toastr.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/style.css">
    <style type="text/css">
        .nice-select .list{max-height:160px;overflow:scroll;}
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 10000;
        }
        .component {
            margin: auto;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 200px;
            height: 200px;
        }
        .sh1 {
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 50px 50px 0 0;
            border-color: #dc4734 transparent transparent transparent;
            margin: 0 auto;
            animation: shk1 1s ease-in-out infinite normal;
        }
        .sh2 {
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 0 50px 50px;
            border-color: transparent  transparent #dddddd transparent ;
            margin: -50px auto 0;
            animation: shk2 1s ease-in-out infinite alternate;
        }
        @keyframes shk1 {
            0% {
            transform: rotate(-360deg);
            }  

            100% {
            }
        }

        @keyframes shk2 {
            0% {
            transform: rotate(360deg);
            }
            100% {
            }
        }
        .lt1,.lt2{
            color: #fff;
            text-align: center;
            letter-spacing: 2px;
        }
    </style>
</head>

<body class="bg-transparent">
    <main>
        <div class="main-wrapper pb-0 mb-0">
            <div class="timeline-wrapper">
                <div class="timeline-header">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters align-items-center">
                            <div class="col-lg-6">
                                <div class="timeline-logo-area d-flex align-items-center">
                                    <div class="timeline-logo">
                                        <a href="/" style="color:#dc4734;font-weight:600;font-size:32px">PDC.Plus</a>
                                    </div>
                                    <div class="timeline-tagline">
                                        <h6 class="tagline">Ajuda você a se conectar e partilhar com as pessoas em sua vida!</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <form class="login-area" id="login">
                                    {{ csrf_field() }}
                                    <div class="row align-items-center">
                                        <div class="col-12 col-sm">
                                            <input type="text" placeholder="E-mail ou Nome de utilizador" class="single-field" name="login_username">
                                        </div>
                                        <div class="col-12 col-sm">
                                            <input type="password" placeholder="Palavra-passe" class="single-field" name="login_password">
                                        </div>
                                        <div class="col-12 col-sm-auto">
                                            <button class="login-btn" type="submit">Entrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="timeline-page-wrapper">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6 order-2 order-lg-1">
                                <div class="timeline-bg-content bg-img" data-bg="assets/images/timeline/adda-timeline.jpg">
                                    <h3 class="timeline-bg-title">Partilhe suas ideias!</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 d-flex align-items-center justify-content-center">
                                <div class="signup-form-wrapper">
                                    <div class="signup-inner text-center">
                                        <h3 class="title">Crie sua conta. É gratis!</h3>
                                        <form class="signup-inner--form" id="registar">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" class="single-field" placeholder="E-mail" name="email" onkeyup="this.value = this.value.toLowerCase();">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="single-field" placeholder="Nome de utilizador" name="username" onkeypress="return validarUtilizador(event);" onkeyup="this.value = this.value.toLowerCase();">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="password" class="single-field" placeholder="Palavra-passe" name="password">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="password" class="single-field" placeholder="Confirmação palavra-passe" name="password2">
                                                </div>
                                                <div class="col-12">
                                                    <select class="nice-select" name="cidade">
                                                        <option value="0" data-display="Localização">Localização</option>
                                                        @foreach($cidades as $cidade)
                                                        <option value="{{$cidade->id}}">{{$cidade->nome}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <button class="submit-btn" type="submit">Criar Conta</button>
                                                </div>
                                            </div>
                                            <h6 class="terms-condition">Eu li e aceito os <a href="#">termos de utilização</a>.</h6>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="loader" id="sLoader" style="display:none;">
        <div class="component">
            <div class="sh1"></div>
            <div class="sh2"></div>
            <h4 class="lt1 mt-4 font-weight-light">A enviar...</h4>
            <h6 class="lt2 font-weight-bold">Por favor, aguarde.</h6>
        </div>
    </div>

    <!-- JS ============================================ -->
    <!-- Modernizer JS -->
    <script src="{{asset('')}}assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="{{asset('')}}assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Popper JS -->
    <script src="{{asset('')}}assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('')}}assets/js/vendor/bootstrap.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="{{asset('')}}assets/js/plugins/slick.min.js"></script>
    <!-- nice select JS -->
    <script src="{{asset('')}}assets/js/plugins/nice-select.min.js"></script>
    <!-- audio video player JS -->
    <script src="{{asset('')}}assets/js/plugins/plyr.min.js"></script>
    <!-- perfect scrollbar js -->
    <script src="{{asset('')}}assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!-- light gallery js -->
    <script src="{{asset('')}}assets/js/plugins/lightgallery-all.min.js"></script>
    <!-- image loaded js -->
    <script src="{{asset('')}}assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- isotope filter js -->
    <script src="{{asset('')}}assets/js/plugins/isotope.pkgd.min.js"></script>
    <!-- isotope filter js -->
    <script src="{{asset('')}}assets/js/plugins/toastr.min.js"></script>
    <!-- Main JS -->
    <script src="{{asset('')}}assets/js/main.js"></script>

    <script type="text/javascript">
        function validarUtilizador(e) {
            var keyCode = e.keyCode || e.which;

            //Regex to allow only Alphabets Numbers Dash Underscore and Space
            var pattern = /^[a-z\d\-_.]+$/i;

            var isValid = pattern.test(String.fromCharCode(keyCode));
            if (!isValid) {
                e.preventDefault();
            }

            return true;
        }

        function pausa(tempo) {
            return new Promise((resolve) => setTimeout(resolve, tempo));
        }

        $(function () {
            
        });

        $(document).ready(function(){
            $('.nice-select').change(function(){
                if($('.nice-select').val() != 0){
                    $('.nice-select .current').css('color','#000');
                }else{
                    $('.nice-select .current').css('color','#999');
                }
            });

            $("form#login").submit(function (e) {
                e.preventDefault();
                document.getElementById("sLoader").style.display = "block";
                $.ajax({
                    url:"{{ route('entrar') }}",
                    method: 'post',
                    data: $('form#login').serialize(),
                    success: function (response) {
                        if(response.code == 400){
                            var content = (String(Object.values(response.msg)[0])).split("*");
                            setTimeout(function() {
                                document.getElementById("sLoader").style.display = "none";
                            }, 1500);
                            pausa(1500).then(() => {
                                toastr.warning(content[0], content[1], {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true })
                            });
                        }else if(response.code == 200){
                            $('form#login').each(function(){
                                this.reset();
                            });
                            setTimeout(function() {
                                document.getElementById("sLoader").style.display = "none";
                            }, 1500);
                            pausa(1200).then(() => {
                                window.location.replace("{{ route('inicio') }}");
                            });
                        }else{
                            var content = (String(response.msg)).split("*");
                            setTimeout(function() {
                                document.getElementById("sLoader").style.display = "none";
                            }, 1500);
                            pausa(1500).then(() => {
                                toastr.error(content[0], content[1], {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true });
                            });
                        }



                        /* // Immediately remove current toasts without using animation
                        toastr.remove()

                        // Remove current toasts using animation
                        toastr.clear() */
                        
                        /* toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-bottom-full-width",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        } */
                    },
                    error: function() {
                        setTimeout(function() {
                            document.getElementById("sLoader").style.display = "none";
                        }, 1500);
                        pausa(1500).then(() => {
                            toastr.error('Por favor, tente novamente em alguns instantes. Lamentamos!', 'Erro ao entrar!', {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true });
                        });
                    }
                });
            });

            $("form#registar").submit(function (e) {
                e.preventDefault();
                document.getElementById("sLoader").style.display = "block";
                $.ajax({
                    url:"{{ route('criar_agente') }}",
                    method: 'post',
                    data: $('form#registar').serialize(),
                    success: function (response) {
                        if(response.code == 400){
                            var content = (String(Object.values(response.msg)[0])).split("*");
                            setTimeout(function() {
                                document.getElementById("sLoader").style.display = "none";
                            }, 1500);
                            pausa(1500).then(() => {
                                toastr.warning(content[0], content[1], {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true })
                            });
                        }else if(response.code == 200){
                            var content = (String(response.msg)).split("*");
                            setTimeout(function() {
                                document.getElementById("sLoader").style.display = "none";
                            }, 1500);
                            pausa(1500).then(() => {
                                toastr.success(content[0], content[1], {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true });
                                $('form#registar').each(function(){
                                    this.reset();
                                });
                            });
                        }else{
                            document.getElementById("sLoader").style.display = "none";
                            setTimeout(function() {
                                document.getElementById("sLoader").style.display = "none";
                            }, 1500);
                            pausa(1500).then(() => {
                                toastr.error('Por favor, tente novamente em alguns instantes. Lamentamos!', 'Erro ao efectuar o registo!', {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true });
                            });
                        }
                    },
                    error: function() {
                        setTimeout(function() {
                            document.getElementById("sLoader").style.display = "none";
                        }, 1500);
                        pausa(1500).then(() => {
                            toastr.error('Por favor, tente novamente em alguns instantes. Lamentamos!', 'Erro ao efectuar o registo!', {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true });
                        });
                    }
                });
            });            
        });
    </script>
</body>
</html>