<div class="calendar_container parts">
	<span class="calendar_title parts_title"> Calendar : </span>
	<div class="calendar_grid">
	<?php 
	/* display a 15 x 7 grid ending this week (S M T W T F S)
	colors :
		- -1 not available : white
		- 0 not registerd : lightgrey
		- 1 fail : red
		- 2 success : green
	*/

	// On donne une valeur en fonction du status de la run a cette date, s'il n'y a aucune run a cette date, on retourne 0.
	function getRunStatus ($arr, $date)
	{
		foreach ($arr as $key => $value) {
			if ($value['date'] == $date)
			{
				return $value['success'] + 1;
			}
		}

		return 0;
	}

	// Tableau de 105 runs initalisé avec des nulls
	$runs = array_fill(0, 15*7, null);

	$today = date('Y-m-d');

	// Afficher des semaines complètes et griser les cases des jours à venir
	$startIndex = 6 - getdate()["wday"];
	for ($i=0; $i < $startIndex; $i++) { 
		$runs[$i] = -1;
	}

	// Nombre de jours à enlever depuis aujourd'hui.
	$nbDays = 1;

	// On fini de remplir le tableau pour 
	while ($i < count($runs))
	{
		// Date à laquelle chercher le résultat de la run
		$searchDate = date('Y-m-d', strtotime($today." - ".$nbDays." days"));

		// Mise à jour du status
		$runs[$i] = getRunStatus($runObject->runs, $searchDate);

		$nbDays++;
		$i++;
	}

	// Affichage du tableau des runs
	for ($i=count($runs)-1; $i > -1 ; $i--):
		
		if ($i == $startIndex) {
			$isToday = true;
		} else {
			$isToday = false;
		}

		switch($runs[$i])
		{
			case -1:
				$tileStatus = "not_available";
				break;

			case 0:
				$tileStatus = "not_registered";
				break;

			case 1:
				$tileStatus = "failed";
				break;

			case 2:
				$tileStatus = "success";
				break;

			default:
				$tileStatus = "error";
				die('Incorrect status in for run number '.$i.'.');
				break;
		}
	?>
	
		<span class="calendar_tile <?=$tileStatus?> <?=$isToday ? "selected" : ""?>">
			
		</span>
	
	<?php
	endfor;
	?>
	</div>
</div>