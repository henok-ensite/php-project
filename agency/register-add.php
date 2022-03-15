<?php
include('config/dbcon.php');
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Users</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">User</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Users</h4>
                    <a href="view-register.php" class="btn btn-danger float-end">Back</a>
                </div>
                <div class="card-body">
                <form action="code.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <lable for="">First Name</lable>
                            <input type="text" name="fname" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Last Name</lable>
                            <input type="text" name="lname" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Email</lable>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Password</lable>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Role as</lable>
                            <select name="role_as" required class="form-control">
                                <option value="">--Select Role--</option>
                                <option Value="1">Admin</option>
                                <option value="0">User</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Status</lable>
                            <input type="checkbox" name="status" width="70px" height="70px" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" name="add_user" class="btn btn-primary">Add Admin/User</button>
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
include('includes/script.php');
?>