<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

include 'library/zconstanzo/Autoload/Autoload.php';

$loader = new Autoload();
$loader->Loader();
                     
$registry = new Registry_Registry();
$registry->init();