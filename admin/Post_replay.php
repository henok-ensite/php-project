<?php
include('config/dbcon.php');
include('authentication.php');
include('includes/header.php');
?>
<style>   
    table {  
        border-collapse: collapse;  
    }  
        .inline{   
            display: inline-block;   
            float: right;   
            margin: 20px 0px;   
        }   
         
        input, button{   
            height: 34px;   
        }   
  
    .pagination {   
        display: inline-block;   
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;   
        float: left;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid black;   
    }   
    .pagination a.active {   
            background-color: pink;   
    }   
    .pagination a:hover:not(.active) {   
        background-color: skyblue;   
    }   
        </style> 
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
                    <a href="view_post.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Company</th>
                                <th>Response</th>
                                <th>Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pid=$_GET['id'];
                            $query = "SELECT response.*,company.fname as cid FROM response,company where response.cid=company.cid and 
                            response.pid='$pid'";
                            
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $no=1;
                                foreach($query_run as $employee)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $employee['cid'];?></td>
                                        <td><?= $employee['response'];?></td>
                                        <td><?= $employee['res_date']; ?></td>
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