<?php
require_once('models/post.php');

class Comment {

    // we define attributes
    public $id;
    public $date_time;
    public $content;
    public $post_id;
    public $user_id;

    public function __construct($id, $date_time, $content, $post_id, $user_id) {
        $this->id = $id;
        $this->date_time = $date_time;
        $this->content = $content;
        $this->post_id = $post_id;
        $this->user_id = $user_id;
    }
    
    public static function showpost() {
        $post = Post::find($_GET['id']);
      require_once('views/posts/read.php');
    }
    
    
    //This add() function is used to add a comment and is used in posts/read.php (linked by comment_controller.php)
    //Need to figure out how to autofill user_id, maybe when have sorted out login?
    //For now ADDED user_id into the function and hardcoded the result to marry with our ADMIN user on PK 1 in the database
    //For now hardcoded a $post_id for a post in my database until we work out how to attach post_id   
    public static function add($post_id, $content) {
//tried to include post_id through GET id in addComment method in commentController - URL now showing controller=comment&action=addComment&id=postid
        $db = Db::getInstance();
        //$post_id = intval($id);
        $req = $db->prepare("INSERT INTO comment(content, date_time, user_id, post_id) values (:content, NOW(), :userid, :postid)");
        $req->bindParam(':content', $content);
        $req->bindParam(':userid', $user_id);
        $req->bindParam(':postid', $post_id);




        $user_id = 1;
        //$post_id = 25;

        $req->execute();
   
    }

    
    
    
// This amended find() function prints out all of the comments where post_id = :id, and loops through them.
// To be used on read post page 
    public static function find($id) {
        $list = [];
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM comment WHERE post_id = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        // we create a list of Post objects from the database results

        foreach ($req->fetchAll() as $comment) {
            if ($comment) {
                $list[] = new Comment($comment['id'], $comment['date_time'],$comment['content'],$comment['post_id'],$comment['user_id']); 
            }
        }

        if ($list) {
            return $list;
        }
    }

}