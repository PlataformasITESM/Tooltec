/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'es';
	//config.uiColor = '#FFFFFF';
	
	config.toolbar = 'Custom';

	config.toolbar_Custom =
[
  
    { name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
    { name: 'editing',     items : [ 'SelectAll' ] },
{ name: 'styles',      items : [ 'FontSize' ] },
    { name: 'colors',      items : [ 'TextColor','BGColor' ] },
	{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
	 { name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
      
    { name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
   
    { name: 'insert',      items : [ 'Image','Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ] },
    
    

];
};