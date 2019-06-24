                    
  <?php           
session_start();
  if(isset($_POST['bericht'])){
                    $_POST['bericht'];

                    } else {
                        $_POST['bericht'] = NULL;
                    }


                    $db_query = $conn->prepare(
                        "INSERT INTO replys(topics_ID, gebruikers_ID, replytext, datum)
                         VALUES(:topicd, :username, :desc, :datumr)"
                    );
                    //Password gehashed opgeslagen
                   
                
                    $db_query->execute([
                        ':username' => $_SESSION['user_id'],
                        ':desc' => $_POST['bericht'],
                        ':datumr' => date('c'),
                        ':topicd' => $topicid,

                
                    ]);

                   

                    $dbreply = $conn->prepare(
                        "SELECT * FROM replys 
                                  WHERE topics_ID = :topicc
                                  "
                    );
                
                    $dbreply->execute([
                        ':topicc' => $topicid,
                        
                    ]);
                    ?>