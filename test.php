<pre>
<?php
include 'libs/load.php';

// $cookie_name = "testscript";
// $cookie_value = $_SERVER['REQUEST_URI'];
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
// print("_SERVER \n");
// print_r($_SERVER);
// print("_GET \n");
// print_r($_GET);
// print("_POST \n");
// print_r($_POST);
// print("_FILES \n");
// print_r($_FILES);
// print("_COOKIES \n");
// print_r($_COOKIE);

// if (signup("sibidharan", "password", "sibi@selfmade.ninja", "9999999999")) {
//     echo "Success";
// } else {
//     echo "Fail";
// }

$mic1 = new Mic("Roda"); //constructing the object
$mic2 = new Mic("HyperX"); //constructing the object

Mic::testFunction(); //no construction, no destruction.
testFunction();

$mic1->setLight("White");
$mic2->setLight("Green");

print(ucwords("hyper quad cast"));
$mic1->setModel("hyper quad cast");
print("Model of 1st mic is ".$mic1->getModelProxy());
print("\n".$mic1->getBrand());
print("\n".$mic2->getBrand());
echo $mic1->getVoltage("hello", array(1,2,3,4,5), new Mic("Bose"));
echo $mic1->setUpVoltage("hi", new Mic("cast"), [1,2,3]);

print("\n".$mic->price);

print("\nValue of 10+12 is ".$mic1->add(10, 12));
print("\nThis is mono font inside pre tag \n");


?>
</pre>