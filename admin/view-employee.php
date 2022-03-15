<?php
include('config/dbcon.php');
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Registerd Employee</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Employee</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Registerd Employee
                    <a href="view_agency.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Department</th>
                                <th>Education</th>
                                <th>Experience</th>
                                <th>Address</th>
                                <th>Kebele</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Agency Name</th>
                                <th>Edit</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cid=$_GET['cid'];
                            $query = "SELECT employee.*,company.fname as cfname FROM employee,company
                                      where employee.cid='$cid' and company.cid='$cid'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $no=1;
                                foreach($query_run as $employee)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $employee['fname']; ?></td>
                                        <td><?= $employee['gender']; ?></td>
                                        <td><?= $employee['age']; ?></td>
                                        <td><?= $employee['department']; ?></td>
                                        <td><?= $employee['education']; ?></td>
                                        <td><?= $employee['experience']; ?></td>
                                        <td><?= $employee['address']; ?></td>
                                        <td><?= $employee['kebele']; ?></td>
                                        <td><?= $employee['phone']; ?></td>
                                        <td><?= $employee['date']; ?></td>
                                        <td><?= $employee['cfname']; ?></td>
                                        <td><a href="employee-edit.php?id=<?=$employee['eid'];?>" class="btn btn-success">Edit</a></td>
                                    </tr>
                                    <?php
                                     $no++;
                                }
                            }
                            else
                            {
                            ?>
                                <tr>
                                    <td colspan="13">NO RECORD FOUND</td>
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
include('includes/script.php');
?>