<!DOCTYPE html>
<html lang="en">
<link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />
<body>
    <div class="page-header">
        <?php
        echo "<div class='alert alert-info'>";
        echo "<strong> Hi " . $_SESSION['username'] . ", welcome back!</strong>";
        echo "</div>";
        ?>
    </div>
    <p>
        <a href="?controller=login&action=editProfile.php" class="btn btn-warning">Edit your Profile!</a>
        <a href='?controller=login&action=Logout' class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>