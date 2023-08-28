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
			// Get all run ordered by date (last run played is in position 0, first played will be in last position in the array)
			$query = "SELECT * FROM runs ORDER BY 'date' DESC;";
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
			// Getting data for 5 last runs 
			$query = "SELECT * FROM runs ORDER BY 'date' DESC LIMIT 5;";
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

	function getStreak ()
	{
		// Get Runs data if it hasn't already been done
		if (empty($runs))
		{
			$this->getAllRuns();
		}

		$streak = 0;

		while ($this->runs[$streak]['success'] == '1')
		{
			$streak++;
		}

		return $streak;
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
			$query = "SELECT count(*) AS nb FROM runs WHERE success IS true;";
			$dst = $this->pdo->prepare($query);
			$dst->execute();
			return intval($dst->fetchAll(PDO::FETCH_ASSOC)[0]['nb']);

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	function addTodayRun ($success)
	{
		$dateTime = new DateTimeImmutable();
		$hours = intval($dateTime->format("H"));

		// If before 12h, date is day before
		if ($hours < 12)
		{
			$dateResult = date("Y-m-d",strtotime("-1 days"));
		// Else, date is today
		} else {
			$dateResult = date("Y-m-d");
		}

		// Inserting into database
		try {
			$query = "INSERT INTO runs (date, success) VALUES (\"$dateResult\", $success);";
			$dst = $this->pdo->prepare($query);
			$dst->execute();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}

?>