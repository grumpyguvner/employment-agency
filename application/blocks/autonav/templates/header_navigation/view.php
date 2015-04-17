<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<?php View::getInstance()->requireAsset('javascript', 'jquery');

$navItems = $controller->getNavItems();

$sub = 0;
$dropdown = 0;
foreach ($navItems as $ni) {
    $classes = array();

    if ($ni->isFirst) {
        $sub++;
        $classes[] = 'first';

        if ($sub == 1) {
            echo '<ul class="nav navbar-nav">';
        } else {
            echo '<ul class="dropdown-menu">';
        }
    }

    if ($ni->isCurrent) {
        $classes[] = 'active';
    }
    if ($ni->inPath) {
        $classes[] = 'active';
    }
    if ($ni->hasSubmenu) {
        $dropdown++;
        $classes[] = 'dropdown';
    }
    $classes = implode(" ", $classes);

    echo '<li class="' . $classes . '">';
    if ($ni->hasSubmenu) {
        echo '<a href="#" target="' . $ni->target . '"  class="dropdown-toggle" data-toggle="dropdown">' . $ni->name . '</a>';
    } else {
        echo '<a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a>';
    }

    if ($ni->isLast) {
        $sub--;
        echo '</ul>';
    }
}
for ($i = $sub; $i > 0; $i--)
{
    echo '</ul>';
}
