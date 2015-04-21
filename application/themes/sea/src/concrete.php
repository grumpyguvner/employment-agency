<?php

/**
 * -----------------------------------------------------------------------------
 * Generated 2015-04-20T20:52:34+01:00
 *
 * @item      misc.do_page_reindex_check
 * @group     concrete
 * @namespace null
 * -----------------------------------------------------------------------------
 */
return array(
    'site' => 'Sussex Employment Agency',
    'version_installed' => '5.7.3.1',
    'charset' => 'ISO-8859-1',
    'misc' => array(
        'access_entity_updated' => 1429283718,
        'latest_version' => '5.7.3.1',
        'seen_introduction' => true,
        'iphone_home_screen_thumbnail_fid' => '2',
        'favicon_fid' => '1',
        'modern_tile_thumbnail_fid' => '3',
        'modern_tile_thumbnail_bgcolor' => 'rgb(255, 255, 255)',
        'user_timezones' => false,
        'do_page_reindex_check' => false
    ),
    'cache' => array(
        'blocks' => true,
        'assets' => true,
        'theme_css' => true,
        'overrides' => true,
        'pages' => 'blocks',
        'full_page_lifetime' => 'default',
        'full_page_lifetime_value' => null
    ),
    'theme' => array(
        'compress_preprocessor_output' => true
    ),
    'seo' => array(
        'url_rewriting' => 1,
        'tracking' => array(
            'code' => '<script>
  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

  ga(\'create\', \'UA-61251259-1\', \'auto\');
  ga(\'send\', \'pageview\');
</script>',
            'code_position' => 'top'
        )
    ),
    'user' => array(
        'registration' => array(
            'email_registration' => true,
            'type' => 'disabled',
            'captcha' => false,
            'enabled' => false,
            'notification' => false
        )
    )
);
