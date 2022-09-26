<?php
/* Attemps to connect to MySQL database */
try {
    $pdo=new PDO("mysql:host=localhost;dbname=db_finance","root","d*eaznv.");
    //Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    die("Error:Connexion echouée." .$e->getMessage());
}
?>