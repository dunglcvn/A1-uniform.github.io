<?php
    function redirect_to($locataion){
        header("Location:".$locataion);
        exit;
    };
    session_start();
?>