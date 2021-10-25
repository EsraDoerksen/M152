<?php
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
                <h5 class="center marginBottom1">Here is the area where you can select and edit your audio file</h5>
            </div>
            <div>
                <form action="upload.php" method="post" enctype="multipart/form-data" class="center">
                    <input type="file" name="importedAudio" id="importedAudio" class="marginBottom1" accept=".mp3, .wav">
                    <br>
                    <div>
                        <label class="center marginBottom0" for="echo">Echo</label>
                        <input class="center" type="radio" id="echo" name="effect" value="Echo"/>
                    </div>
                    <div>
                        <label class="center marginBottom0" for="fadeIn">Fade In</label>
                        <input class="center" type="radio" id="fadeIn" name="effect" value="Fade In"/>
                    </div>
                    <div>
                        <label class="center marginBottom0" for="fadeOut">Fade Out</label>
                        <input class="center" type="radio" id="fadeOut" name="effect" value="Fade Out"/>
                    </div>
                    <div>
                        <label class="center marginBottom0" for="delay">Delay</label>
                        <input class="center marginBottom1" type="radio" id="delay" name="effect" value="Delay"/>
                    </div>
                    <div>
                        <p class="center marginBottom0">Add a new name for the audio file:</p>
                        <input class="center marginBottom3" type="text" id="newName" name="newName"/>
                    </div>
                    <button id="submitAudio" name="submitAudio" class="btn btn-dark">Upload and edit audio file</button>
                </form>
            </div>
        </div>
    </body>
</html>