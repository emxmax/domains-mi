<?php include("includes/header.php");?>
<script src="public/assets/js/jquery.js" type="text/javascript"></script>
<div id="main_content"> 
<script type="text/javascript">
function doframe(r){
	//a=$("#miFrame").contents().height();
	//alert("cargo");
		if (window.innerHeight){ 
	   //navegadores basados en mozilla 
	   espacio_iframe = window.innerHeight - 110 
	}else{ 
	   if (document.body.clientHeight){ 
			//Navegadores basados en IExplorer
			espacio_iframe = document.body.clientHeight - 110 
	   }else{ 
			//otros navegadores 
			espacio_iframe = 520;
	   } 
	} 
	//var ifr_Alto=$("#miFrame").contents().find("body").height();
	//alert(ifr_Alto);
	if(r==1){
		document.write('<iframe id = "miFrame" src = "http://coredobrasil.com.br/portalng/portaliframe.php?tenant=exsa&showTenantLogo=false" width="100%" height="' + espacio_iframe + '"  frameborder="0" transparency="transparency" onreadystatechange="dostate(this);" onload="doframe(2);"></iframe>');
		/*document.write('<iframe frameborder="0" src="http://coredobrasil.com.br/portalng/portaliframe.php?tenant=exsa&showTenantLogo=false" width="100%" height="' + espacio_iframe + '"></iframe>');	*/
	}
	else{
		$("#miFrame").height(espacio_iframe);
		if (navigator.appName == "Microsoft Internet Explorer"){$("#miFrame").height(espacio_iframe+10);}
	}
}
function dostate(este){
	doframe();
}
doframe(1);
</script>
<noscript> 
<iframe frameborder="0" src="http://coredobrasil.com.br/portalng/portaliframe.php?tenant=exsa&showTenantLogo=false" width="100%" height=478> 
</iframe> 
</noscript>
</div>
<?php include("includes/footer.php");?>