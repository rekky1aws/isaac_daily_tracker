<?php 
// Path prefix for autoload
define("PATH_PREFIX", "./");

// Autoloader to include code
include_once PATH_PREFIX."controller/autoload.php";

$header = new Header();
$head = new Head();

$runObject = createFromEnv();
$runObject->getAllRuns();

// var_dump($runObject->runs);
// var_dump($runObject->totalPlayedNb());
// var_dump($runObject->getStreak());
// var_dump($runObject->winsNb());
// var_dump($runObject->getLastFive());
// var_dump($runObject->addTodayRun(true));

// $runObject->setMaxStreak(6);
$runObject->getMaxStreak();
?>

<!DOCTYPE html>
<html>
<head>
	<?= $head->getContent(); ?>
	<title> Isaac Daily Run Tracker </title>
</head>
<body>
	<?= $header->getContent(); ?>
	<main>
		<?php 
		include_once PATH_PREFIX."view/addTodayRun.php";
		include_once PATH_PREFIX."view/display/displayStreak.php";
		include_once PATH_PREFIX."view/display/displayLastFive.php";
		include_once PATH_PREFIX."view/display/displayTotalPlayed.php";

		?>
	</main>
</body>
</html>