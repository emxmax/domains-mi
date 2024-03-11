<section id="pagina" data-id="<?php echo $seccion; ?>">
	<div class="jumbotron">
		<div class="container">
			<div class="row" id="rute">
				<ol class="breadcrumb" id="breadcrumb">
							  	
				</ol>
			</div>
			<div class="row">
				<?php
					if($seccion=="news"){
				?>
				<div class="col-xg-8 col-md-8 col-sm-8 col-xs-12" id="listaNoticias">
									
				</div>
				<div class="col-xg-4 col-md-4 col-sm-4 col-xs-12" id="resumenNoticias">
					<?php						
						include('sidebar.php');
					?>	
						<br/>
						<div class="fb-page" data-href="https://www.facebook.com/exsa.net"  data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/exsa.net"><a href="https://www.facebook.com/exsa.net">EXSA S.A.</a></blockquote></div></div>
						<br/>
						<a class="twitter-timeline" href="https://twitter.com/exsasoluciones" data-widget-id="656584116872286208">Tweets por el @exsasoluciones.</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						<a class="linkBlog" href="http://exsasoluciones.pe/" target="_blank"><img src="imagenes/exsa-02.png"></a>		
						<a class="linkBlog" href="http://exsasoluciones.co/" target="_blank"><img src="imagenes/exsa-01.png"></a>	
						<a class="linkBlog" href="http://exsasoluciones.cl/" target="_blank"><img src="imagenes/exsa-03.png"></a>
				</div>
				<?php
					}else{
						include('noticiasJs.php');
				?>
						<div class="col-xg-4 col-md-4 col-sm-4 col-xs-12" id="secSidebar">
							<?php						
								include('sidebar.php');
							?>								
						</div>
						<?php
							if($seccion=="sitemap"){
								include('secciones/sitemap.php');
							}else{
						?>
								<div class="col-xg-8 col-md-8 col-sm-8 col-xs-12" id="contenidoPagina">
									<div id="variable">
										
									</div>									
								</div>									
								<script>
									a = helper.url1();
									a = a.slice(3);
									//alert(a);
									$("#breadcrumb").append('<li><a href="index.php">Exsa</a></li>');
									$("#breadcrumb").append('<li><a href="sala-de-prensa">Press</a></li>');
									$("#breadcrumb").append('<li><a href="news">News</a></li>');
									$("#breadcrumb").append('<li class="active">'+a+'</li>');
								</script>
						<?php
							}
					}
				?>	
			</div>
		</div>
	</div>
</section>