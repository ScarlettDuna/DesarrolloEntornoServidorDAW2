<?php
$cookie_name = "user";
$cookie_value = "Anchan";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>
<html>
<body>

<?php
// Aunque hayamos generado la cookie al inicio del script, el script no la va a valorar la primera vez, hay que recargar.
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
setcookie($cookie_name, "", time() - 3600);
?>

</body>
</html>