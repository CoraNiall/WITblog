<!DOCTYPE html>
<html lang="en">
<link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />
<body>
    <div class='alert alert-info'>
        <h2> Hi <?php echo $user->username; ?>, welcome back!</h2>
        </div>
    <br>
    <div class='pfimage'>
                <?php 
        $file = 'views/images/profiles/' . $user->username . '.jpeg';
        if(file_exists($file)){
            $img = "<img src='$file' class='pfphoto' width='150' />";
            echo $img;
        }
        else
        {
        echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
        }
        ?>
        </div>
    
        
        
            
       <div class='profile'> 
        <h3>Your profile details:</h3>
        <br/>
        <p>Email:&nbsp;&nbsp;    <?php echo $user->email; ?></p>
        <p>Username:&nbsp;    <?php echo $user->username; ?></p>
        <p>Password:&nbsp;    <?php echo $user->password; ?></p>
       </div>
    <p style='padding-left: 225px;'>
        <a href='?controller=login&action=editProfile' class="btn btn-warning" >Edit your Profile</a>
        <!--<a href='?controller=login&action=logout' class="btn btn-danger">Sign Out of Your Account</a>-->
    </p>
</body>
</html>




