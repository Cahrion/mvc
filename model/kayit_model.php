<?php

class kayit_model extends Model
{
	public $db;

	function __construct()
	{
		parent::__construct();
	}



	function addData($tabload, $sutunlarim, $veri)
	{
		return $this->db->addData($tabload, $sutunlarim, $veri);
	}

	function getData($tabload, $kosul)
	{
		return $this->db->getData($tabload, $kosul);
	}

	function delData($tabload, $kosul)
	{
		return $this->db->delData($tabload, $kosul);
	}

	function updData($tabload, $sutunlar, $veri, $kosul)
	{
		return $this->db->updData($tabload, $sutunlar, $veri, $kosul);
	}

	function searchData($tabload, $kosul)
	{
		return $this->db->searchData($tabload, $kosul);
	}
}
