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

if (isset($_POST["upload"])  && isset($_FILES["file"])  ) {

$target_dir = "./uploadGuest/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //getting image type


$errorMsg = "";


// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) ) {

  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $errorMsg = "Das Dokument ist kein Foto.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file) && $target_file != $target_dir) {
  echo $target_file;
  $errorMsg = "Sorry, Sie können das Foto nur einmal hochladen.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 500000) {
  $errorMsg = "Sorry, Ihr Foto ist zu groß.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
  if($imageFileType != ""){
         $errorMsg = "Sorry, nur JPG, JPEG, PNG & GIF sind erlaubt.";
  }
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    if ($_FILES["file"]["name"] == "") {
      $imageErr = "Ein Foto". $requiresVar;
    }

    // if everything is ok, try to upload file
} else {
  if(!empty($title) && !empty($info)){ 
    $target_fileNew = $target_dir .date('Y-m-d_h-i-s'). basename($_FILES["file"]["name"]); //that's the whole path
    $target_fileNewOnlyName = date('Y-m-d_h-i-s'). basename($_FILES["file"]["name"]); //only the name of the new pic is saved -> for the db
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_fileNew)) { //pic has been uploaded
      header("refresh:1;url=?site=ticketList" ); //redirect after 2 sec

    } else {
      $errorMsg = "Sorry, beim hochladen Ihres Fotos ist ein Fehler aufgetreten.";
    }
  } //##
}
} 

if($title != "" && $info != "" && $uploadOk == 1){
   $sql = "INSERT INTO tickets (user_id,title, info, image, state) VALUES (?,?, ?, ?, ?)";
  $stmt = $db_obj->prepare($sql);
  $image =  $target_fileNewOnlyName;
  $state = "offen"; //by default
  $user_id = $_SESSION["id"];
  $stmt->bind_param("issss",$user_id, $title, $info, $image, $state); 
  $stmt->execute();
} 
 
?>

  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Neues Ticket erstellen</h1>
          <p><?php if(isset($var)) echo $var?></p>
        </div>
      </div>

      <form method="post" enctype="multipart/form-data"> 

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
          <input  accept="image/jpeg" class="form-control" type="file" id="file" name="file"> 
          <span class="error text-danger"><?php echo $imageErr;?></span><br>
        </div>
        <p name="error text-danger"><?php if(isset($errorMsg)) echo $errorMsg?></p>
        <button class="btn btn-primary" type="submit" name="upload" >Absenden</button>
      </form>

    </div>
  </body>
