<?php

class Restapi_Controller {
	public $baseName = 'restapi';  //meghatározni, hogy melyik oldalon vagyunk

	public function main(array $vars) // a router által továbbított paramtereket kapja
	{
		//betöltjük a nézetet
		$view = new View_Loader($this->baseName . "_main");
	}
}

?>