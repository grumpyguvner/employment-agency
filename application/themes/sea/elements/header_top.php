<?php
defined('C5_EXECUTE') or die("Access Denied.");

//$this->addHeaderItem($html->javascript($view->getThemePath() . '/js/vendor/modernizr-2.6.2.min.js'));
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo Localization::activeLanguage()?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?php echo Localization::activeLanguage()?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?php echo Localization::activeLanguage()?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo Localization::activeLanguage()?>"> <!--<![endif]-->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php // echo $html->css($view->getStylesheet('main.less'))?>
    <link href="/application/themes/borrowed_space/css/main.css" rel="stylesheet" type="text/css" media="all">
    <?php 
    $params = array();
    if (isset($this->prePageTitle)) $params['prePageTitle'] = $this->prePageTitle;
    if (isset($this->akd)) $params['akd'] = $this->akd;
    if (isset($this->akk)) $params['akk'] = $this->akk;
    Loader::element('header_required', $params);
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement('style')
            msViewportStyle.appendChild(
                document.createTextNode(
                    '@-ms-viewport{width:auto!important}'
                )
            )
            document.querySelector('head').appendChild(msViewportStyle)
        }
    </script>
</head>
<body>

