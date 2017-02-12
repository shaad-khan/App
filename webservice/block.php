<?php
session_start();
echo $_GET['ID'].$_SESSION['user'];
?>