<?php

$pass = isset($_GET['pass']) ? $_GET['pass'] : "RandomPasswordThatIsSecure";
echo(md5($pass));
