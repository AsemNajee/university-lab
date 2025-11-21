<?php

class PostModel extends Database {
    public function __construct(){
        parent::__construct('posts');
    }
}