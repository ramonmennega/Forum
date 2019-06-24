<?php
/**
 * Created by PhpStorm.
 * User: coole
 * Date: 9-4-2019
 * Time: 13:46
 */
 include_once 'basic.php';

 
 ?>


<html>
    <head>

    </head>
    <body>
        <div class="row col-sm-8 rounded  align-items-center text-white center mt-5 mb-5 bg-dark">
            <div class="title display-4 col-sm-4">
                HTML 5
            </div>




            <div class="col-sm-6 center">

            </div>

            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="addTopics.php?thread=<?= $_SERVER['PHP_SELF'] ?>"><button class="btn rounded  bg-light text-dark"> + Topic   </button></a>


            <?php endif; ?>


        </div>

        <div class=" text-white rounded  center col-sm-8">
            <ul id="myUL" class="topic  p-2">
               <?php require'grabtopics.php'; ?>
                    


                













            </ul>
        </div>
    </body>

    <script>
        function myFunction() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName('li');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</html>



<?php

include_once 'footer.php';

?>