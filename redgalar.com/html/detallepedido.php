<?php 
  ob_start("ob_gzhandler");
  session_start();

  include "util/url.php";
  include "util/query.php";

  $id=$_GET["pe_id"];

  $sqlPedido = "SELECT * FROM pedido where pe_id=$id";
  $rsPedido = mysql_query($sqlPedido);

  $pe_id = mysql_result($rsPedido,0,"pe_id");
  $pe_de = mysql_result($rsPedido,0,"pe_de");
  $pe_para = mysql_result($rsPedido,0,"pe_para");
  $pe_dedicatoria = mysql_result($rsPedido,0,"pe_dedicatoria");
  $pe_frase1 = mysql_result($rsPedido,0,"pe_frase1");
  $pe_frase2 = mysql_result($rsPedido,0,"pe_frase2");
  $pe_frase3 = mysql_result($rsPedido,0,"pe_frase3");
  $pe_tema = mysql_result($rsPedido,0,"pe_tema");
  $pe_tema_otro = mysql_result($rsPedido,0,"pe_tema_otro");
  $pe_jugo = mysql_result($rsPedido,0,"pe_jugo");
  $pe_bebida = mysql_result($rsPedido,0,"pe_bebida");
  $pe_cerveza = mysql_result($rsPedido,0,"pe_cerveza");
  $pe_aperitivo = mysql_result($rsPedido,0,"pe_aperitivo");
  $pe_sandwiches = mysql_result($rsPedido,0,"pe_sandwiches");
  $pe_salado = mysql_result($rsPedido,0,"pe_salado");
  $pe_dulce = mysql_result($rsPedido,0,"pe_dulce");
  $pe_galletas_artesanales = mysql_result($rsPedido,0,"pe_galletas_artesanales");
  $pe_fo_1 = mysql_result($rsPedido,0,"pe_fo_1");
  $pe_fo_2 = mysql_result($rsPedido,0,"pe_fo_2");
  $pe_fo_3 = mysql_result($rsPedido,0,"pe_fo_3");
  $pe_fo_4 = mysql_result($rsPedido,0,"pe_fo_4");
  $pe_adicional_1 = mysql_result($rsPedido,0,"pe_adicional_1");
  $pe_adicional_2 = mysql_result($rsPedido,0,"pe_adicional_2");
  $pe_persona_c = mysql_result($rsPedido,0,"pe_persona_c");
  $pe_telf_dest = mysql_result($rsPedido,0,"pe_telf_dest");
  $pe_telf_tu = mysql_result($rsPedido,0,"pe_telf_tu");
  $pe_distrito = mysql_result($rsPedido,0,"pe_distrito");
  $pe_direccion = mysql_result($rsPedido,0,"pe_direccion");
  $pe_lat = mysql_result($rsPedido,0,"pe_lat");
  $pe_lng = mysql_result($rsPedido,0,"pe_lng");
  $pe_referencia = mysql_result($rsPedido,0,"pe_referencia");
  $pe_fecha_pe = mysql_result($rsPedido,0,"pe_fecha_pe");
  $pe_horario = mysql_result($rsPedido,0,"pe_horario");
  $pe_comentario = mysql_result($rsPedido,0,"pe_comentario");
  $pe_comprobante = mysql_result($rsPedido,0,"pe_comprobante");
  $pe_c_tipo = mysql_result($rsPedido,0,"pe_c_tipo");
  $pe_c_razon = mysql_result($rsPedido,0,"pe_c_razon");
  $pe_c_direccion = mysql_result($rsPedido,0,"pe_c_direccion");
  $pro_id = mysql_result($rsPedido,0,"pro_id");
  //agrege
  $pe_cant = mysql_result($rsPedido,0,"pe_cant");
  $pe_subtotal = mysql_result($rsPedido,0,"pe_subtotal");
  
  $sqlProducto = "SELECT * FROM producto where pro_id=$pro_id";
  $rsProducto = mysql_query($sqlProducto);

  $pro_name = mysql_result($rsProducto,0,"pro_name");
  $pro_precio_n = mysql_result($rsProducto,0,"pro_precio_n");
  $pro_precio_o = mysql_result($rsProducto,0,"pro_precio_o");
  $pro_detalles = mysql_result($rsProducto,0,"pro_detalles");
  $pro_desc = mysql_result($rsProducto,0,"pro_desc");
  $pro_img = mysql_result($rsProducto,0,"pro_img");
  $pro_envio = mysql_result($rsProducto,0,"pro_envio");

  $sqlDistrito = "SELECT * FROM distrito WHERE dis_id=".$pe_distrito;
  $rsDistrito = mysql_query($sqlDistrito);

  $dis_name = mysql_result($rsDistrito,0,"dis_name");
  $dis_precio = mysql_result($rsDistrito,0,"dis_precio");

  	if($pe_adicional_1!==""){
		$pre_adi1= 12.00;
		$num1=1;
	}else{
		$pre_adi1= 0;
		$num1=0;
	}
	if($pe_adicional_2!==""){
		$pre_adi2= 12.00;
		$num2=1;
	}else{
		$pre_adi2= 0;
		$num2=0;
	}

  //$tot = ($pro_precio_o * $pe_cant) + $dis_precio + $pre_adi1 + $pre_adi2;
  $tot1 = ($pro_precio_o * $pe_cant);
  $tot = ($pe_subtotal) + $dis_precio + $pre_adi1 + $pre_adi2;
  	if(substr_count($tot, '.')>=1) {
		$cero = "0";
	}else {
	    $cero = "00";
	}
	if($tot1 != $pe_subtotal){
	$dd = 1;
  }
  $total = str_replace('.', '', $tot).$cero;
  $total_adi = $num1 + $num2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/jquery.bxslider.css">
  <link type="text/css" rel="stylesheet" href="<?php echo $url; ?>css/responsive-tabs.css" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApzy0CShzBoU83-HLZs9mJa8GbeqlpmDU"></script>
  <script src="https://checkout.culqi.com/v2"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">

        <?php include "aside.php";?>

        <div id="x" data-x="<?php echo $pe_lat; ?>"></div>
		<div id="y" data-y="<?php echo $pe_lng; ?>"></div>

		<input type="hidden" id="user_id" value="<?php echo $user_id; ?>">
		<input type="hidden" id="pro_id" value="<?php echo $pro_id; ?>">
		<input type="hidden" id="pe_id" value="<?php echo $pe_id; ?>">

        <section class="col-lg-9 col-sm-8" id="producto" data-precio="<?php echo $total;?>">
          <div class="row" id="reproducto">
          	<div class="col-lg-12">
          		<br>
          		<h4><span>Revisa y confirma tu pedido</span></h4>
          		<h2><span><?php echo $pe_cant?> Artículo(s)</span></h2>
          	</div>
            <div class="col-lg-3">
              <div class="img-producto">             
				   <img src="<?php echo $url; ?>img/<?php echo $pro_img; ?>" alt="">
				    <h5>* Imagen referencial</h5>              </div>
            </div>
            <div class="col-lg-4">
              <h2><span id="name_producto"><?php echo utf8_encode($pro_name);?></span></h2>
                <p class="reduction"><?php echo utf8_encode($pro_desc); ?></p>
            </div>
            <div class="col-lg-3">              
                <p><?php echo $pe_cant?>   unidad(es)</p>
                <p>x S/ <?php echo $pro_precio_o; if($dd == 1){ echo " (-10%)";}?></p>
                <p>+</p>
                <p><?php echo $total_adi; ?> Adicionales</p>
                <p>+</p>
                <p>Delivery <br> <?php echo utf8_encode($dis_name)." - S/.".$dis_precio; ?></p>
            </div>
            <div class="col-lg-2 text-right">             
                <p>Subtotal
                </p>
                <p>S/ <?php echo $tot; ?></p>
            </div>
          </div>
          <div class="row" id="prodown" >
            <div class="col-lg-12" id="redifine">
                <div id="responsiveTabsDemo" class="hidden">
                    <ul>
                      <li><a href="#tab-1">Detalles del producto</a></li>
                      <!--li><a href="#tab-2">Envío y pago</a></li>
                      <li><a href="#tab-3">Garantías del vendedor</a></li-->
                    </ul>

                    <div class="main" id="tab-1"> 
                     <div class="row"> 
                        <div class="col-lg-8">
                          <p>
                            <?php echo utf8_encode($pro_detalles); ?>
                          </p>
                        </div>
                      </div>
                    </div>
                    <!--div class="main" id="tab-2"> 
                     <div class="row"> 
                        <div class="col-lg-8">
                          <p>
                            2Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate
                          </p>
                        </div>
                      </div>
                    </div> 
                    <div class="main" id="tab-3"> 
                     <div class="row"> 
                        <div class="col-lg-8">
                          <p>
                            3Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate
                          </p>
                        </div>
                      </div>
                    </div-->
                </div>
				<div id="ancla">
					
				</div>
                <div class="first">                	
                	<form class="form-horizontal">
	                	<div class="row">                	
	                		<div class="col-md-12 del-pad">
	                			 <div class="form-group">
								    <label class="col-sm-4 control-label">De: </label>
								    <div class="col-sm-8">
								     	<p><?php echo $pe_de; ?></p>
								    </div>
								 </div>
	                		</div>            	
	                	</div>

	                	<div class="row">
	                		<div class="col-md-12 del-pad">
	                			 <div class="form-group">
								    <label class="col-sm-4 control-label">Para / Nombre o <br> apodo de cariño: </label>
								    <div class="col-sm-8">
								   		<p><?php echo $pe_para; ?></p>
								    </div>
								 </div>
	                		</div>
	                	</div>
                	</form>
                </div>
                <div class="second">                	
                	<form class="form-horizontal">
                		<div class="row">
	                		<div class="col-md-12">
	                			 <div class="form-group">
								    <label class="col-sm-4 control-label">Dedicatoria: </label>
								    <div class="col-sm-8">
								     	<p class="dedicatoria"><?php echo $pe_dedicatoria; ?></p>
								    </div>
								 </div>
	                		</div>
	                	</div>
	                	<div class="row">
	                		<div class="col-md-12">
	                			 <div class="form-group">
								    <label class="col-sm-4 control-label">Algunas frases: </label>
								    <div class="col-sm-8 mas">
								    	<?php if($pe_frase1!==""){ ?>
											<p><?php echo $pe_frase1; ?></p>
								    	<?}?>
								    	<?php if($pe_frase2!==""){ ?>
											<p><?php echo $pe_frase2; ?></p>
								    	<?}?>
								    	<?php if($pe_frase3!==""){ ?>
											<p><?php echo $pe_frase3; ?></p>
								    	<?}?>
			                		</div> 
								 </div>
	                		</div>
	                	</div>
	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">Tema elegido</label>
									<div class="col-sm-4">
										<p><?php echo $pe_tema; ?>
										<?php 
											if($pe_tema_otro!==""){ 
												echo ' - '.$pe_tema_otro; 
								    		}?>		
								    	</p>
									</div>
								</div>
	                		</div>
	                	</div>
	                	<?php if($pe_jugo!==""){ ?>
	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">+ jugo</label>
									<div class="col-sm-8">
										<p><?php echo $pe_jugo; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>
	                	<?}?>
	                	<?php if($pe_bebida!==""){ ?>
						<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">+ bebidas</label>
									<div class="col-sm-8">
										<p><?php echo $pe_bebida; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>
	                	<?}?>
	                	<?php if($pe_cerveza!==""){ ?>
	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">+ cervezas</label>
									<div class="col-sm-8">
										<p><?php echo $pe_cerveza; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>
	                	<?}?>
	                	<?php if($pe_aperitivo!==""){ ?>
	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">+ aperitivo</label>
									<div class="col-sm-8">
										<p><?php echo $pe_aperitivo; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>
	                	<?}?>
	                	<?php if($pe_asandwiches!==""){ ?>
	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">+ sandwiches</label>
									<div class="col-sm-8">
										<p><?php echo $pe_asandwiches; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>
	                	<?}?>
	                	<?php if($pe_salado!==""){ ?>
	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">+ toppings salados</label>
									<div class="col-sm-8">
										<p><?php echo $pe_salado; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>
	                	<?}?>
	                	<?php if($pe_dulce!==""){ ?>
	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">+2 topping dulces</label>
									<div class="col-sm-8">
										<p><?php echo $pe_dulce; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>
	                	<?}?>
	                	<?php if($pe_galletas_artesanales!==""){ ?>
	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">+ galletas artesanales</label>
									<div class="col-sm-8">
										<p><?php echo $pe_galletas_artesanales; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>
	                	<?}?>
	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">+ fotos <br><span>Tamaño maximo 5mb por foto. <br>
									Formatos: JPG, PNG, GIF, BMP
									</span></label>
									<div class="col-sm-8 imagenes">
										<div class="row">
											<?php if($pe_fo_1!==""){ ?>
											<div class="col-sm-3">
						                      <figure> 			                      
						                        <img src="<?php echo $url;?>fotos/<?php echo $pe_fo_1;?>" alt="">  
						                      </figure>
						                    </div>
						                    <?}?>
											<?php if($pe_fo_2!==""){ ?>
											<div class="col-sm-3">
						                      <figure> 						                        
						                        <img src="<?php echo $url;?>fotos/<?php echo $pe_fo_2;?>" alt="">  
						                      </figure>
						                    </div>
						                    <?}?>
						                    <?php if($pe_fo_3!==""){ ?>
											<div class="col-sm-3">
						                      <figure> 						                        
						                        <img src="<?php echo $url;?>fotos/<?php echo $pe_fo_3;?>" alt="">  
						                      </figure>
						                    </div>
						                    <?}?>
						                    <?php if($pe_fo_4!==""){ ?>
											<div class="col-sm-3">
						                      <figure> 						                        
						                        <img src="<?php echo $url;?>fotos/<?php echo $pe_fo_4;?>" alt="">  
						                      </figure>
						                    </div>
						                    <?}?>
					                    </div>
									</div>
								</div>
	                		</div>
	                	</div>

	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">+ adicionales (opcionales)<br><span>El costo es de S/ 12.00</span></label>
									<div class="col-sm-8">
										<?php if($pe_adicional_1!==""){ ?>
											<p><?php echo $pe_adicional_1; ?></p>
								    	<?}?>
								    	<?php if($pe_adicional_2!==""){ ?>
											<p><?php echo $pe_adicional_2; ?></p>
								    	<?}?>
									</div>
								</div>
	                		</div>
	                	</div>
	                </form>
	            </div>

                <div class="third">
                	<h4>DATOS DE ENVIO</h4>
	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">Persona de contacto</label>
									<div class="col-sm-8">
										<p><?php echo $pe_persona_c; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>

	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">Teléfono o destinatario </label>
									<div class="col-sm-3">
										<p><?php echo $pe_telf_dest; ?></p>
									</div>
									<label class="col-sm-2 control-label text-right">Tu teléfono</label>
									<div class="col-sm-3">
										<p><?php echo $pe_telf_tu; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>

	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">Distrito</label>
									<div class="col-sm-8">
										<p><?php echo utf8_encode($dis_name); ?></p>
									</div>
								</div>
	                		</div>
	                	</div>

	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">Dirección</label>
									<div class="col-sm-8">
										<p><?php echo $pe_direccion; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>

	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label"></label>
									<div class="col-sm-8">
										<div id="map_canvas" style="width: 100%;height: 250px"></div>
									</div>
								</div>
	                		</div>
	                	</div>

	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">Referencia </label>
									<div class="col-sm-8">
										<p><?php echo $pe_referencia; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>

	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">Fecha de entrega </label>
									<div class="col-sm-3">
										<p><?php echo $pe_fecha_pe; ?></p>
									</div>
									<label class="col-sm-1 control-label">Horario </label>
									<div class="col-sm-4">
										<p><?php echo $pe_horario; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>

	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">Comentario al courier</label>
									<div class="col-sm-8">
										<p><?php echo $pe_comentario; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>

	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-4 control-label">Comprobante </label>
									<div class="col-sm-3">
										<p><?php echo $pe_comprobante; ?></p>
									</div>
									<label class="col-sm-1 control-label">DNI/RUC </label>
									<div class="col-sm-4">
										<p><?php echo $pe_c_tipo; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>

	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-8 control-label text-right">Nombre / Razón Social </label>
									<div class="col-sm-4">
										<p><?php echo $pe_c_razon; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>

	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<label class="col-sm-8 control-label text-right">Dirección </label>
									<div class="col-sm-4">
										<p><?php echo $pe_c_direccion; ?></p>
									</div>
								</div>
	                		</div>
	                	</div>
	           		</div>
	                	<div class="row">
	                		<div class="col-lg-12">
		                		<div class="form-group">
									<div class="col-sm-5">
			                			<div class="checkbox">
			                				<label>
				                			<input type="checkbox" id="terminos">
											Acepto los términos y condiciones
											</label>
										</div>
									</div>
									<div class="col-sm-12">
										<a class="boton-red" data-toggle='modal' data-target='#myModal'>Depósito Bancario</a>
										<button class="boton-red" id="miBoton">Pargar con Tarjeta</button>
									</div>
								</div>
								<div id="exito">Ocurrió algunos problemas con la tarjeta, inténtelo de nuevo.</div>
	                		</div>
	                	</div>
                </div>
            </div>
          </div>
        </section>
      </div>
    </div>  
  </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialoga" role="document">
    <div class="modal-content">
      <div class="row">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="row">
      	<img src="img/deposito.png" alt="" style="width:100%;">
      </div>
    </div>
  </div>
