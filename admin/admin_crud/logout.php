<?php
     require_once("./lib/function.php");
      
     unset($_SESSION['admin_name']);
     redirect_to("index_admin.php");
     exit;


?>