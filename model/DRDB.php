<?php 

class DRDB 
{
	private $pdo;
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

	function getLastFive ()
	{
		try {
			$query = "SELECT * FROM runs ORDER BY id DESC LIMIT 5";
			$dst = $this->pdo->prepare($query);
			$dst->execute();
			$fiveLastRuns = $dst->fetchAll(PDO::FETCH_ASSOC);
			$runsStatus = [];

			foreach ($fiveLastRuns as $run) {
					array_push($runsStatus, $run['success']);
			}

			return $runsStatus;

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
		// if  AM register for the day before
		// if PM register for current day
			// check if the date as already been registered	
	}
}

?>