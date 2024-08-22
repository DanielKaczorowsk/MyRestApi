
   $data = $api->url('controller/controller.php') ->this is class Api
						->controller([index::class, 'home']) -> controller
            ->token('') -> no working now
            ->data() ->file
						->method('GET') -> method GET POST PUT DELETE
						->sendRequest();
