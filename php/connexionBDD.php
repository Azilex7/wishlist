<?php

$dbname = "wishlist";
$dbhost = "localhost";
$dbuser = "alexis";
$dbpass = "15072002Ja";

try {
    $dsn = "mysql:dbname=".$dbname.";host=".$dbhost;
    $db = new PDO($dsn, $dbuser, $dbpass);
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //echo "yes";
}catch(PDOException) {
    die($e->getMessage());
}

?>