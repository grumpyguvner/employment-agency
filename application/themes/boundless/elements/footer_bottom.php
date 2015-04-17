<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->addFooterItem($html->javascript($view->getThemePath() . '/bootstrap/dist/js/bootstrap.min.js'));
$this->addFooterItem($html->javascript($view->getThemePath() . '/js/plugins.js'));
$this->addFooterItem($html->javascript($view->getThemePath() . '/js/main.js'));
?>


<?php Loader::element('footer_required'); ?>

</body>
</html>
