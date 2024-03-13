## let's make a modal called `myModal`
app.factory 'propietarioModal', (btfModal) ->	
	btfModal {
		controller 		: 'propietariomodalCrtl',
		controllerAs	: '',
		templateUrl 	: './public/views/popup/popup.html'
  	}


app.factory 'userModal', (btfModal)->
	btfModal {
		controller 		: 'usermodalCrtl',
		controllerAs	: '',
		templateUrl 	: './public/views/popup/popupuser.html'
  	}