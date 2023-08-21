<?php

// Create TaskDB object
function createFromEnv ()
{
	return new DRDB($_ENV['version'], $_ENV['host'], $_ENV['port'], $_ENV['database'], $_ENV['user'], $_ENV['password']);
}
?>