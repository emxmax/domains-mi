function Noticias()
{
	this.verNoticia=function()
	{
		seccion=$("#pagina").attr('data-id');
		console.log(U.activaNoticia)
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
			$(".itemNoticia"+idPost+" > .col").append('<div class="social-shares"><h4>Share</h4><ul>');
			$(".itemNoticia"+idPost+" > .col > .social-shares > ul").append('<li><a href="http://www.facebook.com/share.php?u='+currentURL+'" target="_blank"><img class="no-preload" src="http://exsa.net/en/wp-content/themes/greenearth/images/icon/dark/social/facebook-share.png"></a></li>');
			$(".itemNoticia"+idPost+" > .col > .social-shares > ul").append('<li><a href="http://twitter.com/home?status='+seccion+' - '+currentURL+'" target="_blank"><img class="no-preload" src="http://exsa.net/wp-content/themes/greenearth/images/icon/dark/social/twitter-share.png"></a></li>');
			$(".itemNoticia"+idPost+" > .col > .social-shares > ul").append('<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='+currentURL+'&amp;title='+seccion+'" target="_blank"><img class="no-preload" src="http://exsa.net/wp-content/themes/greenearth/images/icon/dark/social/linkedin-share.png"></a></li>');
			$(".itemNoticia"+idPost+" > .col").append('</ul></div>');
			$(".itemNoticia"+idPost+" > .col").append('<br/><br/><br/><div class="coments">');
			$(".itemNoticia"+idPost+" > .col > .coments").append('<div class="comment-wrapper"><div id="respond" class="comment-respond">'+
	'<h3 id="reply-title" class="comment-reply-title">'+
		'<cufon class="cufon cufon-canvas" alt="Deja " style="width: 42px; height: 18px;">'+
			'<canvas width="61" height="22" style="width: 61px; height: 22px; top: -2px; left: -3px;"></canvas>'+
			'<cufontext>Deja </cufontext>'+
		'</cufon>'+
		'<cufon class="cufon cufon-canvas" alt="un " style="width: 25px; height: 18px;">'+
			'<canvas width="44" height="22" style="width: 44px; height: 22px; top: -2px; left: -3px;"></canvas>'+
			'<cufontext>un </cufontext>'+
		'</cufon>'+
		'<cufon class="cufon cufon-canvas" alt="comentario " style="width: 102px; height: 18px;">'+
			'<canvas width="121" height="22" style="width: 121px; height: 22px; top: -2px; left: -3px;"></canvas>'+
				'<cufontext>comentario </cufontext>'+
		'</cufon>'+
		'<small>'+
			'<a rel="nofollow" id="cancel-comment-reply-link" href="/quantex-innovadora-tecnologia-de-exsa-reduce-en-18-las-emisiones-de-gei/#respond" style="display:none;">'+
				'<cufon class="cufon cufon-canvas" alt="Cancelar " style="width: 62px; height: 14.3999996185303px;">'+
					'<canvas width="77" height="17" style="width: 77px; height: 17px; top: -2px; left: -3px;"></canvas>'+
					'<cufontext>Cancelar </cufontext>'+
				'</cufon>'+
				'<cufon class="cufon cufon-canvas" alt="respuesta" style="width: 68px; height: 14.3999996185303px;">'+
					'<canvas width="79" height="17" style="width: 79px; height: 17px; top: -2px; left: -3px;"></canvas>'+
					'<cufontext>respuesta</cufontext>'+
				'</cufon>'+
			'</a>'+
		'</small>'+
	'</h3>'+
	'<form action="http://exsa.net/wp-comments-post.php" method="post" id="commentform" class="comment-form" _lpchecked="1">'+
		'<div class="comment-form-author" style="display: inline-block;">'+
			'<label for="author">Name</label> <span class="required">*</span>'+
			'<input id="author" name="author" type="text" value="" size="30" tabindex="1">'+
			'<div class="clear"></div>'+
		'</div>'+
		'<div class="comment-form-email" style="display: inline-block;">'+
			'<label for="email">Email</label> <span class="required">*</span>'+
			'<input id="email" name="email" type="text" value="" size="30" tabindex="2">'+
			'<div class="clear"></div>'+
		'</div>'+
		'<div class="comment-form-url" style="display: inline-block;">'+
			'<label for="url">Website</label>'+
			'<input id="url" name="url" type="text" value="" size="30" tabindex="3">'+
			'<div class="clear"></div>'+
		'</div>'+
/*		'<p class="comment-form-captcha">'+
			'<img src="http://exsa.net/wp-content/themes/greenearth/include/plugin/really-simple-captcha/tmp/399442346.png" alt="captcha" width="95" height="40" style="visibility: visible; opacity: 1;">'+
			'<input type="text" name="comment_captcha_code" id="comment_captcha_code" value="" size="5">'+
			'<input type="hidden" name="comment_captcha_prefix" id="comment_captcha_prefix" value="399442346">'+
			'<label for="captcha_code">Anti-Spam</label>'+
			'<span class="required">*</span>'+
		'</p>'+
		'<div class="clear"></div>'+
		'<p></p>'+*/
		'<div class="comment-form-comment" style="display: inline-block;">'+
			'<textarea id="comment" name="comment" aria-required="true"></textarea>'+
		'</div>							'+				
		'<p class="form-submit">'+
			'<input name="submit" type="submit" id="submit" value="Post comment">'+
			'<input type="hidden" name="comment_post_ID" value="3073" id="comment_post_ID">'+
			'<input type="hidden" name="comment_parent" id="comment_parent" value="0">'+
		'</p>				'+        
        '<input type="hidden" name="icl_comment_language" value="es">  '+        
    '</form>'+
'</div></div>');
			$(".itemNoticia"+idPost+" > .col").append('</div>');
			$(".itemNoticia"+idPost).append('</div')
			$("#contenidoPagina").append('</div>')
		});
	}
}