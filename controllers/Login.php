<?php

class Login extends Controller
{


	function __construct()
	{
		parent::__construct();

		$this->modelUpdate('login');
	}

	function Form()
	{
		$this->view->show("form/giris");
	}


	function accountCheck()
	{
		$ad = $this->form->get("ad")->isEmpty();
		$sifre = $this->form->get("sifre")->isEmpty();


		if (!empty($this->form->error)){
			// bir hata var demektir.

			$this->view->show(
				"form/sonuc",
				$this->form->error,
				$this->bilgi->hata(false, "/login/Form")
			);
		}else{
			$result = $this->model->accountCheck("panel", "ad='$ad' and sifre='$sifre'");

			if ($result == 1){
				header("Location:" . URL . "panel");
			}else{
				$this->view->show(
					"panel/sonuc",
					$this->form->error,
					$this->bilgi->hata("Eşleşme yok", "/login/Form")
				);
			}

		}
	}
}
