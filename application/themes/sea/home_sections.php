<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_home.php');
?>
<header id="index">
    <div class="section-head">
        <div class="section-head-inner">
            <div class="container">
                <?php
                $a = new Area('Lead Header');
                $a->setAreaGridMaximumColumns(1);
                $a->setBlockLimit(1);
                $a->display($c);
                ?>
            </div>
        </div>
    </div>
    <div class="section-footer">
        <div class="container">
            <?php
            $a = new Area('Lead Section Content');
            $a->setAreaGridMaximumColumns(12);
            $a->display($c);
            ?>
        </div>
    </div>
</header>
<section id="about">
    <header class="section-head" data-bottom-top="background-position: 50% 75%" data-top-bottom="background-position: 50% 27%" data-target="#about .section-head">
        <div class="section-head-inner">
            <div class="container">
                <?php
                $a = new Area('About Section Header');
                $a->setAreaGridMaximumColumns(1);
                $a->setBlockLimit(1);
                $a->display($c);
                ?>
            </div>
        </div>
    </header>
    <div class="section-content">
        <div class="container">
            <?php
            $a = new Area('About Section Content');
            $a->setAreaGridMaximumColumns(12);
            $a->display($c);
            ?>
        </div>
    </div>
    <footer class="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-push-6">
                    <?php
                    $a = new Area('About Footer Title');
                    $a->setAreaGridMaximumColumns(1);
                    $a->setBlockLimit(1);
                    $a->display($c);
                    ?>
                </div>
                <div class="col-sm-6 col-sm-pull-6">
                    <?php
                    $a = new Area('About Footer Content');
                    $a->setAreaGridMaximumColumns(6);
                    $a->display($c);
                    ?>
                </div>
            </div>
        </div>
    </footer>
</section><section id="employers">
    <header class="section-head" data-bottom-top="background-position: 50% 75%" data-top-bottom="background-position: 50% 27%" data-target="#employers .section-head">
        <div class="section-head-inner">
            <div class="container">
                <?php
                $a = new Area('Employers Section Header');
                $a->setAreaGridMaximumColumns(1);
                $a->setBlockLimit(1);
                $a->display($c);
                ?>
            </div>
        </div>
    </header>
    <div class="section-content">
        <div class="container">
            <?php
            $a = new Area('Employers Section Content');
            $a->setAreaGridMaximumColumns(12);
            $a->display($c);
            ?>
        </div>
    </div>
    <footer class="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-push-6">
                    <?php
                    $a = new Area('Employers Footer Title');
                    $a->setAreaGridMaximumColumns(1);
                $a->setBlockLimit(1);
                    $a->display($c);
                    ?>
                </div>
                <div class="col-sm-6 col-sm-pull-6">
                    <form class="form-horizontal" role="form" novalidate enctype="multipart/form-data">
                        <div class="control-group form-group">
                            <label class="control-label col-sm-4 col-md-3 col-lg-2" for="employersCompany">Company</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <input type="text" name="company" class="form-control" id="employersCompany" placeholder="Company Name" required data-validation-required-message="Please enter your company name.">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-group control-label col-sm-4 col-md-3 col-lg-2" for="employersName">Name</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <input type="text" name="name" class="form-control" id="employersName" placeholder="Contact Persons Name" required data-validation-required-message="Please enter contact persons name.">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label  col-sm-4 col-md-3 col-lg-2" for="employersEmail">E-mail</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <input type="email" name="email" class="form-control" id="employersEmail" placeholder="Contact E-mail Address" required data-validation-required-message="Please enter a contact email address.">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label  col-sm-4 col-md-3 col-lg-2" for="employersPhone">Phone</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <input type="text" name="phone" class="form-control" id="employersPhone" placeholder="Contact Telephone Number">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label  col-sm-4 col-md-3 col-lg-2" for="employersWebsite">Website</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <input type="text" name="website" class="form-control" id="employersWebsite" placeholder="Company Website">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label  col-sm-4 col-md-3 col-lg-2" for="employersJD">Add Job Description</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <input type="file" name="attach" class="form-control" id="employersJD">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label  col-sm-4 col-md-3 col-lg-2" for="employersComment">Comment</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <textarea class="form-control" name="comment" id="employersComment" placeholder="Comments" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="control-group form-group"> 
                            <div class="controls col-sm-12 text-right">
                                <div id="employersSuccess"></div>
                                <button type="submit" class="btn btn-default">Register Now</button>
                                <input type="hidden" name="type" value="Employer">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</section>     
