<?php
namespace restapi;
    interface ApiInterface
    {
        public function url($url):  ApiInterface;

        public function token($token):  ApiInterface;

        public function controller(array $controller):	ApiInterface;

        public function data($data):    ApiInterface;
        
        public function method($method): ApiInterface;

        public function sendRequest();
    }
    ?>