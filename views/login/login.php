
<html>
    <link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />
    
    <form action="?controller=login&action=login" method="POST" class="w3-container" enctype="multipart/form-data">
    
    <h2>Fill in the following form to login:</h2>
    <br>
    <p>
        <label>Username</label> &nbsp; &nbsp; 
        <input class="w3-input" type="text" name="username" required autofocus>
        
    </p>
        <p>
        <label>Email</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        <input class="w3-input" type="email" name="email" placeholder="youremail@email.com" required autofocus>
        
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
