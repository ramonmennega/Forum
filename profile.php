<?php
/**
 * Created by PhpStorm.
 * User: coole
 * Date: 13-4-2019
 * Time: 14:09
 */


include_once 'basic.php';


$db_user = $conn->prepare(
    "SELECT * FROM gebruikers WHERE ID = :userid"
);

$db_user->execute([
    ':userid' => $_GET['user']
]);

$user2 = $db_user->fetch(PDO::FETCH_ASSOC);


?>



<html>
    <head>

    </head>
    <body>

            <div class="row profileContainer rounded p-3 m-5 col-sm-8 center bg-white">
                <h2 class="col-sm-12 text-center">User info</h2>
                <div  class="col-sm-2 mb-3 profileImg">
                    <?php if(isset($_SESSION['guest'])): ?>
                        <img src="data:image/jpg;base64, <?= base64_encode($user2['profielfoto']) ?>" style="width: 150px; height: 150px " id="imgProfile" class=" " alt="profiel">
                    <?php else: ?>
                        <img src="profile.png" id="imgProfile" class="circle s img-fluid" alt="profiel">
                    <?php endif; ?>
                </div>
                <div class="col  row">
                    <label class="col-sm-2 m-2 font-weight-bolder"   for="">username:</label>
                    <?php if(isset($_SESSION['guest'])): ?>
                        <div class=" col-sm-6 text-center m-2 username" href="#" id="ProfileHeader" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $user2['username'] ?>
                        </div>
                    <?php endif; ?>                   <div class="col-sm-2 ss"></div>

                    <label class="col-sm-2 m-2 font-weight-bolder" for="">gender:</label>

                    <?php if(isset($_SESSION['guest'])): ?>

                        <div class=" col-sm-6 text-center m-2 username" href="#" id="ProfileHeader" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=$user2['geslacht'] ?>
                        </div>
                    <?php endif; ?><div class="col-sm-2"></div>
                    <label class="col-sm-2 m-2 font-weight-bolder " for="">age:</label>
                    <?php if(isset($_SESSION['guest'])): ?>
                        <div class=" col-sm-6 text-center m-2 username" href="#" id="ProfileHeader" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $user2['leeftijd'] ?>
                        </div>
                    <?php endif; ?>  <div class="col-sm-2"></div>
                    <label class="col-sm-2 m-2 font-weight-bolder " for="">votes:</label><?php if(isset($_SESSION['votes'])): ?>
                        <div class=" col-sm-6 text-center m-2 username" href="#" id="ProfileHeader" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION['votes'] ?>
                        </div>
                    <?php endif; ?>


                </div>
                <br><br>
                <div class="col-sm-12 row profileInfo">
                    <h4 class="col-sm-8 p-2">User Description</h4>                    <div class="col-sm-4"></div>

                    <?php if(isset($_SESSION['guest'])): ?>


                        <p class="p-2 border w-100" name="beschrijving"  style="margin: 5px; resize: none; chan">
                            <?= $user2['beschrijving'] ?>
                        </p>


                    <?php endif; ?>
                    <div class="col-sm-8"></div>

                </div>



            </div>



            <!-- favorite -->
            
           <?php if(isset($_SESSION['user_id'])): ?>
            <?php if($_SESSION['ADMIN'] == 'true'): ?>
            <?php if($_SESSION['user_id'] == $_GET['user']): ?>
            <div class="col-sm-8 center bg-light rounded p-3 m-5">
                <div class=" favTopics">
                    <ul class="m-0 p-4">
                        <h3>Favorite Topics</h3>

                        <?php 
                             $db_query = $conn->prepare(
                                "SELECT favorite FROM gebruikers WHERE ID = :id"
                            );
                        
                            $db_query->execute([
                                ':id' => $_SESSION['user_id']
                            ]);

                            $fav = $db_query->fetchAll();

                            // print_r($fav[0][0]);

                            $fave = explode(",", $fav[0][0]);

                            // print_r( $fave);

                            $db_query = $conn->prepare(
                                "SELECT * FROM topics"
                            );
                        
                            $db_query->execute([
                            ]);

                            $topps = $db_query->fetchAll();

                            $indexs = 0;

                            $indexx = 0;

                            $indexxx = 0;


                            foreach($topps as $ff){
                                    $b =  $topps[$indexs++][0];
                               
                                foreach($fave as $rr){
                                    $a =  $fave[$indexx];
                                   
                                    // if($a == $b){
                                    
                                    //    $indexx = $indexx+1;


                                    // } else {
                                    //     echo 'nee';
                                    // }

        
                                    }
                                    foreach($topps as $rr){
                                        if($a == $b){
                                           ?>
                                            <li class="bg-dark row text-white m-2 rounded p-3 text-18">
                                                <div class="col-sm-10">titel: <?= $topps[$indexxx++]['titel'] ?></div><div class="col-sm-12 m-2 border p-2"><?= $topps[$indexxx-1]['beschrijving'] ?></div><div class="col-sm-3 center rounded text-center bg-white text-danger"><a class="text-danger" href="deletefav.php?favid=<?php ?>">  Unfavorite</a></div><div class="col-sm-3 center rounded text-center bg-white text-danger"><a class="text-danger" href="deletefav.php?favid=<?php ?>">  Go To..</a></div></li><?php
    
    
                                        } else {
                                            // echo 'nee';
                                            
                                        }
            
                                }
                            }  
                            
                        
                            

                            // if($a == $b){
                            //     echo 'ja';
                            // } else {
                            //     echo 'nee';
                            // }


                           

                        ?>
                    </ul>
                </div>
            </div>
            <?php endif ?>
            <?php endif ?>

            <?php endif ?>



    </body>

    <script>
        var overlay = document.getElementById('popupupload');

        function upload() {
            overlay.style.display = '';
            overlay.style.cursor = 'pointer';




        }
        
        function closeupload() {
            overlay.style.display = 'none';

        }
    </script>
</html>


<?php


include_once 'footer.php';

?>
