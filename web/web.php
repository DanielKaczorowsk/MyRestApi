<?php 
	namespace web;
	use restapi\api;
	use view\index;
	include "../"."SPL_autoload_register.php";
	class web
	{
		public function __construct(){
			$api = new api;
			$data = $api->url('controller/controller.php')
						->controller([index::class, 'home'])
						->method('GET')
						->sendRequest();
			$widz = json_decode($data, true);
			print_r($widz);
		}
	}
	new web;
?>