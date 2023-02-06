<?php 
if($_SESSION["status"]===true){
    $template = "account";
    require "templates/layout.phtml";
}else{
    
    require "homepage.php";
}



?>