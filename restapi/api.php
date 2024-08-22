<?php 
namespace restapi;

	class api implements ApiInterface
	{
		protected $query;
		protected function reset(): void
		{
		$this->query = new \stdClass();
		}
		public function url($url):	ApiInterface
		{
			$this->reset();
			$this->query->url = 'http://localhost/'.$url;
			return $this;
		}
		public function token($token):	ApiInterface
		{
			$this->query->token = $token;
			return $this;
		}
		public function controller(array $controller):	ApiInterface
		{
			$this->query->controller = $controller;
			return $this;
		}
		public function data($data):	ApiInterface
		{
			$this->query->data = $data;
			return $this;
		}
		public function method($method): ApiInterface
		{
			$this->query->method = $method;
			return $this;
		}
		public function sendRequest()
		{
			if(isset($this->query->controller))
			{
				[$controller,$function] = $this->query->controller;
				$controllerInstance = new $controller;
				$data = $controllerInstance->{$function}();
				$this->query->data = $data;
			}
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $this->query->token ));
			curl_setopt($ch, CURLOPT_URL, $this->query->url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			if($this->query->method === 'GET')
			{
				curl_setopt($ch, CURLOPT_HTTPGET, true);
			}
			else if($this->query->method === 'POST')
			{
				curl_setopt($ch, CURLOPT_POST,true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->query->data));
			}
			else if ($this->query->method === 'PUT')
			{
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST,	'PUT');
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->query->data));
			}
			else if ($this->query->method === 'DELETE')
			{
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
			}
			//$_SESSION[$this->query->token];
			$response = curl_exec($ch);
			$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
			$error = curl_error($ch);
			curl_close($ch);
			 if ($error !== '') {
			throw new \Exception($error);
			}
			return json_encode(['response'=>$response,'http_code'=>$httpCode]);
		}
	}