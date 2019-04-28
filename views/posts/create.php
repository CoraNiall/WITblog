<head>
    <link rel = "stylesheet" type = "text/css" href = "views/css/styles.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<form action="" method="POST" class="w3-container" enctype="multipart/form-data">


    <center>    

        <h2>Add New Post</h2>
        <p>
            <?php
            if (isset ($error) && $error ) {
                echo $error;
            }
            ?>
        </p>
        <br>
        <p>
            <label>Post Title</label> <br>
            <textarea rows="1" cols="70" <input class="w3-input" type="text" name="title" required autofocus> </textarea> </br>

        </p>
        <p>
            <br>
            <label>Content</label> <br>
            <textarea rows="15" cols="90" <input class="w3-input" type="text" name="content" required > </textarea>

        </p>

        <div class="row">
            <div>

                <div class ="form-group">
                    <label for="sel2">Tags</label> <br>
                    <select name="tag[]" multiple="multiple" class="form-control" id="sel2" required="required">
                        <?php
                        foreach ($tags as $tag) {
                            echo "<option value=" . $tag->id . ">" . $tag->tag . "</option>";
                        }
                        ?>
                    </select>

                </div>
            </div>
        </div>
        <br>     
        <input type="hidden" 
               name="MAX_FILE_SIZE" 
               value="10000000"
               />
        <label>Select Images to upload:</label>

        <input type="file" name="myUploader" class="w3-btn w3-pink" required="required" />
        <p>
             <!-- <input type="file" name="files[]" multiple="multiple" class="w3-btn w3-pink" />  -->
        <p>
            <br>
            <input class="w3-btn w3-pink" type="submit" value="Add Post">
        </p>
</form>
</center>

