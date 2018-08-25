/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    // config.enterMode = CKEDITOR.ENTER_P;
    // config.shiftEnterMode = CKEDITOR.ENTER_P;

    config.filebrowserBrowseUrl = '../include/plugins/ckeditor/plugins/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '../include/plugins/ckeditor/plugins/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = '../include/plugins/ckeditor/plugins/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = '../include/plugins/ckeditor/plugins/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '../include/plugins/ckeditor/plugins/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '../include/plugins/ckeditor/plugins/kcfinder/upload.php?opener=ckeditor&type=flash';

    // config.filebrowserBrowseUrl = '/ckfinder/ckfinder.html';
    // config.filebrowserUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.extraPlugins = 'video,fakeobjects,autogrow';
    config.removeButtons = 'Textarea,Form,Checkbox,Radio,TextField,Select,Button,HiddenField,ImageButton,Flash,Iframe,About,SelectAll,SpellChecker,Subscript,Superscript,BidiLtr,BidiRtl';
    //config.removeButtons = 'Form,Checkbox,Radio,Textfield,Textarea,Select,Button,HiddenField,Iframe,InsertPie';
};
