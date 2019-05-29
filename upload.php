<?php include_once("includes/header.php"); ?>
<?php include_once("includes/classes/VideoDetailsFormProvider.php"); ?>

<div class="column">

<?php
  $formprovider = new VideoDetailsFormProvider();
  echo $formprovider->createUploadForm();
?>

</div>

<?php include_once("includes/footer.php"); ?>