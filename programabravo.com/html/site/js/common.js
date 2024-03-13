$(function(){

    $('.defaultInputValue').defaultInputValue();

    $('#frmLogin').submit(function(){
        if($('#dni').val()==$('#dni').attr('title') || $('#clave').val()==$('#clave').attr('title')){
            ShowAlert("Debes ingresar todos los datos requeridos!");
            return false;
        }else
            return true;
    });
    $("#lnkLogin").click(function(){
        return $('#frmLogin').submit();
    });
    $('#frmUpdate').submit(function(){
        if($('#clave').val()==$('#clave').attr('title') || $('#clave2').val()==$('#clave2').attr('title')){
            ShowAlert("Debes ingresar todos los datos requeridos!");
            return false;
        }else
            return true;
    });
    $("#lnkUpdate").click(function(){
        return $('#frmUpdate').submit();
    });
    $("#clave").keydown(function(event){
      if ( event.which == 13 ) {
            return $('#frmLogin').submit();
       }
    });
    
    $('#search1').submit(function(){
        if($('#txt1').val()==$('#txt1').attr('title')){
            ShowAlert("Debes ingresar un texto a buscar!");
            return false;
        }else
            return true;
    });
    $("#lnk1").click(function(){
        return $('#search1').submit();
    });
    $("#txt1").keydown(function(event){
      if ( event.which == 13 ) {
            return $('#search1').submit();
       }
    });
    
    $('#search2').submit(function(){
        if($('#txt2').val()==$('#txt2').attr('title')){
            ShowAlert("Debes ingresar un texto a buscar!");
            return false;
        }else
            return true;
    });
    $("#lnk2").click(function(){
        return $('#search2').submit();
    });
    $("#txt2").keydown(function(event){
      if ( event.which == 13 ) {
            return $('#search2').submit();
       }
    });
    
});
/************************************************************/

function ShowAlert(msg){
   $.fancybox({
       padding: 20,
       content: '<div id="divAlerta"><p>'+msg+'</p><div align="center"><a href="javascript:;" onclick="jQuery.fancybox.close();" class="alert">Aceptar</a></div></div>',
       openEffect  : 'fade',
       closeEffect : 'fade'
   });
}

function ShowMessage(msg){
   $.fancybox({
       padding: 20,
       content: '<div id="divAlerta"><p>'+msg+'</p></div>',
       openEffect  : 'fade',
       closeEffect : 'fade'
   });
}

function ShowConfirm(msg, onConfirm){
   $.fancybox({
       padding: 20,
       content: '<div id="divAlerta"><p>'+msg+'</p><div align="center"><a href="javascript:;" onclick="jQuery.fancybox.close();" class="alert"> No </a> <a href="javascript:;" class="alert confirm"> Si </a></div></div>',
       openEffect  : 'fade',
       beforeShow: function() {
           $('#divAlerta .confirm').click(onConfirm);
       }
});
}
