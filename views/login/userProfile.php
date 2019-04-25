<!DOCTYPE html>
<html lang="en">

<body>
    <div class="page-header">
        <?php
        echo "<div class='alert alert-info'>";
        echo "<strong> Hi " . $_SESSION['username'] . ", welcome back!</strong>";
        echo "</div>";
        ?>
        </div>
        <p>Your profile details:</p>
        <p>Email: <?php echo $user->email; ?></p>
        <p>Username: <?php echo $user->username; ?></p>
        <p>Password: <?php echo $user->password; ?></p>
        <?php 
$file = 'views/images/profile' . $user->username . '.jpeg';
if(file_exists($file)){
    $img = "<img src='$file' width='150' />";
    echo $img;
}
else
{
echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
}

?>
    <p>
        <a href='?controller=login&action=editProfile' class="btn btn-warning">Edit your Profile</a>
        <!--<a href='?controller=login&action=logout' class="btn btn-danger">Sign Out of Your Account</a>-->
    </p>
</body>
</html>




