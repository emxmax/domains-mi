var basePicker='../core/plugins/media-picker/';
var ajaxUrl= basePicker+'media-picker.php';

function LoadCommonTools(){
	$('.dropdown .close').click(function() {
		$('.dropdown .browse').hide();
		$('.dropdown .panel').hide();
	});

	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (!$clicked.parents().hasClass("dropdown")){
			$('.dropdown .browse').hide();
			$('.dropdown .panel').hide("slow");
		}
	});
}

function loadFileList(ID, fParam){
	var input='#'+ID;
	var picker='#dl_'+ID;
	var ajaxParams='?cmd='+fParam['cmd'];
	switch(fParam['cmd']){
		case 'list': ajaxParams+='&gID='+fParam['gID']; break;
		case 'filelist': ajaxParams+='&path='+fParam['path']; break;
	}

	$(picker+' .panel ul').empty();
	$(picker+' .panel ul').html('<li>Cargando...</li>');
	$(picker+' .panel').show("slow");

	$.ajax({
	  url: ajaxUrl+ajaxParams,
	  success: function(data) {
		$(picker+' .panel ul').empty();
		$(picker+' .panel ul').append(data);
		$(picker+' .panel ul li a').addClass('thumb');
		$(picker+' .legend').hide();
		
		$(picker+' .panel ul li a').click(function() {
			var text = $(this).html();
			$(picker+' .label a').html(text);
			$('.dropdown .panel').hide();
			$(input).val($(this).attr('id'));
			$('#clear_'+ID).show();
		});

		$(picker+' .panel ul li a').mouseover(function() {
			$(picker+' .legend').show();
		});
		$(picker+' .panel ul li a').mouseout(function() {
			$(picker+' .legend').hide();
		});

		$(picker+' .panel ul li a').contextMenu('menuItem', {
		  onContextMenu: function(e){
			$(e.target).parent().css('background-color', '#d3d3d3'); 
			return true;
			},
		  bindings: {
			'zoom': function(t) {
			  window.open(t.title);
			},
			'rename': function(t) {
			  alert('Trigger was '+t.id+'\nAction was Rename');
			},
			'delete': function(t) {
				DeleteFile(t, ID, fParam);
			}
		  }
		});
	  }
	});
}

function insertUploaded(ID, groupID, fileName){
	var input='#'+ID;
	var picker='#dl_'+ID;
	$.ajax({
		url: ajaxUrl+'?cmd=add&gID='+groupID+'&fName='+fileName,
		success: function(data) {
			if(data!='1')
				$(picker+' .panel ul').html(data);//error found
			else
				loadFileList(ID, {cmd: 'list', gID: groupID});
		}
	});
}

function DeleteFile(t, ID, fParam){
	var input='#'+ID;
	var picker='#dl_'+ID;

	var ajaxParams='?cmd=delete';
	if(fParam['gID']!=null)
		ajaxParams+='&gID='+fParam['gID']+'&mID='+t.id;
	if(fParam['path']!=null)
		ajaxParams+='&path='+fParam['path']+'&fName='+t.id;

	$.ajax({
		url: ajaxUrl+ajaxParams,
		success: function(data) {
			if(data!='1')
				$(picker+' .panel ul').html(data);//error found
			else{
				loadFileList(ID, fParam);
				if($(input).val()==t.id){ $(input).val(''); $(picker+' .label a').html(''); }
			}
		}
	});
}

function setTemplateFrame(ID, input, title){
	var divLabel='<div class="clear"><a href="#'+ID+'" id="clear_'+ID+'"><img src="'+basePicker+'cancel.png"/>(Limpiar)</a></div><div class="label"><a href="#'+ID+'" name="'+ID+'" id="dp_'+ID+'">'+title+'</a></div>';
	var divTool='<div class="tool"><a href="#" class="upload">upload</a> | <a href="#" class="view">ver lista</a> | <a href="#" class="close">cerrar X</a></div>';
	var divPanel='<div class="panel">'+divTool+'<div class="legend">(*) click derecho para ver mas acciones</div><ul></ul></div>';
	var divMenuR='<div class="contextMenu" id="menuItem"><ul><li id="zoom"><img src="'+basePicker+'zoom.png" /> Visualizar</li><li id="delete"><img src="'+basePicker+'delete.png" /> Eliminar</li></ul></div>';

	$(input).after('<div id="dl_'+ID+'" class="dropdown">'+divLabel+divPanel+
		'<div class="browse" id="up_'+ID+'"><p>Seleccione un nuevo archivo:</p><input name="filedata" type="file" /><img class="imgloader" src="'+basePicker+'ajax-loader.gif" style="display:none" /></div>'+
		divMenuR+'</div>').end();

	$(input).hide();
	$('.dropdown .panel').hide();

	$('.dropdown .panel').click(function(){
		$('.panel ul li a').removeAttr("style")
	});

	$('#clear_'+ID).click(function(){
		$('#'+ID).val('');
		$('#dl_'+ID+' .label a').html(title);
		$('#clear_'+ID).hide();
	});

	if($('#'+ID).val()!="")
		$('#clear_'+ID).show();
	else
		$('#clear_'+ID).hide();
}

