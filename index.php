<?php session_start(); ?>

<html>
<?php
require_once "headers/mainheader.php";
require_once "helper.php";
?>
<body style="border: none">
<?php
if (isset($_SESSION["username"])){
require_once "home.php";
} else {
require_once "main.php";
}
?>
</body>
</html>