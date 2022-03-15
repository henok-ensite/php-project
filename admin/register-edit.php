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
                    <h4>Edit User</h4>
                </div>
                <div class="card-body">
                <?php
                    if(isset($_GET['id']))
                    {
                        $user_id = $_GET['id'];
                        $users = "SELECT * FROM users WHERE id='$user_id' ";
                        $users_run = mysqli_query($con, $users);

                        if(mysqli_num_rows($users_run) > 0)
                        {
                            foreach($users_run as $user)
                            { 
                            ?>
                <form action="code.php" method="POST">
                    <input type="hidden" name="user_id" value="<?=$user['id'];?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <lable for="">First Name</lable>
                            <input type="text" name="fname" value="<?=$user['fname'];?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Last Name</lable>
                            <input type="text" name="lname" value="<?=$user['lname'];?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Email</lable>
                            <input type="text" name="email" value="<?=$user['email'];?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Password</lable>
                            <input type="password" name="password" value="<?=$user['password'];?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Role as</lable>
                            <select name="role_as" required class="form-control">
                                <option value="">--Select Role--</option>
                                <option Value="1" <?= $user['role_as'] == '1' ? 'selected' :''?> >Admin</option>
                                <option value="0" <?= $user['role_as'] == '0' ? 'selected' :''?> >User</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Status</lable>
                            <input type="checkbox" name="status" <?= $user['status'] == '1' ? 'checked' :''?> width="70px" height="70px" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" name="update_user" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </form>     
                            <?php
                            }
                        }
                        else
                        {
                            ?>
                            <h4>No Data Found</h4>
                            <?php
                        }
                    }  
                ?>

                </div>
            </div>
        </div>

    </div>
</div>
<?php
include('includes/footer.php');
include('includes/script.php');
?>