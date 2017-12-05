<?php
include '../allfx.php';
@session_destroy();
/*
if(isset($_SESSION['u_number'])){
    unset($_SESSION['u_number']);
    $_SESSION['out'] = "out";
}
            setcookie("u_number","",time() - 3600);
            setcookie("u_token", "", time() - 3600); */
header("Location: ../");