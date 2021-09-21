<?php
$connection = mysqli_connect("localhost", "root", "", "files_database");
if (mysqli_errno($connection) != 0) {
    die("Hops! an error occured while connecting to the database, mysqli err: " . mysqli_error($connection));
}


if (isset($_POST['fetch_all_files'])) {
    $sql = "SELECT * FROM files";
    $result = mysqli_query($connection, $sql);
    $files_array = [];
    while ($file = mysqli_fetch_assoc($result)) { 
        $file['type'] = mime_content_type('./uploads/' . $file['filename']);
        array_push($files_array, $file);
    }

    echo json_encode(["data" => $files_array]);
}

if (isset($_POST['fetch_visible_files'])) {
    $sql = "SELECT * FROM files WHERE status = 1";
    $result = mysqli_query($connection, $sql);
    $files_array = [];
    while ($file = mysqli_fetch_assoc($result)) { 
        $file['type'] = mime_content_type('./uploads/' . $file['filename']);
        array_push($files_array, $file);
    }

    echo json_encode(["data" => $files_array]);
}