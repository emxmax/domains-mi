/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
    config.toolbar = 'Full';
     
    config.toolbar_Full =
    [
	    { name: 'basicstyles', items : [ 'Bold','Italic','Underline','RemoveFormat' ] },
	    { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
	    { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
	    { name: 'colors', items : [ 'TextColor','BGColor' ] },
//	    { name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','Iframe' ] },
	    { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','SpecialChar','Iframe' ] },
	    { name: 'clipboard', items : [ 'Paste','PasteText','PasteFromWord','-','Undo','Redo','-','Templates' ] },
//	    { name: 'styles', items : [ 'Format','FontSize' ] },
	    { name: 'styles', items : [ 'Format','Styles' ] },
	    { name: 'document', items : ['Source'] }
    ];
     
    config.toolbar_Basic =
    [
	    ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', 'Link', 'Unlink', '-', 'TextColor', 'BGColor', 'Paste', 'PasteText', '-','Source']
    ];
	
	 config.language = 'es';
	 config.skin = 'v2';
	 config.width = '450px';
	 //config.uiColor = '#AADC6E';
	 config.colorButton_colors = '09195B,233e99,7abbd7,4d4d4f,000000,347abe,505ba9,afd3e5,'+
                       'a7a9ac,89816f,ba6127,a4bae0,cddee7,cacbcd,c2b59b,f7931e,'+
                       'b8d5f0,74adb2,dcddde,e6e2d5,e9d66b,dae3e7,acd4d9,f1f1f2,'+
                       'efebe3,2f0e6bc,838f5e,ffffff,bb7665' ;

    config.enterMode = CKEDITOR.ENTER_P;
};
