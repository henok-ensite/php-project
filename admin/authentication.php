<?php
session_start();

if(!isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You must Login to Access Dashboard";
    header("Location: ../login.php");
    exit(0);

}else
{
    if($_SESSION['auth_role'] != "1")
    {
        $_SESSION['message'] = "You Are Not Authorized to Acess Dashboard";
        header("Location: ../login.php");
        exit(0);
    }
}
?>