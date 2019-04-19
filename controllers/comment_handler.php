<?php

if(isset($_POST['content'])&& $_POST['content']!=""){
        $filteredContent = filter_input(INPUT_POST,'content', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
// used $comment to capture filteredContent so that $content not duplicated in comment.php    
$content = $filteredContent;
$controller = 'comment';
$action = 'create';

echo $content;
require_once '../routes.php';
//MP when I take out this include of routes.php it stops putting the comment in the database
//MP when I leave it in, the links all break because for some reason they have controllers/comment_handler.php inserted into the URL
//MP need to work out why it's doing that!
      