<?php
ob_start();
session_start();
date_default_timezone_get("Asia/Beirut");
try{
    $con = new PDO("mysql:dbname=VidTV;host=localhost", "root", "");

    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
}
catch(PDOException $e){

    echo "Connection failed:" . $e->getMessage();

}
?>