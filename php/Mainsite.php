<?php
session_start();

if(!isset($_SESSION["userid"]) || $_SESSION["userid"] !== false){
   
}else{
    header("location: login.php");
   exit;
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
        <title>Home</title>
        <link rel="icon" type="image/jpg"
            href="../images/icon.jpg">
    </head>

    <body>
        <header>
            <h1>Willkommen auf der Hauptseite</h1>
            <p>
                <a href="../authsystem/logout.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Abmelden</a>
            </p>
        </header>

        <div id="message">
            <h2>Hinweis:</h2>
            <h3>Diese Webseite befindet sich noch im Aufbau.</h3>
            <p>Es kann zu Einschränkungen kommen. Wir bitten um Verständnis.</p>
        </div>
            
        <footer>
        <p>
            <a href="../html/Impressum.html">Impressum</a>
            </p>
            <p>&copy; 2024 Philipp Uhlendorf</p>
            <p>
                <a href="../html/Datenschutz.html">Datenschutz</a>
            </p>
        </footer>

    </body>
</html>