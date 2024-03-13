## let's make a modal called `myModal`
app.factory 'videoModal', (btfModal) ->
	return btfModal {
		controller 		: 'VideoSemanaCrl',
		controllerAs	: '',
		templateUrl 	: './public/views/popup/popup.html'
  	}