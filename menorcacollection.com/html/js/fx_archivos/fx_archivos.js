window.onload = function(){
    var options = {
	   flvPlayer:"/bin/player/player.swf",
	   players:     ['img', 'swf', 'flv', 'html', 'qt'], 
	   autoplayMovies:true

		//displayNav:         false,
		//listenOverlay:       false,
		//enableKeys:true,
		//modal: true
	};
	//Shadowbox.init({ flashVars: {flvPlayer:"/adm/js/fx_archivos/player.swf",language: 'es',players: ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv','mp4','jpg']}});
	Shadowbox.init(options);
} 

$(function(){

	$('.archivoPopup').live('click',function(e){
		e.preventDefault();
		var contenido=$(this).attr('href');
		var clase=contenido.substring(contenido.length-3)
		var titulo=$(this).attr('title');
		clase=clase.toLowerCase();
		
		if(clase=='jpg' || clase=='gif' || clase=='png') player='img';
		else if(clase=='swf') player='swf';
		else if(clase=='htm' || clase=='php') player='iframe';
		else player='flv';
		
		Shadowbox.open({
			content:    contenido,
			player:     player,
			title:      titulo
		});
	})

})
