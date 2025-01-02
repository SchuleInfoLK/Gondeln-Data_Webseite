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
---------------------------------------------------------------------------------------------------------*/

use PSpell\Config;

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
                                            echo "<button type='submit' name='id' id='btn-wahl' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
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
                                            echo "<button type='submit' name='id' id='btn-wahl' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;
                                    case 4:
                                        echo "<h3>Pendelbahn</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST'>";
                                            echo "<button type='submit' name='id' id='btn-wahl' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
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
                                            echo "<form method='POST' style='display:inline;'>";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;

                                    case 6:
                                        echo "<h3>2er-Sessellift</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST' style='display:inline;'>";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;

                                    case 7:
                                        echo "<h3>4er-Sessellift</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST' style='display:inline;'>";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;
                                    case 8:
                                        echo "<h3>6er-Sessellift</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST' style='display:inline;'>";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;
                                    
                                    case 9:
                                        echo "<h3>8er-Sessellift</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST' style='display:inline;'>";
                                            echo "<button type='submit' name='id' value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</button>";
                                            echo "</form> ";
                                        }
                                        break;
        
                                    default:
                                        echo "<h3>Keine spezifische Kategorie für typ_db = {$i}</h3>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<form method='POST' style='display:inline;'>";
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
                                echo "<form method='POST' style='display:inline;'>";
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
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Baujahr</th>
                                                    <th>Typ</th>
                                                    <th>Standort</th>
                                                    <th>Hersteller</th>
                                                    <th>Höhe Talstation in m</th>
                                                    <th>Höhe Bergstation in m</th>
                                                    <th>Höhendifferenz in m</th>
                                                    <th>Streckenlänge in m</th>
                                                    <th>Bodenabstand in m</th>
                                                    <th>Fahrgeschwindigkeit Strecke in m/s</th>
                                                    <th>Max. Förderleistung in Pers/h</th>
                                                    <th>Fahrzeit in min</th>
                                                    <th>Personen pro Transportmittel</th>
                                                    <th>Art der Garagierung</th>
                                                    <th>Kuppelbar</th>
                                                    <th>Sitzheizung</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <div class="pic-db">
                                                    <img src= <?=htmlspecialchars($row['Bildpfad'])?> alt="Bild Beförderungsmittel">
                                                </div>
                                                    <tr>
                                                        <td><?= htmlspecialchars($row['Baujahr']) ?></td>
                                                        <td><?= htmlspecialchars($row['Typ']) ?></td>
                                                        <td><?= htmlspecialchars($row['Standort']) ?></td>
                                                        <td><?= htmlspecialchars($row['Hersteller']) ?></td>
                                                        <td><?= htmlspecialchars($row['HTal']) ?></td>
                                                        <td><?= htmlspecialchars($row['HBerg']) ?></td>
                                                        <td><?= htmlspecialchars($row['HDiff']) ?></td>
                                                        <td><?= htmlspecialchars($row['HorizontLang']) ?></td>
                                                        <td><?= htmlspecialchars($row['Bodenabstand']) ?></td>
                                                        <td><?= htmlspecialchars($row['MaxSpeed']) ?></td>
                                                        <td><?= htmlspecialchars($row['MaxFörderleistung']) ?></td>
                                                        <td><?= htmlspecialchars($row['Fahrzeit']) ?></td>
                                                        <td><?= htmlspecialchars($row['PersproMittel']) ?></td>
                                                        <td><?= htmlspecialchars($row['ArtGaragierung']) ?></td>
                                                        <td><div class="iconstf"><?= $row['Kuppelbar'] ? '<img src= "../images/icons/check.png" alt="Vorhanden" height="30px">' : '<img src= "../images/icons/cross.png" alt="Nicht Vorhanden" height="30px">' ?></div></td>
                                                        <td><div class="iconstf"><?= $row['Sitzheizung'] ? '<img src= "../images/icons/check.png" alt="Vorhanden" height="30px">' : '<img src= "../images/icons/cross.png" alt="Nicht Vorhanden" height="30px">' ?></div></td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    <?php endwhile; ?>
                                <?php endif;
                                }
                            mysqli_close($db);
                    }else{
                        echo '<div class="pic-db"><img src= "../images/background/skiweltbahn.jpg""></div>';
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
                    <a href="../php/Homepagetest.php">Datenschutz</a>
                </p>
            </footer>
        </div>
        
        <script>
            document.getElementById('btn-login').addEventListener('click', function() {//Zum Login wechseln
                window.location.href = 'http://localhost/Project_C37592B/php/login.php';
            });

            document.addEventListener("DOMContentLoaded", function () {//Scrollbar nach wechsel von class gondeln wieder auf vorherige Position setzten
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
            3 = Einsilumlaufbahn
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