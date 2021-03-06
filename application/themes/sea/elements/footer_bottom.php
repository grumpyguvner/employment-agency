<?php
defined('C5_EXECUTE') or die("Access Denied.");
if (is_object($c)) {
	$cp = new Permissions($c);
}
if (isset($cp) && $cp->canViewToolbar()) {
    echo '</div>';
}
?>
<?php Loader::element('footer_required'); ?>
<script type="text/javascript" src="<?php echo $view->getThemePath() ?>/assets/js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $view->getThemePath() ?>/assets/js/plugins-concat.min.js"></script>
<script type="text/javascript" src="<?php echo $view->getThemePath() ?>/assets/js/main.min.js"></script>
<script type="text/javascript" src="<?php echo $view->getThemePath() ?>/assets/js/contact_me.min.js"></script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "LocalBusiness",
  "name" : "Sussex Employment Agency",
  "url": "http://www.sussexemploymentagency.org.uk/",
  "contactPoint" : [
    { "@type" : "ContactPoint",
      "telephone" : "+44 1273 519 109",
      "contactType" : "customer service"
    } ],
    "address" : [
    { "@type" : "PostalAddress",
      "streetAddress" : "31A High Street",
      "addressLocality" : "Newhaven",
      "addressRegion" : "East Sussex",
      "postalCode" : "BN9 9PD"
    } ],
    "sameAs" : [ "https://www.facebook.com/SEASussex",
    "https://plus.google.com/102812435430736324346",
    "http://twitter.com/SEARecruitment",
    "https://www.linkedin.com/company/9368373"] }
</script>
<!--<script src="//localhost:35729/livereload.js"></script>-->
    </body>

</html>