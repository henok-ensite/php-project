<?php
session_start();
if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You Are already Logged In!";
    header('Location: index.php');
    exit(0);
}
include('includes/header.php');
include('includes/navbar.php');
include('authentication.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

            <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="registercode.php" method="POST">
                            <div class="form-body mb-3">
                                <lable>First Name</lable>
                                <input type="text" name="fname" placeholder="First Name" class="form-control" required>
                            </div>
                            <div class="form-body mb-3">
                                <lable>Last Name</lable>
                                <input type="text" name="lname" placeholder="Last Name" class="form-control" required>
                            </div>
                            <div class="form-body mb-3">
                                <lable>Email Id</lable>
                                <input type="email" name="email" placeholder="Enter Email Address" class="form-control" required>
                            </div>
                            <div class="form-body mb-3">
                                <lable>Password</lable>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
                            </div>
                            <div class="form-body mb-3">
                                <lable>Confirm Password</lable>
                                <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control" required>
                            </div>
                            <div class="form-body mb-3">
                            <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                            </div>
                        </form>     
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>