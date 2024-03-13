<?php 
  ob_start("ob_gzhandler");
  session_start();

  include "util/url.php";
  include "util/query.php";

  $pro_url=$_GET['pro_url'];

  $sqlProducto = "SELECT * FROM producto WHERE pro_url='$pro_url'";
  $rsProducto = mysql_query($sqlProducto);

  $pro_id = mysql_result($rsProducto,0,"pro_id");
  $pro_name = mysql_result($rsProducto,0,"pro_name");
  $pro_precio_n = mysql_result($rsProducto,0,"pro_precio_n");
  $pro_precio_o = mysql_result($rsProducto,0,"pro_precio_o");
  $pro_detalles = mysql_result($rsProducto,0,"pro_detalles");
  $pro_desc = mysql_result($rsProducto,0,"pro_desc");
  $pro_img = mysql_result($rsProducto,0,"pro_img");
  $pro_envio = mysql_result($rsProducto,0,"pro_envio");

  $pro_dedicatoria = mysql_result($rsProducto,0,"pro_dedicatoria");
  $pro_frases = mysql_result($rsProducto,0,"pro_frases");
  $pro_temas = mysql_result($rsProducto,0,"pro_temas");
  $pro_jugos = mysql_result($rsProducto,0,"pro_jugos");
  $pro_bebidas = mysql_result($rsProducto,0,"pro_bebidas");
  $pro_cervezas = mysql_result($rsProducto,0,"pro_cervezas");
  $pro_aperitivos = mysql_result($rsProducto,0,"pro_aperitivos");
  $pro_sandwiches = mysql_result($rsProducto,0,"pro_sandwiches");
  $pro_salados = mysql_result($rsProducto,0,"pro_salados");
  $pro_dulces = mysql_result($rsProducto,0,"pro_dulces");
  $pro_galletas_artesanales = mysql_result($rsProducto,0,"pro_galletas_artesanales");
  $pro_fotos = mysql_result($rsProducto,0,"pro_fotos");
  $pro_adicional_1 = mysql_result($rsProducto,0,"pro_adicional_1");
  $pro_adicional_2 = mysql_result($rsProducto,0,"pro_adicional_2");

  $sqlDistrito = "SELECT * FROM distrito";
  $rsDistrito = mysql_query($sqlDistrito);
  $nDistrito = mysql_num_rows($rsDistrito);
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">

        <?php include "aside.php";?>

        <section class="col-lg-9 col-sm-8" id="producto">
          <div class="row">
            <div class="col-lg-4">
              <img src="<?php echo $url; ?>img/<?php echo $pro_img; ?>" alt="">
            </div>
            <div class="col-lg-8">
              <h2><?php echo utf8_encode($pro_name);?></h2>
              <ul>
                <li>Precio normal:<br> <b class="precio">S/ <?php echo $pro_precio_n;?></b></li>
                <li>Oferta: <br><b class="oferta">S/ <?php echo $pro_precio_o;?></b></li>
                <p><?php echo utf8_encode($pro_desc); ?></p>
              </ul>
              <h5>* Imagen referencial</h5>
            </div>
          </div>
          <div class="row" id="prodown">
            <div class="col-lg-12">
				<form action="../agregar-detalle.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="pro_id" value="<?php echo $pro_id; ?>">
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <div class="first">
                	<h4>¡EMPECEMOS!</h4>
	                <div class="row">                	
	                	<div class="col-md-7 del-pad">
	                		<div class="form-group">
								<label class="col-sm-4 control-label">De: </label>
								<div class="col-sm-8">
								    <input type="text" class="form-control" name="pe_de" id="me_de">
								</div>
							</div>
	                	</div>    
	                	<div class="col-lg-5">
	                		<div class="checkbox">
	                			<label>
		                		<input type="checkbox" id="anonimo">
								Enviar como anónimo
								</label>
							</div>
	                	</div>          	
	                </div>
	                <div class="row">
	                	<div class="col-md-7 del-pad">
	                		<div class="form-group">
								<label class="col-sm-4 control-label">Para / Nombre o apodo de cariño: </label>
								<div class="col-sm-8">
								    <input type="text" class="form-control" name="pe_para" required>
								</div>
							</div>
	                	</div>
	                </div>
                </div>
                <div class="second">
                	<h4>PERSONALIZA TU REGALO</h4>
                	<?php if ($pro_dedicatoria==1){ ?>
                	<div class="row">
	                	<div class="col-md-12">
	                		<div class="form-group">
							    <label class="col-sm-4 control-label">Dedicatoria: <br><span>Max. 250 caracteres</span></label>
							    <div class="col-sm-8">
							     	<textarea name="pe_dedicatoria" class="form-control" required rows="5" maxlength="250"></textarea>
							    </div>
							</div>
	                	</div>
	                </div>
	                <?php } ?>
	                <?php if ($pro_frases==1){ ?>
	                <div class="row">
	                	<div class="col-md-12">
	                		 <div class="form-group">
							    <label class="col-sm-4 control-label">Escribe algunas frases: <br><span>Max. 70 caracteres</span></label>
							    <div class="col-sm-8 mas">
									<input type="text" class="form-control" placeholder="Frase 1" name="pe_frase1" maxlength="70">
									<input type="text" class="form-control" placeholder="Frase 2" name="pe_frase2" maxlength="70">
									<input type="text" class="form-control" placeholder="Frase 3" name="pe_frase3" maxlength="70">
			               		</div> 
					 	    </div>
	                	</div>
	                </div>
	                <?php } ?>
	                <?php if ($pro_temas==1){ ?>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">Escoge un tema</label>
								<div class="col-sm-4">
									<select name="pe_tema" class="form-control" id="pe_tema">
										<option value="Los Simpson">Los Simpson</option>
										<option value="Hello Kitty">Hello Kitty</option>
										<option value="Batman">Batman</option>
										<option value="Universitario">Universitario</option>
										<option value="Alianza Lima">Alianza Lima</option>
										<option value="Superhéroes">Superhéroes</option>
										<option value="Star Wars">Star Wars</option>
										<option value="Dragon Ball">Dragon Ball</option>
										<option value="Micky">Micky</option>
										<option value="Minnie">Minnie</option>
										<option value="Otros">Otros</option>
									</select>
								</div>
								<div class="col-sm-4">
									<input type="text" name="pe_tema_otro" id="pe_tema_otro" class="form-control" placeholder="Completa tu tema">
								</div>
							</div>
	                	</div>
	                </div>
	                <?php } ?>
	                <?php if ($pro_jugos==1){ ?>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">+ jugos</label>
								<div class="col-sm-4">
									<select name="pe_jugo" required class="form-control">
					                    <option value="Jugo de naranja">Jugo de naranja</option>
					                    <option value="Jugo de durazno">Jugo de durazno</option>
									</select>
								</div>
							</div>
	                	</div>
	                </div>
	                <?php } ?>
	                <?php if ($pro_bebidas==1){ ?>
					<div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">+ bebidas</label>
								<div class="col-sm-4">
									<select name="pe_bebida" required class="form-control">
					                    <option value="Gaseosa Inka Cola">Gaseosa Inka Cola</option>
					                    <option value="Gaseosa Coca Cola">Gaseosa Coca Cola</option>
					                    <option value="Gaseosa Sprite">Gaseosa Sprite</option>
					                    <option value="Gaseosa Fanta">Gaseosa Fanta</option>
					                    <option value="Té Helado">Té Helado</option>
					                    <option value="Jugo de naranja">Jugo de naranja</option>
					                    <option value="Jugo de durazno">Jugo de durazno</option>
					                    <option value="Pilsen">Pilsen</option>
					                    <option value="Cuzqueña">Cuzqueña</option>
					                    <option value="Corona">Corona</option>
									</select>
								</div>
							</div>
	                	</div>
	                </div>
	                <?php } ?>
	                <?php if ($pro_cervezas==1){ ?>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">+ cervezas</label>
								<div class="col-sm-4">
									<select name="pe_cerveza" required class="form-control">
					                    <option value="Pilsen">Pilsen</option>
					                    <option value="Cuzqueña">Cuzqueña</option>
									</select>
								</div>
							</div>
	                	</div>
	                </div>
	                <?php } ?>
	                <?php if ($pro_aperitivos==1){ ?>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">+ aperitivo</label>
								<div class="col-sm-4">
									<select name="pe_aperitivo" required class="form-control">
					                    <option value="Empanada de carne">Empanada de carne</option>
					                    <option value="Empanada de pollo">Empanada de pollo</option>
					                    <option value="Triple en pan blanco">Triple en pan blanco</option>
					                    <option value="Croissant de jamón y queso">Croissant de jamón y queso</option>
									</select>
								</div>
							</div>
	                	</div>
	                </div>
	                <?php } ?>
	                <?php if ($pro_sandwiches==1){ ?>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">+ sandwiches</label>
								<div class="col-sm-4">
									<select name="pe_sandwiches" required class="form-control">
					                    <option value="Croissant de pollo con durazno">Croissant de pollo con durazno</option>
					                    <option value="Croissant eggmont">Croissant eggmont</option>
					                    <option value="Ciabatta de pollo con mayonesa clásico">Ciabatta de pollo con mayonesa clásico</option>
					                    <option value="Ciabatta de suprema de pollo con papas al hilo">Ciabatta de suprema de pollo con papas al hilo</option>
									</select>
								</div>
							</div>
	                	</div>
	                </div>
	                <?php } ?>
	                <?php if ($pro_salados==1){ ?>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">+2 toppings salados</label>
								<div class="col-sm-4">
									<select name="pe_salado" required class="form-control">
					                    <option value="Camote frito - Papitas">Camote frito - Papitas</option>
					                    <option value="Chifles - Pretzzels">Chifles - Pretzzels</option>
					                    <option value="Maní - Papitas">Maní - Papitas</option>
					                    <option value="Chifles - Maní">Chifles - Maní</option>
					                    <option value="Chifles - Papitas">Chifles - Papitas</option>
									</select>
								</div>
							</div>
	                	</div>
	                </div>
	                <?php } ?>
	                <?php if ($pro_dulces==1){ ?>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">+2 topping dulces</label>
								<div class="col-sm-8">
									<select name="pe_dulce" required class="form-control">
					                    <option value="Galleta de chispas de chocolate + Brownie trufado de chocolate">Galleta de chispas de chocolate + Brownie trufado de chocolate</option>
					                    <option value="Galleta de chocolate glaseada + M&M's">Galleta de chocolate glaseada + M&M's</option>
					                    <option value="Galleta buttercream + Galleta de chispas de chocolate">Galleta buttercream + Galleta de chispas de chocolate</option>
					                    <option value="Brownie trufado de chocolate + Galleta de chocolate glaseada">Brownie trufado de chocolate + Galleta de chocolate glaseada</option>
					                    <option value="M&M's + Galleta buttercream">M&M's + Galleta buttercream</option>
									</select>
								</div>
							</div>
	                	</div>
	                </div>
	                <?php } ?>
	                <?php if ($pro_galletas_artesanales==1){ ?>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">+ galletas artesanales</label>
								<div class="col-sm-4">
									<select name="pe_galletas_artesanales" required class="form-control">
					                    <option value="Galleta de chispas de chocolate">Galleta de chispas de chocolate</option>
					                    <option value="Galleta de chocolate glaseada">Galleta de chocolate glaseada</option>
					                    <option value="Galleta buttercream">Galleta buttercream</option>
									</select>
								</div>
							</div>
	                	</div>
	                </div>
	                <?php } ?>
	                <?php if ($pro_fotos==1){ ?>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">+ 4 fotos <br><span>Tamaño maximo 5mb por foto. <br>
								Formatos: JPG, PNG, GIF, BMP
								</span></label>
								<div class="col-sm-8 imagenes">
									<div class="row">
										<div class="col-sm-3">
					                      <figure> 
					                        <input type="file" id="file_url1" name="pe_fo_1" data-var="1" class="file">
					                        <img src="<?php echo $url;?>img/select.png" alt="" id="img_destino1">  
					                      </figure>
					                    </div>
					                    <div class="col-sm-3">
					                      <figure> 
					                        <input type="file" id="file_url2" name="pe_fo_2" data-var="2" class="file">
					                        <img src="<?php echo $url;?>img/select.png" alt="" id="img_destino2">  
					                      </figure>
					                    </div>
					                    <div class="col-sm-3">
					                      <figure> 
					                        <input type="file" id="file_url3" name="pe_fo_3" data-var="3" class="file">
					                        <img src="<?php echo $url;?>img/select.png" alt="" id="img_destino3">  
					                      </figure>
					                    </div>
					                    <div class="col-sm-3">
					                      <figure> 
					                        <input type="file" id="file_url4" name="pe_fo_4" data-var="4" class="file">
					                        <img src="<?php echo $url;?>img/select.png" alt="" id="img_destino4">  
					                      </figure>
					                    </div>
					                </div>
								</div>
							</div>
	                	</div>
	                </div>
	                <?php } ?>
	                <?php if ($pro_adicional_1==1){ ?>
	                <div class="row">
	                	<div class="col-lg-12">
		                	<div class="form-group">
								<label class="col-sm-4 control-label">+ adicionales (opcionales)<br><span>El precio es de S/ 12.00</span></label>
								<div class="col-sm-4">
									<select name="pe_adicional_1" class="form-control">
										<option value="">Escoge el adicional 1</option>
					                    <option value="In Jar">In Jar</option>
					                    <option value="Cupcake">Cupcake</option>
					                    <option value="Cheescake">Cheescake</option>
					                    <option value="Frutos secos">Frutos secos</option>
					                    <option value="Cerveza artesanal Barbarian">Cerveza artesanal Barbarian</option>
					                    <option value="Cerveza artesanal Barbarian">Cerveza artesanal Candelaria</option>
					                    <option value="Cerveza artesanal Barbarian">Croisantt de pollo con durazno</option>
					                    <option value="Cerveza artesanal Barbarian">Croissant eggmont</option>
					                    <option value="Cerveza artesanal Barbarian">Ciabatta de pollo con mayonesa clásico</option>
					                    <option value="Cerveza artesanal Barbarian">Ciabatta de suprema de pollo con papas al hilo</option>
									</select>
								</div>
								<?php if ($pro_adicional_2==1){ ?>
								<div class="col-sm-4">
									<select name="pe_adicional_2" class="form-control">
							  		    <option value="">Escoge el adicional 2</option>
					                    <option value="In Jar">In Jar</option>
					                    <option value="Cupcake">Cupcake</option>
					                    <option value="Cheescake">Cheescake</option>
					                    <option value="Frutos secos">Frutos secos</option>
					                    <option value="Cerveza artesanal Barbarian">Cerveza artesanal Barbarian</option>
					                    <option value="Cerveza artesanal Barbarian">Cerveza artesanal Candelaria</option>
					                    <option value="Cerveza artesanal Barbarian">Croisantt de pollo con durazno</option>
					                    <option value="Cerveza artesanal Barbarian">Croissant eggmont</option>
						                <option value="Cerveza artesanal Barbarian">Ciabatta de pollo con mayonesa clásico</option>
					                    <option value="Cerveza artesanal Barbarian">Ciabatta de suprema de pollo con papas al hilo</option>
									</select>
								</div>
								<?php } ?>
							</div>
	                	</div>
	                </div>
	                <?php } ?>
	                <div class="row">
	                	<div class="col-md-12">
	                		<div class="form-group">
							    <label class="col-sm-4 control-label">Comentario:</label>
							    <div class="col-sm-8">
							     	<textarea name="pe_comenta" class="form-control" rows="5"></textarea>
							    </div>
							</div>
	                	</div>
	                </div>
	            </div>

                <div class="third">
                	<h4>DATOS DE ENVIO</h4>
	                <div class="row">
	                	<div class="col-lg-12">
		                	<div class="form-group">
								<label class="col-sm-4 control-label">Persona de contacto</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="pe_persona_c" required>
								</div>
							</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-lg-12">
		                	<div class="form-group">
								<label class="col-sm-4 control-label">Teléfono o destinatario </label>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="pe_telf_dest" placeholder="">
								</div>
								<label class="col-sm-2 control-label text-right">Tu teléfono</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="pe_telf_tu" required>
								</div>
							</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-lg-12">
		                	<div class="form-group">
								<label class="col-sm-4 control-label">Distrito</label>
								<div class="col-sm-8">
									<select name="pe_distrito" required class="form-control">
					                    <option value="">SELECCIONE EL DISTRITO</option>
					                    <?php 
							              for($i=0;$i<$nDistrito;$i++){ 
							                $dis_id = mysql_result($rsDistrito,$i,"dis_id");
							                $dis_name = mysql_result($rsDistrito,$i,"dis_name");
							                $dis_precio = mysql_result($rsDistrito,$i,"dis_precio");
							            ?>
					                    <option value="<?php echo $dis_id; ?>"><?php echo utf8_encode($dis_name)." - S/.".$dis_precio; ?></option>
					                    <?php }?>
					                </select>
								</div>
							</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-lg-12">
		              		<div class="form-group">
								<label class="col-sm-4 control-label">Dirección <br><span>Ejemplo: Bogota 100, La molina, Lima</span></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="pe_direccion" id="address" placeholder="Dirección" required/>
								</div>
								<div class="col-sm-2">
									<a href="javascript: void(0);" id="search2">Buscar</a>
								</div>
							</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">Si es una empresa indica piso, área y anexo. Gracias. </label>
								<div class="col-sm-8">
									<input type="hidden" id="lat" name="pe_lat"><input type="hidden" id="lng" name="pe_lng">
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
									<input type="text" class="form-control" name="pe_referencia" placeholder="">
								</div>
							</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">Fecha de entrega </label>
								<div class="col-sm-3">
									<input type="text" class="form-control" required name="pe_fecha_pe" id="datepicker">
								</div>
								<label class="col-sm-1 control-label">Horario </label>
								<div class="col-sm-4">
									<select name="pe_horario" required class="form-control">
					                    <option value="">SELECCIONE EL HORARIO</option>
					                    <option value="08:00 - 11:00">08:00 - 11:00</option>
					                    <option value="11:00 - 14:00">11:00 - 14:00</option>
					                    <option value="14:00 - 17:00">14:00 - 17:00</option>
					                    <option value="17:00 - 20:00">17:00 - 20:00</option>
					                </select>
								</div>
							</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">Comentario al courier</label>
								<div class="col-sm-8">
									<textarea name="pe_comentario" cols="30" rows="3"></textarea>
								</div>
							</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-4 control-label">Comprobante </label>
								<div class="col-sm-3">
									<select name="pe_comprobante" required class="form-control">
									  <option value="boleta">BOLETA</option>
									  <option value="factura">FACTURA</option>
									</select>
								</div>
								<label class="col-sm-1 control-label">DNI/RUC </label>
								<div class="col-sm-4">
									<input type="text" name="pe_c_tipo" required required class="form-control">
								</div>
							</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-8 control-label text-right">Nombre / Razón Social </label>
									<div class="col-sm-4">
									<input type="text" name="pe_c_razon" required class="form-control">
								</div>
							</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<label class="col-sm-8 control-label text-right">Dirección </label>
								<div class="col-sm-4">
									<input type="text" name="pe_c_direccion" required class="form-control">
								</div>
							</div>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-lg-12">
		               		<div class="form-group">
								<div class="col-sm-5 col-sm-offset-7">
									<button>Finalizar compra</button>
								</div>
							</div>
	                	</div>
	                </div>
	            </div>
	            </form>
            </div>
          </div>
        </section>
      </div>
    </div>  
  </div>

  <?php  include "footer.php" ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
        $("#me_de").val("Anónimo");  
    } else {  
        $("#me_de").val(""); 
    } 
  });
  $("#pe_tema_otro").hide();
  $("#pe_tema").change(function(){
  	var valorTema = $(this).val();
  	if(valorTema=="Otros"){
  		$("#pe_tema_otro").show();	
  	}else{
  		$("#pe_tema_otro").hide();
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
	    var myLatlng = new google.maps.LatLng(-12.0637125, -77.0151774);
	    var myOptions = {
	        zoom: 10,
	        center: myLatlng,
	        mapTypeId: google.maps.MapTypeId.ROADMAP
	    };
	    map = new google.maps.Map($("#map_canvas").get(0), myOptions);
	}
	 
	$('#search2').click(function() {
	    // Obtenemos la dirección y la asignamos a una variable
	    var address = $('#address').val();
	    // Creamos el Objeto Geocoder
	    var geocoder = new google.maps.Geocoder();
	    // Hacemos la petición indicando la dirección e invocamos la función
	    // geocodeResult enviando todo el resultado obtenido
	    geocoder.geocode({ 'address': address}, geocodeResult);
	});
	 
	function geocodeResult(results, status) {
	    // Verificamos el estatus
	    if (status == 'OK') {
	        // Si hay resultados encontrados, centramos y repintamos el mapa
	        // esto para eliminar cualquier pin antes puesto

	        var mapOptions = {
	            center: results[0].geometry.location,
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	        };
	        map = new google.maps.Map($("#map_canvas").get(0), mapOptions);
	        // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
	        map.fitBounds(results[0].geometry.viewport);
	        // Dibujamos un marcador con la ubicación del primer resultado obtenido
	        var markerOptions = { position: results[0].geometry.location }
	        var marker = new google.maps.Marker(markerOptions);
			parent.document.getElementById("lat").value=''+marker.getPosition().lat();
			parent.document.getElementById("lng").value=''+marker.getPosition().lng();
	        marker.setMap(map);
	    } else {
	        // En caso de no haber resultados o que haya ocurrido un error
	        // lanzamos un mensaje con el error
	        alert("Geocoding no tuvo éxito debido a: " + status);
	    }
	}	
   	</script>
   
</body>
</html>