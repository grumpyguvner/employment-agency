<?php
defined('C5_EXECUTE') or die("Access Denied.");
$th = Loader::helper('text');
$c = Page::getCurrentPage();

$nh = Loader::helper('navigation');
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
                        
                        <select id="jobsearchSector" name="akID[18][atSelectOptionID][]"  class="form-control">
		<option value=""></option>
			<option value="1">Administration</option>	
			<option value="8">Business Development</option>	
			<option value="3">Care</option>	
			<option value="5">Catering</option>	
			<option value="15">Construction</option>	
			<option value="13">Engineering</option>	
			<option value="12">Estate Agency</option>	
			<option value="14">Facilities Management</option>	
			<option value="4">Hospitality</option>	
			<option value="6">Industrial</option>	
			<option value="9">IT</option>	
			<option value="10">Media</option>	
			<option value="11">Recruitment</option>	
			<option value="7">Sales</option>	
			<option value="2">Secretarial</option>	
		</select>
                    </div>
                </div>
                <div class="control-group form-group">
                    <label class="control-label col-sm-4 col-md-3 col-lg-2" for="jobsearchLocation">Location</label>
                    <div class="controls col-sm-8 col-md-9 col-lg-10">
                        <select id="jobsearchLocation" name="akID[22][atSelectOptionID][]" class="form-control"><option></option><option value="28">Alfriston</option>
<option value="30">Battle</option>
<option value="32">Bexhill</option>
<option value="21">Brighton</option>
<option value="33">Burgess Hill</option>
<option value="23">Eastbourne</option>
<option value="24">Hastings</option>
<option value="34">Haywards Heath</option>
<option value="25">Lewes</option>
<option value="22">Newhaven</option>
<option value="26">Peacehaven</option>
<option value="29">Polegate</option>
<option value="27">Rottingdean</option>
<option value="31">Rye</option>
<option value="35">Uckfield</option></select>
                    </div>
                </div>
                <div class="control-group form-group">
                    <label class="control-label col-sm-4 col-md-3 col-lg-2" for="jobsearchSalary">Salary</label>
                    <div class="controls col-sm-8 col-md-9 col-lg-10">
                        <select id="jobsearchSalary" name="akID[21][atSelectOptionID][]" class="form-control"><option></option><option value="16">Up to £20,000</option>
<option value="17">£20,001 - £25,000</option>
<option value="18">£25,001 - £35,000</option>
<option value="19">£35,001 - £50,000</option>
<option value="20">£50,000 +</option>
</div>
                        
                        
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

                <input name="query" type="hidden" value="<?php echo htmlentities($query, ENT_COMPAT, APP_CHARSET) ?>" class="ccm-search-block-text" />

            </form>
        </div>
    </div>


    <?php
    $tt = Loader::helper('text');
    if ($do_search) {
        if (count($results) == 0) {
            ?>
            <h4 style="margin-top:32px;color: #fff;"><?php echo t('There were no results found. Please try another search.') ?></h4>	
    <?php } else { ?>
            <div id="searchResults">


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

            <?php
            //$pagination = $searchList->getPagination();
            $pages = $pagination->getCurrentPageResults();

            if ($pagination->getTotalPages() > 1 && $pagination->haveToPaginate()) {
                $showPagination = true;
                echo $pagination->renderDefaultView();
            }
        } //results found
    }
    ?>