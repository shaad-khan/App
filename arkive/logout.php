<?php

    session_start();
    if(isset($_POST['logout'])) {
        session_destroy();
        header("Location:https://apps.continuserve.com/arkive/");
        }
?>