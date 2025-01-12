<?php
require_once("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

    $h1name = trim($_POST['h1name']);
    $name = trim($_POST['name']);

    $sql = "DELETE FROM seilbahndaten WHERE h1name = ? AND name = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ss", $h1name, $name);


    if ($stmt->execute()) {
        $success .= 'Eintrag erfolgreich gelöscht.';
    } else {
        $error .= ' Fehler beim Löschen der Bahn.';
    }

    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header("Location: Mainsite.php");
    $stmt->close();
    $db->close();
}
?>