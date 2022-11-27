<?php

class Restapi_tanosveny_Controller {
	public $baseName = 'restapi_tanosveny';  //meghatározni, hogy melyik oldalon vagyunk

	public function main(array $vars) // a router által továbbított paramétereket kapja
	{
		//betöltjük a nézetet
		$view = new View_Loader($this->baseName . "_main");
	}
}

?>