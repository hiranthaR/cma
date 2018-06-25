<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/15/18
 * Time: 10:25 AM
 */

session_start();
session_destroy();
header("Location: /cma/");
exit();
?>