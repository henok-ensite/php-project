<?php
session_start();
include('Admin/config/dbcon.php');


if(isset($_POST['response']))
{
    $cid = $_POST['cid'];
    $pid = $_POST['pid'];
    $response = $_POST['responsedata'];
    $page = $_POST['page'];

    $query = "INSERT INTO response (cid,pid,response) 
    VALUES('$cid','$pid','$response')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Response Submmited. ".$reponse;
        header('Location: index.php?page='.$page);
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something Is Wrong";
        header('Location: index.php?page='.$page);
        exit(0);
    }

}