




<center>
    <p>Post ID: <?php echo $post->id; ?></p>
    <h1><p> <?php echo $post->title; ?></p> </h1>
    <p>Content: <?php echo $post->content; ?></p>
    <?php if($post->comments):
        foreach($post-> comments as $key => $value):?>
    
      <?php      // Need to edit this so it outputs a nicely formated comment box ?>
    
            <p><?php echo $post->comments[$key]->content; ?> </p>
            
            
            
            
            
        <?php endforeach; ?>
    <?php endif; ?>

   <?php
   // Instead of just printing one of the comments here, should call the getComments method to print all comments?
   // Or could do a for loop to reference i instead of the array key
   //$post is aware of the fact that it now has comments because they have been bound to it
   //all of these $post->variables need to be methods
   ?>
   
    <?php
    $file = 'views/images/' . $post->title . '.jpeg';
    if (file_exists($file)) {
        $img = "<img src='$file' width='150' />";
        echo $img;
    } else {
        echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
    }
    ?>

</center>

<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-6">
        <form class="form-horizontal" action="?controller=comment&action=addComment&id=<?php echo $post->id;?>" method="POST">
            <div class="form-group">
                <label class="col-lg-3 control-label">Add Comment</label>
                <div class="col-lg-9">
                    <textarea class="form-control" rows="5" cols="10" name="content" placeholder="Comment here"></textarea>
                </div>
            </div>
            <input type="submit" name="comment" value="Add Comment" class="btn btn-primary">
        </form>
    </div>
</div>
