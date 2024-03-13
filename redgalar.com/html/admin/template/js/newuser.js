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
	  
	 $('#add_user_redgalar').submit(function(e){
		e.preventDefault();
		var formData = new FormData($("#add_user_redgalar")[0]);
	    //var datos = $("#add_user_redgalar").serialize();
		console.log(formData);
		if ( $(this).parsley().isValid() ) {
			$.ajax({
			  data: formData,
			  url:'?accion=newusuario',
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
						message: "Usuario Registrado",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					setTimeout("window.location='?accion=newusuario'", 2200);
				}
				else if (res =='existe'){
					$.notify({
						title: "Alto: ",
						message: " Email / RUC / DNI ya existe",
						icon: 'fa fa-info-circle' 
					},{
						type: "info"
					});
				}
				else{
					$.notify({
						title: "Error: ",
						message: "Usuario no registrado",
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