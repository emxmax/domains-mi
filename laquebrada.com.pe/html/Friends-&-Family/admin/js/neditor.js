if(undefined == nEditorTemplate) var nEditorTemplate = "";
var nEditor = function (ec)
{
  nEditor.prototype.obj = ec;
  nEditor.prototype.contId = ec.attr("id");
}
nEditor.prototype = {
  version: "1.1",
  author: "N3stY (CODE Burger)",
  neCalled: false,
  neBlocked: false,
  obj: "",
  contId: "",
  width: "100%",
  height: "200px",
  classes: "",
  editarea: "",
  tpl: '<div id="{id}" class="neditor {classes}" {style}> <div class="ne_toolbar"> <ul> <li id="{id}" class="toll_btn" data-param="bold" title="Negrita"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.6 10.79c.97-.67 1.65-1.77 1.65-2.79 0-2.26-1.75-4-4-4H7v14h7.04c2.09 0 3.71-1.7 3.71-3.79 0-1.52-.86-2.82-2.15-3.42zM10 6.5h3c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-3v-3zm3.5 9H10v-3h3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5z"/></svg> </li><li id="{id}" class="toll_btn" data-param="br" title="Salto de linea"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 9v4H6V9H4v6h16V9z"/></svg> </li><li id="{id}" class="toll_btn" data-param="italic" title="Cursiva"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 4v3h2.21l-3.42 8H6v3h8v-3h-2.21l3.42-8H18V4z"/></svg> </li><li id="{id}" class="toll_btn" data-param="image" title="Agregar Imagen"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg> </li><li id="{id}" class="toll_btn" data-param="link" title="Agregar Link"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/></svg> </li><li id="{id}" class="toll_btn" data-param="quote" title="Agregar Comillas"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/></svg> </li><li id="{id}" class="toll_btn" data-param="code" title="Source code"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"/></svg>  <ul id="{id}" class="nScriptList"> <li> <a href="#" id="{id}" class="toll_btn" data-param="code"> Code </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="javascript"> JavaScript </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="html"> HTML </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="php"> PHP </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="ruby"> Ruby </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="java"> Java </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="perl"> Perl </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="python"> Python </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="bash"> Bash </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="cs"> C# </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="cpp"> C++ </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="css"> CSS </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="diff"> Diff </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="xml"> XML </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="sql"> SQL </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="1c"> 1C </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="actionscript"> ActionScript </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="apache"> Apache </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="axapta"> Axapta </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="cmake"> CMake </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="coffeescript"> CoffeeScript </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="dos"> DOS </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="delphi"> Delphi </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="django"> Django </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="erlang"> Erlang </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="erlang_repl"> Erlang REPL </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="go"> Go </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="haskell"> Haskell </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="lisp"> Lisp </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="lua"> Lua </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="mel"> MEL </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="markdown"> Markdown </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="matlab"> Matlab </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="nginx"> Nginx </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="objectivec"> Objective C </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="rust"> Rust </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="scala"> Scala </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="smalltalk"> Smalltalk </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="tex"> TeX </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="vbscript"> VBScript </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="vhdl"> VHDL </a> </li><li> <a href="#" id="{id}" class="toll_btn" data-param="vala"> Vala </a> </li></ul> </li></ul> </div><textarea name="{name}" id="{area_id}" placeholder="{placeholder}">{value}</textarea> </div>',
  googlePrettify: true,
  init: function ()
  {
    var obj = this.obj;
    var contId = this.contId;
    var tpl = this.tpl;
    var style = "";
    var classes = this.classes;
    var tpl = nEditorTemplate || this.tpl;
    var area_id = obj.attr("data-id") || "area_neditor";
    if (classes == "")
    {
      style = 'style="width:' + this.width + ';height:' + this.height + ';"';
    }
    tpl = tpl
    .replace(/{id}/g, contId)
    .replace(/{classes}/g, classes)
    .replace(/{style}/g, style)
    .replace(/{name}/g, obj.attr("name") || "unnamed")
    .replace(/{area_id}/g, area_id)
    .replace(/{value}/g, obj.val())
    .replace(/{placeholder}/g, obj.attr("placeholder") || "");
    this.editarea = $("#"+area_id);
    obj.replaceWith(tpl);
  },
  getVal: function ()
  {
    return this.obj.val();
  },
  setVal: function (vlue)
  {
    this.editarea.val(vlue);
  }
};

function setTags(object)
{
  var textArea = $("#" + object.attr("id")).children("textarea");
  var len = textArea.val().length;
  var start = textArea[0].selectionStart;
  var end = textArea[0].selectionEnd;
  var selectedText = textArea.val().substring(start, end);
  var param = object.attr("data-param")
  if (param == "bold")
  {
    var replacement = "<b>" + selectedText + "</b>";
  }
  if (param == "br")
  {
    var replacement = selectedText + "<br>";
  }
  else if (param == "italic")
  {
    var replacement = "<i>" + selectedText + "</i>";
  }
  else if (param == "quote")
  {
    var replacement = "<blockquote>" + selectedText + "</blockquote>";
  }
  else if (param == "link")
  {
    var link = window.prompt("Insert Link", "http://");
    if (selectedText == '') selectedText = 'Link';
    if (link == null) return false;
    var replacement = '<a href="' + link + '">' + selectedText + "</a>";
  }
  else if (param == "image")
  {
    var link = window.prompt("Insert image Link", "http://");
    if (link == null) return false;
    var replacement = '<img src="' + link + '" alt="image"/>';
  }
  else if (param == "code")
  {
    nEditor.neCalled = true;
    setTimeout(removeLangList, 100);
    if (nEditor.neBlocked == false)
    {
      $("#" + object.attr("id") + " .nScriptList").addClass("nScriptListShow");
    }
    return false;
  }
  else
  {
    selectedText = selectedText.replace(/[<>\"\'\t\n]/g, function (m)
    {
      return {
        '<': '&lt;',
        '>': '&gt;',
        "'": '&#39;',
        '"': '&quot;',
        '\t': '  ',
        '\n': '<br/>'
      }[m]
    });
    var replacement = '<pre lang="' + param + '">' + selectedText + "</pre>";
    if (nEditor.googlePrettify)
    {
      replacement = '<pre class="prettyprint lang-' + param + '">' + selectedText + "</pre>";
    }
  }
  textArea.val(textArea.val().substring(0, start) + replacement + textArea.val().substring(end, len));
}

function removeLangList()
{
  nEditor.neCalled = false;
}

function nUnlock()
{
  nEditor.neBlocked = false;
}
$("body").on("click", ".neditor a", function (event)
{
  event.preventDefault();
});
$("body").on("click", ".toll_btn", function ()
{
  setTags($(this));
});
$("body").on("click", function ()
{
  if (nEditor.neCalled != true)
  {
    $(".nScriptList").each(function (i)
    {
      $(".nScriptListShow").removeClass("nScriptListShow");
    });
  }
});
$("body").on("click", ".toll_btn", function ()
{
  nEditor.neBlocked = true;
  setTimeout(nUnlock, 100);
  if (nEditor.neCalled != true)
  {
    $(".nScriptListShow").removeClass("nScriptListShow");
  }
});
