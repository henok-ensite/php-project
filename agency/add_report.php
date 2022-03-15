<?php
session_start();
include('Admin/config/dbcon.php');
include('includes/header.php');
include('authentication.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Report</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Report</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Report
                    <a href="report.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                   
                <form action="secondcode.php" method="POST">
                    <div class="row">
                    <div class="col-md-6 mb-3">
                    <lable for="" >Employee Full Name</lable><br><br>
                    <input list="employees" name="efname" >
                    <datalist id="employees">
                        <?php
                         $query="SELECT fname,phone from employee";
                         $query_run = mysqli_query($con, $query);
                         if(mysqli_num_rows($query_run) > 0)
                         {
                             foreach($query_run as $employee)
                             {
                                echo "<option>".$employee['fname'].' '.$employee['phone']."</option>".'<br>';   
                             }
                         }
                        ?>
                    </datalist>
                </div>
                
                <div class="col-md-6 mb-3">
                    <lable for="" >Employeer Full Name</lable><br><br>
                    <input list="employeer" name="erfname" >
                    <datalist id="employeer">
                        <?php
                         $query="SELECT fname,phone from employeer";
                         $query_run = mysqli_query($con, $query);
                         if(mysqli_num_rows($query_run) > 0)
                         {
                             foreach($query_run as $employeer)
                             {
                                echo "<option >".$employeer['fname'].' '.$employeer['phone']."</option>".'<br>';   
                             }
                         }
                        ?>
                    </datalist></div>
                        <?php
                         $cid= $_SESSION['auth_user']['cid'];
                         ?>
                         
                        <div class="col-md-6 mb-3">
                        <br><br>
                        <lable for="" >Salary</lable><br><br>
                        <input type="text" name="salary">
                        </div>
                        <input type="hidden"  name="cid" value="<?=$cid?>">
                        <br><br>
                        
                        <div class="col-md-6 mb-3">
                        <br><br>
                            <button type="submit" name="add_report" class="btn btn-primary">Add Employee</button>
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