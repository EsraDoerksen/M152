<?php
$message = "";
$uploadOk = 1;
$audioEffect = $_POST['effect'];
$filename = basename($_FILES["importedAudio"]["name"]);
$newName = $_POST['newName'];

$target_download = "downloads/";
$target_file_download = $target_download . $newName;

$target_upload = "uploads/";
$target_file_upload = $target_upload . $filename;
$imageFileType = strtolower(pathinfo($target_file_upload,PATHINFO_EXTENSION));

// Überpürfung ob das Formular korrekt übergeben worden ist
if(isset($_POST["submitAudio"])) {
    // Bereits bestehende Dateien werden geprüft
    if (file_exists($target_file_upload)) {
        $message = "Sorry, file already exists.";
        $uploadOk = 0;
    }
  
    // Dateigrösse wird überprüft
    if ($_FILES["importedAudio"]["size"] > 3000000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
  
    // Dateiformat wird überprüft
    if($imageFileType != "mp3" && $imageFileType != "wav") {
        $message = "Sorry, only MP3 and WAV files are allowed.";
        $uploadOk = 0;
    }

    // Hier wird geprüft, ob es einen Fehler mit der Datei gibt
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["importedAudio"]["tmp_name"], $target_file_upload)) {
            $message = "The file ". htmlspecialchars( basename( $_FILES["importedAudio"]["name"])). " has been uploaded.";
        }
    }

    // Es wird geprüft, welcher radio Button ausgewählt worden ist(Echo, Fade In, Fade Out, Delay)
    if($audioEffect == "Echo"){
        // Entsprechendes Bash Script wird aufgerufen, 1. Parameter ist der Dateipfad und Dateiname und der 2. Parameter ist der neue Name der Audiodatei
        exec('./addecho.sh $target_file_upload $newName');
    }elseif($audioEffect == "Fade In"){
        // Entsprechendes Bash Script wird aufgerufen, 1. Parameter ist der Dateipfad und Dateiname und der 2. Parameter ist der neue Name der Audiodatei
        exec('./addfadein.sh $target_file_upload $newName');
    }elseif ($audioEffect == "Fade Out") {
        // Entsprechendes Bash Script wird aufgerufen, 1. Parameter ist der Dateipfad und Dateiname und der 2. Parameter ist der neue Name der Audiodatei
        exec('./addfadeout.sh $target_file_upload $newName');
    }elseif ($audioEffect == "Delay") {
        // Entsprechendes Bash Script wird aufgerufen, 1. Parameter ist der Dateipfad und Dateiname und der 2. Parameter ist der neue Name der Audiodatei
        exec('./adddelay.sh $target_file_upload $newName');
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
            <div class="center alert alert-primary"><?php echo $message ?></div>
            <div>
                <h5 class="center marginBottom3">Here is the area where you can download your audio file</h5>
            </div>
            <div>
                <a href="<?php echo $target_file_download ?>" download role="button" class="btn btn-dark center smallButton">
                    <p>Export new audio file</p>
                </a>
            </div>
        </div>
    </body>
</html>