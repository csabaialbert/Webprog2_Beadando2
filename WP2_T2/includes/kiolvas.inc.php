<?php
const HOST = 'localhost';
const DATABASE = 'tanosveny';
const USER = 'root';
const PASSWORD = '';
switch ($_POST['op']) {
	case 'parkok':
		$eredmeny = array("lista" => array());
		try {
			$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD,
						   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			$stmt = $dbh->query("select id, nev from np");
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$eredmeny["lista"][] = array("id" => $row['id'], "nev" => $row['nev']);
			}
		} catch (PDOException $e) {
		}
		echo json_encode($eredmeny);
		break;

	case 'varos':
		$eredmeny = array("lista" => array());
		try {
			$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD,
						   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			$stmt = $dbh->prepare("select id, nev, npid from telepules where npid = :id");
			$stmt->execute(array(":id" => $_POST["id"]));
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$eredmeny["lista"][] = array("id" => $row['id'], "nev" => $row['nev']);
			}
		} catch (PDOException $e) {
		}
		echo json_encode($eredmeny);
		break;

	case 'ut':
		$eredmeny = array("lista" => array());
		try {
			$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD,
						   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			$stmt = $dbh->prepare("select id, nev, telepulesid from ut where telepulesid = :id");
			$stmt->execute(array(":id" => $_POST["id"]));
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$eredmeny["lista"][] = array("id" => $row['id'], "nev" => $row['nev']);
			}
		} catch (PDOException $e) {
		}
		echo json_encode($eredmeny);
		break;
	case 'info':
		$eredmeny = array("nev" => "", "hossz" => "", "allomas" => "", "ido" => "", "telepulesid" => "");
		try {
			$dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD,
						   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
			$stmt = $dbh->prepare("select nev, hossz, allomas, ido, vezetes from ut where id = :id");
			$stmt->execute(array(":id" => $_POST["id"]));
			if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$eredmeny = array(
					"nev" => $row['nev'],
					"hossz" => $row['hossz'],
					"allomas" => $row['allomas'],
					"ido" => $row['ido'],
					"vezetes" => $row['vezetes']
				);
			}
		} catch (PDOException $e) {
		}
		echo json_encode($eredmeny);
		break;
}
