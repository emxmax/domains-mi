<?php
ob_start("ob_gzhandler");
session_start();

include '../../util/fns_db.php';
$cn = db_connect();

if (!isset($_GET['sw'])) {
    $sw = 0;
} else {
    $sw = $_GET['sw'];
}

$id = $_GET["pe_id"];

$sql = "SELECT * FROM pedido
			WHERE pe_id = $id";
$rs = mysql_query($sql);

$pe_id = mysql_result($rs, 0, "pe_id");
$pe_fecha = mysql_result($rs, 0, "pe_fecha");
$pe_de = mysql_result($rs, 0, "pe_de");
$pe_para = mysql_result($rs, 0, "pe_para");
$pe_dedicatoria = mysql_result($rs, 0, "pe_dedicatoria");
$pe_frase1 = mysql_result($rs, 0, "pe_frase1");
$pe_frase2 = mysql_result($rs, 0, "pe_frase2");
$pe_frase3 = mysql_result($rs, 0, "pe_frase3");
$pe_tema = mysql_result($rs, 0, "pe_tema");
$pe_tema_otro = mysql_result($rs, 0, "pe_tema_otro");
$pe_jugo = mysql_result($rs, 0, "pe_jugo");
$pe_bebida = mysql_result($rs, 0, "pe_bebida");
$pe_cerveza = mysql_result($rs, 0, "pe_cerveza");
$pe_aperitivo = mysql_result($rs, 0, "pe_aperitivo");
$pe_sandwiches = mysql_result($rs, 0, "pe_sandwiches");
$pe_salado = mysql_result($rs, 0, "pe_salado");
$pe_dulce = mysql_result($rs, 0, "pe_dulce");
$pe_galletas_artesanales = mysql_result($rs, 0, "pe_galletas_artesanales");
$pe_fo_1 = mysql_result($rs, 0, "pe_fo_1");
$pe_fo_2 = mysql_result($rs, 0, "pe_fo_2");
$pe_fo_3 = mysql_result($rs, 0, "pe_fo_3");
$pe_fo_4 = mysql_result($rs, 0, "pe_fo_4");
$pe_adicional_1 = mysql_result($rs, 0, "pe_adicional_1");
$pe_adicional_2 = mysql_result($rs, 0, "pe_adicional_2");
$pe_comenta = mysql_result($rs, 0, "pe_comenta");
$pe_persona_c = mysql_result($rs, 0, "pe_persona_c");
$pe_telf_dest = mysql_result($rs, 0, "pe_telf_dest");
$pe_telf_tu = mysql_result($rs, 0, "pe_telf_tu");
$pe_distrito = mysql_result($rs, 0, "pe_distrito");
$pe_lat = mysql_result($rs, 0, "pe_lat");
$pe_lng = mysql_result($rs, 0, "pe_lng");
$pe_direccion = mysql_result($rs, 0, "pe_direccion");
$pe_referencia = mysql_result($rs, 0, "pe_referencia");
$pe_fecha_pe = mysql_result($rs, 0, "pe_fecha_pe");
$pe_horario = mysql_result($rs, 0, "pe_horario");
$pe_comentario = mysql_result($rs, 0, "pe_comentario");
$pe_comprobante = mysql_result($rs, 0, "pe_comprobante");
$pe_c_tipo = mysql_result($rs, 0, "pe_c_tipo");
$pe_c_razon = mysql_result($rs, 0, "pe_c_razon");
$pe_c_direccion = mysql_result($rs, 0, "pe_c_direccion");
$user_id = mysql_result($rs, 0, "user_id");
$pro_id = mysql_result($rs, 0, "pro_id");

                                
$sqlUser = "SELECT * FROM usuario WHERE user_id = $user_id";
$rsUser = mysql_query($sqlUser);

$user_name = mysql_result($rsUser, 0, "user_name");
$user_email = mysql_result($rsUser, 0, "user_email");

$sqlDist = "SELECT * FROM distrito WHERE dis_id = $pe_distrito";
$rsDist = mysql_query($sqlDist);

$dis_name = mysql_result($rsDist, 0, "dis_name");

$sqlPro = "SELECT * FROM producto WHERE pro_id = $pro_id";
$rsPro = mysql_query($sqlPro);

$pro_name = mysql_result($rsPro, 0, "pro_name");
$pro_precio_o = mysql_result($rsPro, 0, "pro_precio_o");
$pro_img = mysql_result($rsPro, 0, "pro_img");

