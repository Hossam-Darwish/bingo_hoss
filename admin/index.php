<?php
    session_start();
    
    include_once("../framework/site_func.php");
    include_once("../framework/config.php");

    
    if(isset($_SESSION['admin_login']))
        {
            include_once("header.php");
            
            
            include_once("footer.php");
            
        }
        else
        {
            include_once("login.php");
        }
    
    
    
    
  
?>