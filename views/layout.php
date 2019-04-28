<!DOCTYPE html>
<?php
session_start();
?>

<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel = "stylesheet" type = "text/css" href = "css/styles.css" />
        <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>

    <body>
        <div>
            <nav class="navbar navbar-inverse  navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href='?controller=pages&action=home'>T.L.C Blog</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href='?controller=post&action=readAll'>All Posts</a></li>
                            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION ['role_id'] == 1)) { ?>
                            <li><a href='?controller=post&action=create'>Create Post</a></li>
                            <?php } else { ?>
                            
                            <?php } ?>
                         
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Authors <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?controller=post&action=readuser&user_id=16">Melanie</a></li>
                                    <li><a href="?controller=post&action=readuser&user_id=19">Caroline</a></li>
                                    <li><a href="?controller=post&action=readuser&user_id=18">Jessie</a></li>
                                    <li><a href="?controller=post&action=readuser&user_id=1"> Laura</a></li>
                                    <li><a href="?controller=post&action=readuser&user_id=17">Tasha</a></li>

                                </ul>
                            </li>
                        </ul> 

                        <ul class="nav navbar-nav navbar-right">
                            
                            <?php
                            //check if user was logged in
                            //if so, show "Account" and "Logout" options
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['role_id'] == 2|| $_SESSION ['role_id'] == 1)) {
                                ?>
                                    <li><a href='?controller=login&action=logout'>Logout</a></li>
                                    <li><a href='?controller=login&action=userProfile'>Account</a></li>

                                <?php
                            } else {
                                ?>
                                    <li><a href='?controller=login&action=login'>Login</a></li>
                                    <li><a href='?controller=login&action=register'>Register</a></li>
                                <?php
                            }
                            ?>
                            <li><a href="https://www.facebook.com/Women-in-Tech-405416833371860/?view_public_for=405416833371860" class="fa fa-facebook"></a></li>
                            <li><a href="https://twitter.com/blog_wit" class="fa fa-twitter"></a></li>
                            <li><a href="https://www.instagram.com/wit_blog/" class="fa fa-instagram"></a></li>
                      
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
        </div>
        <br>
        <div>
            <section class="banner-section">
               
                    <img class="mySlides"  src="https://www.snipp.com/wp-content/uploads/2018/12/Women-in-tech-blog-banner.png" alt="custom_html_banner1" width="70%" height="250em" >
 
            </section>
        </div>
        <br>
        <br>
        <br>
        <div class="container">

            <div class="row">

                <div class="col-lg-3  col-md-3">

                    <div class="well">
                        <form action="?controller=post&action=search" method="POST" enctype="multipart/form-data">
                            <center> <h2>Search for a post</h2> </center> <br>

                            <p> Select a tag to return related posts</p> <br>
                            <div class ="form-group">
                                <select name="tag" class="form-control" id="sel2">
                                    <?php
                                    foreach ($tags as $tag) {
                                        echo "<option value=" . $tag->id . ">" . $tag->tag . "</option>";
                                    }
                                    ?>
                                </select>

                                <div>
                                    <br>
                                </div>

                                <span class="input-group-btn">
                                    <input class="btn btn-default" type="submit" value="Go!">
                                </span>
                            </div>
                        </form>
                        <div> 
                            <br> 
                        </div>
                        <form action="?controller=post&action=searchTitle" method="POST" enctype="multipart/form-data">
                        <p> Or search by title</p> <br>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Insert a title..." name="input">
                            <span class="input-group-btn">
                                <input class="btn btn-default" type="submit" value="Go!">
                            </span>
                        </div>
                        </form>
                    </div>

                    <div class="well">
                        <center> <h2>Become a Registered user!</h2> </center> <br>
                        <ul class="list-inline">
                            <p> - Save your favourite posts!</p> 
                            <p> - Receive notifications when there's a new post! </P>
                            <p> - Give your opinion on our posts! </p> <br>
                            <center> <a href='?controller=login&action=register' class="btn btn-default">Sign up Here!</a> </center>
                        </ul>
                    </div>
                    <div class="well">
                        <center> <h2>About  the Authors</h2> 
                        <img src="" class="img-rounded" />
                        <p> Jessie -> </p>
                        <p> Melanie -> </p>
                        <p> Laura -> </p>
                        <p> Tasha -> </p>
                        <p> Caroline -> </p>
                        </center>
                    </div>
                    <div class="list-group">
                        <a class="list-group-item" href='?controller=post&action=searchTags&tag=2' method='GET' name='tag'> <h4 class="list-group-item-heading"> Women in Tech</h4> <p class="list-group-item-text"></p> </a>
                        <a class="list-group-item"  href='?controller=post&action=searchTags&tag=14' method='GET' name='tag'> <h4 class="list-group-item-heading"> Got Skills? </h4> <p class="list-group-item-text"></p> </a>
                        <a class="list-group-item"  href='?controller=post&action=searchTags&tag=1' method='GET' name='tag'> <h4 class="list-group-item-heading">Top Tech </h4> <p class="list-group-item-text"></p> </a> </div>

                </div>
                <div class="col-lg-9  col-md-9">
                    <?php require_once('routes.php'); ?>
                </div>
            </div>
            <div class="row">
                <footer>


                    <center>    Copyright &COPY; <?= date('Y'); ?> </center>
                </footer>
            </div>
        </div>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>