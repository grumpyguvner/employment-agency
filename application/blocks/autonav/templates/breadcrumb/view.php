<?php  defined('C5_EXECUTE') or die(_("Access Denied."));
?>

<nav id="breadcrumb" class="hidden-xs" role="navigation">
<div class="container"><ol class="breadcrumb">
<?php
$navItems = $controller->getNavItems();
$i = 0;
foreach ($navItems as $key => $ni) {
    
   if (++$i == count($navItems)) {
      echo '<li class="active">' .  $ni->name . '</li>';
   } elseif ($ni->isHome) {
      echo '<li><a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a></li>';
   } else {
      echo '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . $ni->url . '" target="' . $ni->target . '"><span itemprop="title">' . $ni->name . '</span></a></li>';
   }
}
?>
</ol></div>
</nav>
