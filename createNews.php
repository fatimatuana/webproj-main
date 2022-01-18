<?php



 include_once("dbaccess.php");



// define variables and set to empty values
$title = $content = $author = $titleErr = $contentErr = $imageErr = $authorErr = "";
$image="";
$dateTime = time();


$requiresVar = " ist erforderlich";
 

if (isset($_POST['upload'])) { 

if (empty($_POST["content"])) {                 //wenn Content leer ist
    $contentErr = "Beitrag".$requiresVar;
  } else {
    $content = test_input($_POST["content"]);  
  }

if (empty($_POST["title"])) {
    $titleErr = "Titel".$requiresVar;
  } else {
    $title = test_input($_POST["title"]);
  }

if (empty($_POST["author"])) {
    $authorErr = "Author".$requiresVar;
  } else {
    $author = test_input($_POST["author"]);
  }
  
}

function test_input($data) {
  $data = trim($data);          //entfernt Leerzeichen
  $data = stripslashes($data); //entfernt backslashes
  $data = htmlspecialchars($data); //
  return $data;
}

$uploadOk = 0;

if (isset($_POST["upload"])  && isset($_FILES["file"])  ) { 
$target_dir = "./uploadImage/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


$errorMsg = "";


// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) ) {

  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $errorMsg = "Das Dokument ist kein Foto";
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
  if(!empty($title) && !empty($content)){ //##
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
      $errorMsg = "Die Datei ". htmlspecialchars( basename( $_FILES["file"]["name"])). " wurde erfolgreich hochgeladen.";
    } else {
      $errorMsg = "Sorry, beim Hochladen Ihres Fotos ist ein Fehler aufgetreten.";
    }
  } 
}
} 

if($title != "" && $content != "" && $author != "" && $uploadOk == 1){
    $sql = "INSERT INTO news (title, content, author, image, dateTime) VALUES (?, ?, ?, ?, ?)";
  $stmt = $db_obj->prepare($sql);
  $image = basename($_FILES["file"]["name"]);
  $stmt->bind_param("ssssi", $title, $content, $author, $image, $dateTime); 
  $stmt->execute();
} 
 
?>



  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Neuen Beitrag erstellen</h1>
          <p><?php if(isset($var)) echo $var?></p>
        </div>
      </div>


      <!-- set the enctype -->
      <form method="post" enctype="multipart/form-data">

         <div class="form-group">

          <label for="title">Titel:*</label>
          <input class="form-control" id="title" name="title" value="<?= $title?>"></input>
          <span class="error text-danger"><?php echo $titleErr;?></span><br>

          <label for="content" class="mt-3">Beitrag:*</label>
          <textarea class="form-control" id="content" name="content" rows="5"><?= $content?></textarea>
          <span class="error text-danger"><?php echo $contentErr;?></span><br>

          <label for="author">Autor:*</label>
          <input class="form-control" id="author" name="author" value="<?= $author?>"></input>
          <span class="error text-danger"><?php echo $authorErr;?></span><br>

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
