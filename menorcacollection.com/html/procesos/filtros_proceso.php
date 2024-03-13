<?php
    include '../adm/decon/connect.php';
    include '../lib/funciones.php';
    
    /*$id_categoria= $_POST['categoria'];
    
    $categoria = db_query("SELECT  id ,titulo  FROM categorias WHERE id = '".$pk_categoria."'");*/
    
    $categoria= recogerDatos(sprintf("SELECT  id ,titulo  FROM categorias WHERE id='%d' limit 1",$_POST['categoria']));
    
        if($categoria!=false){
        
            $sub_categorias = recogerDatos(sprintf("SELECT  id, padre, titulo  FROM categorias WHERE padre ='%d'",$_POST['categoria']));
        
            if($sub_categorias!=false){
        
?>

            <h3><?php echo $categoria[0]["titulo"]?></h3>
            <ul>
            <?php foreach ($sub_categorias as $sub_categoria): ?>
                <li><input type="radio" name="opt_sub_categoria" value="<?php echo $sub_categoria['id'];?>" class="radioTipo1" /><label class="label labelTipo1"><?php echo $sub_categoria["titulo"];?></label><br /></li>
            <?php endforeach; ?>
            </ul>

<?php       } 
    
        }

?>