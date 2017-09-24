<?php

$homepage = file_get_contents('http://deepdrizzle.net/arnolfini/pi7/guage-data/include.txt');
$text= '<?php'. PHP_EOL;
$text.= $homepage;
file_put_contents("include.php", $text,  LOCK_EX);
