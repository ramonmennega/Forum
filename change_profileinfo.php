<div class="row profileContainer rounded p-3 m-5 col-sm-8 center bg-white">
                <h2 class="col-sm-12 text-center">User info</h2>
                <div class="col-sm-2 mb-3 profileImg">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <img src="data:image/jpg;base64, <?= base64_encode($user['profielfoto']) ?>" style="width: 150px; height: 150px " id="imgProfile" class=" " alt="profiel">
                    <?php else: ?>
                        <img src="profile.png" id="imgProfile" class="circle s img-fluid" alt="profiel">
                    <?php endif; ?>
                </div>
                <div class="col  row">
                    <label class="col-sm-2 m-2 font-weight-bolder"   for="">username:</label>
                    <?php if(isset($_SESSION['username'])): ?>
                        <div class=" col-sm-6 text-center m-2 username" href="#" id="ProfileHeader" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION['username'] ?>
                        </div>
                    <?php endif; ?>                   <div class="col-sm-2 ss"></div>

                    <label class="col-sm-2 m-2 font-weight-bolder" for="">gender:</label>

                    <?php if(isset($_SESSION['gender'])): ?>

                        <div class=" col-sm-6 text-center m-2 username" href="#" id="ProfileHeader" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION['gender'] ?>
                        </div>
                    <?php endif; ?><div class="col-sm-2"></div>
                    <label class="col-sm-2 m-2 font-weight-bolder " for="">age:</label>
                    <?php if(isset($_SESSION['leeftijd'])): ?>
                        <div class=" col-sm-6 text-center m-2 username" href="#" id="ProfileHeader" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION['leeftijd'] ?>
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
                    <h4 class="col-sm-8">User Description</h4>                    <div class="col-sm-4"></div>

                    <?php if(isset($_SESSION['beschrijving'])): ?>


                        <p name="beschrijving"  style="margin: 5px; resize: none; chan">
                            <?= $_SESSION['beschrijving'] ?>
                        </p>


                    <?php endif; ?>
                    <div class="col-sm-8"></div>

                </div>



            </div>