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
                <!-- <div class="card-header"> -->
                <a href="view_report1.php" class="btn btn-info float-end">View All Report</a>
                    <h4>
                    <label for="agency"><h1>Choose Agency:</h1></label>
                    <datalist id="agencies">
                        
                        
                        <?php
                        
                        $query="SELECT fname from company";
                         $query_run = mysqli_query($con, $query);

                         if(mysqli_num_rows($query_run) > 0)
                         {
                            
                             foreach($query_run as $company)
                             {
                                echo "<option name='company_selection'>".$company['fname']."</option>".'<br>';   
                             }
                         }
                        
                        ?>
                    </datalist>        
   <form method='GET' action="view_report.php?cid='<?=$selected?>'">
   <input list="agencies" name="cid" >
    View Report  <input class='btn btn-primary' type="submit" value="View" >
   </form>
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
                            if(!empty($_GET['cid'])){
                                 $cfname=$_GET['cid'];
                                 str_replace('+', ' ', $cfname);
                                 $query = mysqli_query($con,"SELECT cid FROM company where fname='$cfname'");
                                 if(mysqli_num_rows($query) > 0){
                                 while($row=mysqli_fetch_array($query))
                                 {
                                  $cid=$row['cid'];
                                 }
                                 
                            $query = "SELECT report.created_at, employee.fname as efname, 
                                employee.gender as egender,employee.phone as etelephone,
                                employee.age as eage,
                                employeer.fname as erfname, employeer.address as eraddress,
                                employeer.phone as ertelephone,
                                company.cid,company.employeeno,company.fname as cfname, company.address as caddress,
                                company.telephone as ctelephone,report.salary FROM report,company,employee,employeer
                                where report.cid='$cid' and employee.eid=report.eid and report.cid=company.cid
                                and report.erid=employeer.erid;";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $no=1;
                                foreach($query_run as $row)
                                {
                                    
                                    ?>
                                    
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><a href="agency-edit.php?id=<?= $row['cid']; ?>"><?= $row['cfname']; ?></a></td>
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