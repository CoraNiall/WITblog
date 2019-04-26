<!DOCTYPE html>
<html lang="en">
<link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />
<body>
    <div >
        
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

        echo "<div class='alert alert-info'>";
        echo "<strong> Hi " . $_SESSION['username'] . ", welcome back!</strong>";
        echo "</div>";
        ?>
            
        </div>
        <p>Your profile details:</p>
        <p>Email:       <?php echo $user->email; ?></p>
        <p>Username:    <?php echo $user->username; ?></p>
        <p>Password:    <?php echo $user->password; ?></p>

    <p>
        <a href='?controller=login&action=editProfile' class="btn btn-warning">Edit your Profile</a>
        <!--<a href='?controller=login&action=logout' class="btn btn-danger">Sign Out of Your Account</a>-->
    </p>
</body>
</html>




