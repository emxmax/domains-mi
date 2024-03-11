<?php include("includes/header.php");?>
<script src="public/assets/js/jquery.js" type="text/javascript"></script>
<div id="main_content"> 
  <script type="text/javascript"> 
  var i=0;
if (window.innerHeight){ 
   //navegadores basados en mozilla 
   espacio_iframe = window.innerHeight - 110 
}else{ 
   if (document.body.clientHeight){ 
      	//Navegadores basados en IExplorer
      	espacio_iframe = document.body.clientHeight - 110 
   }else{ 
      	//otros navegadores 
      	espacio_iframe = 478
   } 
} 
document.write ('<iframe frameborder="0" src="https://factura-teste.neogrid.com/facturaweb/login/centria" width="100%" height="' + espacio_iframe + '">');
document.write ('</iframe>');
function reFresh() {
  		wait(10000);
}
$(document).ready(function(e) {  
	if(i==0){
		window.setInterval("reFresh()",600);i++;
	}
}); 
</script> 
<noscript> 
<iframe frameborder="0" src="https://id.neogrid.com/identity/login" width="100%" height=478> 
</iframe> 
</noscript>
</div>
<?php include("includes/footer.php");?>