<?php
session_start();
include('Admin/config/dbcon.php');
include('includes/header.php');
include('includes/navbar.php');
include('authentication.php');
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-header">
                    <h4>Add Employeer
                    <?php include('message.php'); ?>
                    <a href="view_employeer.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                <form action="secondcode.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <lable for="">Full Name</lable>
                            <input type="text" name="fname" class="form-control" placeholder="Employeer Full Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Address</lable>
                            <textarea name="address" placeholder="Address" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Phone</lable>
                            <input type="text" name="phone" placeholder="Your Phone" class="form-control">
                        </div>
                        <?php
                         $cid= $_SESSION['auth_user']['cid'];
                         ?>
                        <input type="hidden"  name="cid" value="<?=$cid?>">
                        <div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" name="add_employeer" class="btn btn-primary">Add Employee</button>
                        </div>
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