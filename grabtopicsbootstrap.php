<?php
                    require 'db_connect.php';

                
                    // type waarop je wilt filteren
                    $thread = 'BOOTSTRAP';




                    $db_query = $conn->prepare(
                        "SELECT * FROM topics"
                    );
                
                    $db_query->execute([
                        
                    ]);


                    $topics = $db_query->fetchAll();

                    // $_SESSION['topictext'] = $topics['beschrijving'];
                    // $_SESSION['topicid'] = $topics['ID'];
                    // $_SESSION['topicdatum'] = $topics['datum'];
                    // $_SESSION['topicuser'] = $topics['gebruikers_ID'];

                    $index1 = 0;
                    $index2 = 0;
                      
                    $index3 = 0;
                    $index4 = 0;
                    $index6 = 0;
                    $index5 = 0;
                    $indexpage = 0;
                    $indexuser = 0;
                    $indexje = 0;
                    $indexjes = 0;
                    $indexid = 0;
                    $indexidd = 0;
                    $indexiddd = 0;
                    $indexidddd = 31;



                    $indexiddddd = 31;

                    
                
               


                   




                    
                  

                    

                    


                    

                    foreach($topics as $t) {

                   
                        $db_user = $conn->prepare(
                            "SELECT username FROM gebruikers WHERE ID = :userid"
                        );
                    
                        $db_user->execute([
                            ':userid' => $topics[$indexje++][1]
                        ]);

                        $IDDD = $conn->prepare(
                            "SELECT ID FROM topics"
                        );
                    
                        $IDDD->execute([
                          
                        ]);
                        


                    $usernames = $db_user->fetch();

                    $IDD = $IDDD->fetchAll();


                    
                    

                    




                    $username = $usernames[0];

    
 
                                
                        
                      

    
                        	   
                   

                        
                       
                        ?>
                        
                        
                        <?php if($topics[$indexpage++][6] == $thread)
                        {  

                            
                               ?>
                        
                        
                     <li class=" bg-dark mt-3 p-2 rounded text-dark mb-3 row">
                         
                    <p class="nav-link text-center topictit title link col-sm-5 center w-100 rounded bg-light text-dark">
                            <!-- kijken hoe ik input van de database in de list elementen krijg -->
                            

                           <?php print_r($topics[$index1++][2]);  ?>

                    </p>


                    <p class="col-sm-2 center rounded bg-light">
                        Username:<br>
                        <a href="profile.php?user=<?= $topics[$indexjes++][1]  ?>"><?php  print_r( $username);  ?></a>

                        <br>
                        <a class="link text-success" href="profile.php">
                        </a>
                    </p>

                    <p class="col-sm-1 center rounded bg-light">
                        
                        Votes: 444
                    </p>
                   

                    <p class="col-sm-2 center rounded bg-light">
                                           date:<?php print_r($topics[$index3++][4]);  ?>      <br> 
                    </p>
                    <?php if($_SESSION['ADMIN'] == 'true'):  ?>
                    <button onclick="location.href='deletetopic.php?topicid=<?php print_r($IDD[$indexpage-1][0]) ?>&origin=<?= $_SERVER['PHP_SELF'] ?>'" class="col-sm-1 text-white bg-danger btn h-20p center rounded text-20 text-center">
                        
                        x
                    </button>
                    <?php endif ?>

                    <br>

                    <p class="col-sm-11 p center rounded bg-light p-3 mb-3  text-dark">
                        <span class="text-dark text-20">Description:</span><br><br>
                    
                        <?php print_r($topics[$index4++][3]);  ?> 
                        
                          
                    
                    </p>


                    <div class="nav mt-2 mb-2 col-sm-12 text-white ml-0 p-0 row nabar-nav navbar-expand-lg">

                        <label class="">Tags:</label><br>
                            
                        <?php $tags = array_filter(explode("," , $topics[$index5++][5])); 

                                foreach($tags as $tag){?>
                                    <div class="taggs"><?= $tag ?></div>
                               <?php };
                                    
                                    ?>

                    </div>
                    <div class="col-sm-5"></div>
                    <?php if($_SESSION['ADMIN'] == 'true'): ?>
                    
                    <?php if(isset($_SESSION['user_id'])): ?>
                    <button class="btn btn-light center m-1 col-sm-2" onclick="location.href='addfavorite.php?topic_id=<?php  print_r($IDD[$indexpage-1][0]); ?>&origin=<?= $_SERVER['PHP_SELF'] ?>'">Favorite</button>
                    
                    <button class="btn btn-light center m-1 col-sm-2" onclick="alert('u have voted')">Vote</button>
                                <?php else: ?>

                    <button class="btn  center m-1 col-sm-2"></button>
                    
                    <button class="btn  center m-1 col-sm-2"></button>
                <?php endif ?>
                <?php else: ?>

<button class="btn  center m-1 col-sm-2"></button>

<button class="btn  center m-1 col-sm-2"></button>
                <?php endif ?>

                
                  


                <button class="btn btn-light center m-1 col-sm-2" onclick="location.href='alltopic.php?topicid=<?php  print_r($IDD[$indexpage-1][0]) ?>'">Reply</button>

                                </li>
                                <?php } else {
                                    

                    $index1 = $index1+1;
                    $indexidd =$indexidd+1;
                    $indexiddd =$indexiddd+1;

                    $index2 = $index2+1;
                    
                    $indexiddddd = $indexiddddd+1;
                    $index3 = $index3+1;
                    $index4 = $index4+1;
                    $index6 = $index6+1;
                    $indexidddd = $indexidddd+1;
                    $indexjes = $indexjes+1;

                    $index5 = $index5+1;
                     
                    $indexid = $indexid+1 ;

                    


                    
                    
                }
                    }


                ?>


            