<?php

class Main extends Controller
{
	function __construct()
	{
		parent::__construct();

	}
	function index(){
		$this->view->show("index/index");
	}
	
    function returnTest()
    {
        // Doğrudan return ile array döndürüyoruz
        return [
            'username' => 'Berkay',
            'status' => 'active'
        ];
    }

}
