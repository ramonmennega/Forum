<?php
session_start();

if(isset($_SESSION['user_id']))
    unset($_SESSION['user_id']);

if(isset($_SESSION['username']))
    unset($_SESSION['username']);

if(isset($_SESSION['leeftijd']))
    unset($_SESSION['leeftijd']);

if(isset($_SESSION['gender']))
    unset($_SESSION['gender']);

if(isset($_SESSION['beschrijving']))
    unset($_SESSION['beschrijving']);

    
if(isset($_SESSION['ADMIN']))
unset($_SESSION['ADMIN']);


session_destroy();

header("location: index.php");
?>