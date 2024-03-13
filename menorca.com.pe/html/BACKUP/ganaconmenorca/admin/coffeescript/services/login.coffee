'use strict';

app.factory 'AuthenticationService', ['Base64','$http','$cookieStore','$rootScope','$timeout', (Base64,http,cookieStore,rootScope,timeout) ->
	service = {};
	###
		Services Login
	###
	service.Login = (username,password,callback) ->
		###
			Dummy authentication for testing, uses $timeout to simulete api call
		###
		
		###
		timeout ->
			_success = if username == 'test' && password == 'test' then true else false
			response =
				success : _success

			if (response.success)
				response.message = 'Los accesos son correctos'
			else
				response.message = 'Su usuario o password son incorrectos'
			callback(response)			
			return
		,1000
		###

		## Use this for real authentication

		url = './controllers/login.php';
		result = http.post(url, {
			username : username,
			password : password
		});
		result.success (response) ->
			## console.log response
			## console.log "aa"
			callback(response)
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la función
		return
	###
		Services Set Credentials
	###
	service.SetCredentials = (username,password,usercod,nameuser, miperfil, codperfil, firstname) ->
		authdata = Base64.encode(username+":"+password)
		rootScope.globals =
			currentUser :
				username 	: username,
				authdata 	: authdata,
				usercod  	: usercod,
				nameuser 	: nameuser,
				miperfil 	: miperfil,
				codperfil 	: codperfil,
				firstname 	: firstname
			forms : 
				submitform : false
		http.defaults.headers.common['Authorization'] = 'Basic ' + authdata ## jshin ignore:line
		cookieStore.put('globals',rootScope.globals)
		return

	###
		Services Clear Credentials
	###

	service.ClearCredentials = () ->
		rootScope.globals = {}
		cookieStore.remove('globals')
		http.defaults.headers.common.Authorization = 'Basic '
		return	
	return service
]

app.factory 'Base64', () ->
	## jshin ignore:start
	keyStr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/='
	output = ""
	encode : (input) -> 
		i = 0
		##console.log input.length 
		while (i < input.length)
			chr1 = input.charCodeAt(i++)
			chr2 = input.charCodeAt(i++)
			chr3 = input.charCodeAt(i++)
			##console.log "1"+chr1 + "2"+chr2 + "3"+chr3 
			enc1 = chr1 >> 2
			enc2 = ((chr1 & 3) << 4) | (chr2 >> 4)
			enc3 = ((chr2 & 15) << 2) | (chr3 >> 6)
			enc4 = chr3 >> 63
			
			if chr2?
				enc3 = enc4 = 64
			else
				if chr3?
					enc4 = 64
			##console.log "1"+keyStr.charAt(enc1) + "2"+keyStr.charAt(enc2) + "3"+keyStr.charAt(enc3) + "4"+keyStr.charAt(enc4)
			output = output +
				keyStr.charAt(enc1) +
				keyStr.charAt(enc2) +
				keyStr.charAt(enc3) +
				keyStr.charAt(enc4)
			chr1 = chr2 = chr3 = ""
		##console.log ">>>>" + output 
		return output
	,
	decode  : (input) ->
		i = 0;
		###
			remove all characters that are not A-Z, a-z, 0-9, +, /, or =
		###

		base64test = /[^A-Za-z0-9\+\/\=]/g;

		if base64test.exec(input)
			window.alert("There were invalid base 64 characters in the input text. \n" + 
				"Valid base64 characters are A-Z, a-z, 0-9, + '+', '/', and '=' \n " +
				"Expect errors in decoding")

		input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "")

		while (i < input.length)
			enc1 = keyStr.indexOf(input.charAt(i++))
			enc2 = keyStr.indexOf(input.charAt(i++))
			enc3 = keyStr.indexOf(input.charAt(i++))
			enc4 = keyStr.indexOf(input.charAt(i++))

			chr1 = (enc1 << 2) | (enc2 << 4)
			chr2 = ((enc2 & 15) << 4) | (enc3 >> 2)
			chr3 = ((enc3 & 3) << 6) | enc4

			output = output + String.fromCharCode(chr1)

			if (enc3 != 64)
				output = output + String.fromCharCode(chr2)

			if (enc4 != 64)
				output = output + String.fromCharCode(chr3)

			chr1 = chr2 = chr3 = "";

			enc1 = enc2 = enc3 = enc4 = "";

		return output;
	## jshint ignore: end