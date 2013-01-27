<?php
App::import('Vendor', 'ckeditor/ckeditor');

class CkeditorHelper extends AppHelper {

    /**
    * creates an fckeditor textarea
    *
    * @param array $namepair - used to build textarea name for views, array('Model', 'fieldname')
    * @param stirng $basepath - base path of project/system
    * @param string $content
    */
    function ckeditor($namepair = array(), $basepath = '', $content = 'Enter your content here.'){
        $editor_name = 'data';
        foreach ($namepair as $name){
            $editor_name .= "[" . $name . "]";
        }

        // Create a class instance.
        $CKEditor = new CKEditor();

        // Path to the CKEditor directory.
        $CKEditor->basePath = $basepath . '/js/ckeditor/';

        $CKEditor->config['toolbar'] = 'Simple';

        // Create a textarea element and attach CKEditor to it.
        $CKEditor->editor($editor_name, $content);
   }
}
?>