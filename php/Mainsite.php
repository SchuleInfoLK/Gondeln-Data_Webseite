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
        href="../images/icons/cable-car.png">
    </head>

    <body>
        <header>
            <h1>Willkommen auf der Hauptseite</h1>
            <div id="logout">
                <input type="submit" class="btn-teriträr" name="submit" value="Abmelden" id="btn-logout" >
            </div>
        </header>
        <main>
            <div class="flex-container">
                <div id="bildverzeichnis">
                    <p>Test</p>
                </div>
                <div id="functions">
                    <input type="submit" class="btn-quarter" name="submit" value="Neuen Zugang anlegen" id="btn-register">
                    <br>
                    <a href="../php/register.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Neuen Zugang anlegen</a><br>
                </div>
            </div>
        </main> 
        <footer>
        <p>
            <a href="../html/Impressum.html">Impressum</a>
            </p>
            <p>&copy; 2024 Philipp Uhlendorf</p>
            <p>
                <a href="../html/Datenschutz.html">Datenschutz</a>
            </p>
        </footer>
        <script>
            document.getElementById('btn-logout').addEventListener('click', function() {
                window.location.href = 'http://localhost/Project_C37592B/php/logout.php';
            });
            document.getElementById('btn-register').addEventListener('click', function(){
                window.location.href = 'http://localhost/Project_C37592B/php/register.php';
            });
        </script>";
    </body>
</html>