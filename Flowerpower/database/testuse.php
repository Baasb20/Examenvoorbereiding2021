<?php
$servername = "localhost";
$gebruikersnaam = "gebruikersnaam";
$wachtwoord = "wachtwoord";
$dbname = "flowerpower";

// Create connection
$conn = mysqli_connect($servername, $gebruikersnaam, $wachtwoord, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO medewerker (id, voorletter, tussenvoegesel, achternaam, gebruikersnaam, wachtwoord)
VALUES (NULL, 'N', 'van', 'Woldai', 'N123', 'root')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
