<?php
    include_once 'basic.php';

    $result = $_POST['search'];


    $eresult = explode(" ", $result);


    $fresult = implode(",", $eresult);


    $db_query = $conn->prepare(
        "SELECT * FROM topics 
                  
                  "
    );

    $db_query->execute([
        
    ]);

    $rresult = $db_query->fetchAll();

    $index = 0;
    $indext = 0;
    foreach($rresult as $topic){
        $test = $rresult[$index++]['tag'];

        $teest = explode(",",$test);

        
        

        foreach($teest as $dd) {
            $filter = $teest[$indext];

            if($filter == $result) {
                echo 'resultaat';
                ?><div> <?= $rresult[$index-1]['ID'] ?></div><?php

             
                
            } else {
                echo 'geen resultaat';
        $indext = $indext+1;

            }}
        $indext = 0;

        
    ?><br><?php
    } 
?>








<?php
    include_once 'footer.php';
?>