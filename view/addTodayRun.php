<div class="today_container parts">
	<span class="today_title parts_title"> Today 's run was :</span>
	<div class="today_buttons_flex">
		<?php if (!$runObject->todayRunExists()): ?>
			<a class="today_button success button" href="<?php echo PATH_PREFIX."controller/add/addSuccess.php";?>">Successful</a>
			<a class="today_button fail button" href="<?php echo PATH_PREFIX."controller/add/addFail.php";?>">Failed</a>
		<?php else:?>
			<?php if ($runObject->todayRunStatus()): ?>
				<span class="today_info success"> Successful </span>
			<?php else: ?>
				<span class="today_info fail"> Failed</span>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>