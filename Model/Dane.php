<?php
	namespace Model;
	use DataBase\Model\MyBasePDO as base;
	class Dane
	{
		private $query,$name,$surname;
	 public function findId($id)
	 {
		 $this->query = new base;
		 $this->query = $this->query->getConnect();
		 $this->query->Select('id')
		 ->From('data')
		 ->Where(["id='".$id."'"])
		 ->getSql();
		 return $query;
	 }
	 public function allData()
	 {
		 $this->query = new base;
		 $this->query->Connect();
		 $this->query = $this->query
		 ->Select(['id','name','surname'])
		 ->From('data')
		 ->getSql();
		 return $this->query;
	 }
	 public function selectData($type,$field)
	 {
		 $this->query = new base;
		 $this->query = $this->query->getConnect();
		 $this->query->Select('id')
		 ->From('data')
		 ->Where(["'".$type."=''".$field."'"])
		 ->getSql();
		 return $query;
	 }
	}
?>