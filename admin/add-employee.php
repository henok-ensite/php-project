<?php
include('config/dbcon.php');
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-header">
                    <h4>Add Employee
                    <?php include('message.php'); ?>
                    <a href="add-employee.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                <form action="code.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <lable for="">Full Name</lable>
                            <input type="text" name="fname" class="form-control" placeholder="Employee Full Name">
                        </div>
                        <div class="col-md-12 mb-3">
                            <lable for="">Gender</lable><br>
                            <input type="radio" name="gender" value="male">Male 
                            <input type="radio" name="gender" value="female" width="50px" >Female
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Age</lable>
                            <input type="text" name="age" placeholder="Your Age" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Choose Department</lable>
                            <select name="department" class="form-control">
                                <option value="Accounting">Accounting</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Finance">Finance</option>
                                <option value="Secretary">Secretery</option>
                                <option value="nursing">Nursing</option>
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
                            <input type="text" name="experience" placeholder="Your Experience" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Address</lable>
                            <textarea name="address" placeholder="Address" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Kebele</lable>
                            <input type="text" name="kebele" placeholder="your Kebele" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Phone</lable>
                            <input type="text" name="phone" placeholder="your Kebele" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Registerd Date</lable>
                            <input type="date" name="date" placeholder="your Kebele" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <lable for="">Agency Name</lable>
                            <select name="cid" class="form-control">
                                <?php
                                include('admin/config/dbcon.php');

                                $query = mysqli_query($con,"SELECT cid FROM company");
                                while($row=mysqli_fetch_array($query))
                                {
                                    echo "<option>".$row['cid']."</option>".'<br>';
                                }
                                ?>
                            </select>
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
include('includes/script.php');
?>