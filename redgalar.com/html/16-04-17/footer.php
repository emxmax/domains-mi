<section class="container-fluid" id="after-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-3 col-md-3 col-sm-3">
					<h3>SUSCRÍBETE</h3>
					<p>Inscribete a nuestro boletin para obtener ofertas, descuentos y sorpresas</p>
					<form action="<?php echo $url;?>enviarform.php" id="form-footer">
						<input type="email" name="mail" placeholder="e-mail" required>
						<button>enviar</button>
					</form>
				</div>
				<div class="col-lg-2 col-lg-offset-1 col-md-3 col-sm-3 mt">
					<h3>CATEGORÍAS</h3>
					<ul>
						<?php 
		                  for($i=0;$i<$nCategoria;$i++){ 
		                    $cate_id = mysql_result($rsCategoria,$i,"cate_id");
		                    $cate_name = mysql_result($rsCategoria,$i,"cate_name");
		                    $cate_url = mysql_result($rsCategoria,$i,"cate_url");
		                    $cate_img = mysql_result($rsCategoria,$i,"cate_img");
		                  ?>
						<li><a href="<?php echo $url;?>categorias/<?php echo $cate_url;?>"><?php echo $cate_name;?></a></li>
						<?php }?>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 mt">
					<h3>CONTACTO</h3>
					<p>Escribenos y nos contactarmos contigo en breve. <br><br>info@redgalar.com</p>
				</div>
				<div class="col-lg-2 col-lg-offset-1 col-md-3 col-sm-3 mt">
					<h3>SÍGUENOS</h3>
					<ol>
						<li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<!--li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li-->
					</ol>
					<a href="<?php echo $url;?>libro-de-reclamaciones">
						<img src="<?php echo $url;?>img/libro-de-reclamaciones.jpg" alt="">
					</a>
				</div>
			</div>
		</div>	
	</div>
</section>
<footer class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-sm-4 text-center">
				<img src="<?php echo $url;?>img/logo-blanco.png" alt="Logo">
			</div>
			<div class="col-lg-8 col-sm-8">
				<p>
					&copy; Copyright 2017. Todos los derechos reservados. Powered by <a href="https://www.mediaimpact.pe">Media impact</a>
				</p>
			</div>
		</div>
	</div>
</footer>
