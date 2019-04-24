<link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />


<div class="homepage">
    
    <p> Welcome to our blog <p>
    
    
    
</div>


<p>Hello there <?php if (!empty($_SESSION)) {echo $_SESSION['username'];
            }else {echo"Guest";} ?>!<p>
<p>This is now the home page for the W.I.T Final Project Blog</p>
<p>This is an adaptation of the MVC Skeleton Application</p>