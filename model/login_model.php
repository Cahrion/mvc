<?php

class login_model extends Model
{


	function __construct()
	{
		parent::__construct();
	}



	function accountCheck($tabload, $kosul)
	{
		return $this->db->accountCheck($tabload, $kosul);
	}
}
