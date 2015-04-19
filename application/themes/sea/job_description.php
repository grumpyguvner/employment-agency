<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>
        <section id="jobdescription">
            <header class="section-head" data-bottom-top="background-position: 50% 75%" data-top-bottom="background-position: 50% 27%">
                <div class="section-head-inner">
                    <div class="container">
                        <span class="h1">CONSTRUCTION</span>
                    </div>
                </div>
            </header>
            <div class="section-content">
                <div class="container">
                    <div class="job-details row">
                        <div class="col-sm-6">
                            <p>Painter &amp; Decorator<br>
                            £20,000 - £30,000</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="reference">Ref: 148</h2>
                        </div>
                    </div>
                    <?php
                    $a = new Area('Job Description');
                    $a->setAreaGridMaximumColumns(12);
                    $a->display($c);
                    ?>
                </div>
            </div>
            <footer class="section-footer">
                <div class="container"><div class="row">
                        <div class="col-sm-6 col-sm-push-6"><div class="h1">APPLY FOR THIS JOB NOW</div>
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

<?php  $this->inc('elements/footer.php'); ?>