<?php require_once("menu/head.php");?>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <?php require_once("menu/menu.php");?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-user"></i> Producto</h1>
            <p><?php echo utf8_encode($producto["pro_name"]);?></p>
          </div>
		  <div>
            <a class="btn btn-info btn-flat" href="?accion=productos"><i class="fa fa-mail-reply"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
				<form id="edit_producto_redgalar" enctype="multipart/form-data" data-validate="parsley" >
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
									if($producto["id_empresa"] == $ee['user_id']){
										?>
										<option value="<?php echo $ee['user_id']?>" selected><?php echo $ee["user_name"]?></option>
										<?php
									}
									else{
										?>
										<option value="<?php echo $ee['user_id']?>"><?php echo $ee["user_name"]?></option>
										<?php
									}
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
							<input class="form-control" name="pro_name" type="text" placeholder="Producto" value="<?php echo utf8_encode($producto["pro_name"]);?>" data-required="true">
						  </div>
						  <div class="form-group">
							<label class="control-label">Codigo del producto:</label>
							<input class="form-control text_mayus" name="pro_codigo" type="text" placeholder="Codigo" value="<?php echo $producto["pro_codigo"];?>" data-required="true">
						  </div>
						  <div class="form-group">
							<label class="control-label">Categoria:</label>
							<select class="form-control" name="cate_id" data-required="true">
								<option></option>
								<?php
								foreach($catg as $c){
									if($c['cate_id'] == $producto["cate_id"]){
									?>
									<option value="<?php echo $c['cate_id']?>" selected><?php echo $c["cate_name"]?></option>
									<?php
									}
									else{
									?>
									<option value="<?php echo $c['cate_id']?>"><?php echo $c["cate_name"]?></option>
									<?php
									}
								}
								?>
							</select>
						  </div>
						  <div class="form-group">
							<label class="control-label">Url:</label>
							<input class="form-control" name="pro_url" type="text" value="<?php echo $producto["pro_url"];?>" placeholder="url" data-required="true">
						  </div>
						  <div class="form-group">
							<label class="control-label">Precio:</label>
							<input class="form-control" name="precio" type="text" placeholder="Precio regular" value="<?php echo $producto["pro_precio_n"];?>" data-required="true">
						  </div>
						  <div class="form-group">
								<label class="control-label">Precio Oferta</label>
								<input class="form-control" name="precio_o" type="text" placeholder="Precio oferta" value="<?php echo $producto["pro_precio_o"];?>" data-required="true">
						  </div>
						  <div class="form-group">
								<label class="control-label">Precio Culqui</label>
								<input class="form-control" name="precio_culqui" type="text" placeholder="Precio Culqui" value="<?php echo $producto["pro_precio_culqi"];?>" data-required="true">
						  </div>
						  
						  <div class="form-group">
								<label class="control-label">Orden del producto</label>
								<input class="form-control" name="pro_orden" type="number" placeholder="Orden del producto" value="<?php echo $producto["pro_orden"];?>" data-required="true">
						  </div>
						  
						  <div class="form-group">
								<label class="control-label">Detalles</label>
								<textarea class="form-control" name="detalles" placeholder="Detalles" data-required="true"><?php echo utf8_encode($producto["pro_detalles"]);?></textarea>
						  </div>
						  
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Descripcion</label>
								<textarea class="form-control" name="descripcion" placeholder="Descripcion" data-required="true"><?php echo utf8_encode($producto["pro_desc"]);?></textarea>
							</div>
							
							<div class="form-group">
								<label class="control-label">Opciones:</label>
								<div class="row">
									<div class="col-md-6">
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_dedicatoria" <?php echo ($producto["pro_dedicatoria"]== 1)?'checked':'';?>> Dedicatoria
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_frases" <?php echo ($producto["pro_frases"]== 1)?'checked':'';?>> Frases
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_temas" <?php echo ($producto["pro_temas"]== 1)?'checked':'';?>> Temas
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_jugos" <?php echo ($producto["pro_jugos"]== 1)?'checked':'';?>> Jugos
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_bebidas" <?php echo ($producto["pro_bebidas"]== 1)?'checked':'';?>> Bebidas
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_cervezas" <?php echo ($producto["pro_cervezas"]== 1)?'checked':'';?>> Cervezas
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_aperitivos" <?php echo ($producto["pro_aperitivos"]== 1)?'checked':'';?>> Aperitivos
											</label>
										</div>
									</div>
									
									<div class="col-md-6">
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_sandwiches" <?php echo ($producto["pro_sandwiches"]== 1)?'checked':'';?>> Sandwiches
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_salados" <?php echo ($producto["pro_salados"]== 1)?'checked':'';?>> Salados
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_dulces" <?php echo ($producto["pro_dulces"]== 1)?'checked':'';?>> Dulces
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_galletas_artesanales" <?php echo ($producto["pro_galletas_artesanales"]== 1)?'checked':'';?>> Galletas artesanales
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_fotos" <?php echo ($producto["pro_fotos"]== 1)?'checked':'';?>> Fotos
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_adicional_1" <?php echo ($producto["pro_adicional_1"]== 1)?'checked':'';?>> Adicional 1
											</label>
										</div>
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" value="1" name="pro_adicional_2" <?php echo ($producto["pro_adicional_2"]== 1)?'checked':'';?>> Adicional 2
											</label>
										</div>
									
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Foto:</label>
								<br>
								<?php
								if($producto["pro_img"] != ""){
									?>
									<img src="../img/<?php echo $producto["pro_img"]?>" alt="" id="img_avatar" class="img-thumbnail avatar-redgalar">
									<?php
								}
								else{
									?>
									<img src="../img/select.png" alt="" id="img_avatar" class="img-thumbnail avatar-redgalar">
									<?php
								}
								?>
								<!-- Aqui Va -->
							</div>

							<div class="form-group">
								<label class="control-label">Nombre de la imagen:</label>
								<input class="form-control" name="pro_img_name" type="text" placeholder="Nombre de la imagen" value="<?php echo utf8_encode($producto["pro_img_name"]); ?>" data-required="true">
								<!-- 28-10-17 -->



								<!--  -->
							</div>								
							<div class="form-group">
								<label class="control-label">Producto Destacado:</label>
								<div class="checkbox">
									<label>
									  <input type="checkbox" value="1" name="pro_destacado" <?php echo ($producto["pro_destacado"]== 1)?'checked':'';?>> Producto Destacado
									</label>
								</div>
							</div>
							
						</div>
						<div class="col-md-12">
							<div class="card-footer">
								<input type="hidden" id="acc" name="acc" value="4">
								<input type="hidden" id="pro_id" name="pro_id" value="<?php echo $producto["pro_id"];?>">
								<button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Actualizar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="?accion=productos"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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
	<script src="<?php echo Conectar::ruta();?>template/js/editproducto.js"></script>
  </body>
</html>