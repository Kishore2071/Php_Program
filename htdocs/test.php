<pre>
<?php

print_r($_SERVER);
// print(basename('/hello/world/script.php', '.php'));

$cmd = "cat ".$_SERVER['SCRIPT_FILENAME'];
// $cmd = "pwd";
print($cmd);
exec($cmd, $output);
print_r($output);
?></pre>