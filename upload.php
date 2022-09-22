<?php
$target_dir = "uploads/";
$target_ext = $_POST["type"];
$target_file = $target_dir . basename($_POST["name"] . "." . $target_ext);
$uploadOk = 1;
$fileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists. If you're uploading for a second time append a digit to your name in the previous screen.<br>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
  echo "Sorry, your file is too large. 2MB max allowed.<br>";
  $uploadOk = 0;
}

// Allow certain file formats
if($fileType != "pdf" && $fileType != "zip") {
  echo "Sorry, only PDF files are allowed.<br>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded. You can now close this window.";
  } else {
    echo "Sorry, there was an error uploading your file. Please solve any errors and try again or send an email to TAs with the homework if errors persist.";
  }
}
?>