<?php

class  Controller {
	public $view;
	public $form;
	public $Information;
	public $model;
	
	function __construct() {
			
		$this->view = new View();
		$this->form = new Form();
		$this->Information = new Information();
		
	} 
	
	// ihtyiacımız olan model'i dahil ediyoruz
	public function modelUpdate($name) {
		
		$yol='model/'.$name.'_model.php';
		
		if (file_exists($yol)) :
		
		require $yol;
		
		$modelsinifName=$name.'_model';
		
		$this->model= new $modelsinifName();
		
		endif;
	}
}

?>