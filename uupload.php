<?php
session_start();
$uname=$_SESSION["uname"];
require_once("connection.php");
$aid = $_POST["aid"];
$pid = $_POST["pid"];
$date = date('Y-m-d');
$target_dir1 = "Problems/";
$target_file1 = $target_dir1 .$aid. "_"  .$_FILES["ques"]["name"] ;
$target_dir2 = "pin/";
$target_file2 = $target_dir2 .$aid. "_"  .$_FILES["input"]["name"] ;
$target_dir3 = "pout/";
$target_file3 = $target_dir3 .$aid. "_"  .$_FILES["output"]["name"] ;
/*// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file`
}*/
    if (move_uploaded_file($_FILES["ques"]["tmp_name"], $target_file1) && move_uploaded_file($_FILES["input"]["tmp_name"], $target_file2) && move_uploaded_file($_FILES["output"]["tmp_name"], $target_file3)) {
        $sql = "INSERT INTO problems VALUES('".$pid."','".$aid."','".$uname."','".$date."',0,'".$target_file1."','".$target_file2."','".$target_file3."')";
        if($con->query($sql)){

          require 'loginindex.php';
          ?>
          <script>
            alert("Successfully uploaded all files");
          </script>        
          <?php
        }
    } else {
        require 'upload.php';
        ?>
        <script>
          alert("Oops!! Something went wrong. Try again.");
        </script>        
        <?php
    }
?>
