var btnLogin="#btnLogin"
var txtUsuario="#txtUsuario"
var txtClave="#txtClave"
function Login()
{	
	this.iniciar=function()
	{
		$(txtUsuario).focus()
		$(btnLogin).on('click',logearse)
		$(txtClave).on('keypress',presEnter)
	}
	function logearse()
	{
		usuario=$(txtUsuario).val()
		clave=$(txtClave).val()
		if(usuario=="" || clave==""){
			alert('Ingrese todos los datos')
			return
		}else{
			var obj=new Object()
			obj.usuario=usuario
			obj.clave=clave
			proceso.procesar('login',obj,validar)
		}
	}
	function validar(data)
	{	
		if(data==0){
			alert('Datos Incorrectos')
			cancelar()
		}else{
			location.href='index.php';
		}
	}
	function cancelar()
	{
		$(txtClave).val('')
		$(txtUsuario).val('')
		$(txtUsuario).focus()
	}
	function presEnter(event)
	{
	    var keycode = (event.keyCode ? event.keyCode : event.which);
	    if(keycode == '13') {
	    	logearse()
	    }
	}
}