<?php

class Pdfquery_model {
	protected bool $guideEither;
	protected bool $guideYes;
	protected string $sqlSelect;
	protected array $queryConstraints;

	public function __construct($vars) {
		$this->guideEither = $vars['with_guide'] == 'either';
		if ($this->guideEither) {
			$this->sqlSelect =
				"SELECT ut.nev, ut.hossz, ut.allomas, ut.ido, ut.vezetes, t.nev as telepules, np.nev as nemzeti_park 
FROM ut 
INNER JOIN telepules t on ut.telepulesid = t.id 
INNER JOIN np on t.npid = np.id
WHERE ut.hossz >= :mindist and ut.hossz <= :maxdist 
  and ut.ido >= :mintime and ut.ido <= :maxtime";
			$this->queryConstraints = array(
				':mindist' => $vars['min_dist'],
				':maxdist' => $vars['max_dist'],
				':mintime' => $vars['min_time'],
				':maxtime' => $vars['max_time']
			);
		} else {
			$this->sqlSelect =
				"SELECT ut.nev, ut.hossz, ut.allomas, ut.ido, ut.vezetes, t.nev as telepules, np.nev as nemzeti_park 
FROM ut 
INNER JOIN telepules t on ut.telepulesid = t.id 
INNER JOIN np on t.npid = np.id
WHERE ut.hossz >= :mindist and ut.hossz <= :maxdist 
  and ut.ido >= :mintime and ut.ido <= :maxtime
and ut.vezetes = :withguide";
			$this->guideYes = $vars['with_guide'] == "guide_yes";
			$this->queryConstraints = array(
				':mindist' => $vars['min_dist'],
				':maxdist' => $vars['max_dist'],
				':mintime' => $vars['min_time'],
				':maxtime' => $vars['max_time'],
				':withguide' => $this->guideYes
			);
		}
	}

	public function get_data($vars): array {
		$retData['eredmeny'] = "";
		$hikingList = array();
		try {
			$connection = Database::getConnection();
			$stmt = $connection->prepare($this->sqlSelect);
			$stmt->execute($this->queryConstraints);
			$itemCount = $stmt->rowCount();
			if ($itemCount == 0) {
				$retData['eredmeny'] = "ERROR";
				$retData['uzenet'] = "Nincsen találat!";
			} else {
				foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $Item) {
					$hikingList[] = [
						'tanosveny' => $Item['nev'],
						'hossz' => $Item['hossz'],
						'allomas' => $Item['allomas'],
						'ido' => $Item['ido'],
						'vezetes' => $Item['vezetes'],
						'telepules' => $Item['telepules'],
						'nemzeti_park' => $Item['nemzeti_park']
					];
				}
				$retData['eredmeny'] = "OK";
				$retData['tanosvenyek'] = $hikingList;
			}
		} catch (PDOException $e) {
			$retData['eredmeny'] = "ERROR";
			$retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage() . "!";
		}
		return $retData;
	}
}