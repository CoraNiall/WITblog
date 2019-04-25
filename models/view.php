<?php
require_once('models/post.php');

function mostViewed() {
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM (SELECT p.* , COUNT(v.id) as views FROM post as p left join view v on p.id=v.post_id group by p.id,p.content,p.user_id,p.title,p.post_date,p.location) AS A ORDER BY VIEWS DESC LIMIT 1;");

        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['title'], $post['content']);
        }
        return $list;
    }