
# TODO

## To Do
 + Sort code to match MVC
 	+ displayCalendar : some parts should be in a controller
 + Display Wins
 + Display calendar with all the DR of the month
 + Small Bento design CSS
 	+ Use variables to get a more coherent look easily
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
	 - getMaxStreak
	 - setMaxStreak
	 - updateMaxStreak
 - components :
 	- head
 	- header
 - controller :
 	- autoload :
 		- readEnv
 - view :
 	- addTodayRun.php
	- displayStreak.php
	- displayLastFive.php
	- displayTotalPlayed.php
	- displayMaxStreak.php