<?php
/*---------------------------------------------------------------------------------------------------------
    HINWEIS:
    SOLLTEN SIE DAS HIER SEHEN IST EIN FEHLER AUFGETRETEN:

    1. Überprüfen Sie ob die Datei auf einem (Lokalen-/Web-)Server liegt und dieser gestartet ist.
            Falls nicht:
                -Laden Sie und instalieren Sie XAMPP von https://www.apachefriends.org/download.html
                -Starten Sie dann den Apache Server und legen Sie den Ordner im Verzeichnis:"C:\xampp\htdocs"
                -Rufen Sie dann im Browser: localhost/"Ordnername"/"dateiname"."dateiendung" auf

    NOTE: 
    IF YOU SEE THIS, AN ERROR HAS OCCURRED:

    Check if the file is located on a (local/web) server and if the server is running
        If not:
            -Download and install XAMPP from https://www.apachefriends.org/download.html
            -Start the Apache server and place the folder in the directory: "C:\xampp\htdocs"
            -Then open your browser and go to: localhost/"foldername"/"filename"."fileextension"

    
    Sollte ein Datenbankfehler vorliegen öffnen sie die ../html/error.html Datei
    If a database error occurs, open the ../html/error.html file.
---------------------------------------------------------------------------------------------------------*/

require_once "config.php";

$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

