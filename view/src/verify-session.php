<?php
    if(isset($_COOKIE["vr_session"])){
        $_SESSION = $_COOKIE("vr_session");
    }
?>