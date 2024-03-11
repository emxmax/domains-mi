<div class="container-fluid" id="home">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<img src="<?php echo _URL_;?>adminkarl/resources/assets/image/bibliografia/<?php echo $imgportada?>" alt="">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
						<h1><b>K</b>ARL<br> <b>M</b>ASLO</h1>
						<?php echo $descriptionBilio; ?>
						<a href="<?php echo _URL_.$varLang;?>/karl-maslo"><?php echo $gSeguirleendo;?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid" id="contenido" ng-controller="inicioCrtl">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-xs-12 fondo-lista">
						<div class="row" ng-repeat="post in datos">
							<div class="noticia-mini {{post.class}}" style="{{post.backgroundimage}}" >
								<div class="sombra" style="width:100%;height:100%;background-color:rgba(0,25,45,0.8);top:0;left:0;position:absolute;"></div>
								<div class="categoria">
									<a href="<?php echo _URL_.$varLang;?>/{{post.urlcategoria}}"><i class="fa fa-newspaper-o" aria-hidden="true"></i><span>{{post.namecategoria}}</span></a>
								</div>
								<div class="col-lg-12 col-sm-12 col-xs-12 text-center">
									<h2>{{post.titulo}}</h2>
									<div ng-bind-html="post.descripsuperior"></div>
								</div>
								<div class="col-lg-6 col-sm-6 col-xs-12 text-left">
									<span class="fecha">{{post.for_f_publica}}</span>
								</div>
								<div class="col-lg-6 col-sm-6 col-xs-12 text-right">
									<a href="<?php echo _URL_.$varLang;?>/noticias/{{post.nameurl_seo}}" class="leer-mas"><?php echo $gLeermas;?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>

						<div class="row" id="vermasPost">
							<a href="javascript:void(0)" ng-click="paginarPost(numpage)" class="ver-mas"><?php echo $gVermas;?> &nbsp;&nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<aside>
					<div class="col-lg-12 col-sm-12 col-xs-12">
						<h3><?php echo $gSuscb;?><b> <?php echo $gBlog;?></b></h3>
						<form id="frm-suscribete" class="row">
							<div class="form-group">
								<label for="email"><?php echo $gLabel;?></label>
								<input type="hidden" value="<?php echo _URL_.$varLang;?>/gracias" id="url-g">
								<input type="email" class="form-control" name="email" id="e-email" placeholder="Email" required>
							</div>
						 	<button type="submit" class="btn btn-default"><?php echo $gSboton;?></button>
						 	<div class="alerta"></div>
						</form>
					</div>
					<div class="col-lg-12 col-sm-12 col-xs-12">
						<h3><?php echo $gPubli;?><br><b><?php echo $gPopu;?></b></h3>
					</div>
					<div class="col-lg-12 col-sm-12 col-xs-12">
						<div class="row noticia-popular" ng-repeat="post2 in datos2">
							<img src="<?php echo _URL_;?>adminkarl/resources/assets/image/noticia/{{post2.imgportada}}" alt="">
							<h2>{{post2.titulo}}</h2>
							<a href="<?php echo _URL_.$varLang;?>/noticias/{{post2.nameurl_seo}}"><?php echo $gLeermas;?></a>
						</div>
						<div class="row" id="vermasPost2">
							<a href="javascript:void(0)" class="ver-mas" ng-click="paginarPost2(numpage2)"><?php echo $gVermas;?> &nbsp;&nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i></a>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>