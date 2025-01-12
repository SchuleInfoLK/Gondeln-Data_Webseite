<?php 
require_once "config.php";
session_start();
//require_once "session.php";

$error = ''; // Initialize the $error variable
$success = ''; // Initialize the $success variable

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

    $h1name = trim($_POST['h1name']);
    $name = trim($_POST['name']);
    $baujahr = trim($_POST['baujahr']);
    $typ = trim($_POST['typ']);
    $typ_db = trim($_POST['typ_db']);
    $standort = trim($_POST['standort']);
    $hersteller = trim($_POST['hersteller']);
    $htal = !empty($_POST['htal']) ? trim($_POST['htal']) : NULL;
    $hberg = !empty($_POST['hberg']) ? trim($_POST['hberg']) : NULL;
    $hdiff = !empty($_POST['hdiff']) ? trim($_POST['hdiff']) : NULL;
    $horizontlang = !empty($_POST['horizontlang']) ? trim($_POST['horizontlang']) : NULL;
    $bodenabstand = !empty($_POST['bodenabstand']) ? trim($_POST['bodenabstand']) : NULL;
    $maxspeed = !empty($_POST['maxspeed']) ? trim($_POST['maxspeed']) : NULL;
    $maxförderleistung = !empty($_POST['maxförderleistung']) ? trim($_POST['maxförderleistung']) : NULL;
    $fahrzeit = !empty($_POST['fahrzeit']) ? trim($_POST['fahrzeit']) : NULL;
    $perspromittel = !empty($_POST['perspromittel']) ? trim($_POST['perspromittel']) : NULL;
    $artgaragierung = !empty($_POST['artgaragierung']) ? trim($_POST['artgaragierung']) : NULL;
    $kuppelbar = isset($_POST['kuppelbar']) ? intval($_POST['kuppelbar']) : 0;
    $sitzheizung = isset($_POST['sitzheizung']) ? intval($_POST['sitzheizung']) : 0;    
    $bildpfad = !empty($_POST['bildpfad']) ? trim($_POST['bildpfad']): NULL;
    $besonderheiten = !empty($_POST['besonderheiten']) ? trim($_POST['besonderheiten']): NULL;

    if($query = $db->prepare("SELECT * FROM seilbahndaten WHERE h1name = ?")){
        $query->bind_param('s', $h1name);
        $query->execute();
        $query->store_result();
        if($query->num_rows > 0){
            $error .= 'Diese Bahn ist schon vorhanden! Wenden Sie sich an einen Administrator zum bearbeiten der Daten';
        } else {
            if(empty($typ_db)){
                $error .= 'Bitte wählen sie einen Seilbahntyp aus.';
            }
            if(empty($error)){
                $insertQuery = $db->prepare("INSERT INTO seilbahndaten (typ_db, name, h1name, Baujahr, Typ, Standort, Hersteller, HTal, HBerg, HDiff, HorizontLang, Bodenabstand, MaxSpeed, MaxFörderleistung, Fahrzeit, PersproMittel, ArtGaragierung, Kuppelbar, Sitzheizung, Bildpfad, Besonderheiten) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $insertQuery->bind_param("sssssssssssssssssssss", $typ_db, $name, $h1name, $baujahr, $typ, $standort, $hersteller, $htal, $hberg, $hdiff, $horizontlang, $bodenabstand, $maxspeed, $maxförderleistung, $fahrzeit, $perspromittel, $artgaragierung, $kuppelbar, $sitzheizung, $bildpfad, $besonderheiten);
                $result = $insertQuery->execute();
                if($result){
                    $success = 'Sie haben die Bahn erfolgreich hinzugefügt!';
                    };
                } else {
                    $error .= 'Es ist ein Fehler aufgetreten!';
                }
            }
        }else {
            $error .= 'Datenbankabfrage fehlgeschlagen.';
        }
        $_SESSION['success'] = $success;
        $_SESSION['error'] = $error;
        header("Location: Mainsite.php");
        $query->close();
    }
    if (isset($insertQuery)) {
        $insertQuery->close();
    }
?>