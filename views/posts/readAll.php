

<link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />

<?php foreach ($posts as $post) { ?>


    <section class="post-content-section">
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
    </section>       
<?php } ?>


