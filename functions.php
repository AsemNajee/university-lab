<?php

// "controllers/PostController.php"
function base_path($path){
    return __DIR__ . '/' . $path;
}

function view($path){
    return base_path('views/' . $path);
}