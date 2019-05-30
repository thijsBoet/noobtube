<?php 
include_once("includes/header.php");
include_once("includes/classes/VideoDetailsFormProvider.php"); 
?>

<div class="column">

<?php
  $formprovider = new VideoDetailsFormProvider($con);
  echo $formprovider->createUploadForm();
?>

</div>

<?php include_once("includes/footer.php"); ?>