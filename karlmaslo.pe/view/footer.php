		<div class="rr-ss">
        <ul>
            <li><a href="https://www.linkedin.com/in/karl-maslo-7183718?authType=&authToken=&trk=mp-allpost-aut-name" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/KarlMaslo" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        </ul>
    </div>	
	<footer class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center">
					<img src="<?php echo _URL_ ?>img/logo-footer.png" alt="">
				</div>
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 listado">
					<ul>
						<li><a href="<?php echo _URL_.$varLang ?>"><?php echo $mInicio;?></a>
							<!--ul>
								<li><a href="">Inicio</a></li>
								<li><a href="">Innovación</a></li>
								<li><a href="">Industria del Gas</a></li>
								<li><a href="">Servicios</a></li>
								<li><a href="">A la minería</a></li>
							</ul-->
						</li>
						<li><a href="<?php echo _URL_.$varLang?>/innovacion"><?php echo $mInnova;?></a>
							<!--ul>
								<li><a href="">Inicio</a></li>
								<li><a href="">Innovación</a></li>
								<li><a href="">Industria del Gas</a></li>
								<li><a href="">Servicios</a></li>
								<li><a href="">A la minería</a></li>
							</ul-->
						</li>
						<li><a href="<?php echo _URL_.$varLang ?>/industria-del-gas"><?php echo $mGas;?></a>
							<!--ul>
								<li><a href="">Inicio</a></li>
								<li><a href="">Innovación</a></li>
								<li><a href="">Industria del Gas</a></li>
								<li><a href="">Servicios</a></li>
								<li><a href="">A la minería</a></li>
							</ul-->
						</li>
						<li><a href="<?php echo _URL_.$varLang ?>/actualidad"><?php echo $mActu;?></a>
							<!--ul>
								<li><a href="">Inicio</a></li>
								<li><a href="">Innovación</a></li>
								<li><a href="">Industria del Gas</a></li>
								<li><a href="">Servicios</a></li>
								<li><a href="">A la minería</a></li>
							</ul-->
						</li>
						<li style="position: relative; bottom: -20px;"><a href="javascript:void(0)"><?php echo $mServ;?></a>
							<ul>
								<li><a href="<?php echo _URL_.$varLang ?>/seguridad"><?php echo $mSeg;?></a></li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="col-lg-12 col-xs-12 text-center">
					<?php
					 $url= $_SERVER["REQUEST_URI"];
					 $links = substr($url,18);
					?>
					<p>powered by <a href="https://www.mediaimpact.pe">Atik Consultores</a> || <a href="<?php echo _URL_?>es/<?php echo $links?>">ES</a> - <a href="<?php echo _URL_?>en/<?php echo $links?>">EN</a></p>
				</div>
			</div>
		</div>
	</footer>
	<!--  idioma-->
	<input type="hidden" value="<?php echo $varLang;?>" id="gIdioma">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php echo _URL_;?>adminkarl/bower_components/angular/angular.min.js"></script>
	<script src="<?php echo _URL_;?>adminkarl/bower_components/angular-sanitize/angular-sanitize.js"></script>
	<script src="<?php echo _URL_;?>adminkarl/bower_components/angular-route/angular-route.min.js"></script>
	<script src="<?php echo _URL_;?>js/init.js"></script>
	<script src="<?php echo _URL_;?>js/controller/controller.js"></script>
	<script src="<?php echo _URL_;?>js/app.js"></script>
	<script>
    $(document).ready(function($){
  		$("#frm-suscribete").submit(function(e){
	    	e.preventDefault();
	    	console.log("ccc");
	    	var email = $("#e-email").val();
	    	var data = {"email": email}
	    	var gIdioma = $("#gIdioma").val();
	    	var urlg = $("#url-g").val();
	    	$.ajax({
	    		url : '../controller/sendcontacto.php',
	    		type: "POST",
	    		data: data,
	    		beforeSend : function(){
	    			$(".alerta").html('<span>Procesando ..</span>');
	    		},
	    		success: function(response){
	    			if(response == "existe"){
	    				if(gIdioma == "es"){
	    					$(".alerta").html('<span>Emial ya Suscrito</span>');
	    				}
	    				else{
	    					$(".alerta").html('<span>Email already subscribed</span>');
	    				}	
	    				$("#frm-suscribete")[0].reset();
	    				setTimeout(function(){
	    					$(".alerta span").remove();
	    				},1800);
	    			}
	    			else if(response == "exito"){
						location.href = urlg;
	    				// if(gIdioma == "es"){
	    					// $(".alerta").html('<span>Exito: Emial Suscrito</span>');
	    				// }
	    				// else{
	    					// $(".alerta").html('<span>Success: Emial Suscrito</span>');
	    				// }
	    				$("#frm-suscribete")[0].reset();
	    				setTimeout(function(){
	    					$(".alerta span").remove();
	    				},1500);
	    			}
	    			else{
	    				if(gIdioma == "es"){
		    				$(".alerta").html('<span>Error intentar de nuevo</span>');
		    			}
		    			else{
		    				$(".alerta").html('<span>Error trying again</span>');
		    			}
	    				$("#frm-suscribete")[0].reset();
	    				setTimeout(function(){
	    					$(".alerta span").romove();
	    				},1500);
	    			}
	    		}
	    	});
	    });
    });
    </script>
    <script src="<?php echo _URL_;?>js/owl.carousel.min.js"></script>
    <script>
        
	    $(document).ready(function() {
		    if($("#owl-demo")){

			    var owl = $("#owl-demo");

			    owl.owlCarousel({
			     
			          autoPlay: 2000, //Set AutoPlay to 3 seconds
			     
			          items : 2,
			          itemsDesktop : [1199,2],
			          itemsDesktopSmall : [979,2]
			     
			    });

		        $("#flecha-left").click(function(){
		            owl.trigger('owl.next');
		        })
		        $("#flecha-right").click(function(){
		            owl.trigger('owl.prev');
		        })
		    }
	    });
	</script>
</body>
</html>