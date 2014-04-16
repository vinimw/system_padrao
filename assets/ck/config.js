/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'ck/ckfinder/ckfinder.html',
config.filebrowserImageBrowseUrl = 'http://localhost/system_padrao/assets/ck/ckfinder/ckfinder.html?type=Images',
config.filebrowserFlashBrowseUrl = 'ck/ckfinder/ckfinder.html?type=Flash',
config.filebrowserUploadUrl = 'ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Fil­es',
config.filebrowserImageUploadUrl = 'ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Ima­ges',
config.filebrowserFlashUploadUrl = 'ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Fla­sh'
};
