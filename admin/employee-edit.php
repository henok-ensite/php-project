<?php
include('config/dbcon.php');
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('message.php') ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Employee
                    <a href="view-employee.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                <?php
                if(isset($_GET['id']))
                {
                    $eid = $_GET['id'];
                    $employee_edit = "SELECT * FROM employee WHERE eid='$eid'";
                    $employee_run = mysqli_query($con, $employee_edit);
                
                    if(mysqli_num_rows($employee_run) > 0)
                    {
                        $row = mysqli_fetch_array($employee_run);
                        ?>

                <form action="code.php" method="POST">
                    <input type="hidden" name="eid" value="<?=$row['eid']?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <lable for="">Full Name</lable>
                            <input type="text" name="fname" value="<?=$row['fname']?>" class="form-control" placeholder="Employee Full Name">
                        </div>
                        <div class="col-md-12 mb-3">
                            <lable for="">Gender</lable><br>
                            <input type="radio" name="gender" value="male">Male 
                            <input type="radio" name="gender" value="female" >Female
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Age</lable>
                            <input type="text" name="age" value="<?=$row['age']?>" placeholder="Your Age" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Choose Department</lable>
                            <select name="department"  class="form-control">
                                <option value="Accounting">Accounting</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Finance">Finance</option>
                                <option value="Secretary">Secretery</option>
                                <option value="Nursing">Nursing</option>
                            </select>
                         </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Education</lable>
                            <select name="education" class="form-control">
                                <option value="Degree">Degree</option>
                                <option value="Deploma">Deploma</option>
                                <option value="Experience">Experience</option>
                                <option value="10th">10</option>
                                <option value="12th">12</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Experience</lable>
                            <input type="text" name="experience" value="<?=$row['experience']?>" placeholder="Your Experience" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <lable for="">Address</lable>
                            <textarea name="address" placeholder="Address" rows="4" class="form-control"><?=$row['address']?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Kebele</lable>
                            <input type="text" name="kebele" value="<?=$row['kebele']?>" placeholder="your Kebele" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Phone</lable>
                            <input type="text" name="phone" value="<?=$row['phone']?>" placeholder="your Kebele" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Registerd Date</lable>
                            <input type="date" name="date" placeholder="Date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="hidden" name="cid" value="<?=$row['cid']?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" name="edit_employee" class="btn btn-primary">Edit Employee</button>
                        </div>
                    </div>

                </form>
                <?php
                    }
                    else
                    {
                        ?>
                        <h4> No data found</h4>
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