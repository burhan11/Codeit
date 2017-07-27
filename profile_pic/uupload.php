<?php
$aid = $_POST["aid"];
$pid = $_POST["pid"];
echo $pid;
echo $aid;
echo $_FILES["ques"]["name"];
$target_dir = "ftp://u121337729@ftp.coders.pe.hu/public_html/Problems";
$target_file = $target_dir . "_" .$aid. "_"  . basename($_FILES["ques"]["name"]) ;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadOk = 0;
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
/*// Check file size
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
}*/ else {
    if (move_uploaded_file($_FILES["ques"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["ques"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>