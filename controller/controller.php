<?php 
	namespace controller;
	use Model\Dane as dane;
	include "../"."SPL_autoload_register.php";
	
	class controller
	{
		public function __construct()
		{
			$dane = new dane;
			$dane = $dane->allData();
			$data = ['xd','dx'];
			print_r($dane);
		}
		public function home()
		{
			return 'hellow world';
		}
	}
	new controller;
?>