<?php
session_start();
include('Admin/config/dbcon.php');
include('authentication.phpl');

if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $mysqli_result = "SELECT * FROM users WHERE email= '$email' and password= '$password' and status= true";
    $login_query_run = mysqli_query($con, $mysqli_result);

    if (mysqli_num_rows($login_query_run) > 0)
    {
        foreach($login_query_run as $data){
            $user_id = $data['id'];
            $user_name = $data['fname'].' '.$data['lname'];
            $user_email = $data['email'];
            $role_as = $data['role_as'];
            $cid = $data['cid'];
        }
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as";
        $_SESSION['auth_user'] = [
            'user_id'=> $user_id,
            'user_name'=> $user_name,
            'user_email'=> $user_email,
            'cid'=> $cid,
        ];

        if($_SESSION['auth_role'] == '1'){
            $_SESSION['message'] = "WellCome to Dashboard!";
            header('Location: Admin/index.php');
            exit(0);
        }elseif($_SESSION['auth_role'] == '0'){
            $_SESSION['message'] = "You Just Logged In!";
            header('Location: index.php');
            exit(0);

        }elseif($_SESSION['auth_role'] !="0"){
        $_SESSION['message'] = "You must Login to Access ";
    header("Location: login.php");
    exit(0);
    
}
    }else
    {
        $_SESSION['message'] = "Invalid Email or Password!";
        header('Location: login.php');
        exit(0);
    }
}else
{
    $_SESSION['message'] = "You Are Not Allowed to Access This File";
    header('Location: login.php');
    exit(0);
}

?>