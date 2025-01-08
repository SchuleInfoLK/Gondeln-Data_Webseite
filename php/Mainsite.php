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
        $query->close();
    }
    if (isset($insertQuery)) {
        $insertQuery->close();
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
            <?php
                $userid = $_SESSION["userid"];
                $query = "SELECT * FROM users WHERE id = ?";
                $stmt = $db->prepare($query);
                $stmt->bind_param("i", $userid);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
            ?>
            <h1>Willkommen <?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?></h1>
            <div id="logout">
                <input type="button" class="btn-teriträr" value="Abmelden" id="btn-logout" >
            </div>
        </header>
        <main>
            <div class="flex-container">
                <div id="functions">
                    <input type="submit" class="btn-quarter" name="submit" value="Neuen Zugang anlegen" id="btn-register">
                    <br>
                    <input type="button" class="btn-quarter" name="button" value="Lorem ipsum dolor sit amet,">
                    <br>
                    <input type="button" class="btn-quarter" name="button" value="consetetur sadipscing elitr,">
                    <br>
                    <input type="button" class="btn-quarter" name="button" value="sed diam nonumy eirmod tempor">
                    <br>
                    <input type="button" class="btn-quarter" name="button" value="invidunt ut labore et dolore ">
                    <br>
                    <input type="button" class="btn-quarter" name="button" value="magna aliquyam erat,">
                    <br>
                    <input type="button" class="btn-quarter" name="button" value="sed diam voluptua.">
                    <br>
                    <input type="button" class="btn-quarter" name="button" value="At vero eos et accusam et ">
                    <br>
                    <input type="button" class="btn-quarter" name="button" value=" justo duo dolores et ea rebum.">
                    <br>
                    <input type="button" class="btn-quarter" name="button" value="Stet clita kasd gubergren,">
                    <br>
                </div>
                <div id="reg-bahn">
                    <form method="POST" action="">
                        <h1>Seilbahn hinzufügen</h1>
                        <div class="bahn-form">
                            <?php echo isset($success) ? $success : ''; 
                                echo $error; 
                            ?>
                        </div>
                        <h3>Pflichtfelder</h3>
                        <div class="bahn-form">
                            <input type="text" name="name" class="form-control" placeholder="Bahnname (Standort)" required oninvalid="this.setCustomValidity('Bitte einen gültigen Namen und Standort in Klammern, angeben')" oninput="setCustomValidity('')">
                        </div>
                        <div class="bahn-form">
                            <input type="text" name="h1name" class="form-control" placeholder="Bahnname" required oninvalid="this.setCustomValidity('Bitte einen gültigen Bahnnamen eingeben')" oninput="setCustomValidity('')">
                        </div>
                        <div class="bahn-form">
                            <input type="number" name="baujahr" class="form-control" placeholder="Baujahr" required oninvalid="this.setCustomValidity('Bitte eine gültige Jahreszahl eingeben')" oninput="setCustomValidity('')">
                        </div>
                        <div class="bahn-form">
                            <input type="text" name="typ" class="form-control" placeholder="Bahntyp" required oninvalid="this.setCustomValidity('Bitte einen gültigen Seilbahntyp angeben')" oninput="setCustomValidity('')">
                        </div>
                        <div class="bahn-form">
                                <select id="typ_db" name="typ_db" required oninvalid="this.setCustomValidity('Bitte eine Kategorie auswählen')" oninput="setCustomValidity('')">
                                        <option value="" selected ="selected">(Wählen Sie eine Katergorie)</option>
                                        <option value="1">Funitel</option>
                                        <option value="2">3S-Bahn</option>
                                        <option value="3">Einseilumlaufbahn</option>
                                        <option value="4">Pendelbahn</option>
                                        <option value="5">Schlepplift</option>
                                        <option value="6">2er Sessellift</option>
                                        <option value="7">4er Sessellift</option>
                                        <option value="8">6er Sessellift</option>
                                        <option value="9">8er Sessellift</option>
                                        <option value="10">Sonstige</option>
                                </select>
                        </div>
                        <div class="bahn-form">
                            <input type="text" name="standort" class="form-control" placeholder="Standort (Länderkürzel)" required oninvalid="this.setCustomValidity('Bitte einen gültigen Standort mit Länderkürzel eingeben')" oninput="setCustomValidity('')">
                        </div>
                        <div class="bahn-form">
                            <input type="text" name="hersteller" class="form-control" placeholder="Hersteller" required oninvalid="this.setCustomValidity('Bitte einen gültigen Hersteller eingeben')" oninput="setCustomValidity('')">
                        </div>

                        <h3>Optionale Felder</h3>
                        <div class="bahn-form">
                            <input type="number" name="htal" class="form-control" placeholder="Höhe Talstation in Metern">
                        </div>
                        <div class="bahn-form">
                            <input type="number" name="hberg" class="form-control" placeholder="Höhe Bergstation in Metern">
                        </div>
                        <div class="bahn-form">
                            <input type="number" name="hdiff" class="form-control" placeholder="Höhendifferenz in Metern">
                        </div>
                        <div class="bahn-form">
                            <input type="number" name="horizontlang" class="form-control" placeholder="Streckenlänge in Metern">
                        </div>
                        <div class="bahn-form">
                            <input type="number" name="bodenabstand" class="form-control" placeholder="Maximaler Bodenabstand in Metern">
                        </div>
                        <div class="bahn-form">
                            <input type="number" name="maxspeed" class="form-control" placeholder="Fahrgeschwindigkeit in Metern pro Sekunde">
                        </div>
                        <div class="bahn-form">
                            <input type="number" name="maxförderleistung" class="form-control" placeholder="Maximale Förderleistung in Personen pro Stunde">
                        </div>
                        <div class="bahn-form">
                            <input type="number" name="fahrzeit" class="form-control" placeholder="Fahrzeit in Minuten">
                        </div>
                        <div class="bahn-form">
                            <input type="number" name="perspromittel" class="form-control" placeholder="Personen pro Transportmittel in Personen">
                        </div>
                        <div class="bahn-form">
                            <input type="text" name="artgaragierung" class="form-control" placeholder="Art der Garagierung">
                        </div>
                        <div class="bahn-form">
                            <div class="check-bahn">
                                <input type="hidden" name="kuppelbar" value="0">
                                <input type="checkbox" name="kuppelbar" id="id-kuppelbar" value="1">
                                <br>
                                <label for="id-kuppelbar">Kuppelbar?</label>
                                <br>
                                <br>
                                <input type="hidden" name="sitzheizung" value="0">
                                <input type="checkbox" name="sitzheizung" id="id-sitzheizung" value="1">
                                <br>
                                <label for="id-sitzheizung">Sitzheizung vorhanden?</label>
                                </div>
                        </div>
                        <div class="bahn-form">
                            <input type="text" name="bildpfad" class="form-control" placeholder="Relativer Pfad für Bilddatei">
                        </div>
                        <div class="bahn-form">
                            <input type="text" name="besonderheiten" class="form-control" placeholder="Besonderheiten">
                        </div>
                        <div class="bahn-form">
                            <div class="btn-bahn-submit">
                                <input type="submit" name="submit" class="form-control" placeholder="Hinzufügen">
                                <button type="reset">Formular leeren</button>
                                <br>
                                <p> </p>
                            </div>
                    </form>
            </div>
        </main> 
        <footer>
            <p>
                <a href="../html/Impressum.html">Impressum</a>
            </p>
            <p>&copy; 2024-2025 Philipp Uhlendorf</p>
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
        </script>
    </body>
</html>
<?php
    mysqli_close($db);
?>