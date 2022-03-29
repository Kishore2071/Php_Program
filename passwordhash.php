<?php
$time = microtime(true);
$options = [
    'cost' => 20,
];
echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
echo "\nTook ".(microtime(true) - $time) . " sec";

// if (password_verify("rasmuslerdorf", '$2y$12$vxk72IX.vOSgV4gleQs0ru5MNo5CMHBFuHMVBHyeT03LLqsbwREzC')) {
//     print("Correct password");
// } else {
//     print("Wrong password");
// }
