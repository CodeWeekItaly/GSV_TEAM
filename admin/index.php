<?php
session_start();
include '../include/init.php';
if(!isset($_SESSION['admin'])){
    include 'auth/login.php';
}else{
   include 'template_page/header.php';
   include 'template_page/body.php';
   include 'template_page/footer.php';

}


?>
