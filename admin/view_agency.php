<?php
include('config/dbcon.php');
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <?php include('message.php') ?>
                <div class="card-header">
                    <h4>Registerd Agency
                    <a href="add_agency.php" class="btn btn-primary float-end">Add New Agency</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>Telephone</th>
                                <th>Fax</th>
                                <th>POBox</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>NO. of Employee</th>
                                <th>Documents</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM company";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $no=1;
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><a href="view-employee.php?cid=<?= $row['cid']; ?>"><?= $row['fname']; ?></a></td>
                                        <td><?= $row['address']; ?></td>
                                        <td><?= $row['telephone']; ?></td>
                                        <td><?= $row['fax']; ?></td>
                                        <td><?= $row['pobox']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['website']; ?></td>
                                        <td><?= $row['employeeno']; ?></td>
                                        <td><a href="http://localhost/NewProject/admin/<?=$row['file1'];?>" target='blank' >ንግድ ፍቃድ</a><br>
                                            <a href="http://localhost/NewProject/admin/<?=$row['file2'];?>" target='blank' >ንግድ ምዝገባ</a><br>
                                            <a href="http://localhost/NewProject/admin/<?=$row['file3'];?>" target='blank' >ቲን ሰርተፍኬት</a><br>
                                            <a href="http://localhost/NewProject/admin/<?=$row['file4'];?>" target='blank' >Document 4</a><br>
                                            <a href="http://localhost/NewProject/admin/<?=$row['file5'];?>" target='blank' >Document 5</a>
                                        </td>
                                        <td><a href="agency-edit.php?id=<?=$row['cid'];?>" class="btn btn-success">Edit</a></td>
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
<?php
include('includes/footer.php');
include('includes/script.php');
?>