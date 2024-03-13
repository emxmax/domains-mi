function PopUpApp(textoTitulo,textoDescripcion,acepto){
    var ventanaPopUp = $("<div>");
    ventanaPopUp.addClass("modal fade");
    var modalDialogo = $("<div>");
    modalDialogo.addClass("modal-dialog");
    var modalContent = $("<div>");
    modalContent.addClass("modal-content");

    var modalHeader = $("<div>");
    modalHeader.addClass("modal-header");

    var btnCerrar = $('<button data-dismiss="modal" aria-hidden="true">');
    btnCerrar.attr({"type":"button"});
    btnCerrar.addClass("close");
    btnCerrar.html("&times;");

    var titulo = $("<h4>");
    titulo.addClass("modal-title");
    titulo.html(textoTitulo);

    var contenido = $("<div>");
    contenido.addClass("modal-body");
    contenido.html(textoDescripcion);

    var footer = $("<div>");
    footer.addClass("modal-footer");
    
    var btnCancelar = $('<button data-dismiss="modal">');
    btnCancelar.attr({"type":"button"});
    btnCancelar.addClass("btn btn-default");
    btnCancelar.html("Cancelar");

    var btnAceptar = $('<button data-dismiss="modal">');
    btnAceptar.attr({"type":"button"});
    btnAceptar.addClass("btn btn-primary");
    btnAceptar.html("Aceptar");

    ventanaPopUp.append(modalDialogo);
    modalDialogo.append(modalContent);
    modalContent.append(modalHeader);
    modalContent.append(contenido);
    modalContent.append(footer);

    modalHeader.append(btnCerrar);
    modalHeader.append(titulo);

    footer.append(btnCancelar);
    footer.append(btnAceptar);

    ventanaPopUp.modal('toggle');
    btnAceptar.on("click",acepto);
    this.setTextoSuccess = function(texto){
        btnAceptar.html(texto);
    }
}
