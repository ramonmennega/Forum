<?php
    include_once 'basic.php';


    if(isset($_SESSION['user_id'])){
        echo 'Je bent al ingelogd domoor waarom zou je regristreren';
        exit();
    } else {
    
?>



<div class="register form bg-light center m-5 p-3 rounded col-sm-8">
    <div>
        <h2 class="mb-5 text-center">Register</h2>
    </div>
    <div class="formitself">
            
        <form action="registerhandler.php" method="POST" class="col-sm-6 center">
            <div class="col-sm-12"><label class="col-sm-6" for="">Username: </label><input type="text" name="username" class="col-sm-6"></div><br>
            <div class="col-sm-12"><label class="col-sm-6" for="">email: </label><input type="text" name="email" class="col-sm-6"></div><br>
            <div class="col-sm-12"><label class="col-sm-6" for="">gender: </label>male:<input type="radio" value="male" name="gender" class="col-sm-1">female:<input type="radio" class="col-sm-1" value="female" name="gender"></div><br>
            <div class="col-sm-12"><label class="col-sm-6" for="">born: </label><input type="date" name="geboren" class="col-sm-6"></div><br>
            <div class="col-sm-12"><label class="col-sm-6" for="">Description: </label><textarea type="test" name="desc" class="col-sm-6"></textarea></div><br>
            <div class="col-sm-12"><label class="col-sm-6" for="">password: </label><input type="password" name="password"  class="col-sm-6" name="" id="pass1"></div><br>
            <div class="col-sm-12"><label class="col-sm-6" for="">retype password: </label><input type="password" name="retypepassword" class="col-sm-6" name="" id="pass2"></div><br>
            <div class="col-sm-12"><button class="col-sm-12 btn btn-primary" name="registerform"  type="submit" value="Register">Register</button></div><br>


        </form>
    </div>
</div>

<script>



</script>




<?php
include_once 'footer.php';
} 
?>


