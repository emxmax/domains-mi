$(function() {

	$('#sampleTable').DataTable();
	
	$(document).on("click",".btn_get_estado", function(e){
		e.preventDefault();
		var i = $(this).attr("data-id");
		var ee = $(this).attr("data-estado");
		datos = {"id": i, "acc":4, "e":ee};
		$.ajax({
			  data: datos,
			  url:'?accion=pedidos',
			  type:'POST',
			  beforeSend: function(){
			  },
			  success:  function (response) {
				$("#modalP").html(response);
			  }
			});
	});
	
	$(document).on("change","#pe_estado", function(e){
		var i = $("#pe_estado").val();
		if(i == 4){
			$(".actualizar_e").css("display","block");
		}
		else{
			$(".actualizar_e").css("display","none");
		}
		
	});
	
	$(document).on("click","#estadoModal", function(e){
		e.preventDefault();
		var id = $("#id_p").val();
		var ee = $("#pe_estado").val();
		datos = {"id": id,"e":ee ,"acc":3};
		
		$.ajax({
		  data: datos,
		  url:'?accion=pedidos',
		  type:'POST',
		  beforeSend: function(){
			//$(".alerta").html("<span class='btn btn-s-md btn-info'>Procesando ...</span>");
			$(".actualizar_e").html("<span class='btn btn-s-md btn-info'>Procesando ...</span>");
		  },
		  success:  function (response) {
			var res = response;
			if (res =='exito') {
				$(".modalestado .close").click();
				$.notify({
					title: "Exito: ",
					message: "Estado de pedido actualizado!",
					icon: 'fa fa-check' 
				},{
					type: "success"
				});
				setTimeout("window.location='?accion=pedidos'", 2200);
			}
			else{
				$(".modalestado .close").click();
				$.notify({
					title: "Error: ",
					message: "No se actualizo el estado!",
					icon: 'fa fa-close' 
				},{
					type: "danger"
				});
			}
		  }
		});
		
	});
	
	//esto activa acciendo click comentado
	$(document).on("click",".btn-activar-pedido", function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		datos = {"id": id, "acc":3};
		var r = confirm("Pedido entregado");
		if(r == true){
		
			$.ajax({
			  data: datos,
			  url:'?accion=pedidos',
			  type:'POST',
			  beforeSend: function(){
				//$(".alerta").html("<span class='btn btn-s-md btn-info'>Procesando ...</span>");
			  },
			  success:  function (response) {
				var res = response;
				if (res =='exito') {
					$.notify({
						title: "Exito: ",
						message: "El pedido ha sido entregado!",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					setTimeout("window.location='?accion=pedidos'", 2200);
				}
				else{
					$.notify({
						title: "Erro: ",
						message: "El pedido no ha sido entregado!",
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