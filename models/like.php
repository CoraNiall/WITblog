<?php


require_once('models/post.php');

class like {
    
    
    // we define 2 attributes
    public $id;
    public $post_id;
    
    
    public function __construct($id, $post_id) {
        $this->id    = $id;
        $this->post_id  = $post_id;
        
    }
 // function to allow users to like the post   
    public static function likepost($id) {
         $db = Db::getInstance();
         $post_id = intval($id);
         $req = $db->prepare("INSERT INTO likes (post_id) values (:post_id)");
         
         
     $req->execute(array('post_id' => $post_id));     
}

// function to show the post on the page
    public static function showpost() {
        $post = Post::find($_GET['id']);
      require_once('views/posts/read.php');
    }
    
// function to find the likes on a specific post    
        public static function find($id) {
        $list = [];
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $post_id = intval($id);
        $req = $db->prepare('SELECT * FROM likes WHERE post_id = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute ( array('id' => $id));
       
        
        // we create a list of Post objects from the database results

        foreach ($req->fetchAll() as $likes) {
            if ($likes) {
                $list[] = new Like($likes['post_id'], $likes['id']); 
            }
        }

        if  ($list) {
            return ($list);
        }
    }
    
    
}