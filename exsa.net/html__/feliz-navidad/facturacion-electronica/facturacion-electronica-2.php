<?php include("includes/header.php");?>
<!--[if IE]> 
<style type="text/css">
#content_iframe .scrollbar{
	display:block;
}
</style>
<![endif]--> 
<script src="public/assets/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function scrollbar_fix(){
	$("#content_iframe .scrollbar").height($("#content_iframe").height());
}
function doframe(r){
	//document.domain="http://vcidigital.com";
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
		$("#main_content").html('<div id="content_iframe"><iframe scroll="no" class = "miFrame" src="http://vcidigital.com/proyectos/webamerica/" width="100%" height="' + espacio_iframe + '"  frameborder="0" transparency="transparency" onreadystatechange="dostate(this);" onload="doframe(2);"></iframe><div class="scrollbar"></div></div>');
		/*document.write('<iframe frameborder="0" src="http://coredobrasil.com.br/portalng/portaliframe.php?tenant=exsa&showTenantLogo=false" width="100%" height="' + espacio_iframe + '"></iframe>');	*/
	}
	else{
		$("#content_iframe .miFrame").height(espacio_iframe);
		//if (navigator.appName == "Microsoft Internet Explorer"){$("#content_iframe .miFrame").height(document.body.clientHeight - 110);}
			//sum=0;
			sum=$("#content_iframe .miFrame").contents().find('body').height();
			//alert(espacio_iframe+" - "+sum);
			if(espacio_iframe<sum){$("#content_iframe .miFrame").height(sum+25);}
			scrollbar_fix();
	}
	
}
function dostate(este){
	doframe();
	scrollbar_fix();
}
$(document).ready(function(e) {
	doframe(1);
	scrollbar_fix();
});
</script>
<div id="main_content"> 
    <noscript> 
        <div id="content_iframe">
            <iframe frameborder="0" class = "miFrame" src="http://coredobrasil.com.br/portalng/portaliframe.php?tenant=exsa&showTenantLogo=false" width="105%" height=478> 
            </iframe> 
        </div>
    </noscript>
</div>
<?php include("includes/footer.php");?>