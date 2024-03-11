<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89942102-1', 'auto');
  ga('send', 'pageview');

</script>
<?php
$activemenu = "";
if (!isset($codcategoria)){
	$codcategoria = -1;
}
?>
<header class="container-fluid">
	<div class="container" style="position: relative;">
		<div class="row">
			<a class="inline-left" href="<?php echo _URL_;?><?php echo $varLang;?>"><img src="<?php echo _URL_;?>img/logo-karl.jpg" alt=""></a>
			<nav class="inline-right">
				<ul>
					<li><a class="md1 <?php echo ($codcategoria == -1) ? 'active' : '' ?>" href="<?php echo _URL_ ?><?php echo $varLang;?>"><?php echo $mInicio;?></a></li>
					<li><a class="md2 <?php echo ($codcategoria == 1) ? 'active' : '' ?>" href="<?php echo _URL_.$varLang ?>/innovacion"><?php echo $mInnova;?></a></li>
					<li><a class="md3 <?php echo ($codcategoria == 2) ? 'active' : '' ?>" href="<?php echo _URL_.$varLang?>/industria-del-gas"><?php echo $mGas;?></a></li>
					<li><a class="md4 <?php echo ($codcategoria == 3) ? 'active' : '' ?>" href="<?php echo _URL_.$varLang?>/actualidad"><?php echo $mActu;?></a></li>
					<li><a class="md5 <?php echo (($codcategoria == 4) ) ? 'active' : '' ?>" href="<?php echo _URL_.$varLang?>/servicio-a-la-mineria"><?php echo $mServ;?> <i class="fa fa-caret-down" aria-hidden="true"></i></a>
						<ul>
							<li><a class="<?php echo ($codcategoria == 5) ? 'active' : '' ?>" href="<?php echo _URL_.$varLang?>/seguridad"><?php echo $mSeg;?></a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<?php
			 $url= $_SERVER["REQUEST_URI"];
			 $links = substr($url,4);
			?>
			<div class="lang_top">
				<a href="<?php echo _URL_?>es/<?php echo $links?>" class="<?php echo ($varLang == "es") ? 'active' : '' ?>">ES</a> - <a href="<?php echo _URL_?>en/<?php echo $links?>" class="<?php echo ($varLang == "en") ? 'active' : '' ?>">EN</a></p>
			</div>
		</div>
	</div>
	<i id="menu-co" class="visible-xs fa fa-bars fa-lg" aria-hidden="true"></i>
</header>