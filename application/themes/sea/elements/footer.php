<?php
defined('C5_EXECUTE') or die("Access Denied.");
?>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-push-8 col-sm-4">
                <?php
                $a = new GlobalArea('Footer Social');
                $a->display();
                ?>
            </div>
            <div class="col-sm-pull-4 col-sm-8">
                <?php
                $a = new GlobalArea('Footer Address');
                $a->display();
                ?>
            </div>
        </div>
    </div>
    
    <?php
    $a = new GlobalArea('Footer Base');
    $a->display();
    ?>
</footer>
</div>
<?php $this->inc('elements/footer_bottom.php');?>
