<link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />

<p>Fill in the following form to update your profile information:</p>
<form action="" method="POST" class="w3-container" enctype="multipart/form-data">
    <h2>Update Profile</h2>
    <?php 
$file = 'views/images/' . $user->username . '.jpeg';
if(file_exists($file)){
    $img = "<img src='$file' class='pfphoto' width='150' />";
    echo $img;
}
else
{
echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
}

?>
    <p>
        <label>Email</label>
        <input class="w3-input" type="text" name="email" value="<?= $user->email; ?>">
    </p>
    <p>
        <label>Username</label>
        <input class="w3-input" type="text" name="username" value="<?= $user->username; ?>" >
    </p>
    <p>
        <label>Password</label>
        <input class="w3-input" type="text" name="password" value="<?= $user->password; ?>" >
    </p>
            
  <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />

  <br/>
  <input type="file" name="myUploader" class="w3-btn w3-pink" />
  <p>
    <input class="w3-btn w3-gray" type="submit" value="Update Profile">
    </p>
</form>