<?php
session_start();

$to      = 'cooleramon123@gmail.com';
$subject = 'ONS';
$naam = $_POST['naam'];
$mail = $_POST['mail'];
$mob = $_POST['mob'];
$br = $_POST['br'];


$bericht = '<h3>Contact</h3>';
$bericht .= '<h5>naam: ' . $naam . '</h5>';
$bericht .= '<h5>mail: ' . $mail . '</h5>';
$bericht .= '<h5>mob. nummer: ' . $mob . '</h5>';
$bericht .= '<h5>bericht: ' . $br . '</h5>';


$headers = 'From: cooleramon123@gmail.com' . "\r\n" .
    'Reply-To: cooleramon123@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($to, $subject, $bericht, $headers);

$_SESSION['contact'] = 'Bedankt voor het Contact. er wordt zo spoedig mogelijk gereageerd';

header('Location: contact.php');