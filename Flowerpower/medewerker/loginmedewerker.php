<?php
  session_start();
  include '../database/DB.php';

  if(isset($_POST['submit'])){

  	$fields = ['gebruikersnaam', 'wachtwoord'];

  	$error = false;

  	foreach($fields as $field){
  		if(!isset($_POST[$field]) || empty($_POST[$field])){
  			$error = true;
  		}
  	}

  	if(!$error){
  		$gebruikersnaam= $_POST['gebruikersnaam'];
  		$wachtwoord= $_POST['wachtwoord'];

  		$db = new database();

  		$db->loginMedewerker($gebruikersnaam, $wachtwoord);
  	}
  }

 ?>
<html>
    <body>
        <h1>Login voor medewerkers</h1>
        <form>
            <input type="text" name="gebruikersnaam" placeholder="Vul in uw gebruikersnaam" required><br>
            <input type="password" name="wachtwoord" placeholder="Vul in uw wachtwoord"required><br>
            <input type="submit" name="submit"><br>
        </form>
    </body>
</html>
