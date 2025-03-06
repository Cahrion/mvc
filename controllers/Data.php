<?php

class Data extends Controller
{


	function __construct()
	{
		parent::__construct();

		$this->modelUpdate('data');
	}

	function data()
	{
		$this->view->show("form/index");
	}
	function addDataResult()
	{
		$ad = $this->form->get("ad")->isEmpty();
		$soyad = $this->form->get("soyad")->isEmpty();
		$yas = $this->form->get("yas")->isEmpty();

		if (!empty($this->form->error)) {
			$this->view->show(
				"form/sonuc",
				$this->form->error,
				$this->Information->error(false, "/data/data")
			);
		} else {
			$sonuc = $this->model->addDataResult("ogrenci", array("ad", "soyad", "yas"), array($ad, $soyad, $yas));

			$this->view->show("form/result", $sonuc);
		}
	}

	function getData()
	{

		$sonuc = $this->model->getData("ogrenci", "order by id desc");
		$this->view->show("form/get", $sonuc);
	}

	function delData($id)
	{

		$sonuc = $this->model->delData("ogrenci", "id=" . $id);
		$this->view->show("form/result", $sonuc);
	}

	function updData($id = "0")
	{
		if($id == "0"){
			header("Location: " . URL);
			exit();
		}
		$sonuc = $this->model->getData("ogrenci", "where id=" . $id);
		$this->view->show("form/update", $sonuc);
	}

	function updDataResult()
	{
		$ad = $this->form->get("ad")->isEmpty();
		$soyad = $this->form->get("soyad")->isEmpty();
		$yas = $this->form->get("yas")->isEmpty();
		$id = $this->form->get("kayitid")->isEmpty();

		if (!empty($this->form->error)) {
			$this->view->show("form/result", $this->form->error);
		} else {
			$result = $this->model->updData("ogrenci", array("ad", "soyad", "yas"), array($ad, $soyad, $yas), "id=" . $id);

			$this->view->show("form/result", $result);
		}
	}

	function searchData()
	{
		$kelime = $this->form->get("kelime")->isEmpty();

		if (!empty($this->form->error)) {
			$this->view->show("form/sonuc", $this->form->error);
		} else {
			$sonuc = $this->model->searchData("ogrenci", "ad LIKE '%" . $kelime . "%' or soyad LIKE '%" . $kelime . "%'");

			$this->view->show("form/get", $sonuc);
		}
	}
}
