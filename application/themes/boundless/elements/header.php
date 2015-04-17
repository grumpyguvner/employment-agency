<?php

use Concrete\Core\Validation\CSRF\Token;

defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');
$as = new GlobalArea('Header Search');
$blocks = $as->getTotalBlocksInArea();
$displayThirdColumn = $blocks > 0 || $c->isEditMode();
?>

<div class="<?php echo $c->getPageWrapperClass()?>">
<header role="banner">
    
    <div class="container">
        <div id="logo">
            <?php
            $a = new GlobalArea('Header Site Title');
            $a->display();
            ?>
        </div>
    </div>

    <?php
    $a = new GlobalArea('Header Navigation');
    $a->display();
    ?>

</header>
