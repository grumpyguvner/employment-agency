<?php
defined('C5_EXECUTE') or die("Access Denied.");
?>
<footer>
    <section>
    <div class="container">
        <div class="row">
            <div id="footerNav" class="col-sm-5 col-sm-push-7">
                <?php
                $a = new GlobalArea('Footer Navigation');
                $a->display();
                ?>
            </div>
            <div id="footerLegal" class="col-sm-7 col-sm-pull-5">
                <?php
                $a = new GlobalArea('Footer Legal');
                $a->display();
                ?>
            </div>
        </div>
    </div>
    </section>
    
    <?php
    $a = new GlobalArea('Footer Base');
    $a->display();
    ?>
</footer>
</div>
<?php $this->inc('elements/footer_bottom.php');?>
