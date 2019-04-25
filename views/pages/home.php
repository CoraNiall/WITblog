

<link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />


<div class="homepage">

    <p> Welcome to our blog <p>



</div>

<div>
    <p>Hello <?php
        if (!empty($_SESSION)) {
            echo $_SESSION['username'];
        } else {
            echo"Guest";
        }
        ?>!<p>
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
            <img src="views/images/standard/CarouselOne.jpg" alt="Chania">
            <div class="carousel-caption">
                <h3>Women in Tech</h3>
                <p>Image number one!</p>
            </div>
        </div>

        <div class="item">
            <img src="views/images/standard/CarouselTwo.jpg" alt="Chicago">
            <div class="carousel-caption">
                <h3>Women in Tech</h3>
                <p>Image number two!</p>
            </div>
        </div>

        <div class="item">
            <img src="views/images/standard/CarouselThree.jpeg" alt="New York">
            <div class="carousel-caption">
                <h3>Women in Tech</h3>
                <p>Image number three!</p>
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
