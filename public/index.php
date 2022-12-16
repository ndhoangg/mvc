<?php
require_once __DIR__.'./../vendor/autoload.php';


use app\core\Application ;

define ('SITE_ROOT', realpath(dirname(__FILE__)));
$app = new Application(dirname(__DIR__));

include_once __DIR__.'./../router.php';

$app->run();
    
?>