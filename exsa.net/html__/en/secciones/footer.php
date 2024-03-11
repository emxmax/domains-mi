<?php
$dbhost 	= "localhost";
$user 		= "xxqitbn_db77722_sonrie";
$password 	= "DaWZO?Wm?n&goJP7";
$database	= "xxqitbn_db77722_exsa2";
/*
$dbhost 	= "localhost";
$user 		= "root";
$password 	= "";
$database	= "xxqitbn_db77722_exsa";*/
$dbconn = mysql_connect($dbhost, $user,$password);
mysql_select_db($database,$dbconn);
mysql_query("utf8",$dbconn);
$sql = "Select * From post Order by idPost DESC limit 0, 4";
$result = mysql_query($sql,$dbconn);
$main_arr = null;
while ($row = mysql_fetch_assoc($result)) {
	foreach($row as $key => $value)
	{    
		$arr[$key] = $value; 
	}
	$main_arr[] = $arr;
};
?>
<footer>
	<div class="footer2">
		<div class="container">
			<div class="row centro">
				<div class="col-md-3 col-xs-12">
					<p><span style="color: #ffffff;">COPYRIGHT </span><a href="http://mediaimpact.pe" target="_blank"><span style="color: #ffffff">MEDIA IMPACT 2016</span></a></p>

				</div>
				<div class="col-md-9 col-xs-12" style="text-align: right;">
					<p><span class="label"><a href="sitemap" style="color: #ffffff;">Sitemap</a></span>
					<span class="label"><a href="http://mail.exsa.net" target="_blank" style="color: #ffffff;">Web Mail</a></span>
					<span class="label"><a href="work-with-us" style="color: #ffffff;">Work with us</a></span>
					<span class="label"><a href="declaration-of-privacy-terms-and-conditions" style="color: #ffffff;">Privacy Policy Terms and conditions</a></span></p>
				</div>
			</div>
		</div>
	</div>
</footer>
<style>
	hr{
		margin-top: 10px;
		border-top: 2px solid #0072bc;
	}
	/*
	.footerlink{
		margin: 0;
		padding-bottom: 10px;
		list-style: none;
	}
	.colorFooter{
		color: #2c2c2c !important;
		font-size: 11px !important;
	}
	.tituloFooter{
		color:#ff9f05;
		font-weight: bold;
	}
	.alinTop{
		padding-top:20px;
	}*/
	.mcenter{
		margin: 0 auto;
	}
	.fondoGris{
	  background: #F2F2F2;
	  margin-top: -20px;
	  padding-bottom: 30px;
	}
	.fondoNoticia{
		margin-top: 20px;
		background-image: none;
	}
	.pright{
  		padding-right: 0px;
	}
	.footerlink{
		margin: 0;
		padding: 0;
		list-style: none;
		justify-content: space-between;
		display: flex;
	}
	.footerlink li{
		display:inline-block;
		vertical-align: middle;
		padding-right: 18px;
	}
	.footerlink li p span{
		color:#FFC605;
	}
	.pleft{
		padding-left: 0px;
		padding-top: 10px;
	}
	.mleft{
		margin-left: 15px;
	}
	.ulCenter{
		list-style: none;
		text-align: center;
	}
	.noUnder{
		display: inline;
	}
	.centro{
		text-align: center;
	}
	.noUnder>.active{
		text-decoration: none;
		color: white;
		width: 100px;
     	height: 100px;
     	-moz-border-radius: 50%;
     	-webkit-border-radius: 50%;
     	border-radius: 50%;
     	background: #428BCA;
     	padding: 5px 9px;
	}
	.pTop{
		padding-top: 20px;
	}
	.il{
		display: inline;
	}
	.pBot{
		padding-bottom: 20px;
	}
	.tCenter{
		text-align: center;
	}
	.tituloFooter1{
		font: 12px open_sansregular !important;
  		font-weight:  bold !important;
  		color: #428BCA !important;
	}
	.descFooter1{
		color: #5A5A5A !important;
		font: 12px open_sansregular ;
  		font-weight:  bold ;
	}
