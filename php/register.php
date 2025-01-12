<?php

require_once "config.php";
//require_once "session.php";

$error = '';
$success = '';

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
        $_SESSION['regresult'] = $error;
        header("Location: Mainsite.php");
        $query->close();
    }
    if (isset($insertQuery)) {
        $insertQuery->close();
    }
    mysqli_close($db);
