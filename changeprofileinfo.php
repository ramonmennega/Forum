<?php 
    session_start();

    require 'db_connect.php';

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        // We keren terug index.php
    
        echo 'Niet toegestaan';
        die();
    }
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    
        
    
        $username = $_POST['username'];
        $geboren = $_POST['geboren'];
        $beschrijving = $_POST['beschrijving'];
        

        // $db_query = $conn->prepare(
        //     "SELECT * FROM gebruikers
        //     WHERE ID = :userid"
        // );
    
        // $db_query->execute([
            

        //     ':userid' => $_SESSION['user_id'],


        // ]);

        // $pff = $db_query->fetch(PDO::FETCH_ASSOC);


       
       






        
        
    
       
       
    
        
            // als gelijk zijn doorgaan naar registreren
            
    
    try{
        $db_query = $conn->prepare(
            "SELECT * FROM gebruikers 
                      WHERE username = :username"
        );
    
        $db_query->execute([
            ':username' => $username,
          
        ]);

        $dbg = $db_query->fetchAll();
        
        $usernaam = $dbg[0][1];

      
    //Controleren of er een user gevonden is
    
         
       
           
            
    if($_SESSION['username'] == $username) {
        //SQL Query samenstellen
        $db_query = $conn->prepare(
            "UPDATE gebruikers SET username = :username,  leeftijd = :geboren, beschrijving = :beschrijving
            WHERE ID = :userid"
        );
    
        $db_query->execute([
            ':username' => $username,
            ':geboren' => $geboren,

            ':beschrijving' => $beschrijving,

            ':userid' => $_SESSION['user_id'],


        ]);
        $_SESSION['error'] = '';
        $_SESSION['username'] = $username;
        $_SESSION['beschrijving'] = $beschrijving;
        $_SESSION['leeftijd'] = $geboren;
    }

   
        elseif($db_query->rowCount() > 0) {
            $_SESSION['error'] = 'Gebruikersnaam bestaat al!';
            header('Location: profileChange.php');
            exit(0);

         } 
        
       
    else { 
    
        
        //SQL Query samenstellen
        $db_query = $conn->prepare(
            "UPDATE gebruikers SET username = :username,  leeftijd = :geboren, beschrijving = :beschrijving
                      WHERE ID = :userid"
        );
    
        $db_query->execute([
            ':username' => $username,
            ':geboren' => $geboren,
            ':beschrijving' => $beschrijving,
       



            ':userid' => $_SESSION['user_id'],


        ]);
        $_SESSION['error'] = '';
        $_SESSION['username'] = $username;
        $_SESSION['beschrijving'] = $beschrijving;
        $_SESSION['leeftijd'] = $geboren;
    } 
}

     catch(PDOException $error) {
        echo 'ERROR: ' . $error->getMessage();
        die();
    }
}
    

    header('Location: profileChange.php');
    exit(0);

    
    ?>