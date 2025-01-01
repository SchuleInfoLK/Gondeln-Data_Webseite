<?php
require_once "config.php";
require_once "session.php";
$error = '';
#session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($email)) {
        $error .= '<p class="error"> Bitte eine E-Mail angeben</p>';
    }
    if (empty($password)) {
        $error .= '<p class="error"> Bitte Passwort eingeben</p>';
    }
    if(empty($error)){
        if($query = $db->prepare("SELECT * FROM users WHERE email =?")){
            $query->bind_param('s', $email);
            $query->execute();
            $result = $query->get_result();
            $row = $result->fetch_assoc();
            if($row){
                if(password_verify($password, $row['password'])){
                    $_SESSION["userid"] = $row['id'];
                    $_SESSION["user"] = $row;
                    header("Location: ../php/welcome.php");
                    exit;
                }else{
                    $error .= '<p class="error"> E-Mail oder Kennwort falsch.</p>'; #Falsches Passwort
                }
            }else{
                $error .= '<p class="error"> E-Mail oder Kennwort falsch.</p>'; #Falsche E-Mail
            }
        }
        $query->close();
    }
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Anmeldung</title>
        <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
        <link rel="icon" type="image/jpg" href="../images/icons/cable-car.png">
    </head>
    <body>
        <!--<header>
            <h1>Login</h1>
        </header>-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="loginbody">
                        <form action="" method="post">
                            <div class="form-group">
                                <h1>Login</h1>
                            </div>
                            <div class="form-group">
                                <!-- <label>E-Mail Adresse</label> -->
                                <input type="email" name="email" class="form-control" placeholder="E-Mail" required=""  oninvalid="this.setCustomValidity('Bitte eine gültige E-Mail eingeben')" oninput="setCustomValidity('')"/>
                            </div>
                            <div class="form-group">
                                <!-- <label>Passwort</label>-->
                                <input type="password" name="password" class="form-control" required="" placeholder="Passwort" oninvalid="this.setCustomValidity('Bitte ein Passwort eingeben')" oninput="setCustomValidity('')" />
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form-group-button">
                                    <input type="button" name="submit" class="btn-primary" value="Zurück" id="back">
                                    <input type="submit" name="submit" class="btn-primary" value="Anmelden">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form-group-button">
                                    <input type="button" name="submit" class="btn-primary" value="Passwort zurücksetzen" id="reset">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <?php echo $error; ?>   
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script>
        document.getElementById('back').addEventListener('click', function() {
            window.location.href = 'http://localhost/Project_C37592B/php/Homepage.php';
        });
        document.getElementById('reset').addEventListener('click', function(){
            window.location.href = 'https://youtu.be/dQw4w9WgXcQ';
        });
    </script>
    </body>
</html>
