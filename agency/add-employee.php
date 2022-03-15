<?php
session_start();
include('Admin/config/dbcon.php');
include('includes/header.php');
include('authentication.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Employee</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Employee</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <?php include('Admin/message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Add New Employee
                    <a href="home.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                <form action="secondcode.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <lable for="">Full Name</lable>
                            <input type="text" name="fname" class="form-control" placeholder="Employee Full Name" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <lable for="">Gender</lable><br>
                            <input type="radio" name="gender" value="male" required>Male 
                            <input type="radio" name="gender" value="female" width="50px" required>Female
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Age</lable>
                            <input type="text" name="age" placeholder="Your Age" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Choose Department</lable>
                            <select name="department" class="form-control" required>
                                <option value="Accounting">Accounting</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Finance">Finance</option>
                                <option value="Secretary">Secretery</option>
                                <option value="nursing">Nursing</option>
                            </select>
                         </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Education</lable>
                            <select name="education" class="form-control" required>
                                <option value="Degree">Degree</option>
                                <option value="Deploma">Deploma</option>
                                <option value="Experience">Experience</option>
                                <option value="10th">10</option>
                                <option value="12th">12</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Experience</lable>
                            <input type="text" name="experience" placeholder="Your Experience" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Address</lable>
                            <textarea name="address" placeholder="Address" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Kebele</lable>
                            <input type="text" name="kebele" placeholder="your Kebele" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Phone</lable>
                            <input type="text" name="phone" placeholder="your Phone Number" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Registerd Date</lable>
                            <input type="date" name="date" placeholder="Registration Date" class="form-control" required>
                        </div>
                        <!-- <div class="col-md-12 mb-3">
                            <lable for="">Agency Name</lable>
                            <select name="cid" class="form-control">
                               
                            </select>
                        </div> -->
                        
                        <?php
                         
                         $cid= $_SESSION['auth_user']['cid'];
                         //echo $cid;
                         ?>
                        <input type="hidden"  name="cid" value="<?=$cid?>">
                        <div>

                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" name="add_employee" class="btn btn-primary">Add Employee</button>
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