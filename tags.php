<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';

$tags = explode(',', $_POST['tags']);

echo '<pre>';
print_r($tags);
echo '</pre>';