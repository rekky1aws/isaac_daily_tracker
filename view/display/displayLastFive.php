<div class="last_five_container parts">
	<span class="last_five_title parts_title"> Last Five :</span>
	<div class="last_five_grid">
		<?php
        $lastFiveRuns = $runObject->getLastFive();
        foreach($lastFiveRuns as $run) :
            if ($run == 1): ?>
            <div class="last_five_run success">  </div>
            <?php else: ?>
            <div class="last_five_run fail">  </div>
            <?php endif;
        endforeach;
        ?>
	</div>
</div>