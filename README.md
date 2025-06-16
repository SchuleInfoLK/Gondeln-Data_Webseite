# Gondeldata Webseite
Notice: If there are some Errors or Problem you can report this [here](https://github.com/SchuleInfoLK/Gondeln-Data_Webseite/issues)
[English below]


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
    - Verlinkungen:<br>
        Die Seite `hinweis.html` wird als Zugangspunkt genommen um auf diese Site zu kommen<br>
        Der Button `Zur Seitenauswahl` auf `Homepage.php` muss auf die Hauptseite von der man auf die Seite kommt<br>
        verlinkt werden (siehe `alert()` Nachricht beim Clicken)
<br>
## Note on Usage:
- The website MUST be hosted on a (local) server to fully execute PHP and MySQL.

## Instructions for Use with a Local Web Server using XAMPP

1. ### Using PHP
    - [Download](https://www.apachefriends.org/download.html) and install XAMPP  
    - Then start the Apache Server and place the folder in the directory: `C:\xampp\htdocs`  
    - Then open the browser and go to: `localhost/"foldername"/"filename"."fileextension"`

2. ### Using MySQL
   2.1 **If not already done:**<br>
    - [Download](https://www.apachefriends.org/download.html) and install XAMPP<br>
    - Then start the Apache Server and place the folder in the directory: `C:\xampp\htdocs`<br>
    
   2.2 **Setting up the Database:**
    - Also start the MySQL Server  
    - Then open `http://localhost/phpmyadmin/`  
    - Create a new database by clicking on "New" with the name: `projekt_c37592b` and use `utf8_unicode_ci`  
    - Now select the created database from the left panel and choose the *Import* tab at the top  
    - First import the file: `users.sql.gz` and confirm by clicking *OK*  
    - Repeat the last two steps with the file: `SeilbahnDaten.sql.gz`  
    - Then open in your browser: `../php/Homepage.php`

4. ### The website should now be displayed, and by using the buttons, different cableways with data should be shown  
    - Default account for login:<br>
        E-mail: test@test.de<br>
        Password: testtest<br>
        (Then create a new account and delete the default one to ensure security)  
        <br>
    - Links:<br>
        The page `hinweis.html` is used as the access point to get to this site<br>
        The button `Zur Seitenauswahl` on `Homepage.php` must link back to the main page from which this page is accessed<br>
        (see the `alert()` message when clicking)

<br>
<br>
   ©2024-2025 Philipp Uhlendorf
