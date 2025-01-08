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
    <div id="welcome">
        <h1>Sie wurden erforlgreich abgemeldet</h1> 
    </div>
</body>

</html>
<?php
session_start();
if(session_destroy()){
    header("Refresh:2; url= ../php/Homepage.php");
    exit;
}
?>