function setUploadControls(ID, params){
	var input='#'+ID;
	var upload='#up_'+ID;
	var picker='#dl_'+ID;
	var fileExt=((params['fileExt']!=null) ? params['fileExt'] : '*.jpg;*.gif;*.png');
	
	$(upload+' input[type=file]').change(function() {
		ShowUploading(upload, true);
	    $(this).upload(basePicker+'uploading.php?folder='+params['basePath'], function(res) {
	        //alert(res['filename']);
	        if(typeof(res)=='object'){
	        	if(typeof(res.error)=='string')
	        		alert('Ha ocurrido un error: '+res.error);
	        	else{
					if(params['groupID']!=null) 
						insertUploaded(ID, params['groupID'], res.filename);
					else
						loadFileList(ID, {cmd: 'filelist', path: params['basePath']});
				}
	        }
	        else
				alert('Error interno en la aplicacion.');
	        
			ShowUploading(upload, false);
			$('.dropdown .browse').hide();
	    }, 'json');
	});

	$('#dp_'+ID).click(function(e) {
		//if($(e.target).parents().attr('class')!="label") return;
		$('.dropdown .panel').hide();
		
		//Load file list:
		if(params['groupID']>0)
			loadFileList(ID, {cmd: 'list', gID: params['groupID']});
		else
			loadFileList(ID, {cmd: 'filelist', path: params['basePath']});
		
		$(picker+' .upload').click(function() {
			$(picker+' .browse').show();
		});

		$(picker+' .view').click(function() {
			var view=picker+' .panel ul li a';
			$(view).toggleClass('thumb');
			$(view+' img').toggleClass('icon');
			if($(view).attr('class')=='thumb') $(this).text('ver lista'); else  $(this).text('ver iconos');
		});

	});
}

function ShowUploading(ID, visible){
	if(visible){
		$(ID+' input[type=file]').hide();
		$(ID+' .imgloader').show();
	}
	else{
		$(ID+' input[type=file]').show();
		$(ID+' .imgloader').hide();
	}
}

function FileManager(ID, params ) {
//params={title: '', basePath: '', fileExt: ''}
	var input='#'+ID;
	var picker='#dl_'+ID;
	//var upload='#up_'+ID;
	var fileName=$(input).attr('value');

	setTemplateFrame(ID, input, params['title']);
	setUploadControls(ID, params)
	LoadCommonTools();
	
	if(fileName!=''){
		ext=fileName.split('.').pop();
		urlIcon=($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)? 'core/plugins/media-picker/icons/'+ext+'.gif': params['basePath']+fileName;
		$(picker+' .label a').html('<img class="icon" src="../'+urlIcon+'" />'+fileName);
	}
}

function CMSFileManager(ID, params ) {
//params={title: '', groupID: '', fileExt: ''}

	var input='#'+ID;
	var picker='#dl_'+ID;
	//var upload='#up_'+ID;
	var mediaID=$(input).attr('value');

	setTemplateFrame(ID, input, params['title']);
	$.ajax({
	  url: ajaxUrl+'?cmd=path&gID='+params['groupID'],
	  success: function(data) {
		params['basePath']=(data!='') ? data : 'userfiles';
		setUploadControls(ID, params)
	  }
	});

	LoadCommonTools();
		
	if(mediaID>0){
		$(picker+' .label a').html("Cargando...");
		$.ajax({
		  url: ajaxUrl+'?cmd=file&mID='+mediaID,
		  success: function(data) {
			$(picker+' .label a').html(data);
		  }
		});
	}

}
