<?php 
// Path prefix for autoload
define("PATH_PREFIX", "../../");

// Autoloader to include code
include_once PATH_PREFIX."controller/autoload.php";

$runObject = createFromEnv();
$runObject->addTodayRun(1);

header("Location: ../..");
?>