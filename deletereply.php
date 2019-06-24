<?php 
    require 'db_connect.php';

    $reply = $_GET['reply'];
    session_start();
    echo $reply;

    
    if($_SESSION['ADMIN'] == 'true'){
        $db_query = $conn->prepare(
            "DELETE FROM replys WHERE ID = :topic"
        );
        //Password gehashed opgeslagen
    
        $db_query->execute([
            ':topic' => $reply,
          
    
        ]);

        header('Location: ' . $_GET['origin']);
    } else {
        echo 'Geen toegan malloot';
        header('Location: index.php');
        die();
    }
?>