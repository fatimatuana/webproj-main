<?php

  if($_SESSION['role'] != "guest") //only guests have access to this page
  {
    header("location: index.php");
  }

//checking inputs


// define variables and set to empty values
$titleErr = $infoErr = $imageErr = "";
$title = $info = $image  = "";

$requiresVar = " ist erforderlich";

if (isset($_POST['upload'])) {

if (empty($_POST["info"])) {
    $infoErr = "Information".$requiresVar;
  } else {
    $info = test_input($_POST["info"]);
  }

if (empty($_POST["title"])) {
    $titleErr = "Titel".$requiresVar;
  } else {
    $title = test_input($_POST["title"]);
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//** */
//$uploadOk = 1;

if (isset($_POST["upload"])  && isset($_FILES["file"])  ) { //+++ //a good solution?

$target_dir = "./uploadGuest/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1; ///********* */
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


$errorMsg = "";


// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) ) {

  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $errorMsg = "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file) && $target_file != $target_dir) {
  echo $target_file;
  $errorMsg = "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 500000) {
  $errorMsg = "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
  if($imageFileType != ""){
         $errorMsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  }
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    if ($_FILES["file"]["name"] == "") {
      $imageErr = "Ein Foto". $requiresVar;
    }
 // $errorMsg =  "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if(!empty($title) && !empty($info)){ //##
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
      $errorMsg = "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
    } else {
      $errorMsg = "Sorry, there was an error uploading your file.";
    }
  } //##
}
} //+++



if($title != "" && $info != "" && $uploadOk == 1){//77
   $sql = "INSERT INTO tickets (user_id,title, info, image, state) VALUES (?,?, ?, ?, ?)";
  $stmt = $db_obj->prepare($sql);
  $image = basename($_FILES["file"]["name"]);
  $state = "offen"; //by default
  $user_id = $_SESSION["id"];
  $stmt->bind_param("issss",$user_id, $title, $info, $image, $state); 
  $stmt->execute();
} //777
 
?>



  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Neues Ticket erstellen</h1>
          <p><?php if(isset($var)) echo $var?></p>
        </div>
      </div>


      <!-- set the enctype -->
      <form method="post" enctype="multipart/form-data"> <!--- ### --->

         <div class="form-group">

          <label for="title">Titel:*</label>
          <input class="form-control" id="title" name="title" value="<?= $title?>"></input>
          <span class="error text-danger"><?php echo $titleErr;?></span><br>

          <label for="info" class="mt-3">Ihr Anliegen:*</label>
          <textarea class="form-control" id="info" name="info" rows="5"><?= $info?></textarea>
          <span class="error text-danger"><?php echo $infoErr;?></span><br>

        </div>

        <div class="mt-3 mb-3">
          <label for="file" class="form-label">Foto hochladen*</label>
          <!-- set the accepted file types -->
          <input  accept="image/jpeg" class="form-control" type="file" id="file" name="file"> <!-- accept="image/jpg" -->
          <span class="error text-danger"><?php echo $imageErr;?></span><br>

        </div>
        <p name="error text-danger"><?php if(isset($errorMsg)) echo $errorMsg?></p>
        <button class="btn btn-primary" type="submit" name="upload" >Absenden</button>
      </form>

    </div>
  </body>
