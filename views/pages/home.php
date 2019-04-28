


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />

<?php require_once('models/view.php');

$post = MostViewed()[0];?>


<div class="homepage">

    <p> Welcome to our blog <p>
    <p> <?php
        if (!empty($_SESSION)) {
            echo $_SESSION['username'];
        } else {
            echo"Guest";
        }
        ?>!</p>


</div>



<div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="views/images/standard/CarouselsOne.jpg" alt="Chania">
            <div class="carousel-caption">
                <h3>Women in Tech</h3>
                <p>2019 Cohort</p>
            </div>
        </div>

        <div class="item">
            <img src="views/images/standard/Carousel2.jpg" alt="Chicago">
            <div class="carousel-caption">
                <h3>Women in Tech</h3>
                <p>Team TLC</p>
            </div>
        </div>

        <div class="item">
            <img src="views/images/standard/CarouselFour.jpeg" alt="New York">
            <div class="carousel-caption">
                <h3>Women in Tech</h3>
                <p>Renee and the 2019 Get Into Techers</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>


<div class="mx-auto bg-warning" style="width:850px; text-align: center">
<div class="panel panel-default">

    <h3>Currently, the most viewed post is...</h3>
    <h4> <?php echo $post->title; ?></h4>

</div>
</div>


<div class="w3-content" style="max-width:1400px">


<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
        <p class="blogHeading"><b>Hodor</b>
        <h5><span class="w3-opacity">April 7, 2014</span></h5></p>
    </div>

    <div class="w3-container">
      <p>Hodor! Hodor hodor. Hodor hodor! Hodor, hodor. Hodor. Hodor. Hodor hodor! Hodor hodor HODOR! Hodor.

        Hodor, hodor, hodor hodor. Hodor? Hodor, hodor. Hodor. Hodor. Hodor? Hodor hodor. Hodor hodor! Hodor... Hodor hodor. Hodor hodor! Hodor hodor HODOR! Hodor.

        Hodor! Hodor hodor. Hodor, hodor, hodor hodor. Hodor hodor! Hodor hodor!

        HODOR HODOR! Hodor? 
</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border" ><a href='?controller=post&action=read&id=<?php echo $post->id; ?>'>READ MORE »</a></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-tag">0</span></span></p>
        </div>
      </div>
    </div>
  </div>
  <hr>

  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
       <p class="blogHeading"><b>TITLE HEADING</b>
      <h5><span class="w3-opacity">April 2, 2014</span></h5>
    </div>

    <div class="w3-container">
      <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed
        tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-badge">2</span></span></p>
        </div>
      </div>
    </div>
  </div>
<!-- END BLOG ENTRIES -->
</div>
