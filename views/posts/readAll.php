

<?php foreach($posts as $post) { ?>
  <p>
  <center> <h1>   <?php echo $post->title; ?> &nbsp; &nbsp; </h1>
    <?php echo $post->content; ?> &nbsp; &nbsp; <br>
    <a href='?controller=post&action=read&id=<?php echo $post->id; ?>'>View post</a> &nbsp; &nbsp;
    <a href='?controller=post&action=delete&id=<?php echo $post->id; ?>'>Delete post</a> &nbsp; &nbsp;
    <a href='?controller=post&action=update&id=<?php echo $post->id; ?>'>Update post</a> &nbsp;
  </p>
<?php } ?>
</center>