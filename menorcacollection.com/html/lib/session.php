<?php

   session_start();

   if (isset($_SESSION['cart']))
   {
      $cart = unserialize($_SESSION['cart']);
       
   }
   else
   {
      $cart = new Carrito(); 
   }

   include 'validar_usuario.php';   
   
?>
