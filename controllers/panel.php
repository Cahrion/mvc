<?php

class Panel extends Controller
{


	function __construct()
	{
		parent::__construct();
	}
	function index(){
		if (Session::get("kulad") == false){
			Session::destroy();
			header("Location:" . URL . "/login/Form");
			exit;
		}else{
			$this->view->show("panel/index");
		}
	}

	function leave()
	{
        session_start();
		Session::destroy();
		header("Location:" . URL . "/login/Form");
	}
}
