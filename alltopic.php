<?php
/**
 * Created by PhpStorm.
 * User: coole
 * Date: 10-4-2019
 * Time: 14:58
 */

include_once 'basic.php';


require 'db_connect.php';
$topicid = $_GET['topicid'];




 
$db_query = $conn->prepare(
    "SELECT * FROM topics 
              WHERE ID = :ID"
);

$db_query->execute([
    ':ID' => $topicid,

]);




$topicd = $db_query->fetch();

$tagt = $db_query->fetchAll();

$db_user = $conn->prepare(
    "SELECT username FROM gebruikers WHERE ID = :userid"
);

$db_user->execute([
    ':userid' => $topicd['gebruikers_ID']
]);

$usernamed = $db_user->fetch();






$_SESSION['topictitle'] = $topicd['titel'];
$_SESSION['topicdesc'] = $topicd['beschrijving'];

$index5 = 0;



?>



<html>
    <head>

    </head>
    <body>
        <div class="rounded center row col-sm-8 bg-dark text-white p-3 mt-5 mb-5">
            title:
            <h2 class="col-sm-7"><?= $_SESSION['topictitle']  ?></h2>
            Posted By:
            <h4 class="col-sm-3"><?= $usernamed['username'] ?></h4>
            descritption:
            <p class="p-4 m-2  w-100">

               <?= $_SESSION['topicdesc'] ?>
            </p>
            <ul class="nav mt-5 mb-5 m-2 row nabar-nav navbar-expand-lg">
                <label>Taggs:</label><br>
                <?php $tags = array_filter(explode("," , $topicd['tag'])); 

                                foreach($tags as $tag){?>
                                    <div class="taggs"><?= $tag ?></div>
                               <?php };
                                    
                                    ?>







            </ul>
        </div>

        <div class="rounded mt-5 mb-5 center col-sm-8 bg-dark text-white p-3">
            <h3>Reply's:</h3>
            <?php  
            
                    require 'db_connect.php';
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

                        // print_r($db_query);
                        // die();

    
                       
    
                        $dbreply = $conn->prepare(
                            "SELECT * FROM replys 
                                      WHERE topics_ID = :topicc
                                      "
                        );
                    
                        $dbreply->execute([
                            ':topicc' => $topicid,
                            
                        ]);

                        $indecc = 0;
                        $indec2 = 0;
                        $indec3 = 0;
                        $indec4 = 0;
                        $indec5 = 0;

                       

            
                    $replies = $dbreply->fetchAll();

                    foreach($replies as $r) { 
                        $db_user = $conn->prepare(
                            "SELECT username FROM gebruikers WHERE ID = :userid"
                        );
                        
                        $db_user->execute([
                            ':userid' => $replies[$indec4++]['gebruikers_ID']
                        ]);

                        $usernm = $db_user->fetchAll();

                        
                        ?>
                    
                         <li class="row sub-replie m-2 ">
                        <div class="bg-light rounded col-sm-12  row ml-0-5 text-dark">
                        
                        <h5 class="col-sm-8"><?= $usernm[0]['username']; ?></h5>
                        <p class="col-sm-4"><?= $replies[$indec3++]['datum'] ?></p>
                        </div>
                           <div class="row col-sm-12 mt-2"> <br>
                        
                           <div class="col-sm-12 mb-5"><?= $replies[$indecc++]['replytext']; ?></div><br>
                           <span class="col-sm-10"></span>
                           <a href="profile.php?user=<?= $replies[$indec5++]['gebruikers_ID']  ?>" class="col-sm-1 center rounded text-14 text-white">Profile</a>
                           <?php if($_SESSION['ADMIN'] == 'true'): ?>
                           <a href="deletereply.php?reply=<?= $replies[$indecc-1]['ID']  ?>&origin=<?= $_SERVER['PHP_SELF'].'?' . 'topicid='.$topicid ?>" class="col-sm-1 center rounded text-14 text-white">Delete</a>
                            <?php endif ?>
                           </li>
                 <?php   } 
            ?>

            <div class="main-reply " >
                <ul class="col-sm-12 m-0 list-control " id="tagList">
               
                </ul>


            </div>
            <div>

            </div>
            <?php if(isset($_SESSION['user_id'])) : ?>
            <div class="row center col-sm-12">
                <form class="col-sm-8 center" action="" method="POST">
                <textarea name="bericht" class="input col-sm-12 " id="new_tag" type="text"></textarea><div class="col-sm-12  text-white "><button id="addtag" class="btn mt-1 mb-1 text-white col-sm-12 center  container bg-vueg center" type="submit">Reply</button></div>
                </form>
            </div>
            <?php else : ?>
          
            <?php endif ?>
        </div>



        <input type="hidden"  name="tags" id="tags">



        </div>
    </body>

   
    </body>
</html>


<?php

    include_once 'footer.php';

    ?>
