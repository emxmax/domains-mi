<?php require_once("menu/head.php");?>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <?php require_once("menu/menu.php");?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-user"></i> Producto</h1>
            <p>Nuevo producto</p>
          </div>
		  <div>
            <a class="btn btn-info btn-flat" href="?accion=productos"><i class="fa fa-mail-reply"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
				<form id="add_producto_redgalar" enctype="multipart/form-data" data-validate="parsley" >
					<div class="row">
						<div class="col-md-6">
						<?php
						if($_SESSION["ses_perfil"]=="Administrador"){
							?>
							<div class="form-group">
								<label class="control-label">Selecionar Empresa:</label>
								<select class="form-control" name="id_empresa" data-required="true">
									<option></option>
									<?php
									foreach($empresa as $ee){
									?>
									<option value="<?php echo $ee['user_id']?>"><?php echo $ee["user_name"]?></option>
									<?php
									}
									?>
								</select>
							</div>
							<?php
						}
						else{
							?>
							<input type="hidden" id="id_empresa" name="id_empresa" value="<?php echo $_SESSION["ses_id"];?>">
							<?php
						}
						?>
						  
						  <div class="form-group">
							<label class="control-label">Nombre del producto:</label>
							<input class="form-control" name="pro_name" type="text" placeholder="Producto" data-required="true">
						  </div>
						  <div class="form-group">
							<label class="control-label">Codigo del producto:</label>
							<input class="form-control text_mayus" name="pro_codigo" type="text" placeholder="Codigo" data-required="true">
						  </div>
						  <div class="form-group">
							<label class="control-label">Categoria:</label>
							<select class="form-control" name="cate_id" data-required="true">
								<option></option>
								<?php
								foreach($catg as $c){
								?>
								<option value="<?php echo $c['cate_id']?>"><?php echo $c["cate_name"]?></option>
								<?php
								}
								?>
							</select>
						  </div>
						  <div class="form-group">
							<label class="control-label">Url:</label>
							<input class="form-control" name="pro_url" type="text" placeholder="url" data-required="true">
						  </div>
						  <div class="form-group">
							<label class="control-label">Precio:</label>
							<input class="form-control" name="precio" type="text" placeholder="Precio regular" data-required="true">
						  </div>
						  <div class="form-group">
								<label class="control-label">Precio Oferta</label>
								<input class="form-control" name="precio_o" type="text" placeholder="Precio oferta" data-required="true">
						  </div>
						  <div class="form-group">
								<label class="control-label">Precio Culqui</label>
								<input class="form-control" name="precio_culqui" type="text" placeholder="Precio Culqui" data-required="true">
						  </div>
						  
						  <div class="form-group">
								<label class="control-label">Orden del producto</label>
								<input class="form-control" name="pro_orden" type="number" placeholder="Orden del producto" data-required="true">
						  </div>
						  
							<div class="form-group">
								<label class="control-label">Detalles</label>
								<textarea class="form-control" name="detalles" placeholder="Detalles" data-required="true"></textarea>
							</div>
						  
						</div>
						<div class="col-md-6">
							
							<div class="form-group">
								<label class="control-label">Descripcion</label>
								<textarea class="form-control" name="descripcion" placeholder="Descripcion" data-required="true"></textarea>
							</div>
							
							<div class="form-group">
								<label class="control-label">Opciones:</label>
								<div class="row">
									<div class="col-md-6">
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_dedicatoria"> Dedicatoria
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_frases"> Frases
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_temas"> Temas
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_jugos"> Jugos
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_bebidas"> Bebidas
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_cervezas"> Cervezas
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_aperitivos"> Aperitivos
											</label>
										</div>
									</div>
									
									<div class="col-md-6">
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_sandwiches"> Sandwiches
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_salados"> Salados
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_dulces"> Dulces
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_galletas_artesanales"> Galletas artesanales
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_fotos"> Fotos
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_adicional_1"> Adicional 1
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_adicional_2"> Adicional 2
											</label>
										</div>
									
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Foto:</label>
								<br>
								<img src="../img/select.png" alt="" id="img_avatar" class="img-thumbnail avatar-redgalar">
								<div class="form-group">
									<br>
									<input class="form-control" type="file" name="foto" id="load_img">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Nombre de la imagen:</label>
								<input class="form-control" name="pro_img_name" type="text" placeholder="Nombre de la imagen" data-required="true">
							</div>
							
						</div>
						<div class="col-md-12">
							<div class="card-footer">
								<input type="hidden" id="acc" name="acc" value="1">
								<button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="?accion=productos"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
							</div>
						</div>
					</div>
                </form>
			  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <?php require_once("menu/footerjs.php");?>
	<!-- parsley -->
	<script src="<?php echo Conectar::ruta();?>template/js/parsley/parsley.min.js"></script>
	<script src="<?php echo Conectar::ruta();?>template/js/parsley/parsley.extend.js"></script>
	<script src="<?php echo Conectar::ruta();?>template/js/plugins/bootstrap-notify.min.js"></script>
	<script src="<?php echo Conectar::ruta();?>template/js/newproducto.js"></script>
  </body>
</html>