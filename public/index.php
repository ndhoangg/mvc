<?php

require_once __DIR__.'./../core/autoload.php';

define ('SITE_ROOT', realpath(dirname(__FILE__)));

use app\core\Application ;

$app = new Application(dirname(__DIR__));

include_once __DIR__.'./../router.php';

$app->run();
    
?>