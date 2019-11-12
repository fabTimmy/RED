<?php
include_once "misc.php";
if (isset($_COOKIE['name']) && isset($_SESSION['name'])) {
        setcookie("name",getUnsetDate());
        session_destroy();
        header("Location:login.php");
}
else {
        header("Location:login.php");
    }
?>  