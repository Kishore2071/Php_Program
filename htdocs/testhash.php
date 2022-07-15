<?php

// $pass = isset($_GET['pass']) ? $_GET['pass'] : "RandomPasswordThatIsSecure";
// echo(md5($pass));
$str = <<<EOL
No string-to-array function exists because it is not needed. If you reference a string with an offset like you do with an array, the character at that offset will be return. This is documented in section III.11's "Strings" article under the "String access and modification by character" heading. This is documented in section III.11's "Strings" article under the "String access and modification by character" heading. This is documented in section III.11's "Strings" article under the "String access and modification by character" heading.
EOL;

//This is documented in section III.11's "Strings" article under the "String access and modification by character" heading.
echo("Data Length: ".strlen($str)."\n");

$md5 = md5($str);
$md5len = strlen($md5);

$b64 = base64_encode($str);
$b64len = strlen($b64);

echo("MD5: $md5 (Lenght: $md5len)\n");
echo("Base64: $b64 \n(Length: $b64len)\n");


$data = "sibidharan";

foreach (hash_algos() as $v) {
    $r = hash($v, $data, false);
    printf("%-12s %3d %s\n", $v, strlen($r), $r);
}
