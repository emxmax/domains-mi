$(function() {
	 $("#load_img").change(function(){
		if (this.files && this.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
			 $('#img_avatar').attr('src', e.target.result);
			}
			reader.readAsDataURL(this.files[0]);
       }
      });
	  
	 $('#add_producto_redgalar').submit(function(e){
		e.preventDefault();
		var formData = new FormData($("#add_producto_redgalar")[0]);
	    //var datos = $("#add_producto_redgalar").serialize();
		console.log(formData);
		if ( $(this).parsley().isValid() ) {
			$.ajax({
			  data: formData,
			  url:'?accion=newproducto',
			  type:'POST',
			  cache: false,
			  contentType: false,
			  processData: false,
			  beforeSend: function(){
				//$(".alerta").html("<span class='btn btn-s-md btn-info'>Procesando ...</span>");
			  },
			  success:  function (response) {
				var res = response;
				if (res =='exito') {
					$.notify({
						title: "Exito: ",
						message: "Producto Registrado",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					setTimeout("window.location='?accion=newproducto'", 2200);
				}
				else if (res =='existe'){
					$.notify({
						title: "Alto: ",
						message: "Producto ya existe",
						icon: 'fa fa-info-circle' 
					},{
						type: "info"
					});
				}
				else{
					$.notify({
						title: "Error: ",
						message: "Producto no registrado",
						icon: 'fa fa-check' 
					},{
						type: "danger"
					});
				}
			  }
			});
		}
	});
}); 