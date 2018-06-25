<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/16/18
 * Time: 6:44 AM
 */
session_start();
if(!isset($_SESSION["username"])){
    session_destroy();
    echo "<center>Permission denied!<br>you don't have access here, Session expired!</center>";
    echo "<br><br><center><a href='/cma/index.php'>Home Page</a></center>";
    exit();
}