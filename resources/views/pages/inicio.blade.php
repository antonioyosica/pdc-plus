@extends('layouts.principal')
@section('css')
<style type="text/css">
    #listarLigacao .profile-thumb.active::before {
        bottom: 9px !important;
        right: -2px !important;
    }
</style>
@endsection

@section('main')
<main>
    <div class="main-wrapper pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside class="widget-area">
                        <!-- widget single item start -->
                        <div class="card widget-item" id="agenteSugeridosCard">
                            <h4 class="widget-title">agentes sugeridos</h4>
                            <div class="widget-body">
                                <ul class="like-page-list-wrapper" id="agenteSugeridos">
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- widget single item end -->

                        <!-- widget single item start -->
                        <div class="card widget-item" id="pedidosLigacaoCard">
                            <h4 class="widget-title" style="text-transform:none;">Pedidos de Ligação</h4>
                            <div class="widget-body">
                                <ul class="like-page-list-wrapper" id="pedidosLigacao">
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- widget single item end -->

                        <!-- widget single item start -->
                        <div class="card widget-item" id="listarLigacaoCard">
                            <h4 class="widget-title" style="text-transform:none;">Ligações</h4>
                            <div class="widget-body">
                                <ul class="like-page-list-wrapper" id="listarLigacao">
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- widget single item end -->
                    </aside>
                </div>

                <div class="col-lg-6 order-1 order-lg-2">
                    <!-- share box start -->
                    <div class="card card-small">
                        <div class="share-box-inner">
                            <!-- profile picture end -->
                            <div class="profile-thumb">
                                <a href="#">
                                    <figure class="profile-thumb-middle">
                                        <img src="assets/images/profile/profile-small-37.jpg" alt="profile picture">
                                    </figure>
                                </a>
                            </div>
                            <!-- profile picture end -->

                            <!-- share content box start -->
                            <div class="share-content-box w-100">
                                <form class="share-text-box" id="post">
                                	{{ csrf_field() }}
                                	<input type="hidden" name="id" value="{{$agente->id}}">
                                	<input type="hidden" name="permissao" value="{{$agente->permissao_id}}">
                                    <textarea name="conteudo" class="share-text-field" aria-disabled="true" placeholder="Partilhe as suas ideias..." data-toggle="modal" data-target="#modalPost" id="email"></textarea> 
                                    <button class="btn-share" type="submit">Publicar</button>
                                </form>
                            </div>
                            <!-- share content box end -->

                            <!-- Modal start -->
                            <form class="modal fade" id="modalPost" aria-labelledby="modalPost" data-backdrop="static" style="background-color: rgba(0,0,0,.60);height:100vh;">
                                {{ csrf_field() }}
                                <div class="modal-dialog">
                                    <div class="modal-content" style="border-radius:0;">
                                        <div class="modal-header" style="background-color:#dc4734;border-top-left-radius:0;border-top-right-radius:0;">
                                            <h5 class="modal-title w-100 text-center text-white">Partilhe as suas ideias!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea name="share" class="share-field-big custom-scroll" placeholder="Partilha o que está em sua mente com as pessoas em sua vida..."></textarea>
                                            <div class="row">
                                                <div class="col-6">
                                                    <select class="nice-select" name="sortby">
                                                        <option value="trending">Gender</option>
                                                        <option value="sales">Male</option>
                                                        <option value="sales">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <select class="nice-select" name="sortby">
                                                        <option value="trending">Age</option>
                                                        <option value="sales">18+</option>
                                                        <option value="sales">18-</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        	<h6 class="author" style="margin-left:0;margin-right:auto;"><a href="#"><i class="bi bi-cloud-upload-fill"></i>Carregar ficheiro</a></h6>
                    						<button type="button" class="post-share-btn" onclick="discartar">Discartar</button>
                                            <button type="submit" class="post-share-btn">Publicar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Modal end -->
                        </div>
                    </div>
                    <!-- share box end -->

                    <!-- post status start -->
                    <div id="posts"></div>
                    <!-- post status end -->
                </div>

                <div class="col-lg-3 order-3">
                    <aside class="widget-area">
                        <!-- widget single item start -->
                        <div class="card widget-item">
                            <h4 class="widget-title">Recent Notifications</h4>
                            <div class="widget-body">
                                <ul class="like-page-list-wrapper">
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="profile-thumb">
                                            <a href="#">
                                                <figure class="profile-thumb-small">
                                                    <img src="assets/images/profile/profile-small-9.jpg" alt="profile picture">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- profile picture end -->

                                        <div class="unorder-list-info">
                                            <h3 class="list-title"><a href="#">Any one can join with us if you want</a></h3>
                                            <p class="list-subtitle">5 min ago</p>
                                        </div>
                                    </li>
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="profile-thumb">
                                            <a href="#">
                                                <figure class="profile-thumb-small">
                                                    <img src="assets/images/profile/profile-small-35.jpg" alt="profile picture">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- profile picture end -->

                                        <div class="unorder-list-info">
                                            <h3 class="list-title"><a href="#">Any one can join with us if you want</a></h3>
                                            <p class="list-subtitle">10 min ago</p>
                                        </div>
                                    </li>
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="profile-thumb">
                                            <a href="#">
                                                <figure class="profile-thumb-small">
                                                    <img src="assets/images/profile/profile-small-15.jpg" alt="profile picture">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- profile picture end -->

                                        <div class="unorder-list-info">
                                            <h3 class="list-title"><a href="#">Any one can join with us if you want</a></h3>
                                            <p class="list-subtitle">18 min ago</p>
                                        </div>
                                    </li>
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="profile-thumb">
                                            <a href="#">
                                                <figure class="profile-thumb-small">
                                                    <img src="assets/images/profile/profile-small-6.jpg" alt="profile picture">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- profile picture end -->

                                        <div class="unorder-list-info">
                                            <h3 class="list-title"><a href="#">Any one can join with us if you want</a></h3>
                                            <p class="list-subtitle">25 min ago</p>
                                        </div>
                                    </li>
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="profile-thumb">
                                            <a href="#">
                                                <figure class="profile-thumb-small">
                                                    <img src="assets/images/profile/profile-small-34.jpg" alt="profile picture">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- profile picture end -->

                                        <div class="unorder-list-info">
                                            <h3 class="list-title"><a href="#">Any one can join with us if you want</a></h3>
                                            <p class="list-subtitle">39 min ago</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- widget single item end -->

                        <!-- widget single item start -->
                        <div class="card widget-item">
                            <h4 class="widget-title">Advertizement</h4>
                            <div class="widget-body">
                                <div class="add-thumb">
                                    <a href="#">
                                        <img src="assets/images/banner/advertise.jpg" alt="advertisement">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- widget single item end -->

                        <!-- widget single item start -->
                        <div class="card widget-item">
                            <h4 class="widget-title">Friends Zone</h4>
                            <div class="widget-body">
                                <ul class="like-page-list-wrapper">
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="profile-thumb">
                                            <a href="#">
                                                <figure class="profile-thumb-small">
                                                    <img src="assets/images/profile/profile-small-33.jpg" alt="profile picture">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- profile picture end -->

                                        <div class="unorder-list-info">
                                            <h3 class="list-title"><a href="#">Ammeya Jakson</a></h3>
                                            <p class="list-subtitle"><a href="#">10 mutual</a></p>
                                        </div>
                                        <button class="like-button">
                                            <img class="heart" src="assets/images/icons/heart.png" alt="">
                                            <img class="heart-color" src="assets/images/icons/heart-color.png" alt="">
                                        </button>
                                    </li>
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="profile-thumb">
                                            <a href="#">
                                                <figure class="profile-thumb-small">
                                                    <img src="assets/images/profile/profile-small-30.jpg" alt="profile picture">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- profile picture end -->

                                        <div class="unorder-list-info">
                                            <h3 class="list-title"><a href="#">Jashon Muri</a></h3>
                                            <p class="list-subtitle"><a href="#">2 mutual</a></p>
                                        </div>
                                        <button class="like-button active">
                                            <img class="heart" src="assets/images/icons/heart.png" alt="">
                                            <img class="heart-color" src="assets/images/icons/heart-color.png" alt="">
                                        </button>
                                    </li>
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="profile-thumb">
                                            <a href="#">
                                                <figure class="profile-thumb-small">
                                                    <img src="assets/images/profile/profile-small-5.jpg" alt="profile picture">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- profile picture end -->

                                        <div class="unorder-list-info">
                                            <h3 class="list-title"><a href="#">Rolin Theitar</a></h3>
                                            <p class="list-subtitle"><a href="#">drama</a></p>
                                        </div>
                                        <button class="like-button">
                                            <img class="heart" src="assets/images/icons/heart.png" alt="">
                                            <img class="heart-color" src="assets/images/icons/heart-color.png" alt="">
                                        </button>
                                    </li>
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="profile-thumb">
                                            <a href="#">
                                                <figure class="profile-thumb-small">
                                                    <img src="assets/images/profile/profile-small-29.jpg" alt="profile picture">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- profile picture end -->

                                        <div class="unorder-list-info">
                                            <h3 class="list-title"><a href="#">Active Mind</a></h3>
                                            <p class="list-subtitle"><a href="#">fitness</a></p>
                                        </div>
                                        <button class="like-button">
                                            <img class="heart" src="assets/images/icons/heart.png" alt="">
                                            <img class="heart-color" src="assets/images/icons/heart-color.png" alt="">
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- widget single item end -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script type="text/javascript">
	document.getElementById("inicio").className += " active";
    $(function(){
        carregarPublicacao();
        carregarSugestaoAgente();
        carregarPedidosLigacao();
        carregarLigacoes();
    });

    function pausa(tempo) {
        return new Promise((resolve) => setTimeout(resolve, tempo));
    }

	function tempoPublicacao(dataTempo){
		switch(typeof dataTempo){
			case 'number':
			break;
			case 'string':
				dataTempo =+ new Date(dataTempo);
				break;
			case 'object':
				if(dataTempo.constructor === Date) dataTempo = dataTempo.getTime();
				break;
			default:
				dataTempo =+ new Date();
		}

		var formatos = [
			[60, 'segundos', 1], // 60
			[120, '1 minuto atrás', '1 minuto a partir de agora'], // 60*2
			[3600, 'minutos', 60], // 60*60, 60
			[7200, '1 hora atrás', '1 hora a partir de agora'], // 60*60*2
			[86400, 'horas', 3600], // 60*60*24, 60*60
			[172800, 'Ontem', 'Amanhã'], // 60*60*24*2
			[604800, 'dias', 86400], // 60*60*24*7, 60*60*24
			[1209600, 'Semana anterior', 'Semana que vem'], // 60*60*24*7*4*2
			[2419200, 'semanas', 604800], // 60*60*24*7*4, 60*60*24*7
			[4838400, 'Mês passado', 'Próximo mês'], // 60*60*24*7*4*2
			[29030400, 'meses', 2419200], // 60*60*24*7*4*12, 60*60*24*7*4
			[58060800, 'Ano passado', 'Próximo ano'], // 60*60*24*7*4*12*2
			[2903040000, 'anos', 29030400], // 60*60*24*7*4*12*100, 60*60*24*7*4*12
			[5806080000, 'Século passado', 'Próximo século'], // 60*60*24*7*4*12*100*2
			[58060800000, 'séculos', 2903040000] // 60*60*24*7*4*12*100*20, 60*60*24*7*4*12*100
		];
		var segundos = (+new Date() - dataTempo) / 1000,
			token = 'atrás',
			posicao_lista = 1;

		if (segundos == 0) {
			return 'Agora mesmo'
		}

		if (segundos < 0) {
			segundos = Math.abs(segundos);
			token = 'a partir de agora';
			posicao_lista = 2;
		}
		var i = 0,
			formato;
		while (formato = formatos[i++])
			if (segundos < formato[0]) {
		if (typeof formato[2] == 'string')
			return formato[posicao_lista];
		else
			return Math.floor(segundos / formato[2]) + ' ' + formato[1] + ' ' + token;
		}
		return dataTempo;
	}

    function pedirLigacao(agente_id, tipo) {
        $.ajax({
            url:"{{ route('pedir') }}",
            method: 'post',
            data: {'agente_origem': '{{ $agente->id }}', 'agente_destino': agente_id, 'tipo': tipo, },
            success: function (response) {
                if(response.code == 200){
                    carregarSugestaoAgente();
                }
            },
            error: function() {
                toastr.error('Por favor, tente novamente em alguns instantes. Lamentamos!', 'Erro ao pedir ligação!', {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true });
            }
        });
    }

    function mudarEstadoLigacao(estado, agente_origem){
        $.ajax({
            url:"{{ route('estado') }}",
            method: 'post',
            data: {'user_id': '{{ $agente->id }}', 'agente_origem': agente_origem, 'estado': estado},
            success: function (response) {
                if(response.code != 200){
                    toastr.error('Por favor, tente novamente em alguns instantes. Lamentamos!', 'Erro ao executar esta operação!', {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true });
                }
            },
            error: function() {
                toastr.error('Por favor, tente novamente em alguns instantes. Lamentamos!', 'Erro ao executar esta operação!', {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true });
            }
        });
    }

    function chatPrivado(id, nome, is_online){
        $('#author-name').html(nome);
        window.localStorage.setItem('brwsco', id);
        if(is_online == '1'){
            $(".live-chat-title .profile-thumb").addClass('active');
        }
        $('#chat-input').css('visibility', 'visible');
        $(".chat-output-box").addClass('show');
    }

    function discartar(){
        $('#modalPost').modal('hide');
        $('#modalPost').each(function(){
            this.reset();
        });
    }

	function carregarPublicacao(){
		let posts = '';
		$.ajax({
            url: "{{ route('publicacao') }}",
            method: 'get',
            data: {'token': '{{ \Crypt::encrypt($agente->id) }}'},
            success: function (response) {
                $.each(response.publicacao, function (key, value) {
                    posts += '<div class="card"><div class="post-title d-flex align-items-center"><div class="profile-thumb"> <a href="#"> <figure class="profile-thumb-middle"> <img src="assets/images/profile/profile-small-9.jpg" alt="profile picture"> </figure> </a> </div><div class="posted-author"> <h6 class="author"><a href="#">'+value.nome_completo+'</a></h6> <span class="post-time">'+tempoPublicacao(new Date(Date.parse(value.data_criacao)))+'</span> </div> <div class="post-settings-bar"> <span></span> <span></span> <span></span> <div class="post-settings arrow-shape"> <ul> <li><button>copy link to adda</button></li> <li><button>edit post</button></li> <li><button>embed adda</button></li> </ul> </div> </div> </div><div class="post-content"> <p class="post-desc pb-0">'+value.conteudo+'</p> <div class="post-meta"> <button class="post-meta-like"> <i class="bi bi-heart-beat"></i> <span>You and 206 people like this</span> <strong>206</strong> </button> <ul class="comment-share-meta"> <li> <button class="post-comment"> <i class="bi bi-hand-thumbs-up"></i> <span>41</span> </button> </li> <li> <button class="post-share"> <i class="bi bi-hand-thumbs-down"></i> <span>07</span> </button> </li> </ul> </div> </div> </div>';
                  
                });

                $('#posts').html(posts);
            }
        });
	}

    function carregarSugestaoAgente(){
        let sugestoes = '';
        $.ajax({
            url: "{{ route('sugestao') }}",
            method: 'get',
            data: {
                'uToken': '{{ \Crypt::encrypt($agente->id) }}',
                'cToken': '{{ \Crypt::encrypt($agente->cidade_id) }}'
            },
            success: function (response) {
                if ((response.agente).length === 0){
                    $('#agenteSugeridosCard').css('display', 'none');
                }else{
                    $('#agenteSugeridosCard').css('display', 'block');
                    $.each(response.agente, function (key, value) {
                        sugestoes += '<li class="unorder-list"><div class="profile-thumb"><a href="#"><figure class="profile-thumb-small"><img src="assets/images/profile/profile-small-33.jpg" alt="profile picture"></figure></a></div><div class="unorder-list-info"><h3 class="list-title"><a href="#">'+value.nome_completo+'</a></h3><p class="list-subtitle"><a onclick="pedirLigacao('+value.id+', \''+value.tipo+'\')"><i class="bi bi-person-plus-fill"></i> Pedir ligação</a></p></div></li>';
                    });

                    $('#agenteSugeridos').html(sugestoes);
                }
            }
        });
    }

    function carregarPedidosLigacao(){
        let pedidos = '';
        $.ajax({
            url: "{{ route('pedido') }}",
            method: 'get',
            data: {'token': '{{ \Crypt::encrypt($agente->id) }}'},
            success: function (response) {
                if ((response.agente).length === 0){
                    $('#pedidosLigacaoCard').css('display', 'none');
                }else{
                    $('#pedidosLigacaoCard').css('display', 'block');
                    $.each(response.agente, function (key, value) {
                        pedidos += '<li class="unorder-list"><div class="profile-thumb"><a href="#"><figure class="profile-thumb-small"><img src="assets/images/profile/profile-small-33.jpg" alt="profile picture"></figure></a></div><div class="unorder-list-info"><h3 class="list-title"><a href="#">'+value.nome_completo+'</a></h3><p class="list-subtitle"><a onclick="mudarEstadoLigacao(1,\''+value.agente_origem+'\')"><i class="bi bi-person-check-fill"></i> Aceitar</a><a onclick="mudarEstadoLigacao(0,\''+value.agente_origem+'\')" style="float:right;"><i class="bi bi-person-x-fill"></i> Rejeitar</a></p></div></li>';
                    });

                    $('#pedidosLigacao').html(pedidos);
                }
            }
        });
    }

    function carregarLigacoes(){
        let ligacoes = '';
        $.ajax({
            url: "{{ route('ligacoes') }}",
            method: 'get',
            data: {'token': '{{ \Crypt::encrypt($agente->id) }}'},
            success: function (response) {
                if ((response.agente).length === 0){
                    $('#listarLigacaoCard').css('display', 'none');
                }else{
                    $('#listarLigacaoCard').css('display', 'block');
                    $.each(response.agente, function (key, value) {
                        let online = '';
                        if(value.is_online == '1'){
                            online = 'active';
                            if(window.localStorage.getItem('brwsco') == value.is_online){
                                $(".live-chat-title .profile-thumb").addClass('active');
                            }
                        }else{
                            if(window.localStorage.getItem('brwsco') == value.is_online){
                                $(".live-chat-title .profile-thumb").removeClass('active');
                            }
                        }
                        ligacoes += '<li class="unorder-list"><div class="profile-thumb '+online+'"><a href="#"><figure class="profile-thumb-small"><img src="assets/images/profile/profile-small-33.jpg" alt="profile picture"></figure></a></div><div class="unorder-list-info"><h3 class="list-title"><a href="#">'+value.nome_completo+'</a></h3><p class="list-subtitle"><a onclick="chatPrivado(\''+value.id+'\', \''+value.nome_completo+'\', \''+value.is_online+'\')"><i class="bi bi-chat-left-text-fill"></i> Mensagem</a></p></div></li>';
                    });

                    $('#listarLigacao').html(ligacoes);
                }
            }
        });
    }

	$(document).ready(function(){
        setInterval(carregarPublicacao, 60000);
        setInterval(carregarSugestaoAgente, 30000);
        setInterval(carregarPedidosLigacao, 2500);
		setInterval(carregarLigacoes, 5000);

	    $("form#post").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url:"{{ route('textual') }}",
                method: 'post',
                data: $('form#post').serialize(),
                success: function (response) {
                    if(response.code == 400){
                        var content = (String(Object.values(response.msg)[0])).split("*");
                        toastr.warning(content[0], content[1], {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true })
                    }else if(response.code == 200){
                    	carregarPublicacao();
                        var content = (String(response.msg)).split("*");
                        toastr.success(content[0], content[1], {timeOut: 4000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true });
                        $('form#post').each(function(){
                            this.reset();
                        });
                    }else{
                        toastr.error('Por favor, tente novamente em alguns instantes. Lamentamos!', 'Erro ao partilhar a publicação!', {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true });
                    }
                },
                error: function() {
                    toastr.error('Por favor, tente novamente em alguns instantes. Lamentamos!', 'Erro ao partilhar a publicação!', {timeOut: 6000, positionClass: 'toast-bottom-full-width', showEasing: 'swing', hideEasing: 'linear', showMethod: 'fadeIn', hideMethod: 'fadeOut', closeButton: false, preventDuplicates: true });
                }
            });
        });
	});
</script>
@endsection