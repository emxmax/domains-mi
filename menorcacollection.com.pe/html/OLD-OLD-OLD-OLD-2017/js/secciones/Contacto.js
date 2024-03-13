function Contacto()
{
	var estado=1;
	var arrElelemtos=['txtNombreContacto','txtTelefonoContacto','txtCorreoContacto','txtNombreProyecto','txtMensajeContacto']
	this.iniciar=function()
	{
		$("#btnProyectosHome").on("click",enviarCorreo)
	}
	function enviarCorreo()
	{
		/*if($("#txtNombreContacto").val()=="" || $("#txtTelefonoContacto").val()=="" || $("#txtCorreoContacto").val()=="" || $("#txtNombreProyecto").val()=="" || $("#txtMensajeContacto").val()==""){
			alert('faltan datos');
			return; 
		}*/
		if($("#txtNombreContacto").val()=="" ||  $("#txtdni").val()=="" || $("#txtDireccion").val()==""){
			alert('faltan datos');
			return; 
		}
		var objMail=new Object();
		objMail.nombre=$("#txtNombreContacto").val();
		objMail.dni=$("#txtDni").val();
		objMail.telefono=$("#txtTelefonoContacto").val();
		objMail.correo=$("#txtCorreoContacto").val();
		objMail.proyecto=$('#txtNombreProyecto').val();
		objMail.consulta=$("#txtMensajeContacto").val();
		objMail.direccion=$("#txtDireccion").val();
		proceso.procesar("enviarCorreo",objMail,validarEnvio);
		$("#btnProyectosHome").attr('disabled','disabled');

	}
	function validarEnvio(data)
	{
		if (objMail=1) 
			{
				alert('Se envio los datos Correctamente');	
				helper.limpiarCampos("formularioContacto");
				helper.limpiarCampos("scroll_contacto");
			};
			$("#btnProyectosHome").removeAttr('disabled')
		console.log(data)
	}
}