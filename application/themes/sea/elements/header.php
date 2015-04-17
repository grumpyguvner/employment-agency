<?php

use Concrete\Core\Validation\CSRF\Token;

defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');
$as = new GlobalArea('Header Search');
$blocks = $as->getTotalBlocksInArea();
$displayThirdColumn = $blocks > 0 || $c->isEditMode();
?>
<div class="<?php echo $c->getPageWrapperClass()?>">
<a id="skippy" class="sr-only sr-only-focusable" href="#content"><div class="container"><span class="skiplink-text">Skip to main content</span></div></a>
<header id="header" role="banner">
    <div class="container">
        <div class="header_content">
            <?php
            $a = new GlobalArea('Header Site Logo');
            $a->display();
            ?>
        </div>
    </div>
    
    <div class="navbar navbar-inverse" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNav">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <nav class="collapse navbar-collapse" id="mainNav">
      <?php
      $a = new GlobalArea('Header Navigation');
      $a->display();
      ?>
          </nav>
        </div>
      </div>
</header>