include "../incdes/variable.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Administrador / Profesor</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="../css/datepicker.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
        <script src="../js/ckeditor.js"></script>
        <script src="../js/sample.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,500" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
        	.text-left{
        		text-align:left !important;
        	}
        </style>
    </head>
    <body class="bg-color">

        <?php include("../header.php"); ?>	
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 sidebar">
                    <?php include("../aside.php"); ?>	
                </div>
                <div class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2 col-xs-12 main">

                    <h2 class="sub-header">Pedido <small>Ver</small></h2>

                    <?php if ($sw == 1) { ?>
                        <div class="alert alert-success" role="alert">Modificado exitosamente :)</div>
                    <?php } elseif ($sw == 2) { ?>
                        <div class="alert alert-warning" role="alert">Error, inténtelo nuevamente :(</div>
                    <?php } elseif (($sw == 3)) { ?>
                        <div class="alert alert-danger" role="alert">Llene los campos obligatorios :(</div>
                    <?php } ?>

                    <form action='edit.php' method='post' enctype="multipart/form-data" class="form-horizontal">
                        <div class="row">
                            
                                <div class="form-group">                                    
                                    <div class="col-sm-10">                                    
                                        <input type="hidden" name="cu_id" value="<?php echo $cu_id; ?>">
                                    </div>
                                 </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Fecha: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $pe_fecha; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Producto: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo utf8_encode($pro_name); ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Imagen producto: </label>
                                    <div class="col-sm-8">
                                    <img src="../../img/<?php echo $pro_img; ?>" width="200px"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Comprador: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $user_name; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Email: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $user_email; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Telf del Comprador: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $pe_telf_tu; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Para: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $pe_para; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Día y hora de envió: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $pe_fecha_pe." - ".$pe_horario; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Distrito: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $dis_name; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Dirección: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $pe_direccion; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Referecia: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $pe_referencia; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Persona de contacto: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $pe_persona_c; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Telefono del destinatario: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $pe_telf_dest; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Horario de Entrega: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $pe_horario; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Comentario al courier: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $pe_comentario; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Para: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $pe_para; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">De: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label"><b><?php echo $pe_de; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Dedicatoria: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_dedicatoria; ?></b></label>   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Frases: </label>
                                  <div class="col-sm-8">
                                  	<?php
                                        if($pe_frase1!==""){
                                    ?>
                                    <label class="control-label text-left"><b><?php echo $pe_frase1; ?></b></label><br>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        if($pe_frase2!==""){
                                    ?>
                                    <label class="control-label text-left"><b><?php echo $pe_frase2; ?></b></label><br>
                                    <?php
                                        }
                                    ?> 
                                    <?php
                                        if($pe_frase3!==""){
                                    ?>
                                    <label class="control-label text-left"><b><?php echo $pe_frase3; ?></b></label><br>
                                    <?php
                                        }
                                    ?>
                                  </div>
                                </div>
                                <?php
                                    if($pe_tema!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Tema: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_tema; ?>
                                    	<?php if($pe_tema=="Otros"){ echo "- ".$pe_tema_otro; } ?>
                                    </b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($pe_jugo!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Jugo: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_jugo; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($pe_bebida!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Bebida: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_bebida; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($pe_cerveza!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Cerveza: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_cerveza; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($pe_aperitivo!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Aperitivo: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_aperitivo; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($pe_sandwiches!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Sandwiches: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_sandwiches; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($pe_salado!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Toppings salados: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_salado; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($pe_dulce!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Toppings dulces: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_dulce; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($pe_galletas_artesanales!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Galletas artesanales: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_galletas_artesanales; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Fotos: </label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <?php
                                                if($pe_fo_1!==""){
                                            ?>
                                            <div class="col-sm-2">
                                            <a href="../../fotos/<?php echo $pe_fo_1; ?>" download="<?php echo $pe_fo_1; ?>"><img src="../../fotos/<?php echo $pe_fo_1; ?>" width="100%"/></a>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                if($pe_fo_2!==""){
                                            ?>
                                            <div class="col-sm-2">
                                            <a href="../../fotos/<?php echo $pe_fo_2; ?>" download="<?php echo $pe_fo_2; ?>"><img src="../../fotos/<?php echo $pe_fo_2; ?>" width="100%"/></a>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                if($pe_fo_3!==""){
                                            ?>
                                            <div class="col-sm-2">
                                            <a href="../../fotos/<?php echo $pe_fo_3; ?>" download="<?php echo $pe_fo_3; ?>"><img src="../../fotos/<?php echo $pe_fo_3; ?>" width="100%"/></a>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                if($pe_fo_4!==""){
                                            ?>
                                            <div class="col-sm-2">
                                            <a href="../../fotos/<?php echo $pe_fo_4; ?>" download="<?php echo $pe_fo_4; ?>"><img src="../../fotos/<?php echo $pe_fo_4; ?>" width="100%"/></a>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                               	<?php
                                    if($pe_adicional_1!=="" && $pe_adicional_2!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Frases: </label>
                                  <div class="col-sm-8">
                                  	<?php
                                        if($pe_adicional_1!==""){
                                    ?>
                                    <label class="control-label text-left"><b><?php echo $pe_adicional_1; ?></b></label><br>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        if($pe_adicional_2!==""){
                                    ?>
                                    <label class="control-label text-left"><b><?php echo $pe_adicional_2; ?></b></label><br>
                                    <?php
                                        }
                                    ?>
                                  </div>
                                </div>
                            	<?php
                                	}
                            	?>
                            	<?php
                                    if($pe_comenta!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Comentario: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_comenta; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($pe_comprobante!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Tipo de comprobante: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_comprobante; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($pe_c_tipo!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">DNI / RUC: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_c_tipo; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($pe_c_razon!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Nombre / Razón: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_c_razon; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($pe_c_direccion!==""){
                                ?>
                                <div class="form-group">
                                  <label for="example-color-input" class="col-sm-4 control-label">Dirección para el comprobante: </label>
                                  <div class="col-sm-8">
                                    <label class="control-label text-left"><b><?php echo $pe_c_direccion; ?></b></label><br>
                                  </div>
                                </div>
                                <?php
                                    }
                                ?>
                        </div>
                    </form>





                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="../js/neditor.js"></script>
        <script src="../js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">

            /* Iniciando jQuery */
            (function () {

                $("#m4").addClass("active");
                var editor = new nEditor($("#txtEditor")); // Textarea unique ID
                editor.init();
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    startDate: '-3d'
                });

            })();

            /* Iniciando jQuery */
            (function () {

                $(".lk-del").on("click", function (e) {
                    e.preventDefault()

                    var key = $(this).attr("id")
                    var url = "../mod-eventos/index.php?cu_id="
                    $(location).attr('href', url + key);

                })

            })();
        </script>
         <script>
        initSample();
        </script>
    </body>
</html>