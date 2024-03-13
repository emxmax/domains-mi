function imprimir(bloque,anchoIframe,anchoContenido){

	var html="<html>";
	html+="<head>";
	//html+="<style type='text/css'>#content div.ads, #content img {display:none}</style>";
	html+="<link rel='Stylesheet' type='text/css' href='/css/web.css' />";
	html+="<link rel='Stylesheet' type='text/css' href='/css/edi.css' />";
	html+="</head>";
	html+="<body style='background:none;width:"+anchoContenido+"px;'>";
	html+= document.getElementById(bloque).innerHTML;
	html+="</body>";
	html+="</html>";
	
	var printWin = window.open('','','left=0,top=0,width='+anchoIframe+',height=500,toolbar=0,scrollbars=1,status  =0');
	printWin.document.write(html);
	printWin.document.close();
	printWin.focus();
	printWin.print();
	//printWin.close();
	
}