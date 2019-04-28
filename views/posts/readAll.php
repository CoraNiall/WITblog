

<link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />

<?php foreach ($posts as $post) { ?>
<div class="w3-content" style="max-width:1400px">


<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
      <?php

$file = 'views/images/' . trim($post->title). '.jpeg';
if (file_exists($file)) {
        $img = "<img src='$file' width='100%' />";
    echo $img;
} else {
    echo "<img src='views/images/standard/_noproductimage.png' width='100%' />";
}
?>
    <div class="w3-container">
      <h3><b><?php echo $post->title; ?> </b></h3>
      <h5><span class="w3-opacity"><?php echo $formattedDate = date("d F Y", strtotime($post->post_date));?></span></h5>

    </div>

    <div class="w3-container">
      <p><?php echo substr($post->content, 0, 200) . "..."; ?> 
                    &nbsp;
                    &nbsp;</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
           <a class="w3-btn w3-pink" href='?controller=post&action=read&id=<?php echo $post->id; ?>'>Read More</a> &nbsp; &nbsp;
      </div>
    </div>
  </div>
  <hr>
</div>
<?php } ?>

<?php foreach ($posts as $post) { ?>
    <!--<section class="post-content-section">
            <div class="col-lg-12 col-md-12 col-sm-12 post-title-block">

                <center>  <h1 class="text-center"> <?php echo $post->title; ?> </h1> </center>
            </div>
            <center>
                <p class="text">
                <p> <?php echo substr($post->content, 0, 200) . "..."; ?> 
                    &nbsp;
                    &nbsp;</p>
                    <br>
                    <a class="w3-btn w3-pink" href='?controller=post&action=read&id=<?php echo $post->id; ?>'>View post</a> &nbsp; &nbsp;
                    <a href='?controller=post&action=delete&id=<?php echo $post->id; ?>'>Delete post</a> &nbsp; &nbsp;
                    <a href='?controller=post&action=update&id=<?php echo $post->id; ?>'>Update post</a> &nbsp;
                </p>
            </center>
    </section>      --> 
<?php } ?>


