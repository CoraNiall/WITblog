<?php
require_once('models/post.php');

class Tag {

    // we define attributes
    public $id;
    public $tag;
    
    public function __construct($id, $tag) {
        $this->id = $id;
        $this->tag = $tag;
    }


// This amended find() function prints out all of the tags where post_id = :id, and loops through them.
// To be used on read post page 
    public static function find($id) {
        $list = [];
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT t.* FROM TAG t LEFT JOIN POSTTAG pt ON t.ID=pt.tag_id WHERE pt.post_id = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        // we create a list of tag objects from the database results

        foreach ($req->fetchAll() as $tag) {
            if ($tag) {
                $list[] = new Tag($tag['id'], $tag['tag']);
            }
        }

        if ($list) {
            return $list;
        }
    }



 public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM tag');
        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $tag) {
            $list[] = new Tag($tag['id'], $tag['tag']);
        }
        return $list;
    }
    
public static function deleteTag($post_id) {
    $db = Db::getInstance();
        
        $req = $db->prepare('delete FROM posttag WHERE post_id = :post_id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('post_id' => $post_id));
}


}