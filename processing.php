<?php 
include_once("includes/header.php");
include_once("includes/classes/VideoUploadData.php");
include_once("includes/classes/VideoProcessor.php");

if(!isset($_POST['uploadButton'])){
  echo "No file set to page";
  exit();
}

// 1) create upload data
$videoUploadData = new VideoUploadData(
                          $_FILES['fileInput'], 
                          $_POST['titleInput'], 
                          $_POST['descriptionInput'], 
                          $_POST['privacyInput'], 
                          $_POST['categoryInput'], 
                          "REPLACE_THIS" 
                        );

$videoProcessor = new VideoProcessor($con);
$wasSuccessful = $videoProcessor->upload($videoUploadData);

include_once("includes/footer.php"); 
?>