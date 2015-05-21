<?php
defined('C5_EXECUTE') or die("Access Denied.");
$th = Loader::helper('text');
$c = Page::getCurrentPage();

$nh = Loader::helper('navigation');


$ak_js = CollectionAttributeKey::getByHandle('job_sector');
$job_sectors_options = array('');
foreach($ak_js->getController()->getOptions() as $opt){
	$job_sectors_options[$opt->getSelectAttributeOptionID()] = $opt->getSelectAttributeOptionValue();
}

$ak_jsal = CollectionAttributeKey::getByHandle('job_salary_select');
$job_salary_select_options = array('');
foreach($ak_jsal->getController()->getOptions() as $opt){
	$job_salary_select_options[$opt->getSelectAttributeOptionID()] = $opt->getSelectAttributeOptionValue();
}

$ak_jl = CollectionAttributeKey::getByHandle('job_location');
$job_location_options = array('');
foreach($ak_jl->getController()->getOptions() as $opt){
	$job_location_options[$opt->getSelectAttributeOptionID()] = $opt->getSelectAttributeOptionValue();
}
?>
<?php if (isset($error)) { ?>
    <?php echo $error ?><br/><br/>
<?php } ?>
    <div class="row" id="jobsearchform">
        <div class="col-sm-6 col-sm-push-6">
            <?php if (strlen($title) > 0) { ?><div class="h1"><?php echo $title ?></div><?php } ?>
        </div>
        <div class="col-sm-6 col-sm-pull-6">

            <form class="form-horizontal" role="form" novalidate action="<?php echo $view->url($resultTargetURL) ?>#jobsearchform" method="get" id="jobsearchform" class="ccm-search-block-form">
                <div class="control-group form-group">
                    <label class="control-label col-sm-4 col-md-3 col-lg-2" for="jobsearchSector">Sector</label>
                    <div class="controls col-sm-8 col-md-9 col-lg-10">
                        
		<?php 
		echo $form->select($ak_js->getController()->field('atSelectOptionID').'[]', $job_sectors_options);
		?>
                    </div>
                </div>
                <div class="control-group form-group">
                    <label class="control-label col-sm-4 col-md-3 col-lg-2" for="jobsearchLocation">Location</label>
                    <div class="controls col-sm-8 col-md-9 col-lg-10">
                              
		<?php 
		echo $form->select($ak_jl->getController()->field('atSelectOptionID').'[]', $job_location_options);
		?>
                       
                    </div>
                </div>
                <div class="control-group form-group">
                    <label class="control-label col-sm-4 col-md-3 col-lg-2" for="jobsearchSalary">Salary</label>
                    <div class="controls col-sm-8 col-md-9 col-lg-10">
                            
		<?php 
		echo $form->select($ak_jsal->getController()->field('atSelectOptionID').'[]', $job_salary_select_options);
		?>
                        
                        
                        </select>
                    </div>
                </div>
                <div class="control-group form-group"> 
                    <div class="controls col-sm-12 text-right">
                        <div class="jobseekersSuccess"></div>
                        <button type="submit" class="btn btn-default"><?php echo $buttonText ?></button>
                    </div>
                </div>
                <?php if (strlen($query) == 0) { ?>
                    <input name="search_paths[]" type="hidden" value="<?php echo htmlentities($baseSearchPath, ENT_COMPAT, APP_CHARSET) ?>" />
                <?php } else if (is_array($_REQUEST['search_paths'])) {
                    foreach ($_REQUEST['search_paths'] as $search_path) {
                        ?>
                        <input name="search_paths[]" type="hidden" value="<?php echo htmlentities($search_path, ENT_COMPAT, APP_CHARSET) ?>" />
                    <?php }
                }
                ?>

                <input name="numResults" type="hidden" value="1000" />
                <input name="query" type="hidden" value="<?php echo htmlentities($query, ENT_COMPAT, APP_CHARSET) ?>" />

            </form>
        </div>
    </div>


    <?php
    $tt = Loader::helper('text');
    if ($do_search) {
        if (count($results) == 0) {
            ?>
            <div class="seperator"><span class="icon-angle-double-down"></span></div>
            <h4 style="margin-top:32px;color: #fff;text-align: center;"><?php echo t('There were no results found. Please try another search.') ?></h4>	
    <?php } else { ?>
            <div id="searchResults">
                <div class="seperator"><span class="icon-angle-double-down"></span></div>

                <div class="row">

                    <?php
                    foreach ($results as $i => $page) {

                        if ($i > 0 && $i % 3 == 0)
                            echo '<div class="hidden-xs hidden-sm clearfix"></div>';
                        if ($i > 0 && $i % 2 == 0)
                            echo '<div class="visible-sm clearfix"></div>';
                        $title = $th->entities($page->getCollectionName());
                        $url = $nh->getLinkToCollection($page);
                        $target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
                        $target = empty($target) ? '_self' : $target;
                        $hoverLinkText = $title;
                        $description = $page->getCollectionDescription();
                        $description = $th->wordSafeShortText($description, 145);
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
                                    <p class="details"><?php echo $description; ?></p>
                                    <p class="jobref">Ref: <?php echo t($reference); ?></p>
                                    <div class="joblink"><a href="<?php echo $url ?>" target="<?php echo $target ?>" title="<?php echo $title; ?> job description"><i class="icon-angle-double-right"></i></a></div></div>
                            </div>
                        </div>
            <?php
        }
        ?>

                </div>

            </div>

            <?php
            //$pagination = $searchList->getPagination();
//            $pages = $pagination->getCurrentPageResults();
//
//            if ($pagination->getTotalPages() > 1 && $pagination->haveToPaginate()) {
//                $showPagination = true;
//                echo $pagination->renderDefaultView();
//            }
        } //results found
    }
    ?>