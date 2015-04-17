<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<main id="content">
       <div class="container">
<?php print $innerContent; ?>
    </div>
</main>

<?php  $this->inc('elements/footer.php'); ?>
