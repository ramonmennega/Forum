<?php               

                    // beste meneer strootman,
                    // aangezien ik het forum af had voordat u begon uit te leggen voor php voor het forum,
                    // is heel wat code oud en niet slim opgebouwd. Daarom heb ik de grabtopicsphp.php wat beter gemaakt
                    // vergeleken met de andere grabtopics. daarom wou ik vragen of u de grabtopics.php kunt gebruiken
                    // als beoordeel materiaal.


                    require 'db_connect.php';  // de connectie met de database
                    // type waarop je wilt filteren
                    $thread = 'PHP';

                    // maakt een statement om alle topics op te halen
                    $db_query = $conn->prepare(
                        "SELECT * FROM topics"
                    );
                
                    $db_query->execute([
                        
                    ]);

                    // Fetcht alle topics

                    $topics = $db_query->fetchAll(PDO::FETCH_ASSOC);

                    //  Foreached de binnengehaalde topics en zet elke resultaar in de var $topic met sub var $t

                    foreach($topics as $topic => $t) {

                   
                        $db_user = $conn->prepare(
                            "SELECT username FROM gebruikers WHERE ID = :userid"
                        );
                    
                        $db_user->execute([
                            ':userid' => $t['gebruikers_ID']
                        ]);

                      
                    
                        


                    $username = $db_user->fetch();

                 
                        ?>
                        
                        
                        <?php if($t['page'] == $thread)
                        {  

                            
                               ?>
                        
                        
                     <li class=" bg-dark mt-3 p-2 rounded text-dark mb-3 row">
                         
                    <p class="nav-link text-center topictit title link col-sm-5 center w-100 rounded bg-light text-dark">
                            <!-- kijken hoe ik input van de database in de list elementen krijg -->
                            

                           <?= $t['titel']  ?>

                    </p>


                    <p class="col-sm-2 center rounded bg-light">
                        Username:<br>
                        <a href="profile.php?user=<?= $t['gebruikers_ID']  ?>"><?=  $username[0]  ?></a>

                        <br>
                        <a class="link text-success" href="profile.php">
                        </a>
                    </p>

                    <p class="col-sm-1 center rounded bg-light">
                        
                        Votes: 444
                    </p>
                   

                    <p class="col-sm-2 center rounded bg-light">
                                           date:<?= $t['datum'];  ?>      <br> 
                    </p>
                    <?php if($_SESSION['ADMIN'] == 'true'):  ?>
                    <button onclick="location.href='deletetopic.php?topicid=<?php $t['ID'] ?>&origin=<?= $_SERVER['PHP_SELF'] ?>'" class="col-sm-1 text-white bg-danger btn h-20p center rounded text-20 text-center">
                        
                        x
                    </button>
                    <?php endif ?>

                    <br>

                    <p class="col-sm-11 p center rounded bg-light p-3 mb-3  text-dark">
                        <span class="text-dark text-20">Description:</span><br><br>
                    
                        <?= $t['beschrijving'];  ?> 
                        
                          
                    
                    </p>


                    <div class="nav mt-2 mb-2 col-sm-12 text-white ml-0 p-0 row nabar-nav navbar-expand-lg">

                        <label class="">Tags:</label><br>
                            
                        <?php $tags = array_filter(explode("," , $t['tag'])); 

                                foreach($tags as $tag){?>
                                    <div class="taggs"><?= $tag ?></div>
                               <?php };
                                    
                                    ?>

                    </div>
                    <div class="col-sm-5"></div>
                    
     

                    <button class="btn  center m-1 col-sm-2"></button>
                    
                    <button class="btn  center m-1 col-sm-2"></button>
         

<button class="btn  center m-1 col-sm-2"></button>

<button class="btn  center m-1 col-sm-2"></button>
             

                
                  


                <button class="btn btn-light center m-1 col-sm-2" onclick="location.href='alltopic.php?topicid=<?= $t['ID'] ?>'">Reply</button>

                                </li>
                                <?php } 
                    }


                ?>


            