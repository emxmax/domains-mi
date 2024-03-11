function BloquearPantalla(textoTitulo,textoDescripcion){
	var ventanaPopUp = $("<div>");
    ventanaPopUp.addClass("modal fade");
    var modalDialogo = $("<div>");
    modalDialogo.addClass("modal-dialog");
    var modalContent = $("<div>");
    modalContent.addClass("modal-content");

    var modalHeader = $("<div>");
    modalHeader.addClass("modal-header");
   

    var titulo = $("<h4>");
    titulo.addClass("modal-title");
    titulo.css({"text-align":"center"});
    titulo.html(textoTitulo);

    var contenido = $("<div>");
    contenido.addClass("modal-body");
    contenido.css({"text-align":"center"});
    contenido.html(textoDescripcion);

    var footer = $("<div>");
    footer.addClass("modal-footer");


    var btnAceptar = $('<button data-dismiss="modal">');
    btnAceptar.attr({"type":"button"});
    btnAceptar.addClass("btn btn-primary");
    btnAceptar.html("Aceptar");
    ventanaPopUp.append(modalDialogo);
    modalDialogo.append(modalContent);
    modalContent.append(modalHeader);
    modalContent.append(contenido);
    modalContent.append(footer);    
    modalHeader.append(titulo);    
    ventanaPopUp.modal({
    		keyboard: false,
    		backdrop: false
    	});
   	this.remover = function(){
   		ventanaPopUp.modal("hide");
   		setTimeout(function(){
   			ventanaPopUp.remove();
   		},1000);
   	}
   	this.setMensaje = function(mensaje){
   		contenido.html(mensaje);
   	}
    
}