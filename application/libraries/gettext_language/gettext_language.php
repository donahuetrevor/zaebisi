<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Code Igniter Gettext Extension library
 *
 * This Library overides the original CI's language class. Needs the  $config['language'] variable set as it_IT or en_EN or fr_FR ...
 *
 * @package        Gettext Extension
 * @author        Pierluigi Tassi
 * @copyright    Copyright (c) 2006, Bologna Informatica di Pierluigi Tassi.
 * @license        http://www.gnu.org/licenses/lgpl.txt
 * @link        http://www.bolognainformatica.com
 * @version     Version 0.3
 * @since         2006 November, 9th
 */

// ------------------------------------------------------------------------

class Gettext_Language extends CI_Lang {

    var $gettext_language;
    var $gettext_domain;
    var $gettext_path;

    /**
     * The constructor initialize the library
     *
     * @return MY_Language
     */
    function __construct() {
        parent::__construct();
        $this->gettext_domain = 'lang';
        log_message('debug','Gettext Class initialized');
    }

    /**
     * This method overides the original load method. Its duty is loading the domain files by config or by default internal settings.
     *
     */
    function load_gettext ( $userlang = false ) {

        /* I want the super object */
        if($userlang )    $this->gettext_language = $userlang;
        else            $this->gettext_language = 'it_IT';
        log_message('debug', 'Gettext Class gettext_language was set by parameter:' . $this->gettext_language );

        putenv("LANG=$this->gettext_language");
        setlocale(LC_ALL, $this->gettext_language);

        /* Let's set the path of .po files */
        $this->gettext_path = APPPATH.'language/locale';
        log_message('debug', 'Gettext Class path chosen is: '.$this->gettext_path);

        putenv('LANG='.$userlang.'.UTF-8');
        setlocale(LC_ALL, $userlang.'.UTF-8');

        bindtextdomain($this->gettext_domain, $this->gettext_path);
        textdomain($this->gettext_domain);
        log_message('debug', 'Gettext Class the domain chosen is: '. $this->gettext_domain);
        return  true;
    }

    /**
     *  Plural forms added by Tchinkatchuk
     *  http://www.codeigniter.com/forums/viewthread/2168/
     */

    /**
     * The translator method
     *
     * @param string $original the original string to translate
     * @param array $aParams the plural parameters
     * @return the string translated
     */
    function _trans( $original, $aParams = false ) {
        if ( isset($aParams['plural']) && isset($aParams['count']) ) {
            $sTranslate = ngettext($original, $aParams['plural'], $aParams['count']);
            $sTranslate = $this->replaceDynamically($sTranslate, $aParams);
        }
        else{
            $sTranslate = gettext( $original );
            if (is_array($aParams) && count($aParams) ) $sTranslate = $this->replaceDynamically($sTranslate, $aParams);
        }
        return $sTranslate;
    }

    /**
     * Allow dynamic allocation in traduction
     *
     * @final
     * @access private
     * @param  string $sString
     * @return string
     */
    function replaceDynamically($sString) {
        $aTrad = array();
        for ( $i=1, $iMax = func_num_args(); $i<$iMax; $i++) {
            $arg = func_get_arg($i);
            if (is_array($arg)) {
                foreach ($arg as $key => $sValue) {
                    $aTrad['%'.$key] = $sValue;
                }
            }
            else {
                $aTrad['%'.$key] = $arg;
            }
        }
        return strtr($sString, $aTrad);
    }


}

?>