.btn-noticias{
		background: #428BCA;
		color: white;
		padding: 10px 20px;
		margin-left: -14px;
		font: 10px open_sansregular;
		font-weight:  bold;
		text-decoration: none !important;
	}
	.btn-noticias:hover{
		background: #428BCA;
		color: white;
		padding: 10px 20px;
		margin-left: -14px;
		font: 10px open_sansregular;
		font-weight:  bold
	}
	.btn-ver>a{
		margin: 0;
	}
	.btn-ver>a:hover{
		margin: 0;
	}
	.fondoGris>a>h3{
	  padding: 10px 0px 0px 20px;
	  font: 12px open_sansregular;
	  font-weight:  bold;
	  color: #428BCA;
	}
	.fondoGris>p{
	  padding: 10px 0px 0px 20px !important;
	  font: 10px open_sansregular !important;
	  color: #5A5A5A !important;
	}
	.fondoNoticia>.row>h3{
		font: 15px open_sansregular;
  		font-weight:  bold;
  		color: #428BCA;
	}
	.descNoticia{
		font: 10px open_sansregular !important;
  		font-weight:  bold !important;
  		color: #428BCA !important;
  		padding:  10px 0px 20px 10px;
  		text-align: center
	}
	.btn-ver{
		text-align: center;
	}
	footer .footer2 .container p{
		padding:12px 5px;
		font-size:.8em;
		margin-bottom:0;
		text-align: center
	}
@media screen and (min-width: 992px){
	.btn-noticias{
		background: #428BCA;
		color: white;
		padding: 10px 174px;
		margin-left: -14px;
		font: 12px open_sansregular;
		font-weight:  bold;
		text-decoration: none !important;
	}
	.btn-noticias:hover{
		background: #428BCA;
		color: white;
		padding: 10px 174px;
		margin-left: -14px;
		font: 12px open_sansregular;
		font-weight:  bold
	}
	.fondoNoticia>.row>h3{
		font: 22px open_sansregular;
  		font-weight:  bold;
  		color: #428BCA;
	}
	.descNoticia{
		font: 12px open_sansregular !important;
  		font-weight:  bold !important;
  		color: #428BCA !important;
  		padding:  10px 0px 20px 10px;
	}
}
@media screen and (min-width: 1200px){
	.fondoNoticia{
		background-image: url("imagenes/fondo-footer.jpg");
		background-repeat: no-repeat;
		padding-bottom: 20px;
		margin-top: 0px;
	}
	.centro{
		text-align: justify;
	}
	.btn-ver>a{
		margin-left: -34px;
	}
	.btn-ver>a:hover{
		margin-left: -34px;
	}
	.fondoGris>p{
	  padding: 10px 0px 0px 20px !important;
	  font: 12px open_sansregular !important;
	  color: #5A5A5A !important;
	}
	.descNoticia{
		font: 12px open_sansregular !important;
  		font-weight:  bold !important;
  		color: #428BCA !important;
  		padding:  10px 0px 20px 10px;
  		text-align: start;
	}
	.pright{
  		padding-right: 5px;
	}
	.btn-noticias{
		background: #428BCA;
		color: white;
		padding: 10px 174px;
		margin-left: -14px;
		font: 12px open_sansregular;
		font-weight:  bold;
		margin: 0;
		text-decoration: none !important;
	}
	.inner-footer1{
		padding:50px 0px;
	}
	.fondoNoticia{
		padding-bottom: 0px;
	}
	.fondoNoticia>.row>h3{
		font: 22px open_sansregular;
  		font-weight:  bold;
  		color: #428BCA;
	}
	.fondoGris>a>h3{
	  padding: 10px 0px 0px 20px;
	  font: 20px open_sansregular;
	  font-weight:  bold;
	  color: #428BCA;
	}
	.btn-noticias:hover{
		background: #428BCA;
		color: white;
		padding: 10px 174px;
		margin-left: -14px;
		font: 12px open_sansregular;
		font-weight:  bold;
		margin: 0;
	}
	.btn-ver{
		width: 400px;
	}
	.alto-noticia{
		height: 176px;
	}
}
</style>