<html>
    <head>
        <title>Afval coach</title>
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
    <body style="background-color: white ;">
        <header class="row m-0 p-0 align-items-center" style="background-color: orange ;">
            <h4 class="text-center col-sm-4 text-title font-weight-lighter m-3 text-white">Afval coach</h4>   
            <div class="text-center col-sm-2 text-title font-weight-lighter m-3 text-white"></div>    

            <nav class="">
                <ul class="col-sm-12 navbar nav">
                    <li class="navbar-item">
                        <a class="text-white nav-link link" href="afvalcoach.php">Home</a>
                    </li>
                    <li class=" navbar-item">
                        <form class="m-0 row p-0" action="" method="POST">
                        <input class="w-40p" type="number">
                        <button type="submit" class="btn text-white link nav-link" href="login.php">login with your code</button>

                        </form>
                    </li>
                </ul>
            </nav>
        </header>

            <div>
                <div class="rounded row text-white p-3 center m-3 col-sm-7" style="background-color: orange ;">
                <span class="col-sm-3 text-20 text-center ">Username</span>
                <span class="col-sm-3 text-center">Gewicht voorheen</span>
                
                <span class="col-sm-3 text-center">Huidig gewicht</span>
                <span class="col-sm-3 text-center">streef gewicht</span>
                <span class="col-sm-5 text-center"></span>
                
                <span class="col-sm-7 row text-center">Voeg een nieuw gewicht toe in grammen: <form class="row m-0 p-0"><input class="w-40p" type="number"><button class="btn btn-light">+</button></form></span>





                </div>
                <ul class="nav navbar">
                    <li class="col-sm-5 center">
                         <div class="rounded  text-white p-3 center m-3 col-sm-12" style="background-color: orange ;">
                         <span class="col-sm-3 text-20 text-center ">Datum</span><br>
                            <span class="col-sm-3 text-center">huidig gewicht</span><br>
                            <span class="col-sm-3 text-center">gewicht kwijt</span><br>
                            <span class="col-sm-3 text-center">hoeveel tot streef gewicht</span><br>
                        </div>
                    </li>
                </ul>
            </div>


        <footer class="p-2 text-white fixed-bottom" style="background-color:orange;">
            &copyAfvalcoach
        </footer>
        
    </body>
</html>