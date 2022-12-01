<?php

class MyPdf extends TCPDF {
	public function error($msg) {
		throw new Exception($msg);
	}

	public function LoadTestData($database, $table) {
		$rows = array();
		try {
			$dbh = new PDO('mysql:host=localhost;dbname=' . $database, 'root', '',
						   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

			$sql = "SELECT * FROM " . $table;
			$sth = $dbh->query($sql);
			$rows = $sth->fetchAll(PDO::FETCH_NUM);
		} catch (PDOException $e) {
		}
		return $rows;
	}

	public function ColoredTable($caption, $header, $rows) {
		// Caption font and color
		$this->SetFont('helvetica', 'B', 16);
		$this->SetTextColor(2, 25, 23);
		// Caption
		$this->cell(180, 18, $caption, 0, 0, 'C', 0);
		$this->Ln();

		// Borders width
		$this->SetLineWidth(0.3);

		// Header font and colors
		$this->SetFont('helvetica', 'B', 10);
		$this->SetFillColor(255, 99, 99);
		$this->SetTextColor(0, 0, 0);
		$this->SetDrawColor(68, 80, 104);
		// Header
		$w = array(35, 15, 20, 15, 20, 30, 35);
		$num_headers = count($header);
		for ($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 12, $header[$i], 1, 0, 'C', 1);
		}
		$this->Ln();

		// Rows font and border color
		$this->SetFont('helvetica', '', 10);
		$this->SetDrawColor(68, 80, 104);
		// Rows
		$i = 1;
		foreach ($rows as $r) {
			if ($i) {
				$this->SetFillColor(255, 255, 255);
			} else {
				$this->SetFillColor(245, 222, 179);
			}
			$this->SetTextColor(0, 0, 0);

			$this->MultiCell($w[0], 14, $r['tanosveny'], 'LRB', 'L', 1, 0, '', '', true, 0, false, true, 0, 'T', true);
			$this->Cell($w[1], 14, $r['hossz'], 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[2], 14, $r['allomas'], 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[3], 14, $r['ido'], 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[4], 14, ($r['vezetes'] == true) ? "i" : "n", 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[5], 14, $r['telepules'], 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->MultiCell($w[6], 14, $r['nemzeti_park'], 'LRB', 'L', 1, 0);

			$this->Ln();
			$i = !$i;
		}
	}
}