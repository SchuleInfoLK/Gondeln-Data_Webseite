<?php
require_once "config.php";
$sql = "SELECT * FROM SeilbahnDaten";
$result = $db->query($sql);
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
                <h1>Willkommen</h1>
                <div id="logout">
                    <input type="submit" class="btn-teriträr" name="submit" value="Anmelden" id="btn-login" >
                </div>
            </header>
            <main>
                <?php if ($result->num_rows > 0): 
                ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Baujahr</th>
                                <th>Typ</th>
                                <th>Standort</th>
                                <th>Hersteller</th>
                                <th>Höhe Talstation</th>
                                <th>Höhe Bergstation</th>
                                <th>Höhendifferenz</th>
                                <th>Horizontale Länge</th>
                                <th>Bodenabstand</th>
                                <th>Fahrgeschwindigkeit Strecke</th>
                                <th>Max. Förderleistung</th>
                                <th>Fahrzeit</th>
                                <th>Personen pro Transportmittel</th>
                                <th>Art der Garagierung</th>
                                <th>Kuppelbar</th>
                                <th>Sitzheizung</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['Baujahr']) ?></td>
                                    <td><?= htmlspecialchars($row['Typ']) ?></td>
                                    <td><?= htmlspecialchars($row['Standort']) ?></td>
                                    <td><?= htmlspecialchars($row['Hersteller']) ?></td>
                                    <td><?= htmlspecialchars($row['HTal']) ?><p>m</p></td>
                                    <td><?= htmlspecialchars($row['HBerg']) ?><p>m</p></td>
                                    <td><?= htmlspecialchars($row['HDiff']) ?><p>m</p></td>
                                    <td><?= htmlspecialchars($row['HorizontLang']) ?><p>m</p></td>
                                    <td><?= htmlspecialchars($row['Bodenabstand']) ?><p>m</p></td>
                                    <td><?= htmlspecialchars($row['MaxSpeed']) ?><p>m/s</p></td>
                                    <td><?= htmlspecialchars($row['MaxFörderleistung']) ?><p> Pers/h</p></td>
                                    <td><?= htmlspecialchars($row['Fahrzeit']) ?><p> min</p></td>
                                    <td><?= htmlspecialchars($row['PersproMittel']) ?><p> Pers</p></td>
                                    <td><?= htmlspecialchars($row['ArtGaragierung']) ?></td>
                                    <div class="iconstf">
                                        <td><?= $row['Kuppelbar'] ? '<img src= "../images/icons/check.png">' : '<img src= "../images/icons/cross.png">' ?></td>
                                        <td><?= $row['Sitzheizung'] ? '<img src= "../images/icons/check.png">' : '<img src= "../images/icons/cross.png">' ?></td>
                                    </div>
                                </tr>
                        </tbody>
                    </table>
                    <div class="pic-db">
                        <img src= <?=htmlspecialchars($row['Bildpfad'])?>>
                    </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Keine Daten gefunden.</p>
                <?php endif;
                mysqli_close($db);
                ?>
            </main> 
            <footer>
            <p>
                <a href="../html/Impressum.html">Impressum</a>
                </p>
                <p>&copy; 2024 Philipp Uhlendorf</p>
                <p>
                    <a href="../html/Datenschutz.html">Datenschutz</a>
                </p>
            </footer>
        </div>
        
        <script>
            document.getElementById('btn-login').addEventListener('click', function() {
                window.location.href = 'http://localhost/Project_C37592B/php/login.php';
            });
        </script>
    </body>
</html>