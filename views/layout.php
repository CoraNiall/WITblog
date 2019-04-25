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
                        <a class="navbar-brand" href='?controller=pages&action=home'>W.I.T Blog</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href='?controller=pages&action=home'>Home</a></li>
                            <li><a href='?controller=post&action=readAll'>All Posts</a></li>
                            <li><a href='?controller=post&action=create'>Create Post</a></li>
                            <li> <a href="#">Search</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Authors <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Melanie</a></li>
                                    <li><a href="#">Caroline</a></li>
                                    <li><a href="#">Jessie</a></li>
                                    <li><a href="#"> Laura</a></li>
                                    <li><a href="#">Tasha</a></li>

                                </ul>
                            </li>
                        </ul> 

                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="./"> Topics <span class="sr-only">(current)</span></a></li>
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
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                      
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
        </div>
        <br>
        <div>
            <section class="banner-section">
                <div class="w3-content">
                    <img class="mySlides"  src="https://www.snipp.com/wp-content/uploads/2018/12/Women-in-tech-blog-banner.png" alt="custom_html_banner1" width="99%" height="250em" >
                </div>
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
                        <center> <h2>About Author</h2> </center>
                        <img src="" class="img-rounded" />
                        <p> </p>
                        <center>    <a href="#" class="btn btn-default">Read more</a> </center>
                    </div>
                    <div class="list-group">
                        <a class="list-group-item active" href="#"> <h4 class="list-group-item-heading"> Name of Group of posts 1</h4> <p class="list-group-item-text"></p> </a>
                        <a class="list-group-item" href="#"> <h4 class="list-group-item-heading"> Name of Group of posts 2 </h4> <p class="list-group-item-text"></p> </a>
                        <a class="list-group-item" href="#"> <h4 class="list-group-item-heading">Name of Group of posts 3 </h4> <p class="list-group-item-text"></p> </a> </div>
                    <div class="well">
                        <div class="media"> <div class="media-left"> <a href="#"> <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTY5MjIxZTM1NSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjkyMjFlMzU1Ij48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true"> </a> </div> <div class="media-body"> <h4 class="media-heading">Media heading</h4></div> </div>
                        <div class="media"> <div class="media-left"> <a href="#"> <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTY5MjIxZTM1NSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjkyMjFlMzU1Ij48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true"> </a> </div> <div class="media-body"> <h4 class="media-heading">Media heading</h4> </div> </div>
                        <div class="media"> <div class="media-left"> <a href="#"> <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTY5MjIxZTM1NSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjkyMjFlMzU1Ij48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true"> </a> </div> <div class="media-body"> <h4 class="media-heading">Media heading</h4> </div> </div>
                    </div>
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