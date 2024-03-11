function Noticias()
{
	this.verNoticia=function()
	{
		seccion=$("#pagina").attr('data-id');
		if(U.activaNoticia==1){
			proceso.procesar('getPostEspecifico',seccion,mostrarNoticia);
		}
		//proceso.procesar('getPostEspecifico',seccion,mostrarNoticia);
	}
	function mostrarNoticia(data)
	{
		$("#secSidebar").hide();
		$("#contenidoPagina").removeClass('col-xg-8');
		$("#contenidoPagina").removeClass('col-md-8');
		$("#contenidoPagina").removeClass('col-sm-8');
		$("#contenidoPagina").addClass('col-xg-12');
		$("#contenidoPagina").addClass('col-md-12');
		$("#contenidoPagina").addClass('col-sm-12');
		$("#contenidoPagina").html('');
		$.each(data, function( index, value ) {
			fecha=value.fecha;
			usuario=value.usuario;
			comentarios=value.comentarios;
			titulo=value.titulo;
			contenido=value.contenido;
			idPost=value.idPost;
			seccion=value.seccion;
			var currentURL = window.location.href;
			$("#contenidoPagina").append('<div class="row itemNoticia itemNoticia'+idPost+'">')
			$(".itemNoticia"+idPost).append('<div class="col-sm-12 col">')
			$(".itemNoticia"+idPost+" > .col").append('<h3 class="tituloNoticia">'+titulo+'</h3>');
			$(".itemNoticia"+idPost+" > .col").append('<div class="infoPost"><i class="fa fa-clock-o fa-1"></i>'+fecha+'<i class="fa fa-user fa-1"></i>'+usuario+'</div>');
			$(".itemNoticia"+idPost+" > .col").append('<div class="contenidoPost">'+contenido+'</div>');
			$(".itemNoticia"+idPost+" > .col").append('<div class="social-shares"><h4>Compartir</h4><ul>');
			$(".itemNoticia"+idPost+" > .col > .social-shares > ul").append('<li><a href="http://www.facebook.com/share.php?u='+currentURL+'" target="_blank"><img class="no-preload" src="http://exsa.net/wp-content/themes/greenearth/images/icon/dark/social/facebook-share.png"></a></li>');
			$(".itemNoticia"+idPost+" > .col > .social-shares > ul").append('<li><a href="http://twitter.com/home?status='+seccion+' - '+currentURL+'" target="_blank"><img class="no-preload" src="http://exsa.net/wp-content/themes/greenearth/images/icon/dark/social/twitter-share.png"></a></li>');
			$(".itemNoticia"+idPost+" > .col > .social-shares > ul").append('<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='+currentURL+'&amp;title='+seccion+'" target="_blank"><img class="no-preload" src="http://exsa.net/wp-content/themes/greenearth/images/icon/dark/social/linkedin-share.png"></a></li>');
			$(".itemNoticia"+idPost+" > .col").append('</ul></div>');
			$(".itemNoticia"+idPost).append('</div')
			$("#contenidoPagina").append('</div>')
		});
	}
}