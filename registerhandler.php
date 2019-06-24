<?php
//Hiermee starten we de SESSIE engine
session_start();

require 'db_connect.php';

//Controleren of we via een formulier dit scriptje hebben opgestart
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    // We keren terug index.php

    echo 'Niet toegestaan';
    die();
}


if($_SERVER["REQUEST_METHOD"] == "POST") {

    

    $username = $_POST['username'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];

    $gender = $_POST['gender'];
    $geboren = $_POST['geboren'];
    $email = $_POST['email'];

    $retypepass = $_POST['retypepassword'];
    $password = $_POST['password'];

    $imagefileHandle = fopen('profile.png', 'rb');
    $imageData = fread($imagefileHandle, filesize('profile.png'));
    fclose($imagefileHandle);

   
    if ($password == $retypepass) {

    
        // als gelijk zijn doorgaan naar registreren


try{
    



    //SQL Query samenstellen
    $db_query = $conn->prepare(
        "SELECT * FROM gebruikers 
                  WHERE username = :username
                  OR email = :email"
    );

    $db_query->execute([
        ':username' => $username,
        ':email' => $email
    ]);
//Controleren of er een user gevonden is
    if($db_query->rowCount() > 0) {
        $_SESSION['error'] = 'Gebruikersnaam en/of email bestaat al!';
        
        header('Location: register.php');
        exit(0);
    }
} catch(PDOException $error) {
    echo 'ERROR: ' . $error->getMessage();
    die();
}

/*
 * User bestaat nog niet, dus sla ik de user nu
 * op in de database. En daarna breng ik deze user naar de login pagina
 */
try{
    $db_query = $conn->prepare(
        "INSERT INTO gebruikers(username, email, password, beschrijving, leeftijd, geslacht, profielfoto)
         VALUES(:username, :email, :password, :desc, :leeftijd, :geslacht, :profielfoto)"
    );
    //Password gehashed opgeslagen
    $password = password_hash($password, PASSWORD_DEFAULT);

    $db_query->execute([
        ':username' => $username,
        ':email' => $email,
        ':desc' => $desc,
        ':password' => $password,
        ':leeftijd' => $geboren,
        ':profielfoto' => $imageData,

        ':geslacht' => $gender

    ]);
} catch (PDOException $error) {
    echo "ERROR: " . $error->getMessage();
    die();
}

header('Location: index.php');
exit(0);



    
} else {
    
    


}

}

//1.    Connectie met de database maken
//2.    Query (SQL) samenstellen om te zoeken of de user al bestaat
//3.    SQL-Query uitvoeren
//4.    Controle of er iets gevonden is in de database
/*.    Ja>Registratie formulier
       nee> Nieuwe query om de nieuwe user toe te voegen in de db
*/
//6.    Query uitvoeren
//7.    Naar login
//Connectie met de database maken

?>