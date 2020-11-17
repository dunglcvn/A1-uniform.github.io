<?php

require_once("lib/functions.php");
      
     unset($_SESSION['username']);
     redirect_to("index.php");
     exit;


?>
 