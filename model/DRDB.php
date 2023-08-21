<?php 

class DRDB 
{
	public $pdo;
	public $runs;

	function __construct ($driver, $host, $port, $db_name, $db_user, $db_pass)
	{
		try {
			// PDO init
			$this->pdo = new PDO("$driver:host=$host;port=$port;dbname=$db_name", $db_user, $db_pass);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	function getAllRuns ()
	{
		try {
			$query = "SELECT * FROM runs";
			$dst = $this->pdo->prepare($query);
			$dst->execute();
			$this->runs = $dst->fetchAll(PDO::FETCH_ASSOC);

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	function totalPlayedNb ()
	{
		try {
			$query = "SELECT count(*) AS nb FROM runs";
			$dst = $this->pdo->prepare($query);
			$dst->execute();
			return intval($dst->fetchAll(PDO::FETCH_ASSOC)[0]['nb']);

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	function winsNb ()
	{
		try {
			$query = "SELECT count(*) AS nb FROM runs WHERE success IS true";
			$dst = $this->pdo->prepare($query);
			$dst->execute();
			return intval($dst->fetchAll(PDO::FETCH_ASSOC)[0]['nb']);

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	function addTodayRun ()
	{
		
	}
}

?>