<?php
include('config/dbcon.php');
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Registerd Users</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Registerd User</h4>
                    <a href="register-add.php" class="btn btn-primary float-end">Add Admin User</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Agency Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT users.*,company.fname as cfname FROM users,company where users.cid=company.cid";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $no=1;
                                foreach($query_run as $row)
                                {
                                    
                                    ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?= $row['fname']; ?></td>
                                        <td><?= $row['lname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td>
                                            <?php
                                            if($row['role_as'] == '1')
                                            {
                                                echo "Admin";
                                            }elseif($row['role_as'] == '0')
                                            {
                                                echo "User";
                                            }
                                            ?>
                                        </td>
                                        <td> <?= $row['cfname']; ?></td>
                                        <th><a href="register-edit.php?id=<?=$row['id'];?>" class="btn btn-success">Edit</a></th>
                                        <th>
                                        <form action="code.php" method="POST">
                                            <button type="submit" name="user_delete" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</button>
                                        </form>
                                        </th>
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