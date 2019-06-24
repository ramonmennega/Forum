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



    $topic_title = $_POST['topic_title'];
    $topic_beschrijving = $_POST['topic_beschrijving'];
    $datum = date('c');
    $tag = $_POST['htags'];
    $page = $_POST['page'];








        // als gelijk zijn doorgaan naar registreren



        /*
         * User bestaat nog niet, dus sla ik de user nu
         * op in de database. En daarna breng ik deze user naar de login pagina
         */
        try{
            $db_query = $conn->prepare(
                "INSERT INTO topics(titel, beschrijving, gebruikers_ID, datum, tag, page)
                 VALUES(:title, :beschrijving, :gebruikers_ID, :datum, :tag, :page)"
            );
            //Password gehashed opgeslagen


            $db_query->execute([
                ':title' => $topic_title,
                ':beschrijving' => $topic_beschrijving,

                ':gebruikers_ID' => $_SESSION['user_id'],
                ':datum' => $datum,
                ':tag' => $tag,
                ':page' => $page,



            ]);
        } catch (PDOException $error) {
            echo "ERROR: " . $error->getMessage();
            die();
        }

        if($page == 'HTML') {
            $page = 'html5.php';
        
            echo $realpage;
        } elseif($page == 'BOOTSTRAP') {
            $page = 'bootstrap.php';
        
        } elseif($page == 'CSS') {
            $page = 'css3.php';
        
        } elseif($page == 'PHP') {
            $page = 'php.php';
        
        } elseif($page == 'SQL') {
            $page = 'sql.php';
        
        } elseif($page == 'JAVASCRIPT') {
            $page = 'javascript.php';
        
        } else {
           echo 'Geen toegang ga terug en wees eens braaf';
           die();
        }

        header('Location: '. $page);






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