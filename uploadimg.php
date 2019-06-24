<?php
session_start();
include('db_connect.php');



$imagefileHandle = fopen($_FILES['myimage']['tmp_name'], 'rb');
$imageData = fread($imagefileHandle, filesize($_FILES['myimage']['tmp_name']));
fclose($imagefileHandle);

$query = $conn->prepare('UPDATE gebruikers SET profielfoto = :data WHERE ID = :id');
$query->execute([
    ':data' => $imageData,
    ':id' => $_SESSION['user_id']
]);

header('Location: profileChange.php');
