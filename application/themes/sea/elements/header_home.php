<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');
if (is_object($c)) {
	$cp = new Permissions($c);
}
?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-big<?php if (is_object($cp) && !$cp->canViewToolbar()) echo ' navbar-fixed-top';?> navbar-big">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu_toggle">
               <span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#page-top"><i class="sprite" title="Sussex Employment Agency"><img src="<?php echo  $view->getThemePath() ?>/assets/img/sussex-employment-agency-logo.png" alt="Sussex Employment Agency" height="161" width="75" ></i></a>
        </div>
        <div class="collapse navbar-collapse" id="menu_toggle">
            <ul class="nav navbar-nav navbar-right">
                <li class="page-scroll">
                    <a href="#page-top">Home</a>
                </li>
                <li class="page-scroll">
                    <a href="#about">About</a>
                </li>
                <li class="page-scroll">
                    <a href="#jobseekers">Job Seekers</a>
                </li>
                <li class="page-scroll">
                    <a href="#employers">Employers</a>
                </li>
                           <li class="page-scroll">
                              <a href="#jobsearch">Job Search</a>
                          </li>
                <li class="page-scroll">
                    <a href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

