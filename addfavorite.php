<?php 
    session_start();
    require 'db_connect.php';
    $topic_id = $_GET['topic_id'];

    echo $topic_id;

    $dbdd = $conn->prepare(
        "SELECT favorite FROM gebruikers WHERE ID = :userid"
    );

    $dbdd->execute([
        ':userid' => $_SESSION['user_id']
    ]);

    $favs = $dbdd->fetchAll();

    $favsd = $favs[0]['favorite'];

    

    $tops = $favsd . ',' . $topic_id;

    echo $tops;

    $ee = explode(",", $favsd);

    $index = 0;
    foreach($ee as $e){

    $dd = $ee[$index++];

    echo $dd;
}

    if($dd != $topic_id){
        $db_user = $conn->prepare(
            // "INSERT  INTO gebruikers (favorite) WHERE ID = :userid VALUES ($topic_id)"
            "UPDATE gebruikers
            SET favorite = :topicids
            WHERE ID = :userids "
        );
    
        $db_user->execute([
            ':userids' => $_SESSION['user_id'],
            ':topicids' => $tops
        ]);
        
    } else {
      
        echo 'topic is al fav ';

        
}
header('Location: ' . $_GET['origin']);
        exit(0);
    


   
?>