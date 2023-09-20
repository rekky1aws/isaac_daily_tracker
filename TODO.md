# TODO

## To Do
 + Display streak count
 + Count max streak and display it
 	+ use json (no need to enter it in db)*
	+ new calculation when a new run is added
		+ get current streak and change it if its more than previous max
 + Display Total Played and Wins
 + Display calendar with all the DR of the month
 + Small Bento design CSS
 + Add a way to edit a run if a mistake wase made
 	+ warn user to not to use in case of a success run if failed before

 ++ Make it usable by multiple users
	+ user access their data onmly via username (no need to secure more, it can be public)
		+ if we want more, we can make data claimable by player with a steam account connexion
	+ rework DB to know what runs is whose
	+ add a new table in DB for users

## Done
 - DRDB :
	 - getAllRuns
	 - getLastFive
	 - getStreak
	 - totalPlayedNb
	 - winsNb
	 - addTodayRun
 - components :
 	- head
 	- header
 - controller :
 	- autoload :
 		- readEnv
 - view :
 	- addTodayRunµ.php
	- displayStreak.php
	- displayLastFive.php