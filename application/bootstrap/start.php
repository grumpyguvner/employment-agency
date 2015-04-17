<?php

use Concrete\Core\Application\Application;

/**
 * ----------------------------------------------------------------------------
 * Instantiate concrete5
 * ----------------------------------------------------------------------------
 */
$app = new Application();

/**
 * ----------------------------------------------------------------------------
 * Detect the environment based on the hostname of the server
 * ----------------------------------------------------------------------------
 */
$app->detectEnvironment(
    array(
        'local' => array(
            'sea.local',
            'sea.totallyboundless.com'
        ),
        'production' => array(
            'sussexemploymentagency.org.uk',
            'www.sussexemploymentagency.org.uk',
            'sussexemploymentagency.org.uk',
            'www.sussexemploymentagency.co.uk'
        )
    ));

return $app;
