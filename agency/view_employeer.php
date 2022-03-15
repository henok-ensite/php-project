<?php
session_start();
include('Admin/config/dbcon.php');
include('includes/header.php');
include('includes/navbar.php');
include('authentication.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Registerd Employee</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Employeer</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Registerd Employeer
                    <a href="add_employeer.php" class="btn btn-primary float-end">Add Employeer</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <!-- <th>Edit</th> -->
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ccid= $_SESSION['auth_user']['cid'];
                            $query = "SELECT employeer.* FROM employeer WHERE employeer.cid='$ccid'";
                            
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $no=1;
                                foreach($query_run as $employeer)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $employeer['fname']; ?></td>
                                        <td><?= $employeer['address']; ?></td>
                                        <td><?= $employeer['phone']; ?></td>
                                        <!-- <td><a href="employeer-edit.php?id=<?=$employeer['eid'];?>" class="btn btn-success">Edit</a></td> -->
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
?>