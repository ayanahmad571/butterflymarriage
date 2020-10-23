<?php


$a =  3;

$b = 1;


$new = array();
$new[]= $a;
$new[]= $b;

asort($new);

$k2 = implode(' , ',$new);
$k2 = preg_replace('/\s+/','',$k2);

?>