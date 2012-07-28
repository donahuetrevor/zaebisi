<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=@$title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="keywords" content="<?=@$keywords?>" />
<meta name="description" content="<?=@$description?>" />
<meta name="robots" content="all"/>
<!--CSS-->
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/reset.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/icons.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/formalize.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/checkboxes.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/sourcerer.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/jqueryui.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/tipsy.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/calendar.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/tags.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/fonts.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/selectboxes.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/960.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/main.css" type="text/css" />
<link rel="stylesheet" href="<?=STATICPATH?>css/spina/portrait.css" media="all and (orientation:portrait)" type="text/css" />
<!--JS-->
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.min.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jqueryui.min.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/formalize.min.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.calendar.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.checkboxes.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.chosen.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.cookies.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.datatables.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.fileinput.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.inputtags.min.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.livequery.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.wymeditor.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.metadata.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.pjax.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.sourcerer.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.tipsy.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.validate.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/application.js" type="text/javascript"></script>
<script src="<?=STATICPATH?>js/__scripts/jquery/jquery.autocomplete.js" type="text/javascript"></script>

</head>
<body<?=(strpos(uri_string(), 'auth/') === FALSE ? '' : ' id="login"')?>>