<?php

class kayit extends Controller
{


	function __construct()
	{
		parent::__construct();

		$this->modelUpdate('kayit');
	}

	function kayitekle()
	{
		$this->view->show("form/index");
	}

	function addData()
	{
		$ad = $this->form->get("ad")->isEmpty();
		$soyad = $this->form->get("soyad")->isEmpty();
		$yas = $this->form->get("yas")->isEmpty();

		if (!empty($this->form->error)) {
			$this->view->show(
				"form/sonuc",
				$this->form->error,
				$this->bilgi->hata(false, "/kayit/kayitekle")
			);
		} else {
			$sonuc = $this->model->addData("ogrenci", array("ad", "soyad", "yas"), array($ad, $soyad, $yas));

			$this->view->show("form/sonuc", $sonuc);
		}
	}

	function listele()
	{

		$sonuc = $this->model->getData("ogrenci", "order by id desc");
		$this->view->show("form/listele", $sonuc);
	}

	function kayitsil($id)
	{

		$sonuc = $this->model->delData("ogrenci", "id=" . $id);
		$this->view->show("form/sonuc", $sonuc);
	}

	function kayitguncelle($id)
	{

		$sonuc = $this->model->getData("ogrenci", "where id=" . $id);
		$this->view->show("form/guncelle", $sonuc);
	}

	function guncelleson()
	{
		$ad = $this->form->get("ad")->isEmpty();
		$soyad = $this->form->get("soyad")->isEmpty();
		$yas = $this->form->get("yas")->isEmpty();
		$id = $this->form->get("kayitid")->isEmpty();

		if (!empty($this->form->error)) {
			$this->view->show("form/sonuc", $this->form->error);
		} else {
			$result = $this->model->updData("ogrenci", array("ad", "soyad", "yas"), array($ad, $soyad, $yas), "id=" . $id);

			$this->view->show("form/sonuc", $result);
		}
	}

	function arama()
	{
		$kelime = $this->form->get("kelime")->isEmpty();

		if (!empty($this->form->error)) {
			$this->view->show("form/sonuc", $this->form->error);
		} else {
			$sonuc = $this->model->searchData("ogrenci", "ad LIKE '%" . $kelime . "%' or soyad LIKE '%" . $kelime . "%'");

			$this->view->show("form/listele", $sonuc);
		}
	}
}
