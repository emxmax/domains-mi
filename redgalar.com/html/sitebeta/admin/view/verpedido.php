<?php require_once("menu/head.php");?>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <?php require_once("menu/menu.php");?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Pedido</h1>
            <p>Nombre producto: <?php echo $pedido["pro_name"]?></p>
          </div>
		  <div>
            <a class="btn btn-info btn-flat" href="javascript:history.go(-1);"><i class="fa fa-mail-reply"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
			  <?php //print_r($pedido);?>
				<div class="row">
					<div class="col-md-12 box-pedidos">
						<div class="row">
                          <label class="col-md-4">Fecha:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_fecha"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Producto:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pro_name"]?></span>
                          </div>
                        </div>
						<div class="row">
                          <label class="col-md-4">Cantidad de Producto:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_cant"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4" for="inputEmail">Imagen producto:</label>
                          <div class="col-md-8">
						  <!--<img src="<?php echo Conectar::ruta();?>upload/<?php echo $pedido["pro_img"]?>" class="img-thumbnail img-redgalar" alt="<?php echo $pedido["pro_name"]?>">-->
						  <img src="../img/<?php echo $pedido["pro_img"]?>" class="img-thumbnail img-redgalar" alt="<?php echo $pedido["pro_name"]?>">
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Comprador:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["user_name"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Email:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["user_email"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Telf del Comprador:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $datospedidos["mi_telf"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Para:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_para"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">D&iacute;a y hora de envi&oacute;:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $datospedidos['fecha']." - ".$datospedidos['hora'];?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Distrito:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $datospedidos["dis_name"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Direcci&oacute;n:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $datospedidos["direccion"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Referencia:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $datospedidos["per_referencia"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Persona de contacto:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $datospedidos["personaconct"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Telefono del destinatario:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $datospedidos["telf_contacto"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Horario de Entrega:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $datospedidos["hora"]?></span>
                          </div>
                        </div>
						
						
						<div class="row">
                          <label class="col-md-4">Comentario al courier:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $datospedidos["comentarios_conduc"]?></span>
                          </div>
                        </div>
						<div class="row">
                          <label class="col-md-4">Para:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_para"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">De:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_de"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Dedicatoria:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_dedicatoria"]?></span>
                          </div>
                        </div>
						
						<div class="row">
                          <label class="col-md-4">Frases:</label>
                          <div class="col-md-8">
							<?php if($pedido["pe_frase1"]!==""){?>
                            <span class="text-pedido"><?php echo $pedido["pe_frase1"]?></span>
							<?php } ?>
							<?php if($pedido["pe_frase2"]!==""){?>
                            <span class="text-pedido"><?php echo $pedido["pe_frase2"]?></span>
							<?php } ?>
							<?php if($pedido["pe_frase3"]!==""){?>
                            <span class="text-pedido"><?php echo $pedido["pe_frase3"]?></span>
							<?php } ?>
                          </div>
                        </div>
						
                        <?php if($pedido["pe_tema"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Tema:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_tema"]?> <?php if($pedido["pe_tema"]=="Otros"){ echo "- ".$pedido["pe_tema_otro"];} ?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($pedido["pe_jugo"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Jugo:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_jugo"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($pedido["pe_bebida"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Bebida:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_bebida"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($pedido["pe_cerveza"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Cerveza:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_cerveza"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($pedido["pe_aperitivo"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Aperitivo:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_aperitivo"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($pedido["pe_sandwiches"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Sandwiches:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_sandwiches"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($pedido["pe_salado"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Toppings salados:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_salado"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($pedido["pe_dulce"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Toppings dulces:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_dulce"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($pedido["pe_galletas_artesanales"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Galletas artesanales:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_galletas_artesanales"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<div class="row">
                          <label class="col-md-4">Fotos:</label>
                          <div class="col-md-8">
						  <?php if($pedido["pe_fo_1"]!==""){?>
							<a href="../fotos/<?php echo $pedido["pe_fo_1"]; ?>" download="<?php echo $pedido["pe_fo_1"]; ?>">
								<img src="../fotos/<?php echo $pedido["pe_fo_1"]; ?>" class="img-thumbnail img-redgalar2"/>
							</a>
						  <?php } ?>
						  
						  <?php if($pedido["pe_fo_2"]!==""){?>
							<a href="../fotos/<?php echo $pedido["pe_fo_2"]; ?>" download="<?php echo $pedido["pe_fo_2"]; ?>">
								<img src="../fotos/<?php echo $pedido["pe_fo_2"]; ?>" class="img-thumbnail img-redgalar2"/>
							</a>
						  <?php } ?>
						  
						  <?php if($pedido["pe_fo_3"]!==""){?>
							<a href="../fotos/<?php echo $pedido["pe_fo_3"]; ?>" download="<?php echo $pedido["pe_fo_3"]; ?>">
								<img src="../fotos/<?php echo $pedido["pe_fo_3"]; ?>" class="img-thumbnail img-redgalar2"/>
							</a>
						  <?php } ?>
						  
						  <?php if($pedido["pe_fo_4"]!==""){?>
							<a href="../fotos/<?php echo $pedido["pe_fo_4"]; ?>" download="<?php echo $pedido["pe_fo_4"]; ?>">
								<img src="../fotos/<?php echo $pedido["pe_fo_4"]; ?>" class="img-thumbnail img-redgalar2"/>
							</a>
						  <?php } ?>
                          </div>
                        </div>
						
						<?php if($pedido["pe_adicional_1"]!="" OR $pedido["pe_adicional_2"]!=""){?>
						<div class="row">
                          <label class="col-md-4">Adicionales:</label>
                          <div class="col-md-8">
							<?php if($pedido["pe_adicional_1"]!==""){?>
								<span class="text-pedido"><?php echo $pedido["pe_adicional_1"]?></span>
							<?php } ?>
							<?php if($pedido["pe_adicional_2"]!==""){?>
								<span class="text-pedido"><?php echo $pedido["pe_adicional_2"]?></span>
							<?php } ?>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($pedido["pe_comenta"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Comentario:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $pedido["pe_comenta"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($detalle["pe_c_tipo"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Tipo de comprobante:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $detalle["pe_c_tipo"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($detalle["pe_c_num"]!==""){?>
						<div class="row">
                          <label class="col-md-4">DNI / RUC:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $detalle["pe_c_num"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($detalle["pe_c_razon"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Nombre / Raz&oacute;n:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $detalle["pe_c_razon"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<?php if($detalle["pe_c_direccion"]!==""){?>
						<div class="row">
                          <label class="col-md-4">Direcci&oacute;n para el comprobante:</label>
                          <div class="col-md-8">
                            <span class="text-pedido"><?php echo $detalle["pe_c_direccion"]?></span>
                          </div>
                        </div>
						<?php } ?>
						
						<div class="row">
							<hr>
                          <label class="col-md-4">Sub Total:</label>
                          <div class="col-md-8">
							<?php  
								$sub_p = $pedido["pe_subtotal"]*$pedido["pe_cant"];
								$total = $sub_p;
							?>
                            <span class="text-pedido text-total"><?php echo number_format($sub_p, 2, '.', '');?></span>
                          </div>
						</div>
						<?php 
						if($pedido["pe_p_adicional"] > 0){
						$total = $total + $pedido["pe_p_adicional"];
						?>
						<div class="row">
						  <label class="col-md-4">Adicional:</label>
                          <div class="col-md-8">
                            <span class="text-pedido text-total"><?php echo number_format($pedido["pe_p_adicional"], 2, '.', '');?></span>
                          </div>
						</div>
						<?php
						}
						if($pedido["pe_p_delivery"] >0){
						$total = $total + $pedido["pe_p_delivery"];
						?>
						<div class="row">
						  <label class="col-md-4">Delivery:</label>
                          <div class="col-md-8">
                            <span class="text-pedido text-total"><?php echo number_format($pedido["pe_p_delivery"], 2, '.', '');?></span>
                          </div>
                        </div>
						<?php
						}
						?>
						<hr>
						<div class="row">
						  <label class="col-md-4"><strong>Total:</strong></label>
                          <div class="col-md-8">
                            <span class="text-pedido text-total"><strong><?php echo number_format($total, 2, '.', '');?></strong></span>
                          </div>
                        </div>
					</div>
					<div class="col-md-6"></div>
				</div>
			  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <?php require_once("menu/footerjs.php");?>
  </body>
</html>