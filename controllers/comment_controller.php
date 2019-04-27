<?php

class commentController {
    
    public function addComment() {
        
        
        if(isset($_POST['content'])&& $_POST['content']!=""){
        $filteredContent = filter_input(INPUT_POST,'content', FILTER_SANITIZE_SPECIAL_CHARS);
    }
        $content = $filteredContent;
        $post_id = intval($_GET['id']);
        if(isset($_SESSION['username'])&& $_SESSION['username']!=""){
            $username = $_SESSION['username'];
        }   else{
            $username = "Guest";    
            }
         Comment::add($post_id, $content, $username);
         Comment::showpost();
    }
    
    
    public function readAll() {
      // we store all the comments in a variable
      $comments = Comment::all();
      //require_once('views/posts/readAll.php');
    }


}