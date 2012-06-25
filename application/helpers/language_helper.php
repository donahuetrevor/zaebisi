<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
    function set_translation_language($language){
        $lang_path = FCPATH.APPPATH.'language/locale';
        putenv('LANG='.$language.'.UTF-8');
        setlocale(LC_ALL, $language.'.UTF-8');
        bindtextdomain('lang', $lang_path);
        textdomain('lang');
    }
?> 