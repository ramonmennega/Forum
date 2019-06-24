<?php

// mail die zend waneer iemand geregistreerd is

$ontvanger = $_POST['email'];

$subject = 'Registation Webdesign Forum';

$bericht = 'Congrats ' . $username . '! U succesfully registerd at our forum ';

$header = 'From: Webdesign-Forum@gmail.com' .  '\r\n' .
          'Reply-To: Webdesign-Forum@gmail.com' . '\r\n' .
          'X-Mailer: PHP/ '.phpversion() . '\r\n';

          
mail($ontvanger, $subject, $bericht, $header);

header('Location: index.php');





?>