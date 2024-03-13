<?php
    include '../adm/decon/connect.php';
    include '../lib/funciones.php';

    $opt_genero='undefined';
    $opt_categoria='undefined';
    $opt_sub_categoria='undefined';
    $condicion='';
    
    if(isset($_POST['m'])) $m = $_POST['m'];
    if(isset($_POST['p'])) $p = $_POST['p'];
    
    if(isset($_POST['opt_genero'])) $opt_genero = $_POST['opt_genero'];
    if(isset($_POST['opt_categoria'])) $opt_categoria = $_POST['opt_categoria'];
    if(isset($_POST['opt_sub_categoria'])) $opt_sub_categoria = $_POST['opt_sub_categoria'];
    
    if(isset($_POST['opt_genero'])){
    
       if ($opt_genero != 'undefined' && $opt_categoria == 'undefined' && $opt_sub_categoria == 'undefined' ){   
           $condicion = " WHERE genero = '".$opt_genero."'";
       }else if ($opt_genero != 'undefined' && $opt_categoria != 'undefined' && $opt_sub_categoria == 'undefined' ){   
           $condicion = " WHERE genero = '".$opt_genero."' and id_categorias = '".$opt_categoria."'";
           //echo "si2 -> ".$condicion;
       }else if($opt_genero != 'undefined' && $opt_categoria != 'undefined' && $opt_sub_categoria != 'undefined' ){
           $condicion = " WHERE genero = '".$opt_genero."' and id_categorias = '".$opt_sub_categoria."'";
           //echo "si3 -> ".$condicion;
       }else{
           $condicion=''; 
       }
       
    }
    //$productos= recogerDatos(sprintf("SELECT id,padre,titulo FROM categorias %s",$condicion));
    $productos= recogerDatos("SELECT * FROM productos $condicion order by prioridad asc");
    //$productos =db_query("SELECT  * FROM PRODUCTOS $condicion");
    
    //echo "<h1>Alexis".sprintf("SELECT id,padre,titulo FROM categorias %s",$condicion)."</h1>";
    

?>

<?php if($condicion!='') $titulo = recogerDatos(sprintf("SELECT id,padre,titulo FROM categorias WHERE id='%d' limit 1",$opt_categoria)) ?>

<?php if($productos!=false): ?>

    <div class="listado tipo2">

        <div class="bloqueTitulo">
                <h3><?php if($condicion!='') echo $titulo[0]['titulo']; else echo 'Todos' ; ?></h3>
        </div>

        <?php for($i=0;$i<count($productos);$i++): ?>
    
            <?php $foto =  explode("," , $productos[$i]['imagen']); ?>
            <?php
            
                $datos_seo = array("seccion" => "catalogo_detalle","id_modulo" => $m,"id_detalle" => $productos[$i]['id'] , "nombre_detalle" => $productos[$i]['titulo'],"tipo_modulo" => "m");
                $seo_url = crearUrlSeo($p, 2,$datos_seo);
            
            ?>
       
            <div class="bloque">
                <div class="imagen"><img src="/timthumb.php?src=<?php echo $foto[1]; ?>&amp;w=168&amp;h=128&amp;q=75" alt="" width="168" height="128" /></div>
                <div class="datos">
                    <h4><?php echo $productos[$i]['titulo'];?></h4>
                    <?php if ($productos[$i]['disponible']!=0): ?>
                    
                        <?php if ($productos[$i]['oferta']!=0): ?>
                            <p><span class="tachado">Normal: S./<?php echo $productos[$i]['precio'];?></span> <span class="oferta">Promoción: S./<?php echo $productos[$i]['oferta'];?></span></p>
                        <?php else: ?> 
                            <p>Precio: S./<?php echo $productos[$i]['precio'];?></p>
                        <?php endif; ?>
                        
                    <?php else: ?>
                    
                        <p>No disponible</p>
                    
                    <?php endif; ?>
                </div>
                <div class="enlaces">
                    <!--<a href="catalogo_detalle.php?p=<?php //echo $p; ?>&m=<?php //echo $m; ?>&d=<?php //echo $productos[$i]['id']?>" class="botonDetalle">Ver detalle</a>-->
                    <a href="<?php echo $seo_url; ?>" class="botonDetalle">Ver detalle</a>
                    
                </div>
            </div>
							                         
                         
        <?php endfor; ?>

        <br />
    </div>
    
<?php else: ?>
    <div class="bloqueTitulo">
            <h3><?php if($condicion!='') echo $titulo[0]['titulo']; else echo 'Todos' ; ?></h3>
    </div>
    <h4>no hay datos</h4>
 
<?php endif; ?>

