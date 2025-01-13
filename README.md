# Project_C37592B


## Hinweis zur Nutzung:
- Die Webseite MUSS auf einem (Lokalen-)Server liegen um PHP und MySQL vollständig ausführen zu können.

## Anleitung zur Nutzung mit einem Lokalenwebserver mit XAMPP

1. ### Nutzung von PHP
    - [Laden](https://www.apachefriends.org/download.html) Sie XAMPP herunter und installieren Sie es
    - Starten Sie dann den Apache Server und legen Sie den Ordner im Verzeichnis:`C:\xampp\htdocs`
    - Rufen Sie dann im Browser: `localhost/"Ordnername"/"dateiname"."dateiendung"` auf

2. ### Nutzung von MySQL
   2.1 **Falls noch nicht geschehen:**<br>
    - [Laden](https://www.apachefriends.org/download.html) Sie XAMPP herunter und installieren Sie es<br>
    - Starten Sie dann den Apache Server und legen Sie den Ordner im Verzeichnis: `C:\xampp\htdocs` ab<br>
    
   2.2 **Einrichten der Datenbank:**
    - Starten Sie zusätzlich den MySQL Server
    - Öfnen Sie anschließend `http://localhost/phpmyadmin/`
    - Erstellen sie nun mit "Neu" eine neue Datenbank mit dem Namen: `projekt_c37592b` mit `utf8_unicode_ci`
    - Wählen Sie nun am linken Rand die erstellte Datenbank aus und wählen Sie oben den Reiter *Importieren*
    - Importieren Sie zuerst die Datei: `users.sql.gz` und bestätigen das ganze mit *ok*
    - Wiederholen Sie die letzten beiden Schritte mit der Datei: `SeilbahnDaten.sql.gz`
    - Rufen Sie dann im Browser: `../php/Homepage.php` auf

4. ### Anschließend sollte die Webseite angezeigt werden und durch die Nutzung der Buttons verschiedene Seilbahnen mit Daten angezeigt werden
    - Standard Account für Anmeldung:<br>
        E-Mail: test@test.de<br>
        Passwort: testtest<br>
        (Erstellen Sie dann einen Neuen Zugang und löschen den Standardzugang um die Sicherheit zu gewährleisten)
        <br>
    - Verlinkungen:
        Die Seite `hinweis.html` wird als Zugangspunkt genommen um auf diese Site zu kommen<br>
        Der Button `Zur Seitenauswahl` auf `Homepage.php` muss auf die Hauptseite von der man auf die Seite kommt<br>
        verlinkt werden (siehe `alert()` Nachricht beim Clicken)
<br>
<br>
   ©2024-2025 Philipp Uhlendorf
