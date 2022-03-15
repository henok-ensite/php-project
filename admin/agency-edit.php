<?php
include('config/dbcon.php');
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Agency</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Agency</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Agency</h4>
                </div>
                <div class="card-body">
                <?php
                    if(isset($_GET['id']))
                    {
                        $user_id = $_GET['id'];
                        $users = "SELECT * FROM company WHERE cid='$user_id' ";
                        $users_run = mysqli_query($con, $users);

                        if(mysqli_num_rows($users_run) > 0)
                        {
                            foreach($users_run as $user)
                            {    
                            ?>
            
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Full Name</label>
                            <input type="text" name="fname" value="<?= $user['fname']?>" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Address</label>
                            <textarea type="text" name="address" class="form-control"><?=$user['address']?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Telephone</label>
                            <input type="text" name="telephone" value="<?=$user['telephone']?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Fax</label>
                            <input type="text" name="fax" value="<?=$user['fax']?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">POBox</label>
                            <input type="text" name="pobox" value="<?=$user['pobox']?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" value="<?=$user['email']?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Website</label>
                            <input type="text" name="website" value="<?=$user['website']?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">No. of Employee</label>
                            <input type="text" name="employeeno" value="<?=$user['employeeno']?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">ንግድ ፍቃድ</label>
                        <input type="file" name="filetoupload1" required id="filetoupload1" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                        <lable for="">ንግድ ምዝገባ</label>
                        <input type="file" name="filetoupload2" required id="filetoupload2" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                        <lable for="">ቲን ሰርተፍኬት</label>
                        <input type="file" name="filetoupload3" required id="filetoupload3" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                        <lable for="">Document 4</label>
                        <input type="file" name="filetoupload4" id="filetoupload4" required class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                        <lable for="">Document 5</label>
                        <input type="file" name="filetoupload5" id="filetoupload5" required class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="hidden" name="cid" value="<?=$user['cid']?>" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" name="update-agency" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                         <?php
                            }
                        }else
                        {
                            ?>
                            <h4>No Record Found</h4>
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