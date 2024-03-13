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
	  
	 $('#edit_user_redgalar').submit(function(e){
		e.preventDefault();
		//console.log(formData);
		if ( $(this).parsley().isValid() ) {
			var formData = new FormData($("#edit_user_redgalar")[0]);
			
			$.ajax({
			  data: formData,
			  url:'?accion=perfil',
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
						message: "Perfil Actualizado",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					setTimeout("window.location='?accion=perfil'", 2200);
				}
				else{
					$.notify({
						title: "Error: ",
						message: "Perfil no Actualizado",
						icon: 'fa fa-close' 
					},{
						type: "danger"
					});
				}
			  }
			});
		}
	});
}); 