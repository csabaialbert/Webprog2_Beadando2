<?php

class MYPDF extends TCPDF {
	public function error($msg) {
		throw new Exception($msg);
	}

	public function ColoredTable($caption, $header, $rows) {
		// Caption font and color
		$this->SetFont('helvetica', 'B', 16);
		$this->SetTextColor(0, 0, 255);
		// Caption
		$this->cell(180, 18, $caption, 0, 0, 'C', 0);
		$this->Ln();

		// Borders width
		$this->SetLineWidth(0.3);

		// Header font and colors
		$this->SetFont('helvetica', 'B', 10);
		$this->SetFillColor(255, 0, 0);
		$this->SetTextColor(255,255,255);
		$this->SetDrawColor(255,0,0);
		// Header
		$w = array(63, 20, 20, 20, 40, 63);
		$num_headers = count($header);
		for($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 12, $header[$i], 1, 0, 'C', 1);
		}
		$this->Ln();

		// Rows font and border color
		$this->SetFont('helvetica', '', 10);
		$this->SetDrawColor(0,0,255);
		// Rows
		$i = 1;
		foreach($rows as $r) {
			if($i) {
				$this->SetFillColor(255,255,255);
				$this->SetTextColor(0,0,255);
			}
			else {
				$this->SetFillColor(0,0,255);
				$this->SetTextColor(255,255,255);
			}
			/*$this->Cell($w[0], 14, 'TESZT', 'LRB', 0, 'R', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[1], 14, 'TESZT', 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[2], 14, 'TESZT', 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[3], 14, 'TESZT', 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[4], 14, 'TESZT', 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[5], 14, 'TESZT', 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');*/

			$this->Cell($w[0], 14, $r['tanosveny'], 'LRB', 0, 'R', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[1], 14, $r['hossz'], 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[2], 14, $r['allomas'], 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[3], 14, $r['ido'], 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[4], 14, $r['telepules'], 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');
			$this->Cell($w[5], 14, $r['nemzeti_park'], 'LRB', 0, 'L', 1, '', 0, false, 'T', 'T');

			$this->Ln();
			$i = !$i;
		}
	}
}