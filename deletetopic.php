<?php
    require 'db_connect.php';
    session_start();
    $topic = $_GET['topicid'];


    if($_SESSION['ADMIN'] == 'true'){
        $db_query = $conn->prepare(
            "DELETE FROM topics WHERE ID = :topic"
        );
        //Password gehashed opgeslagen
    
        $db_query->execute([
            ':topic' => $topic,
          
    
        ]);

        $db_query = $conn->prepare(
            "DELETE FROM replys WHERE topics_ID = :topic"
        );
        //Password gehashed opgeslagen
    
        $db_query->execute([
            ':topic' => $topic,
          
    
        ]);

        header('Location: ' . $_GET['origin']);
    } else {
        echo 'Geen toegan malloot';
        header('Location: index.php');
        die();
    }
   
