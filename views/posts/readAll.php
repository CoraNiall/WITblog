
<link rel = "stylesheet" type = "text/css" href = "/MVC_Skeleton_testingGround/views/css/styles.css" /> 
<?php foreach($posts as $post) { ?>

<section class="post-content-section">
    <div class="container">

       
            <div class="col-lg-12 col-md-12 col-sm-12 post-title-block">
               
                <center>  <h1 class="text-center"> <?php echo $post->title; ?> </h1> </center>
               
                </ul>
            </div>
<p> </p>

  <p>
  <center> 
    <?php echo $post->content; ?> &nbsp; &nbsp; <br>
    <a href='?controller=post&action=read&id=<?php echo $post->id; ?>'>View post</a> &nbsp; &nbsp;
    <a href='?controller=post&action=delete&id=<?php echo $post->id; ?>'>Delete post</a> &nbsp; &nbsp;
    <a href='?controller=post&action=update&id=<?php echo $post->id; ?>'>Update post</a> &nbsp;
  </p>
<?php } ?>
  </center>