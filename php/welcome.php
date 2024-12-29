<?php
require_once "config.php";
session_start();

$userid = $_SESSION["userid"];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
    <title>Home</title>
    <link rel="icon" type="image/jpg"
		  href="../images/icon.jpg">
</head>

<body>
    <div id="welcome">
        <h1>Willkommen <?php echo htmlspecialchars($user['name']); ?></h1> 
    </div>
</body>

</html>
<?php
session_start();

if(!isset($_SESSION["userid"]) || $_SESSION["userid"] !== false){
    header("Refresh:1; url= ../authsystem/Mainsite.php");
   exit;
}else{
    header("location: login.php");
   exit;
}
?>