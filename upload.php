<?php
$message = "";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["importedAudio"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submitAudio"])) {
    // Bereits bestehende Dateien werden geprüft
    if (file_exists($target_file)) {
        $message = "Sorry, file already exists.";
        $uploadOk = 0;
    }
  
    // Dateigrösse wird überprüft
    if ($_FILES["importedAudio"]["size"] > 500000000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
  
    // Dateiformat wird überprüft
    if($imageFileType != "mp3" && $imageFileType != "wav") {
        $message = "Sorry, only MP3 and WAV files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    $message = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["importedAudio"]["tmp_name"], $target_file)) {
            $message = "The file ". htmlspecialchars( basename( $_FILES["importedAudio"]["name"])). " has been uploaded.";
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change the structure of audio files</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <div class="container-fluid">
            <div>
                <h1 class="center">Equalizer for audio files</h1>
            </div>
            <hr> 
            <h3 class="center"><?php echo $message ?></h3>
            <br>
            <div>
                <h5 class="center marginBottom3">Here is the area where you can change your audio file</h5>
            </div>
            <form action="index.php" method="post" class="center">
                <div>
                    <p class="center marginBottom0">Add echo to the audio file:</p>
                    <input class="center marginBottom3" type="checkbox" id="echo" name="echo"/>
                </div>
                <div>
                    <p class="center marginBottom0">Add fade in to the audio file:</p>
                    <input class="center marginBottom3" type="checkbox" id="fadeIn" name="fadeIn"/>
                </div>
                <div>
                    <p class="center marginBottom0">Add fade out to the audio file:</p>
                    <input class="center marginBottom3" type="checkbox" id="fadeOut" name="fadeOut"/>
                </div>
                <div>
                    <p class="center marginBottom0">Add a delay to the audio file:</p>
                    <input class="center marginBottom3" type="checkbox" id="delay" name="delay"/>
                </div>
                <button id="submitAudio" name="submitAudio" class="btn btn-dark">Edit your uploaded File</button>
            </form>
        </div>
    </body>
</html>