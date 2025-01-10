<?php
session_start();

if (!isset($_SESSION["userid"]) || $_SESSION["userid"] === false) {
    header("location: login.php");
    exit;
}

require_once "config.php";
//require_once "session.php";

$error = ''; // Initialize the $error variable
$success = ''; // Initialize the $success variable

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

    $fullname = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    if($query = $db->prepare("SELECT * FROM users WHERE email = ?")){
        $query->bind_param('s', $email);
        $query->execute();
        $query->store_result();
        if($query->num_rows > 0){
            $error .= '<p class="error"> Diese E-Mail Adresse ist schon registriert.</p>';
        } else {
            if(strlen($password) < 6){
                $error .= '<p class="error"> Passwort muss mindestens 6 Zeichen enthalten.</p>';
            }
            if(empty($confirm_password)){
                $error .= '<p class="error"> Bitte Wiederholen Sie ihr Passwort.</p>';
            } else {
                if(empty($error) && ($password != $confirm_password)){
                    $error .= '<p class="error"> Passwörter stimmen nicht überein.</p>';
                }
            }
            if(empty($error)){
                $insertQuery = $db->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?)");
                $insertQuery->bind_param("sss", $fullname, $email, $password_hash);
                $result = $insertQuery->execute();
                if($result){
                    $success = '<p class="success"> Sie haben sich erfolgreich registriert! <br> Weiterleitung . . . </p>';
                    };
                } else {
                    $error .= '<p class="error"> Es ist ein Fehler aufgetreten!</p>';
                }
            }
        }
        $query->close();
    }
    if (isset($insertQuery)) {
        $insertQuery->close();
    }
    mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrieren</title>
        <link rel="icon" type="image/jpg" href="../images/icons/cable-car.png">
        <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
    </head>
    <body>
        <!--header>
            <h1>Registrieren</h1>
        </header>-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="regbody">
                        <!--<div id="form-group">
                        <h2>Registrieren</h2>
                        <p>Bitte geben Sie ihre Daten zum Erstellen eines Kontos an</p>
                        </div>-->
                        <form action="" method="post">
                            <div class="form-group">
                                <h1>Registrieren</h1>
                            </div>
                            <div class="form-group">
                                <!--<label>Vor- und Zuname</label>-->
                                <input type="text" name="name" class="form-control" placeholder="Vor- und Nachname" required>
                            </div>
                            <div class="form-group">
                                <!--<label>E-Mail Adresse</label>-->
                                <input type="email" name="email" class="form-control" placeholder="E-Mail" />
                            </div>
                            <div class="form-group">
                                <!--<label>Passwort</label>-->
                                <input type="password" name="password" class="form-control" placeholder="Passwort">
                            </div>
                            <div class="form-group">
                                <!--<label>Passwort wiederholen</label>-->
                                <input type="password" name="confirm_password" class="form-control" placeholder="Passwort wiederholen">
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form-group-button">
                                    <input type="button" name="submit" class="btn-primary" value="Zurück" id="back">
                                    <input type="submit" name="submit" class="btn-primary" value="Registrieren" >
                                </div>
                            </div>
                            <br>
                            <div>
                            <?php echo isset($success) ? $success : ''; 
                                echo $error; 
                                if($result = $success){   
                                header("Refresh:1; url= ../php/Mainsite.php");
                                }
                            ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script>
    document.getElementById('back').addEventListener('click', function() {
        window.location.href = 'http://localhost/Project_C37592B/php/Mainsite.php';
    });
    </script>
    </body>    
</html>
