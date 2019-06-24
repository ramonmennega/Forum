<?php
session_start();


require 'db_connect.php';
if(isset($_SESSION['ADMIN'])){
    $_SESSION['ADMIN'];
} else { 
    $_SESSION['ADMIN'] = 'false';

}

if(isset($_SESSION['user_id'])){
    $_SESSION['user_id'];
} else { 
    $_SESSION['user_id'] = NULL;

}

if(isset($_SESSION['cookies'])){
    $_SESSION['cookies'];
} else { 
    $_SESSION['cookies'] = NULL;

}
$_SESSION['guest'] = 'true';

$user = [];
if(isset($_SESSION['user_id'])) {
    // Iemand is ingelogd, dus we halen de gegevens van deze persoon nog even op
    $sql = $conn->prepare('SELECT * FROM gebruikers WHERE ID = :id');
    $sql->execute([ ':id' => $_SESSION['user_id']]);
    $user = $sql->fetch(PDO::FETCH_ASSOC);
}

?>

<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <meta charset="windows-1252">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body style="background-color: grey;">
   

<section class=" page-header menu bg-light text-black " >
    <nav class="  navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand col" href="index.php">Webdesign Forum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown, #profile" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="text-align-center collapse navbar-collapse align-center col-sm-8" id="navbarNavDropdown">
            <ul class=" navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="info.php">Info</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Threads
                    </a>

                    <div class="dropdown-menu bg-dark " aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item bg-dark text-white" href="html5.php">HTML5</a>
                        <a class="dropdown-item bg-dark text-white" href="css3.php">CSS3</a>
                        <a class="dropdown-item bg-dark text-white" href="javascript.php">JAVASCRIPT</a>
                        <a class="dropdown-item bg-dark text-white" href="php.php">PHP</a>
                        <a class="dropdown-item bg-dark text-white" href="sql.php">SQL</a>
                    <a class="text-white bg-dark dropdown-item  dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Frameworks
                    </a>
                    <div class="dropdown-menu bg-dark " aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item bg-dark text-white" href="bootstrap.php">Bootstrap</a>
                    </div>
                    </div>
                </li>
                <?php if($_SESSION['ADMIN'] == 'true'): ?>
                <li class="nav-item bg-dark">
                    <form class="nav-link" action="search.php" method="post">
                    search for topics: <input class="rounded " name="search" type="search"> <button type="submit"  class="bg-none text-white btn  "> <i   class="fas  bg-none fa-search"></i></button>
                    </form>
                </li>
                <?php endif ?>
            </ul>

        </div>


            <div class="navbar-expand-lg collapse navbar-collapse col row " id="profile">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <img src="data:image/jpg;base64, <?= base64_encode($user['profielfoto']) ?>" id="imgProfile" class=" img-fluid" alt="profiel">
                <?php else: ?>
                    <img src="profile.png" id="imgProfile" class=" img-fluid" alt="profiel">
                <?php endif; ?>
                <ul class=" navbar-nav ml-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="ProfileHeader" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest' ?>
                        </a>
                        <div class="dropdown-menu bg-light" aria-labelledby="ProfileHeader">
                            <?php if(isset($_SESSION['user_id'])): ?>
                            <a id="a1" class="dropdown-item bg-light text-dark " href="profile.php?user=<?= $_SESSION['user_id']  ?>">Profile</a>
                            <a id="a2" class="dropdown-item center col-sm-12 bg-light text-dark " href="profileChange.php">Change profile info</a>
                            <a id="a4" class="bg-danger dropdown-item text-white rounded " href="logout.php">Logout</a>
                            <?php else: ?>
                            <form id="form" method="POST" action="login.php?origin=<?= $_SERVER['PHP_SELF'] ?>">
                            <label class="text-white shown" for="email">Mail:</label>
                            <input name="email" id="email" class="container rounded  inout dropdown-item bg-light text-dark " type="email">
                            <label class="text-white " for="password">Password:</label>
                            <input name="password" id="password" class="container rounded  inout dropdown-item bg-light text-dark " type="password">
                            <button  class="bg-light dropdown-item text-dark text-center rounded " name="login" type="submit" >Login</button>

                            </form>
                            <button  onclick="location.href='register.php'" class="bg-light text-center dropdown-item text-dark rounded " name="register" href="register.php">Register</button>

                            <?php endif; ?>
                            

                        </div>
                    </li>
                </ul>
            </div>





    </nav>
</section>

















</div>


<script>



</script>


</body>


<script>






</script>


</html>



<?php
/**
 * Created by PhpStorm.
 * User: coole
 * Date: 5-4-2019
 * Time: 14:31
 * 
 * 
 */

 


?>