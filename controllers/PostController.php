<?php

class PostController
{
    /**
     * View all posts
     */
    public static function index()
    {
        $posts = new PostModel()->getAll();
        require view('show-all-posts.php');
    }

    /**
     * Show the form of create new posts
     */
    public static function create()
    {
        require view('add-post.php');
    }

    /**
     * Recept the data from the form of create new post
     * and store it in the database
     */
    public static function store()
    {
        $content = $_POST['content'];

        if (strlen($content) > 3) {
            echo 'content must be less than 1000 char';
            exit;
        }

        $post = new PostModel();
        if($post->create(['content'=> $content])){
            echo 'post added';
        }else{
            echo 'error not created';
        }
    }

    /**
     * Delete post
     */
    public static function destroy(){
        if(!isset($_GET['id'])){
            echo 'send id of the post to delete';
            return;
        }

        $id = $_GET['id'];
        if(new PostModel()->delete($id)){
            echo 'posts deleted';
        }else{
            echo 'error not deleted';
        }
    }
}
