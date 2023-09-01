<div class="today_container">
	<span class="today_title"> Today 's run was :</span>
	<div>
		<?php if (!$runObject->todayRunExists()): ?>
			<a class="today_button success button" href="<?php echo PATH_PREFIX."controller/add/addSuccess.php";?>">Successful</a>
			<a class="today_button fail button" href="<?php echo PATH_PREFIX."controller/add/addFail.php";?>">Failed</a>
		<?php else:?>
			<?php if ($runObject->todayRunStatus()): ?>
				<span class="success"> Successful </span>
			<?php else: ?>
				<span class="fail"> Failed</span>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>