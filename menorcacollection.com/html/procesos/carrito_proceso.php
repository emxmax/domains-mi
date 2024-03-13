<?php

include '../adm/decon/connect.php';
include '../lib/clCarrito.php';
include '../lib/clTraslado.php';
include '../lib/funciones.php'; 

session_start();

// Traslados

if (isset($_SESSION['traslado']))
{
    $traslado = unserialize($_SESSION['traslado']);
}
else
{
    $traslado = new Traslado(); 
}


if (isset($_GET['traslado']))
{
    // verificar si el elemento es valido y existe
    $query = sprintf('SELECT id FROM traslados WHERE id = %d', $_GET['traslado']);
    $result = mysql_query($query, $conn->getConectado());
    
    if (!mysql_num_rows($result))
    {
        mysql_free_result($result);
        header('Location: reservar_proceso.php?p='.$p);
        exit();
    }
    else
    {
        $row = mysql_fetch_assoc($result);
        $itemTraslado = $row['id'];
    
        // agregar elemento al carrito
        if (isset($_GET['addtraslado']))
        {
            $traslado->agregar($itemTraslado,1,array($_GET['numeroVuelo'],$_GET['carrierVuelo'],$_GET['tiempoVuelo']));
        }

        // eliminar elemento del carrito      
        else if (isset($_GET['removetraslado']))
        {
            $traslado->eliminar($itemTraslado);
        }
        
    }
    mysql_free_result($result);

    // grabamos y actualizamos los datos del carrito
    $_SESSION['traslado'] = serialize($traslado);
    //header('Location: ' . htmlspecialchars($_SERVER['HTTP_REFERER']));
    //header('Location: reservar_proceso.php');
    //exit();
    
} 


// Habitaciones 


if (isset($_SESSION['cart']))
{
    $cart = unserialize($_SESSION['cart']);
}
else
{
    $cart = new Carrito(); 
}
   
if(isset($_POST['id_tipo']))
{

    foreach ($_POST['qty'] as $item => $cantidad)
    {
        $cart->actualizar($item,$cantidad);
    }
    
    // grabamos y actualizamos los datos del carrito             
    $_SESSION['cart'] = serialize($cart);
    
    //header('Location: reservar_proceso.php');
    //exit();
    //header('Location: reservar_proceso.php');
    
};

if (isset($_GET['item']))
{
    // verificar si el elemento es valido y existe
    $query = sprintf('SELECT id FROM hotel_listado WHERE id = %d', $_GET['item']);
    $result = mysql_query($query, $conn->getConectado());
    
    if (!mysql_num_rows($result))
    {
        mysql_free_result($result);
        header('Location: reservar_proceso.php?p='.$p);
        exit();
    }
    else
    {
        $row = mysql_fetch_assoc($result);
        $item = $row['id'];
    
        // agregar elemento al carrito
        if (isset($_GET['add']))  
        {
            $cart->agregar($item,$_GET['cuartos'],array($_GET['cama']));
        }

        // eliminar elemento del carrito      
        else if (isset($_GET['remove']))
        {
            $cart->eliminar($item);
        }
        
    }
    mysql_free_result($result);

    // grabamos y actualizamos los datos del carrito
    $_SESSION['cart'] = serialize($cart);
    //header('Location: ' . htmlspecialchars($_SERVER['HTTP_REFERER']));
    //header('Location: reservar_proceso.php');
    //exit();
    
} 
    
if (isset($_GET['llegada']) && isset($_GET['salida']))
{
    //$dias = compararFechas($_GET['salida'],$_GET['llegada']);
    $_SESSION['fechas']['dias']= compararFechas($_GET['salida'],$_GET['llegada']); ;
    $_SESSION['fechas']['salida']=$_GET['salida'];
    $_SESSION['fechas']['llegada']=$_GET['llegada'];  
}
else
{
    header('Location: reservar_proceso.php?p='.$p);
    exit();
}   
   
      

ob_start();

?>
<?php 
    $p=0;
    if(isset($_GET['p'])) $p=$_GET['p'];
    include('../perfil/'.$p.'/p.inc'); 
?>
<?php include '../inc_frt/cesta.php'; ?>  

<?php

    $salida= ob_get_clean();
    echo $salida;
    
?>
 
