<link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />

<h3>Fill in the following form to update your profile information:</h3>
<form action="" method="POST" class="w3-container" enctype="multipart/form-data">
    <h2>Update Profile</h2>
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
    <p>
        <label>Email</label> &nbsp; &nbsp; &nbsp; &nbsp;
        <input class="w3-input" type="email" name="email" placeholder="youremail@email.com" value="<?= $user->email; ?>">
    </p>
    <p>
        <label>Username</label>
        <input class="w3-input" type="text" name="username" value="<?= $user->username; ?>" >
    </p>
    <p>
        <label>Password</label>
        <input class="w3-input" type="password" name="password" value="<?= $user->password; ?>" >
    </p>
            
  <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />

  <br/>
  <label>Select a Profile Picture:</label>
  <input type="file" name="myUploader" class="w3-btn w3-pink" value="Upload a Profile Picture" />
  <br/>
  <p>
    <input class="btn btn-warning" type="submit" value="Update Profile">
    </p>
    </div>
    <p style='padding-left: 225px;'>
        <a href='?controller=login&action=deleteUser&id=<?php echo $user->id; ?>' class="btn btn-warning">Delete your Profile</a>
    </p>
</form>