<?php 

$url = parse_url($_SERVER['REQUEST_URI']); // return an array of two keys ['path' => '/route', 'query'=> 'key=value']
$route = $url['path'];
$method = $_SERVER['REQUEST_METHOD'];


if($route === '/posts'){
    PostController::index();
}else

if($route === '/posts/store' and $method === 'POST'){
    PostController::store();
}else

if($route === '/posts/delete'){
    PostController::destroy();
}else

if($route === '/posts/create'){
    PostController::create();
}else {
    echo 'Page Not found 404';
}


