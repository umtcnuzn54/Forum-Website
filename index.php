<?php
session_start();
require('conn.php');
if($_SESSION["user"]){
include("adap.php");

}else{
    header("location:login.php");
}
?>
