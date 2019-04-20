<?php

class commentController {
    
    public function addComment() {
        
        
        if(isset($_POST['content'])&& $_POST['content']!=""){
        $filteredContent = filter_input(INPUT_POST,'content', FILTER_SANITIZE_SPECIAL_CHARS);
    }
        $content = $filteredContent;
        $post_id = intval($_GET['id']);
         Comment::add($post_id, $content);
        
         require_once 'index.php';
    }
    public function readAll() {
      // we store all the posts in a variable
      $comments = Comment::all();
      //require_once('views/posts/readAll.php');
    }

    public function read() {
      // we expect a url of form ?controller=comment&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      try{
      // we use the given id to get the correct post
      $comment = Comment::find($_GET['id']);
      require_once('views/posts/read.php');
      }
 catch (Exception $ex){
     return call('pages','error');
 }
    }
    public function create() {
        //require_once 'comment_handler.php';
      // else it's a POST so add to the database and redirect to readAll action
      
            Comment::add();
             require_once('../index.php');
          
      }
      
    }
    /*public function update() {
        
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          if (!isset($_GET['id']))
        return call('pages', 'error');

        // we use the given id to get the correct post
        $post = Post::find($_GET['id']);
      
        require_once('views/posts/update.php');
        }
      else
          { 
            $id = $_GET['id'];
            Post::update($id);
                        
            $posts = Post::all();
            require_once('views/posts/readAll.php');
      }
      
    }
    public function delete() {
            Post::remove($_GET['id']);
            
            $posts = Post::all();
            require_once('views/posts/readAll.php');
      }
      
    }*/
  

    
    
    ?>