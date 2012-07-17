<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=@$title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="keywords" content="<?=@$keywords?>" />
<meta name="description" content="<?=@$description?>" />
<meta name="robots" content="all"/>
<link rel="stylesheet" href="<?=STATICPATH?>css/default/style.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/default/jquery-ui-1.8.1.custom.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/default/jquery.autocomplete.css" type="text/css" />
<?php if (@$CSS_FILES): foreach($CSS_FILES as $cssFile):?>
<link rel="stylesheet" href="<?=STATICPATH?>css/default/<?php echo (@!$cssFile['controller_name'] ?: $cssFile['controller_name'].'/').$cssFile['action_name']?>.css" type="text/css" />
<?php endforeach; endif;?>
<!--JS-->
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery-ui-1.8.1.custom.min.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.tablednd-0.5.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.highlightFade.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.json-1.0.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.cookie.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.autocomplete.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/main.js" type="text/javascript"></script>
<?php if (@$JS_FILES): foreach($JS_FILES as $js_file):?>
<script src="<?=STATICPATH?>js/<?php echo (@!$js_file['controller_name'] ?: $js_file['controller_name'].'/').$js_file['action_name']?>.js" type="text/javascript"></script>
<?php endforeach; endif;?>
<?php if (@$JS_MODULES): foreach($JS_MODULES as $js_module):?>
<script src="<?=STATICPATH?>js/__scripts/<?php echo (@!$js_module['controller_name'] ?: $js_module['controller_name'].'/').$js_module['action_name']?>.js" type="text/javascript"></script>
<?php endforeach; endif;?>
</head>
<body>