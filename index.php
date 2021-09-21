<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list Files from database on a webpage</title>
</head>
<body>
    <?php
        $connection = mysqli_connect("localhost", "root", "", "files_database");
        if (mysqli_errno($connection) != 0) {
            die("Hops! an error occured while connecting to the database, mysqli err: " . mysqli_error($connection));
        }
    ?>
    <h1 style="text-align: center;">How to list files from database on a page with PHP and AJAX</h1>
    <h3>With PHP</h3>
    <div class="" style="display: flex; flex-wrap:wrap">
        <?php
            $sql = "SELECT * FROM files";
            $result = mysqli_query($connection, $sql);
            while ($file = mysqli_fetch_assoc($result)) { 
                // echo mime_content_type('./uploads/' . $file['filename']);
                if (explode("/", mime_content_type('./uploads/' . $file['filename']))[0] == "image") { ?>
                    <div style="width: 25%; margin: 10px;">
                        <img src="./uploads/<?php echo $file['filename'] ?>" style="width:100%; height: 100%;" alt="">
                    </div>
                    
                <?php }elseif (explode("/", mime_content_type('./uploads/' . $file['filename']))[0] == "application") { ?>
                    <div style="width: 25%; margin: 10px; background-color: tomato; 
                        display: flex; justify-content: center; align-items: center; ">
                        PDF File
                    </div>
                <?php }else{ ?>
                    <div style="width: 25%; margin: 10px;">
                        <video autoplay="false" style="width: 100%">
                            <source src="./uploads/<?php echo $file['filename'] ?>" type="<?php echo mime_content_type('./uploads/' . $file['filename']) ?>">
                        </video>
                    </div>
                <?php } ?>
        <?php } ?>
        
               

    </div>

    
    <h3>Visible Files with PHP</h3>
    <div class="" style="display: flex; flex-wrap:wrap">
        <?php
            $sql = "SELECT * FROM files WHERE status = 1";
            $result = mysqli_query($connection, $sql);
            while ($file = mysqli_fetch_assoc($result)) { 
                // echo mime_content_type('./uploads/' . $file['filename']);
                if (explode("/", mime_content_type('./uploads/' . $file['filename']))[0] == "image") { ?>
                    <div style="width: 25%; margin: 10px;">
                        <img src="./uploads/<?php echo $file['filename'] ?>" style="width:100%; height: 100%;" alt="">
                    </div>
                    
                <?php }elseif (explode("/", mime_content_type('./uploads/' . $file['filename']))[0] == "application") { ?>
                    <div style="width: 25%; margin: 10px; background-color: tomato; 
                        display: flex; justify-content: center; align-items: center; ">
                        PDF File
                    </div>
                <?php }else{ ?>
                    <div style="width: 25%; margin: 10px;">
                        <video autoplay="false" style="width: 100%">
                            <source src="./uploads/<?php echo $file['filename'] ?>" type="<?php echo mime_content_type('./uploads/' . $file['filename']) ?>">
                        </video>
                    </div>
                <?php } ?>
        <?php } ?>
        
               

    </div>
    <h3 style="margin-top: 30px;">With AJAX</h3>
    <button class="load-files-ajax">Load All</button> <button class="load-visible-files-with-ajax">Load only Visible ones</button>
    <div class="ajax-files-container" style="display: flex; flex-wrap:wrap">
        <h4 style="text-align:center">click one of the buttons to load files from the database</h4>




        <!-- <div style="width: 25%; margin: 10px;">
            <img src="./uploads/img3.jpg" style="width:100%; height: 100%;" alt="">
        </div> -->
    </div>

    <script src="./index.js"></script>
</body>
</html>