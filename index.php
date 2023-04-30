<?php

use Rusla\Generators\Fast;
use Rusla\Generators\Functional;
use Rusla\Generators\GeneratorWay;

require_once 'vendor/autoload.php';

//$app = new Fast();

//$app = new Functional();
$app = new GeneratorWay();

$app->run();
