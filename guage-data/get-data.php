<?php

$homepage = file_get_contents('http://deepdrizzle.net/arnolfini/pi7/get-data-viz.php');
//$homepage=file_get_contents('http://localhost/arnolfini-dataviz/guage-data/include.txt');
echo $homepage;
$text= '<?php'. PHP_EOL;
$text.= $homepage;
$f=file_put_contents("include.php", $text,  LOCK_EX);
if($f) echo  "put";
else echo "not";
