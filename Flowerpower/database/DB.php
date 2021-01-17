<?php
class database{

  private $servername;
  private $database;
  private $gebruikersnaam;
  private $wachtwoord;
  private $conn;

  function __construct() {
    $this->servername = 'localhost';
    $this->database = 'flowerpower';
    $this->gebruikersnaam = 'root';
    $this->wachtwoord = '';

    try{
      $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->gebruikersnaam, $this->wachtwoord);

      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      echo "Connected successfully";
    }  catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function insert_admin(){

    $sql = "INSERT INTO medewerker VALUES (:id, :voorletters, :voorvoegsels, :achternaam, :gebruikersnaam, :wachtwoord);";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([
      'id'=> NULL,
      'voorletters' => 'N',
      'voorvoegsels'=> '',
      'achternaam' => 'WOLDAI',
      'gebruikersnaam' => 'N123',
      'wachtwoord' => password_hash('1234', PASSWORD_DEFAULT)
    ]);
  }

  public function loginMedewerker($gebruikersnaam, $wachtwoord){

    $sql = "SELECT id, gebruikersnaam, wachtwoord FROM medewerker WHERE gebruikersnaam = :gebruikersnaam";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([
      'gebruikersnaam' => $gebruikersnaam,

    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($result);
    print_r($result['wachtwoord']);

    if(is_array($result)){

      if(count($result) > 0){
        if($uname == $result['gebruikersnaam']  && password_verify($psw, $result['wachtwoord'])){

          session_start();
          $_SESSION['id'] = $result['id'];
          $_SESSION['gebruikersnaam'] = $result['gebruikersnaam'];

          header('location: ../medewerker/medewerker.php');

        }
      }else{
        echo 'Failed to login.';
      }

    }else{
      echo 'Failed to login. Please fix your input and try again.';
    }
  }
}
