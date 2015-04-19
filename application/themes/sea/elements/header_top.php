<?php
defined('C5_EXECUTE') or die("Access Denied.");
if (is_object($c)) {
	$cp = new Permissions($c);
}

//$this->addHeaderItem($html->css($view->getThemePath() . '/assets/css/bootstrap.min.css'));
//$this->addHeaderItem($html->css($view->getThemePath() . '/assets/css/fontello/fontello.min.css'));

if (is_object($cp) && $cp->canViewToolbar()) {
    $this->addHeaderItem($html->css($view->getStylesheet('c5.less')));
} else {
    $this->addHeaderItem($html->css($view->getStylesheet('main.less')));
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo Localization::activeLanguage()?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?php echo Localization::activeLanguage()?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?php echo Localization::activeLanguage()?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo Localization::activeLanguage()?>"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="<?php echo $view->getThemePath() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <?php 
    $params = array();
    if (isset($this->prePageTitle)) $params['prePageTitle'] = $this->prePageTitle;
    if (isset($this->akd)) $params['akd'] = $this->akd;
    if (isset($this->akk)) $params['akk'] = $this->akk;
    Loader::element('header_required', $params);
    ?>        
        <link href="<?php echo $view->getThemePath() ?>/assets/css/fontello/fontello.min.css" rel="stylesheet" type="text/css" media="all">
        <!--[if IE 7]><link rel="stylesheet" href="<?php echo  $view->getThemePath() ?>/assets/css/fontello/fontello-ie7.min.css"><![endif]-->
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
    <body id="page-top" class="home">
        <script src="<?php echo  $view->getThemePath() ?>/assets/js/modernizr-custom.min.js" async="async"></script>
<?php
if (isset($cp) && $cp->canViewToolbar()) {
    echo '<div class="' . $c->getPageWrapperClass() . '">';
}
?>