<section id="jobseekers">
    <header class="section-head" data-bottom-top="background-position: 50% 75%" data-top-bottom="background-position: 50% 27%" data-target="#jobseekers .section-head">
        <div class="section-head-inner">
            <div class="container">
                <?php
                $a = new Area('Jobseekers Section Header');
                $a->setAreaGridMaximumColumns(1);
                $a->setBlockLimit(1);
                $a->display($c);
                ?>
            </div>
        </div>
    </header>
    <div class="section-content">
        <div class="container">
            <?php
            $a = new Area('Jobseekers Section Content');
            $a->setAreaGridMaximumColumns(12);
            $a->display($c);
            ?>
        </div>
    </div>
    <footer class="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-push-6">
                    <?php
                    $a = new Area('Jobseekers Footer Title');
                    $a->setAreaGridMaximumColumns(1);
                    $a->setBlockLimit(1);
                    $a->display($c);
                    ?>
                </div>
                <div class="col-sm-6 col-sm-pull-6">
                    <form class="form-horizontal" role="form" novalidate enctype="multipart/form-data">
                        <div class="control-group form-group">
                            <label class="control-label col-sm-4 col-md-3 col-lg-2" for="jobseekersName">Name</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <input type="text" name="name" class="form-control" id="jobseekersName" placeholder="Full name" required data-validation-required-message="Please enter your full name.">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label  col-sm-4 col-md-3 col-lg-2" for="jobseekersEmail">E-mail</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <input type="email" name="email" class="form-control" id="jobseekersEmail" placeholder="E-mail Address" required required data-validation-required-message="Please enter your email address.">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label  col-sm-4 col-md-3 col-lg-2" for="jobseekersPhone">Phone</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <input type="text" name="phone" class="form-control" id="jobseekersPhone" placeholder="Telephone Number">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label  col-sm-4 col-md-3 col-lg-2" for="jobseekersLinkedIn">LinkedIn</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <input type="text" name="linkedin" class="form-control" id="jobseekersLinkedIn" placeholder="LinkedIn Profile URL">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label  col-sm-4 col-md-3 col-lg-2" for="jobseekersCV">Add C.V.</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <input type="file" name="attach" class="form-control" id="jobseekersCV">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label  col-sm-4 col-md-3 col-lg-2" for="jobseekersComment">Comment</label>
                            <div class="controls col-sm-8 col-md-9 col-lg-10">
                                <textarea class="form-control" name="comment" id="jobseekersComment" placeholder="Comments" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="control-group form-group"> 
                            <div class="controls col-sm-12 text-right">
                                <div class="jobseekersSuccess"></div>
                                <button type="submit" class="btn btn-default">Register Now</button>
                                <input type="hidden" name="type" value="Jobseeker">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</section>

<section id="jobsearch">
    <header class="section-head" data-bottom-top="background-position: 50% 75%" data-top-bottom="background-position: 50% 27%" data-target="#jobsearch .section-head">
        <div class="section-head-inner">
            <div class="container">
                <?php
                $a = new Area('Jobsearch Section Header');
                $a->setAreaGridMaximumColumns(1);
                $a->setBlockLimit(1);
                $a->display($c);
                ?>
            </div>
        </div>
    </header>
    <div class="section-content">
        <div class="container">
            <?php
            $a = new Area('Jobsearch Section Content');
            $a->setAreaGridMaximumColumns(12);
            $a->display($c);
            ?>
        </div>
    </div>
    <footer class="section-footer">
        <div class="container">
            <?php
            $a = new Area('Jobsearch Footer');
            $a->setAreaGridMaximumColumns(1);
            $a->setBlockLimit(1);
            $a->display($c);
            ?>
        </div>
    </footer>
</section>


<section id="contact">
    <header class="section-head" data-bottom-top="background-position: 50% 75%" data-top-bottom="background-position: 50% 27%" data-target="#contact .section-head">
        <div class="section-head-inner">
            <div class="container">
                <?php
                $a = new Area('Contact Section Header');
                $a->setAreaGridMaximumColumns(1);
                $a->setBlockLimit(1);
                $a->display($c);
                ?>
            </div>
        </div>
    </header>
    <div class="section-content">
        <div class="container">
            <?php
            $a = new Area('Contact Section Content');
            $a->setAreaGridMaximumColumns(12);
            $a->display($c);
            ?>
        </div>
    </div>
    <footer class="section-footer">
        <div class="container">
            <?php
            $a = new Area('Contact Footer Content');
            $a->setAreaGridMaximumColumns(12);
            $a->display($c);
            ?>
        </div>
    </footer>
</section>


<?php $this->inc('elements/footer.php'); ?>