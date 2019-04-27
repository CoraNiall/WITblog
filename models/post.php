<?php

require_once('models/comment.php');
require_once('models/tag.php');
require_once('models/like.php');

class Post {

    // we define 3 attributes
    public $id;
    public $title;
    public $content;
    public $post_date;
    public $comments;
    public $tag;
    public $location;
    public $views;
    public $likes;

    //public $userid;

    public function __construct($id, $title, $content, $post_date = false, $comments = false, $tag = false, $location = false, $views = false, $likes=false) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->post_date = $post_date;
        $this->comments = $comments;
        $this->tag = $tag;
        $this->location = $location;
        $this->views = $views;
        $this->likes = $likes;
        //$this->userid = $userid;
    }
    
    public static function addView($id) {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO view(post_id) VALUES(:post_id);");
        $req->bindParam(':post_id', $post_id);
        
        $post_id = $id;

        $req->execute();
    }
    
    public static function getViews($id) {
        $db = Db::getInstance();
        $req = $db->prepare("SELECT COUNT(id) as total_views FROM view WHERE post_id=:post_id;");
        $req->bindParam(':post_id', $post_id);
        
        $post_id = $id;
        
        $req->execute();
        $list=[];
        foreach ($req->fetchAll() as $view) {
            array_push($list,$view);
        }
        
        return $list[0][0];
        
       
        
    }
    
     public static function tagsSearch($tagid) {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare("SELECT p.* FROM post as p LEFT JOIN POSTTAG as pt on p.id=pt.post_id where pt.tag_id=:TAG_ID");
        $req->bindParam(':TAG_ID', $tagid);
        
        $req->execute(array ('TAG_ID'=>$tagid));
        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['title'], $post['content'],$post['location']);
        }
        return $list;
    }
    
    
    public static function postSearch() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare("SELECT p.* FROM post as p LEFT JOIN POSTTAG as pt on p.id=pt.post_id where pt.tag_id=:TAG_ID");
        $req->bindParam(':TAG_ID', $tagid);
        
        $tagid = $_POST['tag'];
        $req->execute();
        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['title'], $post['content'],$post['location']);
        }
        return $list;
    }
    
    public static function postSearchTitle() {
        $list = [];
        $db = Db::getInstance();
        
        $req = $db->prepare("SELECT * from POST WHERE TITLE LIKE :input");

        $searchtext = "%{$_POST['input']}%";
        $req->bindParam(':input',$searchtext);

        
        $req->execute();
        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['title'], $post['content'],$post['location']);
        }
        return $list;
    }
    
   


    /* This all() function prints out all of the blog posts, which then are printed in the readAll.php page (linked by post_controller.php) */

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM post');
        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['title'], $post['content'], $post['post_date']);
        }
        return $list;
    }

    /* This find($id) function is used to get a specific blog post, used in read.php (linked by post_controller.php) */

    public static function find($id) {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM post WHERE id = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $post = $req->fetch();

        $comments = Comment::find($id);
        $tag = Tag::find($id);
        $views = Post::getViews($id);
        $likes = Like::find($id);
        
        if ($post['location'] == 'NA' || $post['location'] == 'N/A' || $post['location'] == 'unknown') {
            $locationfiltered = 'Unknown location';
        }
        else {$locationfiltered = $post['location'];
        }
        
        
        if ($post) {
            return new Post($post['id'], $post['title'], $post['content'], $comments, $tag, $locationfiltered,$views, $likes);
        } else {
            //replace with a more meaningful exception
            throw new Exception('The requested post could not be found.');
        }
    }

    /* This update($id) function is used to update a blog post, and is used in update.php (linked by post_controller.php) */

    public static function update($id) {
        $db = Db::getInstance();
        $req = $db->prepare("Update post set title=:title, content=:content where id=:id");
        $req->bindParam(':id', $id);
        $req->bindParam(':title', $title);
        $req->bindParam(':content', $content);

// set title,content,author,postdate,userid parameters and execute
        if (isset($_POST['title']) && $_POST['title'] != "") {
            $filteredTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['content']) && $_POST['content'] != "") {
            $filteredContent = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        $title = $filteredTitle;
        $content = $filteredContent;

        $req->execute();

//upload post image if it exists - think this will need editing to enable multiple pictures?
        if (!empty($_FILES[self::InputKey]['name'])) {
            Post::uploadFile($title);
        }
    }

    /* This add() function is used to add a blog post and, and is used in create.php (linked by post_controller.php) */
    /* Need to figure out how to autofill user_id, maybe when have sorted out login? */
    /* For now ADDED user_id into the function and hardcoded the result to marry with our ADMIN user on PK 1 in the database */

    public static function add() {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into post(title, content, user_id, post_date, location) values (:title, :content, :user_id, NOW(), :location);");
        $req->bindParam(':title', $title);
        $req->bindParam(':content', $content);
        $req->bindParam(':user_id', $user_id);
        $req->bindParam(':location', $location);

// set parameters and execute
        if (isset($_POST['title']) && $_POST['title'] != "") {
            $filteredTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['content']) && $_POST['content'] != "") {
            $filteredContent = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        //echo var_dump($_POST);
        $title = $filteredTitle;
        $content = $filteredContent;
        $user_id = 1;
        
        //Get location of post
        $location = Post::getLocationFromIP();
        
        $req->execute();

//upload post image
        Post::uploadFile($title);

//upload multiple tags
        if(isset($_POST['tag'])) {
        $tag = $_POST['tag'];

        foreach ($tag as $value) {
            Post::addTag($value);
        }
        }   

    }

    public static function addTag($tag_id) {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO POSTTAG(POST_ID,TAG_ID) VALUES((SELECT ID FROM POST WHERE TITLE=:title), :TAG_ID);");
        $req->bindParam(':title', $title);
        $req->bindParam(':TAG_ID', $id);

        if (isset($_POST['title']) && $_POST['title'] != "") {
            $filteredTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        $title = $filteredTitle;
        $id = $tag_id;

        $req->execute();
    }

//changed the slashes here from \ to /

    const AllowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    const InputKey = 'myUploader';

//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
    public static function uploadFile(string $title) {
                
        if (empty($_FILES[self::InputKey])) {
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
                }
        }
    

    /* The remove($id) function is used to remove blog posts, is used in readAll.php (linked by product_controller) */
    /* Once have started logins, should make accessible to only admins */

    public static function remove($id) {
        $db = Db::getInstance();
        //make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('delete FROM post WHERE id = :id');
        // the query was prepared, now replace :id with the actual $id value
        Tag::deleteTag($id);
        Post::deleteViews($id);
        $req->execute(array('id' => $id));
    }
    
    public static function deleteViews($post_id) {
    $db = Db::getInstance();
        
        $req = $db->prepare('delete FROM view WHERE post_id = :post_id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('post_id' => $post_id));
}

    public static function getLocationFromIP() {
        try {
            // Get IP from client if available
            $user_ip = $_SERVER['REMOTE_ADDR'];
            // Make API call to get location of client
            $geoClient = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
            // Make API call to get location of server as a fallback
            $geoServer = unserialize(file_get_contents("http://www.geoplugin.net/php.gp"));
            // If can get location of client, return city and country of client as a string
            if ($geoClient["geoplugin_countryName"] && $geoClient["geoplugin_city"]) {
                $country = $geoClient["geoplugin_countryName"];
                $city = $geoClient["geoplugin_city"];
                return "$city, $country";
                // If can't get location of client, return city and country of the server as a string
            } else if ($geoServer["geoplugin_countryName"] && $geoServer["geoplugin_city"]) {
                $country = $geoServer["geoplugin_countryName"];
                $city = $geoServer["geoplugin_city"];
                return "$city, $country";
            } else {
                return 'Unknown location';
            };
            // Catch block just to make sure that if theres an issue with the API, will always return something
        } catch (Exception $e) {
            return 'Unknown location';
        }
    }

}
?>

