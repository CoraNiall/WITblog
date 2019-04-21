<?php
  class Comment {
    // we define attributes
    public $id;
    public $date_time;
    public $content;
    public $post_id;
    public $user_id;
    
   
    public function __construct($date_time, $content, $post_id, $user_id) {
      //$this->id    = $id;
      $this->date_time = $date_time;
      $this->content = $content;
      $this->postid = $post_id;
      $this->userid = $user_id;
    }
 //This add() function is used to add a comment and is used in posts/read.php (linked by comment_controller.php)
 //Need to figure out how to autofill user_id, maybe when have sorted out login?
 //For now ADDED user_id into the function and hardcoded the result to marry with our ADMIN user on PK 1 in the database
 //For now hardcoded a $post_id for a post in my database until we work out how to attach post_id   
    public static function add() {
    
        include '../controllers/comment_handler.php';
        require_once '../connection.php';
    $db = Db::getInstance();
    $req = $db->prepare("INSERT INTO comment(content, date_time, user_id, post_id) values (:content, NOW(), :userid, :postid)");
    $req->bindParam(':content', $content);
    $req->bindParam (':userid', $user_id);
    $req->bindParam (':postid', $post_id);
    
    
    
$user_id = 1;
$post_id = 25;
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
      foreach($req->fetchAll() as $comment) {
        $list[] = new Comment($comment['id'], $comment['comment']);
      }
      if($list){
      return $list;
    }
    else {
         throw new Exception('The requested comment could not be found.');
    }
    }
 /* This find($id) function is used to get a specific blog post, used in read.php (linked by post_controller.php)
    public static function find($id) {
      $db = Db::getInstance();
      //use intval to make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM comment WHERE id = :id');
      //the query was prepared, now replace :id with the actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();
if($comment){
      return new Comment($comment['id'], $comment['comment']);
    }
    else
    {
        //replace with a more meaningful exception
        throw new Exception('The requested comment could not be found.');
    }
    }*/
    
/*This update($id) function is used to update a blog post, and is used in update.php (linked by post_controller.php)*/    
public static function update($id) {
    $db = Db::getInstance();
    $req = $db->prepare("Update comment set comment=:comment where id=:id");
    $req->bindParam(':id', $id);
    $req->bindParam(':comment', $comment);
// set title,content,author,postdate,userid parameters and execute
    if(isset($_POST['comment'])&& $_POST['comment']!=""){
        $filteredComment = filter_input(INPUT_POST,'comment', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
$comment = $filteredComment;
$req->execute();
//upload post image if it exists - think this will need editing to enable multiple pictures?
       // if (!empty($_FILES[self::InputKey]['name'])) {
	//	Post::uploadFile($title);
	//}
    }
 
//upload post image
//Post::uploadFile($title);
    
//changed the slashes here from \ to /
    
//const AllowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
//const InputKey = 'myUploader';
//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
//public static function uploadFile(string $title) { 
/*	if (empty($_FILES[self::InputKey])) {
		//die("File Missing!");
                trigger_error("File Missing!");
	}
	if ($_FILES[self::InputKey]['error'] > 0) {
		trigger_error("Handle the error! " . $_FILES[self::InputKey]['error']);
	}
	if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
		trigger_error("Handle File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
	}
//changed the $path location  - implfied it to only views/images/
	$tempFile = $_FILES[self::InputKey]['tmp_name'];
        $path = "views/images/";
	$destinationFile = $path . $title . '.jpeg';
	if (!move_uploaded_file($tempFile, $destinationFile)) {
		trigger_error("Handle Error");
	}
		
	//Clean up the temp file
	if (file_exists($tempFile)) {
		unlink($tempFile); 
	}>
}
/*The remove($id) function is used to remove blog posts, is used in readAll.php (linked by product_controller)*/
/*Once have started logins, should make accessible to only admins */
public static function remove($id) {
      $db = Db::getInstance();
      //make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('delete FROM comment WHERE id = :id');
      // the query was prepared, now replace :id with the actual $id value
      $req->execute(array('id' => $id));
  }
  
}
?>