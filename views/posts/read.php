<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>



<div class="text-center">

    <h1><p> <?php echo $post->title; ?></p> </h1>

</div>

<div>
    <div>
        <p class="blog"><?php echo $post->content; ?></p>
    </div>
</div>

<div>
    <div><svg viewBox="0 0 8 8"><use xlink:href="#location"></use></svg>
        <p><span class="glyphicon glyphicon-map-marker"><?php echo $post->location; ?></span></p>
    </div>
</div>

<div>
    <div>
        <p><?php echo $post->views; ?> views!</p>
    </div>
</div>

  <div>
      <table class="tags"> Tags:
<?php
if ($post->tag):
    foreach ($post->tag as $key => $value):
        ?>
        <p><?php echo $post->tag[$key]->tag; ?> </p>

   <?php endforeach; ?>
<?php endif; ?>
      </table>
</div>

<?php
if ($post->comments):
    foreach ($post->comments as $key => $value):
        ?> 
        <p><?php echo $post->comments[$key]->content; ?> </p>

    <?php endforeach; ?>
<?php endif; ?>

<?php

$file = 'views/images/' . $post->title . '.jpeg';
if (file_exists($file)) {
        $img = "<img src='$file' width='150' />";
    echo $img;
} else {
    echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
}
?>



<div class="row">
    <div class="col-lg-6">
        <form class="form-horizontal" action="?controller=comment&action=addComment&id=<?php echo $post->id; ?>" method="POST">
            <div class="form-group">
                <label class="col-lg-3 control-label">Comment</label>
                <div class="col-lg-9">
                    <textarea class="form-control" rows="5" cols="10" name="content" placeholder="Comment here"></textarea>
                </div>
            </div>
            <input type="submit" name="comment" value="Add Comment" class="btn btn-primary" >
        </form>
    </div>
</div>