</div>

  <?php  include "footer.php" ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function() {

    $('#miBoton').on('click', function(e) {
      // Abre el formulario con las opciones de Culqi.configurar
      if($("#terminos").is(':checked')) {  
        Culqi.open();
      }else{
      	alert("Debe aceptar los términos y condiciones.");
      }
    });

  });
  </script>
  <script>  
    Culqi.publicKey = 'pk_live_grBETfIamgjuKkkU';

    var precio = $("#producto").attr("data-precio"); 
    var nombre_producto =  $("#name_producto").html();

    var user_id = $("#user_id").val();
    var pro_id = $("#pro_id").val();
    var pe_id = $("#pe_id").val();

    Culqi.settings({  
            title: 'Redgalar.com',
            currency: 'PEN',
            description: nombre_producto,
            amount: precio,
            guardar: true
    });
    // Recibimos Token del Culqi.js
    function culqi() {

      if(Culqi.error){
         // Mostramos JSON de objeto error en consola
         console.log(Culqi.error);

      }else{
         $.post("tarjeta.php", {token: Culqi.token.id, amount: precio, description: nombre_producto, email: Culqi.token.email, user_id: user_id, pro_id: pro_id, pe_id: pe_id}, function(data, status){
              if(data=="ok"){
              	window.location = 'gracias';
              }else{
                $("#exito").show();
              }
          });
      }

    };
  </script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {

	 $.datepicker.regional['es'] = {
	 closeText: 'Cerrar',
	 prevText: '< Ant',
	 nextText: 'Sig >',
	 currentText: 'Hoy',
	 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	 weekHeader: 'Sm',
	 dateFormat: 'dd/mm/yy',
	 firstDay: 1,
	 isRTL: false,
	 showMonthAfterYear: false,
	 yearSuffix: ''
	 };
	 $.datepicker.setDefaults($.datepicker.regional['es']);

    $( "#datepicker" ).datepicker({
    	 beforeShowDay: function (day) { 
           var day = day.getDay(); 
           if (day == 0) { 
             return [false, "somecssclass"] 
           } else { 
             return [true, "someothercssclass"] 
           } 
         } 
    });
  } );
  </script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

  <script src="<?php echo $url; ?>js/jquery.responsiveTabs.js"></script>
  <script>
  $(document).ready(function ($) {
    $('#responsiveTabsDemo').responsiveTabs({
      startCollapsed: 'accordion'
    });
  });
  </script>
    <script>
  $(document).ready(function() {
      $('#btn-category').click(function(){
        var estado = $('header ol').css('display');
        if(estado=='none'){
          $('header ol').css('display','table');
        }else{
          $('header ol').css('display','none');
        }
      });
      function mostrarImagen(input,variable) {
       if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
         $('#img_destino'+variable).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
       }
      }
       
      $(".file").change(function(){
        var variable = $(this).attr('data-var');
       mostrarImagen(this,variable);
      });

  });
  $("#anonimo").change(function(){
	if($("#anonimo").is(':checked')) {  
        $("#me_de").attr('disabled','disabled');
        $("#me_de").val("Anónimo");  
    } else {  
        $("#me_de").removeAttr('disabled');
        $("#me_de").val(""); 
    } 
  });
  </script>

  <script>
  	 $('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
		arrows: false,
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});
  </script>

  	<script>
	$(document).ready(function() {
	    load_map();
	});
	 
	var map;
	 
	function load_map() {

		var coordenada1 = document.getElementById('x');
	    var coordenada2 = document.getElementById('y');


	    var myLatlng = new google.maps.LatLng(coordenada1.dataset.x,coordenada2.dataset.y);
	    var myOptions = {
	        zoom: 16,
	        center: myLatlng,
	        mapTypeId: google.maps.MapTypeId.ROADMAP,
	        zoomControl: false,
	        scaleControl: false,
	        streetViewControl: false,
	        mapTypeControl: false,
	        draggable: false,
	        scrollwheel: false
	    };
	    map = new google.maps.Map($("#map_canvas").get(0), myOptions);

	    var marker = new google.maps.Marker({
			position: myLatlng,
			map: map
		});
	}
   	</script>

		<script type="text/javascript">
		$(document).ready(function(){
			//nos desplazamos entre todos los divs
			$('a.ancla').click(function(e){
			e.preventDefault();
		    enlace  = $(this).attr('href');
		    $('html, body').animate({
		        scrollTop: $(enlace).offset().top
		    }, 900);
			});
		});
		</script>
   
</body>
</html>