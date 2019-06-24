<?php 
include_once 'basic.php';


session_start();
    

?>


<?php if(isset($_SESSION['contact'])): ?>
    <h3><?= $_SESSION['contact']?></h3>
    <?php $_SESSION['contact'] = NULL; ?>
<?php endif ?>
<div class="col-sm-8 center rounded bg-white p-4 m-5">
<form class="col-sm-6 center " action="mailHandler.php" method='POST'>
Volledige Naam: <input  type="text" name='naam'><br>
Email: <input type="email" name='mail'><br>
Telefoon: <input type="number" name='mob'><br>
Bericht: <textarea type="text" name='br'></textarea><br>
<input type="submit">
</div>





</form>


<?php
    include_once 'footer.php';
?>