<?php
session_start();

if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['message']))
    {
        $_SESSION['message'] = "You Are already Logged In!";
    }
    header('Location: index.php');
    exit(0);
}
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                <form action="logicode.php" method="POST">
                    <div class="form-body mb-3">
                        <lable>Email Id</lable>
                        <input type="email" name="email" placeholder="Enter Email Address" class="form-control">
                    </div>
                    <div class="form-body mb-3">
                        <lable>Password</lable>
                        <input type="password" name="password" placeholder="Enter Password" class="form-control">
                    </div>
                    <div class="form-body mb-3">
                       <button type="submit" name="login_btn" class="btn btn-primary float-end">Login</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>