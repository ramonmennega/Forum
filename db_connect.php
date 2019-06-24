<?php 
$db_hostnaam = "mysql:host=localhost;dbname=forum";
$db_username = "root";
$db_password = "";

try{
$conn = new PDO($db_hostnaam,$db_username,$db_password);

} catch (PDOException $e){
echo "<h5  class=' bg-danger btn col-sm-12 p-4 mt-5 position-fixed z-5 mb-2 text-white'>Error!".$e->getMessage(). '</h5>';


}

?>