if ($db === false) {
    echo "<script>alert('Datenbankverbindung fehlgeschlagen');</script>";
    echo "<script>window.location.href = 'localhost/Projekt_C37592B/html/error.html';</script>";
    exit();
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
        <div class="seilbahn">
            <header>
                <div id="tohub">
                    <input type="submit" class="btn-teriträr" name="submit" value="Zur Seitenauswahl" id="btn-tohub" >
                </div>
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                                if (isset($_POST['id'])){
                                    $id = intval($_POST['id']); 
                                    $stmt = $db->prepare("SELECT * FROM SeilbahnDaten WHERE id = ?");
                                    if ($stmt) {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                            
                                        if ($result && $result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            echo "<h1>" . htmlspecialchars($row['h1name']) . "</h1>";
                                        } else {
                                            echo "Keine Ergebnisse gefunden.";
                                        }
                            
                                        $stmt->close();
                                    } else {
                                        echo "Datenbankabfrage fehlgeschlagen.";
                                    }
                                } else {
                                    echo "Ungültige ID.";
                                }
                            }else{
                                echo "<h1>Willkommen</h1>";
                            }
                ?>
                <div id="logout">
                    <input type="submit" class="btn-teriträr" name="submit" value="Anmelden" id="btn-login" >
                </div>
            </header>
            <main>
                <div class="auswahl">
                    <?php 
                        echo "<h2>Kabinenbahnen</h2>";
                        for ($i = 0; $i <= 4; $i++) {
                            $stmt = $db->prepare("SELECT name, id FROM SeilbahnDaten WHERE typ_db = ?");
                            $stmt->bind_param("i", $i);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result && $result->num_rows > 0) {
                                switch ($i) {
                                    case 1:
                                        echo "<h3>Funitel</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST'>";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;

                                    case 2:
                                        echo "<h3>3S-Bahn</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST'>";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;

                                    case 3:
                                        echo "<h3>Einseilumlaufbahn</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST'>";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;
                                    case 4:
                                        echo "<h3>Pendelbahn</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST'>";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;
        
                                    default:
                                        echo "<h3>Keine spezifische Kategorie für typ_db = {$i}</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            
                                        }
                                        break;
                                }
                            } else {
                                //echo "<h3>Keine Einträge für typ_db = {$i}</h3>";
                            }
                        }
                        echo "<br>";
                        echo "<h2>Sessellifte</h2>";
                        for ($i = 5; $i <= 9; $i++) {
                            $stmt = $db->prepare("SELECT name, id FROM SeilbahnDaten WHERE typ_db = ?");
                            $stmt->bind_param("i", $i);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result && $result->num_rows > 0) {
                                switch ($i) {
                                    case 5:
                                        echo "<h3>Schlepplifte</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST' >";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;

                                    case 6:
                                        echo "<h3>2er-Sessellift</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST' >";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;

                                    case 7:
                                        echo "<h3>4er-Sessellift</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST' >";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;
                                    case 8:
                                        echo "<h3>6er-Sessellift</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST' >";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;
                                    
                                    case 9:
                                        echo "<h3>8er-Sessellift</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST' >";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;
        
                                    default:
                                        echo "<h3>Keine spezifische Kategorie für typ_db = {$i}</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST' >";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;
                                }
                            } else {
                                //echo "<h3>Keine Einträge für typ_db = {$i}</h3>";
                            }
                        }
                        $stmt = $db->prepare("SELECT name, id FROM SeilbahnDaten WHERE typ_db = 10");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if($result != NULL){
                            echo "<h2>Sonstige</h2>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<form method='POST' >";
                                echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                echo "</form> ";
                            }
                        } 
                        echo "<br><br><br><br>"
                    ?>
                </div>
                <div class="gondel">
                    <?php   if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                                if (isset($_POST['id'])){
                                    $id = intval($_POST['id']); 
                                    $stmt = $db->prepare("SELECT * FROM SeilbahnDaten WHERE id = ?");
                                    $stmt->bind_param("i", $id); 
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result && $result->num_rows > 0):
                                    while ($row = $result->fetch_assoc()): ?>
                                        <div class="pic-db">
                                            <img src="<?= htmlspecialchars($row['Bildpfad'] ?? '../images/icons/nopicture.png') ?>" alt="Bild <?= htmlspecialchars($row['Bildpfad'] ? $row['h1name'] : 'No picture') ?>">
                                        </div>
                                        <table>
                                        <tr>
                                            <td><div class="tablefest">Typ:</div></td>
                                            <td><?= htmlspecialchars($row['Typ']) ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Baujahr:</div></td>
                                            <td><?= htmlspecialchars($row['Baujahr']) ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Hersteller:</div></td>
                                            <td><?= htmlspecialchars($row['Hersteller']) ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Standort:</div></td>
                                            <td><?= htmlspecialchars($row['Standort']) ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Höhe Talstation:</div></td>
                                            <td><?= $row['HTal'] !== null ? htmlspecialchars($row['HTal']) . ' m' : '-' ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Höhe Bergstation:</div></td>
                                            <td><?= $row['HBerg'] !== null ? htmlspecialchars($row['HBerg']) . ' m' : '-' ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Höhendifferenz:</div></td>
                                            <td><?= $row['HDiff'] !== null ? htmlspecialchars($row['HDiff']) . ' m' : '-' ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Streckenlänge:</div></td>
                                            <td><?= $row['HorizontLang'] !== null ? htmlspecialchars($row['HorizontLang']) . ' m' : '-' ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Bodenabstand:</div></td>
                                            <td><?= $row['Bodenabstand'] !== null ? htmlspecialchars($row['Bodenabstand']) . ' m' : '-' ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Fahrgeschwindigkeit:</div></td>
                                            <td><?= $row['MaxSpeed'] !== null ? htmlspecialchars($row['MaxSpeed']) . ' m/s' : '-' ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Fahrzeit:</div></td>
                                            <td><?= $row['Fahrzeit'] !== null ? htmlspecialchars($row['Fahrzeit']) . ' min' : '-' ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Max. Förderleistung:</div></td>
                                            <td><?= $row['MaxFörderleistung'] !== null ? htmlspecialchars($row['MaxFörderleistung']) . ' Pers/h' : '-' ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Personen pro Transportmittel:</div></td>
                                            <td><?= htmlspecialchars($row['PersproMittel'] ?? '-') ?></td>
                                        </tr>
                                        <tr>
                                            <td><div class="tablefest">Art der Garagierung:</div></td>
                                            <td><?= htmlspecialchars($row['ArtGaragierung'] ?? '-') ?></td>
                                        </tr>
                                            <tr>
                                                <td><div class="tablefest">Kuppelbar:</div></td>
                                                <td>
                                                    <?= $row['Kuppelbar'] 
                                                        ? '<img src="../images/icons/check.png" alt="Vorhanden" height="30px">' 
                                                        : '<img src="../images/icons/cross.png" alt="Nicht Vorhanden" height="30px">' ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><div class="tablefest">Sitzheizung:</div></td>
                                                <td>
                                                    <?= $row['Sitzheizung'] 
                                                        ? '<img src="../images/icons/check.png" alt="Vorhanden" height="30px">' 
                                                        : '<img src="../images/icons/cross.png" alt="Nicht Vorhanden" height="30px">' ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><div class="tablefest">Besonderheiten:</div></td>
                                                <td><?= htmlspecialchars($row['Besonderheiten'] ?? '-') ?></td>
                                            </tr>
                                        </table>
                                    <?php endwhile; ?>
                                <?php endif;
                                }
                            mysqli_close($db);
                    }else{
                        echo '<div class="pic-else"><img src= "../images/background/skiweltbahn.jpg""></div>';
                    } 
                    ?>
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
        </div>
        
        <script>
            document.getElementById('btn-login').addEventListener('click', function() {//Zum Login wechseln
                window.location.href = 'http://localhost/Project_C37592B/php/login.php';
            });

            document.getElementById('btn-tohub').addEventListener('click', function() {//Zur Seitenauswahl wechseln
                alert('Bitte Link anpassen');
                window.location.href = '';//Link anpassen
            });

            document.addEventListener("DOMContentLoaded", function () {
                const auswahlContainer = document.querySelector('.seilbahn .auswahl');
                const scrollPositionKey = 'auswahlScrollPosition';
                const savedPosition = sessionStorage.getItem(scrollPositionKey);

                if (savedPosition) {
                    auswahlContainer.scrollTop = parseInt(savedPosition, 10);
                }

                auswahlContainer.addEventListener('scroll', () => {
                    sessionStorage.setItem(scrollPositionKey, auswahlContainer.scrollTop);
                });

                document.querySelectorAll('.seilbahn .auswahl button').forEach(button => {
                    button.addEventListener('click', () => {
                        setTimeout(() => {
                            auswahlContainer.scrollTop = parseInt(sessionStorage.getItem(scrollPositionKey), 10);
                        }, 100); 
                    });
                });
            });
        </script>
    </body>
        <!-- 
        Kabinenbahnen
            1 = Funitel
            2 = 3S-Bahn
            3 = Einseilumlaufbahn
            4 = Pendelbahn
        
        Sessellifte
            5 = Schlepplift
            6 = 2er
            7 = 4er
            8 = 6er
            9 = 8er
        Besondere
            10 = Besondere
        -->
</html>