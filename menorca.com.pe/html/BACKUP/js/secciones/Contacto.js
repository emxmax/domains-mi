function Contacto()
{
	var estado=1;
	var arrElelemtos=['txtNombreContacto','txtTelefonoContacto','txtCorreoContacto','txtNombreProyecto','txtMensajeContacto','txtDni']
	this.iniciar=function()
	{
		$("#btnContacto").on("click",enviarCorreo)

	}
	function enviarCorreo()
	{
		if($("#txtNombreContacto").val()=="" || $("#txtTelefonoContacto").val()=="" || $("#txtDni").val()=="" || $("#txtCorreoContacto").val()=="" || $("#txtNombreProyecto").val()=="" || $("#txtMensajeContacto").val()==""){
			alert('faltan datos');
			return;
		}
		var objMail=new Object();
		objMail.nombre=$("#txtNombreContacto").val();
		objMail.dni=$("#txtDni").val();
		objMail.telefono=$("#txtTelefonoContacto").val();
		objMail.correo=$("#txtCorreoContacto").val();
		objMail.consulta=$("#txtMensajeContacto").val();
		objMail.proyecto=$("#txtNombreProyecto").val();
		proceso.procesar("enviarCorreo",objMail,validarEnvio);
		$("#btnContacto").attr('disabled','disabled');
		//console.log(objMail);

	}
	function validarEnvio(data)
	{
		if (objMail=1) 
			{
				alert('Se envio los datos Correctamente');
				helper.limpiarCampos("formularioContacto");
				helper.limpiarCampos("scroll_contacto");

				
			};
			$("#btnContacto").removeAttr('disabled')
		console.log(data)
	}
}