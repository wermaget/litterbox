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
    config.extraPlugins = 'imagebrowser';
    config.imageBrowser_listUrl = "/ckeditor-imagebrowser/demo/images/images_list.json";
    config.removeButtons = 'Textarea,Form,Checkbox,Radio,TextField,Select,Button,HiddenField,ImageButton,Flash,Iframe';
    //config.removeButtons = 'Form,Checkbox,Radio,Textfield,Textarea,Select,Button,HiddenField,Iframe,InsertPie';
};
