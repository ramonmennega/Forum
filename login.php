<?php
session_start();
require 'db_connect.php';

    
$tbl_name="gebruikers"; // Table name
// Connect to server and select databse. 

// username and password sent from form 
$email=$_POST['email']; 
$password=$_POST['password']; 
// To protect MySQL injection (more detail about MySQL injection)
$sql=$conn->prepare("SELECT * FROM $tbl_name WHERE email= :email");

$sql->execute([
    ':email' => $email,
//    ':password' => $password
]);

$user = $sql->fetch();

if(password_verify($password, $user['password'])) {
	// Inloggen was succesvol
	$_SESSION['user_id'] = $user['ID'];
	$_SESSION['username'] = $user['username'];
	$_SESSION['leeftijd'] = $user['leeftijd'];
	$_SESSION['beschrijving'] = $user['beschrijving'];
	$_SESSION['guest'] = 'false';
	
	$_SESSION['gender'] = $user['geslacht'];

	
if($user['ADMIN'] == 1){
	$_SESSION['ADMIN'] = 'true';
} else {
	$_SESSION['ADMIN'] = 'false';
}


	header('Location: ' . $_GET['origin']);
	exit(0);
} else {
echo 'FOUT';
}



?>





