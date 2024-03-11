userReadOnly=false;
msgUserError="Acceso limitado, no tiene los permisos necesarios para realizar esta acci\xF3n.";

function resetForm(frm){
	xform=(typeof(frm)!='undefined') ? frm : document.forms[0];
	xform.action=(xform.action).replace("&callback=true","");
	return xform;
}

function Search(frm){
	xform=resetForm(frm);
	xform.FormView.value="list";
	xform.Command.value="";
	xform.Page.value=0;
	xform.submit();
}

function MovePg(nPage){
	xform=resetForm();
	xform.FormView.value="list";
	xform.Page.value=nPage;
	xform.submit();
}

function OrderBy(str){
	xform=resetForm();
	xform.OrderBy.value=str;
	xform.submit();
}

function addNew(frm){
	if(userReadOnly) { alert(msgUserError); return;}
	xform=resetForm(frm);
	xform.kID.value="";
	xform.FormView.value="add";
	xform.submit();
}

function Edit(kID){
	if(userReadOnly) { alert(msgUserError); return;}
	xform=resetForm();
	xform.kID.value=kID;
	xform.FormView.value="edit";
	xform.submit();
}

function View(kID){
	xform=resetForm();
	xform.kID.value=kID;
	xform.FormView.value="view";
	xform.submit();
}

function Export(frm){
	xform=resetForm(frm);
	xform.action+="&callback=true";
	xform.FormView.value="xls";
	//frm.target="_blank";
	xform.submit();
}

function moveUp(kID){
	if(userReadOnly) { alert(msgUserError); return;}
	xform=resetForm();
	xform.kID.value=kID;
	xform.Command.value="moveUp";
	xform.submit();
}

function Back(){
	xform=resetForm(document.forms[0]);
	xform.kID.value="";
	xform.FormView.value="list";
	xform.submit();
}

function BackTo(view){
	xform=resetForm();
	xform.kID.value="";
	xform.FormView.value=view;
	xform.submit();
}

function Delete(kID){
	if(userReadOnly) { alert(msgUserError); return;}
	if(confirm("\xBFEsta seguro que desea eliminar este Item?")){
		xform=resetForm();
		xform.kID.value=kID;
		xform.FormView.value="list";
		xform.Command.value="delete";
		xform.submit();
	}
}

function Print(){
	window.print();
}

function Close(){
	window.close();
}

function validateEmail(valor) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor))
    return true;
  else
    return false;
}

function BrowseImages(pInput, path){
	window.open("../core/plugins/filemanager/index.php?pForm="+pInput+"&pDirectory="+path,"buscar","top=50,left=100,width=501,height=326,status=yes",1,-1);
}

function loadScript(file){
  var js=document.createElement('script')
  js.setAttribute("type","text/javascript")
  js.setAttribute("src", file)
}

function getPositionX(e) {
	var posx = 0;
	if (!e) var e = window.event;
	if (e.pageX) posx = e.pageX;
	else if (e.clientX)
		posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
return posx;
}

function getPositionY(e) {
var posy = 0;
	if (!e) var e = window.event;
	if (e.pageY) posy = e.pageY;
	else if (e.clientY)
		posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
return posy;
}

$(document).ready(function() {
	$("#title").focus();
});
