<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>
        <section id="jobdescription">
            <div class="section-content">
                <div class="container">
                    
            <?php
            $a = new Area('Content');
            $a->setAreaGridMaximumColumns(12);
            $a->display($c);
            ?>
                </div>
            </div>
            <footer class="section-footer">
            </footer>
        </section>

<?php  $this->inc('elements/footer.php'); ?>