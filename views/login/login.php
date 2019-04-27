
<html>
    <link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />
    <form action="" method="POST" class="w3-container" enctype="multipart/form-data">
     <h2>
        <?php if(isset($error)) {
            echo "Login details are incorrect, please try again...";
        } else {
            echo "Fill in the following form to login:";
        }
        ?>
    </h2>
        
    <p>
        <label>Username</label> &nbsp; &nbsp; 
        <input class="w3-input" type="text" name="username" required autofocus>
        
    </p>
        <p>
        <label>Email</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        <input class="w3-input" type="text" name="email" required autofocus>
        
    </p>
        <p>
        <label>Password</label> &nbsp; &nbsp; 
        <input class="w3-input" type="password" name="password" required>
        
    </p>
    <br> 
  <p>
    <input class="w3-btn w3-pink" type="submit" value="Login">
  </p>
</form>
</html>
