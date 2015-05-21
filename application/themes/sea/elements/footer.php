<?php
defined('C5_EXECUTE') or die("Access Denied.");
?>
<section id="footer">
    <header class="section-head" data-bottom-top="background-position: 50% 75%" data-top-bottom="background-position: 50% 27%" data-target="#footer .section-head">
        <div class="section-head-inner">
            <div class="container">
                <?php
            $a = new GlobalArea('Footer Header');
                $a->setBlockLimit(1);
            $a->display();
            ?>
            </div>
        </div>
    </header>
    <div class="section-content">
        <div class="container">
            <?php
            $a = new GlobalArea('Footer Content');
            $a->display();
            ?>
        </div>
    </div>
    <footer class="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="copyright">© Sussex Employment Agency - <a href="http://www.totallyboundless.com" target="_blank">Design &amp; development by Boundless</a></div>
                </div>
                <div class="col-md-5">
            <?php
            $a = new GlobalArea('Footer Company Details');
            $a->display();
            ?>
                </div>
            </div>
        </div>
    </footer>
</section>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visble-sm">
    <a class="btn btn-primary" href="#page-top">
        <i class="icon-up"></i>
    </a>
</div>
<?php $this->inc('elements/footer_bottom.php');?>
