<?php 
require_once "config.php";
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
    $htal = trim($_POST['htal']);
    $hberg = trim($_POST['hberg']);
    $hdiff = trim($_POST['hdiff']);
    $horizontlang = trim($_POST['horizontlang']);
    $bodenabstand = trim($_POST['bodenabstand']);
    $maxspeed = trim($_POST['maxspeed']);
    $maxförderleistung = trim($_POST['maxförderleistung']);
    $fahrzeit = trim($_POST['fahrzeit']);
    $perspromittel = trim($_POST['perspromittel']);
    $artgaragierung = trim($_POST['artgaragierung']);
    $kuppelbar = isset($_POST['kuppelbar']) ? intval($_POST['kuppelbar']) : 0;
    $sitzheizung = isset($_POST['sitzheizung']) ? intval($_POST['sitzheizung']) : 0;    
    $bildpfad = trim($_POST['bildpfad']);
    $besonderheiten = trim($_POST['besonderheiten']);

    if($query = $db->prepare("SELECT * FROM seilbahndaten WHERE h1name = ?")){
        $query->bind_param('s', $h1name);
        $query->execute();
        $query->store_result();
        if($query->num_rows > 0){
            $error .= '<h3 class="error"> Diese Bahn ist schon vorhanden! <br> Wenden Sie sich an einen Administrator zum bearbeiten der Daten</h3>';
        } else {
            if(empty($typ_db)){
                $error .= '<h3 class="error"> Bitte wählen sie einen Seilbahntyp aus.</h3>';
            }
            if(empty($error)){
                $insertQuery = $db->prepare("INSERT INTO seilbahndaten (typ_db, name, h1name, Baujahr, Typ, Standort, Hersteller, HTal, HBerg, HDiff, HorizontLang, Bodenabstand, MaxSpeed, MaxFörderleistung, Fahrzeit, PersproMittel, ArtGaragierung, Kuppelbar, Sitzheizung, Bildpfad, Besonderheiten) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $insertQuery->bind_param("sssssssssssssssssssss", $typ_db, $name, $h1name, $baujahr, $typ, $standort, $hersteller, $htal, $hberg, $hdiff, $horizontlang, $bodenabstand, $maxspeed, $maxförderleistung, $fahrzeit, $perspromittel, $artgaragierung, $kuppelbar, $sitzheizung, $bildpfad, $besonderheiten);
                $result = $insertQuery->execute();
                if($result){
                    $success = '<p class="success"> Sie haben die Bahn erfolgreich hinzugefügt!</p>';
                    };
                } else {
                    $error .= '<h3 class="error"> Es ist ein Fehler aufgetreten!</h3>';
                }
            }
        }else {
            $error .= '<h3 class="error"> Datenbankabfrage fehlgeschlagen.</h3>';
        }
        $_SESSION['bahnresult'] = $error;
        header("Location: Mainsite.php");
        $query->close();
    }
    if (isset($insertQuery)) {
        $insertQuery->close();
    }
?>