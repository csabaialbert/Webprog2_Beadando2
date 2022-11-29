<?php

class Ossztanosveny_Model {
	public function get_data($vars): array {
		$retData['eredmeny'] = array();
		try {
			$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD,
						   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			$stmt = $dbh->prepare(
				"SELECT np.nev park, COUNT(ut.id) 'darab' FROM np
INNER JOIN telepules t on t.npid = np.id
INNER JOIN ut on ut.telepulesid = t.id
GROUP BY park ORDER BY park"
			);
			$stmt->execute();
			foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $item) {
				$retData['uzenet']['park'][] = $item['park'];
				$retData['uzenet']['darab'][] = $item['darab'];
			}
		} catch
		(PDOException $e) {
			$retData['eredmeny'] = "ERROR";
			$retData['uzenet'] = $e->getMessage();
		}
		return $retData;
	}
}
