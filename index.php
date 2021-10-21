<?php
$isEchoSet = isset($_POST['echo']);
$isFadeInSet = isset($_POST['fadeIn']);
$isFadeOutSet = isset($_POST['fadeOut']);
$isDelaySet = isset($_POST['delay']);
if(isset($_POST["submitAudio"])) {
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
            <div>
                <h5 class="center marginBottom3">Here is the area where you can select your audio file</h5>
            </div>
            <div>
                <form action="upload.php" method="post" enctype="multipart/form-data" class="center">
                    <input type="file" name="importedAudio" id="importedAudio" class="marginBottom3" accept=".">
                    <br>
                    <button id="submitAudio" name="submitAudio" class="btn btn-dark">Upload audio file</button>
                </form>
            </div>
            <hr> 
            <div>
                <h5 class="center marginBottom3">Here is the area where you can change your audio file</h5>
            </div>
            <form method="post">
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
            </form>
            <hr> 
            <div>
                <h5 class="center marginBottom3">Here is the area where you can download your audio file</h5>
            </div>
            <div>
                <button class="center btn btn-dark">Export new audio file</button>
            </div>
        </div>
    </body>
</html>