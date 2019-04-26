<?php

class likeController {
    
    public function postlike() {
        
        Like::likepost($_GET['id']);
        Like::showpost();
        

           
            require_once 'views/posts/read.php';
           

}

    public function read() {
      // we expect a url of form ?controller=comment&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      try{
      // we use the given id to get the correct post
      $likes = Like::find($_GET['id']);
      require_once('views/posts/read.php');
      }
 catch (Exception $ex){
     return call('pages','error');
 }
    }
}