<?php
    include_once 'basic.php';

    
   
?>

<div class=" profileContainer rounded p-3 m-5 col-sm-8 center bg-white">
                <h2 class="col-sm-12 text-center">User info</h2>


                <div class="col-sm-2 center mb-3 profileImg">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <img src="data:image/jpg;base64, <?= base64_encode($user['profielfoto']) ?>" style="width: 150px; height: 150px " id="imgProfile" class=" " alt="profiel">
                    <?php else: ?>
                        <img src="profile.png" id="imgProfile" class="circle s img-fluid" alt="profiel">
                    <?php endif; ?>
                    <a href="pfchange.php">Change profile picture</a>
               <form action="changeprofileinfo.php"  class="m-0 p-0 col-sm-12 center" enctype="multipart/form-data" method="POST">
      
                    
                </div>
               
                <div class="col-sm-12 center  ">
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="col-sm-12  btn text-danger text-20 "><?= $_SESSION['error']  ?></div>
                    <?php else: ?>
                    <div class="col-sm-12  btn text-white text-20 ">ee</div>
                    <?php endif ?>
                    <label class="col-sm-4 text-center m-2 font-weight-bolder"   for="">username: </label>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <input type="text" name="username" value="<?= $_SESSION['username']?>" class=" col-sm-4 text-center center m-2" id="ProfileHeader" >
                            
                        
                    <?php endif; ?>                   <div class="col-sm-2 ss"></div>


                   
                    
                    <label class="col-sm-4 text-center  m-2 font-weight-bolder " for="">age:</label>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <input name="geboren" value="<?= $_SESSION['leeftijd'] ?>" type="date" class=" col-sm-4 center text-center m-2 username" id="ProfileHeader" aria-expanded="false">
                            
                        
                    <?php endif; ?>  <div class="col-sm-2"></div>
                    


                </div>
                <br><br>
                <div class="col-sm-12  profileInfo">
                    <h4 class="col-sm-8">User Description</h4>                    <div class="col-sm-4"></div>

                    <?php if(isset($_SESSION['user_id'])): ?>


                        <textarea class="w-100" cols="10" rows="6" name="beschrijving"  style="margin: 5px; resize: none;"><?= $_SESSION['beschrijving'] ?></textarea>


                    <?php endif; ?>
                    <div class="col-sm-8"></div>

                </div>

                <button class="btn col-sm-12 center btn-success ">Save Changes</button>

                </form>



            </div>

            <?php
                include_once 'footer.php';

            ?>