<?php
    
    $perfiles="0,1,2";
    
    $p=0;
    
    /*if(isset($_GET['p'])) {
    
    $p=$_GET['p'];
    
    foreach($perfiles as $perfil){
    if($perfil!=$_GET['p']){
    $p=0;
    }
    }
    
    }*/
    
    if(isset($_GET['p'])) {
    
	$p=$_GET['p'];
	if(!preg_match('/'.$p.'/',$perfiles)) $p=0;
    
    }else if(isset($_POST['p'])) {
	
	$p=$_POST['p'];
	if(!preg_match('/'.$p.'/',$perfiles)) $p=0;
	
    }
    
    if($p==0){
	//$p_idioma=2;
	$id_portal=1;
    }elseif($p==1){
	//$p_idioma=1;
	$id_portal=2;
    }elseif($p==2){
	//$p_idioma=4;
	$id_portal=3;
    }
    
    
  
    if(isset($_GET['d'])) $d=$_GET['d'];
    
    if(isset($_GET['sd'])) $sd=$_GET['sd'];
    
    if(isset($_GET['t'])) $t=$_GET['t'];
    
    if(isset($_GET['pag'])) $pag=$_GET['pag'];
    
    include 'perfil/'.$p.'/p.inc';

    
?>