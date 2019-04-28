


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
        <p class="blogHeading"><b>A Coding Tale</b>
        <h5><span class="w3-opacity">April 7, 2019</span></h5></p>
    </div>

    <div class="w3-container">
      <p>When I applied for this course I had almost no idea of what to expect. I knew I'd be learning PHP, but after a couple of codeAcademy courses on HTML and CSS this didn't mean a whole lot. I also knew someone who had done it the year before and who had come from a similar educational background and she only had good things to say and convinced me it was worth applying.
</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border" ><a href='?controller=post&action=read&id=33'>READ MORE »</a></button></p>
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
       <p class="blogHeading"><b>Making Toast</b>
      <h5><span class="w3-opacity">April 2, 2019</span></h5>
    </div>

    <div class="w3-container">
      <p>With the decorations packed away and memories of family time and festivities fading, the second Monday of January saw me and fifteen other women arrive on a chilly morning for the first day of our Get Into Tech course at Sky’s offices at Leeds Dock. Despite being only a week before Blue Monday, in what is typically dubbed as one of the most depressing weeks of the year, the nervous excitement was palpable.</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
            <p><button class="w3-button w3-padding-large w3-white w3-border"><a href='?controller=post&action=read&id=35'><b>READ MORE »</a></b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-badge">2</span></span></p>
        </div>
      </div>
    </div>
  </div>
<!-- END BLOG ENTRIES -->
</div>
