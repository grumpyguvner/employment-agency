<?php
defined('C5_EXECUTE') or die("Access Denied.");
$th = Loader::helper('text');
$c = Page::getCurrentPage();
?>
<div class="job-search-latest">
    <?php if ($pageListTitle): ?>
        <div class="job-search-latest-header">
            <h2><?php echo $pageListTitle ?></h2>
        </div>
    <?php endif; ?>

    <div class="job-search-latest-jobs">
        <div class="row">

            <?php
            foreach ($pages as $page) {
                $title = $th->entities($page->getCollectionName());
                $url = $nh->getLinkToCollection($page);
                $target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
                $target = empty($target) ? '_self' : $target;
                $hoverLinkText = $title;
                $description = $page->getCollectionDescription();
                $description = $controller->truncateSummaries ? $th->wordSafeShortText($description, $controller->truncateChars) : $description;
                $description = $th->entities($description);

                $reference = $page->getAttribute('job_reference');
                $salary = $page->getAttribute('job_salary');
                $sector = $page->getAttribute('job_sector');
                $sector_safe = preg_replace('%\s+%', '-', strtolower($sector));
                ?>
                <div class="col-sm-6 col-md-4">
                    <div class="job-search-box">
                        <div class="jobsector  sector-head-jobs sector-head-jobs-<?php echo $sector_safe; ?>"><div class="jobsector-inner"><span class="h1"><?php echo $sector; ?></span></div></div>
                        <div class="jobdetail">
                            <p class="jobmeta"><a href="<?php echo $url ?>" target="<?php echo $target ?>" title="<?php echo $title; ?> job description"><?php echo $title; ?></a><br>
                                <span class="jobsalary"><?php echo t($salary); ?></span></p>
                            <p><?php echo $description; ?></p>
                            <p class="jobref">Ref: <?php echo t($reference); ?></p>
                            <div class="joblink"><a href="<?php echo $url ?>" target="<?php echo $target ?>" title="<?php echo $title; ?> job description"><i class="icon-angle-double-right"></i></a></div></div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>

    <?php if ($c->isEditMode() && $controller->isBlockEmpty()): ?>
        <div class="ccm-edit-mode-disabled-item"><?php echo t('Empty Page List Block.') ?></div>
    <?php endif; ?>
</div>