<?php

class Database extends PDO
{


	protected $array = array();
	protected $arrayTwo = array();
	protected $bilgi;


	function __construct()
	{
		parent::__construct('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=' . DB_PORT . ';charset=utf8', DB_USER, DB_PASS);
		$this->bilgi = new Bilgi();
	}


	function addData($tableName, $columnName, $datas)
	{

		$sutunsayi = count($columnName);
		for ($i = 0; $i < $sutunsayi; $i++) :
			$this->array[] = '?';
		endfor;

		$sonVal = join(",", $this->array);
		$sonhal = join(",", $columnName);

		$sorgu = $this->prepare('insert into ' . $tableName . ' (' . $sonhal . ') VALUES(' . $sonVal . ')');


		if ($sorgu->execute($datas)) {
			return $this->bilgi->basarili("EKLEME BAŞARILI", "/kayit/kayitekle");
		} else {
			return $this->bilgi->hata("VERİ TABANI HATASI", "/kayit/kayitekle");
		}
	} // Added Data

	function getData($tabloisim, $arg = false)
	{

		if ($arg == false) {
			$myQuery = "select * from " . $tabloisim;
		} else {
			$myQuery = "select * from " . $tabloisim . " " . $arg;
		}

		$result = $this->prepare($myQuery);
		$result->execute();

		return $result->fetchAll();
	}

	function delData($tableName, $arg)
	{
		$myQuery = $this->prepare("delete from " . $tableName . ' where ' . $arg);

		if ($myQuery->execute()) {
			return $this->bilgi->basarili("SİLME BAŞARILI", "/kayit/listele");
		} else {
			return $this->bilgi->hata("VERİ TABANI HATASI", "/kayit/listele");
		}
	}


	function updData($tableName, $columns, $datas, $arg)
	{
		foreach ($columns as $val) {
			$this->arrayTwo[] = $val . "=?";
		}

		$resultColumn = join(",", $this->arrayTwo);

		$sorgum = $this->prepare("update " . $tableName . " set " . $resultColumn . " where " . $arg);


		if ($sorgum->execute($datas)){
			return $this->bilgi->basarili("GÜNCELLEME BAŞARILI", "/kayit/listele");
		}else{
			return $this->bilgi->hata("VERİ TABANI HATASI", "/kayit/listele");

		}
	}


	function searchData($tableName, $arg)
	{
		$myQuery = "select * from " . $tableName . " where " . $arg;

		$result = $this->prepare($myQuery);
		$result->execute();

		return $result->fetchAll();
	}



	function accountCheck($tableName, $arg)
	{
		// burda ciddi işler var 

		$myQuery = "select * from " . $tableName . " where " . $arg;
		$result = $this->prepare($myQuery);
		$result->execute();

		if ($result->rowCount() > 0){
			Session::init();
			Session::set("kulad", true);
		}

		return $result->rowCount();
	}
}
