<?php
session_start();

if (!isset($_SESSION["userid"]) || $_SESSION["userid"] === false) {
    header("location: login.php");
    exit;
}
require_once "config.php";
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
            <div id="welcometext">
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
            </div>
            
            <div id="logout">
                <input type="button" class="btn-teriträr" value="Abmelden" id="btn-logout" >
            </div>
        </header>
        <main>
            <div class="flex-container">
                <div id="functions">
                    <input type="submit" class="btn-quarter" name="submit" value="Neuen Zugang anlegen" onclick="showForm('registernutzer')">
                    <br>
                    <input type="submit" class="btn-quarter" name="submit" value="Zugang löschen">
                    <br>
                    <input type="submit" class="btn-quarter" name="submit" value="Neue Seilbahn hinzufügen" onclick="showForm('registerbahn')">
                    <br>
                    <input type="submit" class="btn-quarter" name="submit" value="Seilbahn löschen">
                    <br>
                    <input type="submit" class="btn-quarter" name="submit" value="Datenbank anzeigen" id="btn-datenbank">
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
                <div id="registerbahn" class="form-container">
                   <div id="reg-bahn">
                        <form method="POST" action="reg-bahn.php">
                            <h1>Seilbahn hinzufügen</h1>
                            <div class="bahn-form">
                                <?php if (isset($_SESSION['bahnresult'])): 
                                    echo ($_SESSION['bahnresult']);
                                    unset($_SESSION['bahnresult']);
                                    endif;
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
                            </div>
                        </form>
                    </div> 
                </div>
                <div id="registernutzer" class="form-container">
                    <div id="reg-nutzer">
                        <form method="post" action="register.php">
                            <h1>Neuen Zugang anlegen</h1>
                            <?php if (isset($_SESSION['regresult'])): 
                                    echo ($_SESSION['regresult']);
                                    unset($_SESSION['regresult']);
                                    endif;
                                ?>
                            <div class="reg-form">
                                <input type="text" name="name" class="form-control" placeholder="Vor- und Nachname" required oninvalid="this.setCustomValidity('Bitte einen gültigen Namen eingeben')" oninput="setCustomValidity('')">
                            </div>
                            <div class="reg-form">
                                <input type="email" name="email" class="form-control" placeholder="E-Mail" />
                            </div>
                            <div class="reg-form">
                                <input type="password" name="password" class="form-control" placeholder="Passwort">
                            </div>
                            <div class="reg-form">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Passwort wiederholen">
                            </div>
                            <br>
                            <div class="reg-form">
                                <div class="btn-reg-submit">
                                    <input type="submit" name="submit" class="btn-primary" value="Registrieren" >
                                    <button type="reset">Formular leeren</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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

            document.getElementById('btn-datenbank').addEventListener('click', function() {
                if(confirm("HINWEIS: \nSie werden zur Datenbank weitergeleitet.\nEs gibt keine direkte Verlinkung zu dieser Seite zurück.") == true){
                    window.location.href = 'http://localhost/phpmyadmin/';
                }
            });

            function showForm(formId) {
                const forms = document.querySelectorAll('.form-container');
                forms.forEach(form => form.style.display = 'none');
                document.getElementById(formId).style.display = 'flex';
            }
        </script>
    </body>
</html>
<?php
    mysqli_close($db);
?>