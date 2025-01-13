<?php
session_start();
require_once 'config.php';

$error = '';
$success = '';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($_SESSION['email'] == $email) {
        $error .= 'Es kann nicht der eigene Account gelöscht werden.';
    }else{
        if ($password !== $confirmPassword) {
            $error .= 'Bitte geben sie ein Passwort ein.';
        }else{

            $stmt = $db->prepare("SELECT password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 0) {
                $error .= 'Nutzer nicht gefunden.';
            }else{
                $stmt->bind_result($hashedPassword);
                $stmt->fetch();

                if (!password_verify($password, $hashedPassword)) {
                    $error .= ' Passwörter stimmen nicht überein.';
                }else{
                    $stmt = $db->prepare("DELETE FROM users WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $success .= 'Account wurde erfolgreich gelöscht';
                }
            }
        }
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header("Location: Mainsite.php");
    $stmt->close();
    mysqli_close($db);

}
?>