<?php
session_start();
include('Admin/config/dbcon.php');
include('includes/header.php');
include('includes/navbar.php');
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
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Previous Reports
                    <a href="add_report.php" class="btn btn-primary float-end">Add New Report</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Agency Name</th>
                                <th>Agency Phone-number</th>
                                <th>Agency Address</th>
                                <th>Agency NO. of Employee</th>
                                <th>Employee Full Name</th>
                                <th>Employee Gender</th>
                                <th>Employee Age</th>
                                <th>Employee Phone Number</th>
                                <th>Employeer Full Name</th>
                                <th>Employeer Address</th>
                                <th>Employeer Phone</th>
                                <th>Salary</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cid=$_SESSION['auth_user']['cid']; 
                            $query = "SELECT report.created_at, employee.fname as efname, 
                                employee.gender as egender,employee.phone as etelephone,
                                employee.age as eage,
                                employeer.fname as erfname, employeer.address as eraddress,
                                employeer.phone as ertelephone,
                                company.cid,company.employeeno,company.fname as cfname, company.address as caddress,
                                company.telephone as ctelephone,report.salary FROM report,company,employee,employeer
                                where report.cid='$cid' and employee.eid=report.eid and report.cid=company.cid
                                and report.erid=employeer.erid ORDER BY rid ASC";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $no=1;
                                foreach($query_run as $row)
                                {
                                    
                                    ?>
                                    
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $row['cfname']; ?></td>
                                        <td><?= $row['ctelephone']; ?></td>
                                        <td><?= $row['caddress']; ?></td>
                                        <td><?= $row['employeeno']; ?></td>
                                        <td><?= $row['efname']; ?></td>
                                        <td><?= $row['egender']; ?></td>
                                        <td><?= $row['eage']; ?></td>
                                        <td><?= $row['etelephone']; ?></td>
                                        <td><?= $row['erfname']; ?></td>
                                        <td><?= $row['eraddress']; ?></td>
                                        <td><?= $row['ertelephone']; ?></td>
                                        <td><?= $row['salary']; ?></td>
                                        <td><?= $row['created_at']; ?></td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                            }
                            
                            
                            else
                            {
                            ?>
                                <tr>
                                    <td colspan="6">NO RECORD FOUND</td>
                                </tr>
                            <?php
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include('includes/footer.php');
?>