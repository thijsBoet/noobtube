<?php

class VideoDetailsFormProvider {

  private $con;

  public function __construct($con){
    $this->con = $con;
  }

  public function createUploadForm(){
    $fileInput = $this->createFileInput();
    $titleInput = $this->createTitleInput();
    $descriptionInput = $this->createDescriptionInput();
    $privacyInput = $this->createPrivacyInput();
    $categoryInput = $this->createCategoryInput();
    $uploadButton = $this->createUploadButton();
    return "<form action='processing.php' method='POST' enctype='multipart/form-data'>
              $fileInput
              $titleInput
              $descriptionInput
              $privacyInput
              $categoryInput
              $uploadButton
            </form>";
  }

  private function createFileInput(){
    return "<div class='form-group'>
              <label for='fileInput'>Your video</label>
              <input type='file' class='form-control-file' id='fileInput' name ='fileInput' required>
          </div>";
  }

  private function createTitleInput(){
    return "<div class='form-group'>
              <input class='form-control' type='text' placeholder='Title' name='titleInput' required>
            </div>";
  }

  private function createDescriptionInput(){
    return "<div class='form-group'>
              <textarea class='form-control' placeholder='Description' name='descriptionInput' rows='3'></textarea>
            </div>";
  }

  private function createCategoryInput(){
    $query = $this->con->prepare("SELECT * FROM categories");
    $query->execute();

    $html = "<div class='form-group'>
              <select class='form-control' name='categoryInput' id='categoryInput' required>";
  
    while($row = $query->fetch(PDO::FETCH_ASSOC)){
      $name = $row['name'];
      $id = $row['id'];
      $html .= "<option value='$id'>$name</option>";
    }
    $html .= "</select>
          </div>";
    
    return $html;
  }

  private function createPrivacyInput(){
    return "<div class='form-group'>
              <select class='form-control' name='privacyInput' id='privacyInput'>
                <option value='1'>Public</option>
                <option value='0'>Private</option>
              </select>
            </div>";
  }

  private function createUploadButton(){
    return "<button type='submit' class='btn btn-primary' name='uploadButton'>Upload</button>";
  }
}