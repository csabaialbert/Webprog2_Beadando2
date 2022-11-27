<?php

error_reporting(E_ALL);
ini_set('display_errors',"On");

require_once(SERVER_ROOT.'/tcpdf/tcpdf.php');

class Pdfquery_controller {
	public string $baseName = 'pdfmaker';

	public function main(array $vars) {
		$pdfQueryModel = new Pdfquery_model($vars);
		$retData = $pdfQueryModel->get_data($vars);
		if ($retData['eredmeny'] == "OK") {
			$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT,
							 true, 'UTF-8', false);
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Web-programozás II');
			$pdf->SetTitle('Tanösvények');
			$pdf->SetSubject('Tanösvények');
			$pdf->SetKeywords('TCPDF, tanösvények, nemzeti park, természet, túra');

			$pdf->SetHeaderData("../images/logo.png", 15,
								"TANÖSVÉNYEK LISTÁJA",
								"Web-programozás II\n2. projektfeladat\n" . date('Y.m.d', time()));

			$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

			$l = array();
			if (@file_exists(dirname(__FILE__) . '/lang/hun.php')) {
				require_once(dirname(__FILE__) . '/lang/hun.php');
				$pdf->setLanguageArray($l);
			} else if (@file_exists('./WP2_T2/tcpdf/examples/lang/hun.php')) {
				require_once('./WP2_T2/tcpdf/examples/lang/hun.php');
				$pdf->setLanguageArray($l);
			} else {
				$l['a_meta_charset'] = 'UTF-8';
				$l['a_meta_dir'] = 'ltr';
				$l['a_meta_language'] = 'hu';
				$l['w_page'] = 'oldal';
				$pdf->setLanguageArray($l);
			}

			$pdf->SetFont('helvetica', 'B', 10);

			// add a page
			$pdf->AddPage();

			// table caption
			$caption = 'TANÖSVÉNYEK';

			// column titles
			$header = array('TANÖSVÉNY NEVE', 'HOSSZ', 'ÁLLOMÁSOK', 'TÚRAIDŐ', 'TELEPÜLÉS', 'NEMZETI PARK');

			// data loading
			$rows = $retData['tanosvenyek'];

			// print colored table
			$pdf->ColoredTable($caption, $header, $rows);

			// close and output PDF document
			$pdf->Output('tanosvenyek' . date('Ymd-Gis', time()) . '.pdf', 'I');
		} else {
			$view = new View_Loader($this->baseName . '_main');
			foreach ($retData as $name => $value) {
				$view->assign($name, $value);
			}
		}
	}
}
