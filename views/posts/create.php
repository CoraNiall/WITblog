

<form action="" method="POST" class="w3-container" enctype="multipart/form-data">


    <center>    <h2>Add New Post</h2> <br>
        <p>
            <label>Post Title</label> <br>
            <textarea rows="1" cols="70" <input class="w3-input" type="text" name="title" required autofocus> </textarea> </br>

        </p>
        <p>
            <br>
            <label>Content</label> <br>
            <textarea rows="15" cols="110" <input class="w3-input" type="text" name="content" required > </textarea>

        </p>

        <div class="row">
            <div>

            <div class ="form-group">
                <label for="sel2">Tags</label> <br>
                <select name="tag[]" multiple="multiple" class="form-control" id="sel2">
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

        <input type="file" name="myUploader" class="w3-btn w3-pink" />
        <p>
            <br>
            <input class="w3-btn w3-pink" type="submit" value="Add Post">
        </p>
</form>
</center>

