<?php
include('Admin/config/dbcon.php');


if(isset($_POST['edit_employee']))
{
    $eid = $_POST['eid'];


    $fname = $_POST['fname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $department= $_POST['department'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $address = $_POST['address'];
    $kebele = $_POST['kebele'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $company = $_POST['cid'];

    $query = "UPDATE employee SET fname='$fname', gender='$gender', age='$age', department='$department', education='$education', 
    experience='$experience', address='$address', kebele='$kebele', phone='$phone', date='$date',cid='$company' WHERE eid='$eid'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Updated Successfully!";
        header('Location: employee-edit.php?id='.$eid);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Is Wrong";
        header('Location: employee-edit.php?id='.$eid);
        exit(0);
    }
}

if(isset($_POST['add_employee']))
{
    $fname = $_POST['fname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $department= $_POST['department'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $address = $_POST['address'];
    $kebele = $_POST['kebele'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $cid = $_POST['cid'];

    $query = "INSERT INTO employee (fname,gender,age,department,education,experience,address,kebele,phone,date,cid) 
    VALUES('$fname','$gender','$age','$department','$education','$experience','$address','$kebele','$phone','$date','$cid')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Added Successfully!";
        header('Location: home.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something Is Wrong";
        header('Location: home.php');
        exit(0);
    }

}


if(isset($_POST['add_report'])){
if(!empty($_POST['efname']) && !empty($_POST['erfname'])){
    $efname=$_POST['efname'];
    $erfname=$_POST['erfname'];
    $cid=$_POST['cid'];
    $salary=$_POST['salary'];
    $efname=preg_replace('/[0-9]+/', '', $efname);
    $erfname=preg_replace('/[0-9]+/', '', $erfname);
    $query = mysqli_query($con,"SELECT eid,erid FROM employee, employeer
    where employee.fname='$efname' && employeer.fname='$erfname' ");
    if(mysqli_num_rows($query) > 0){
    while($row=mysqli_fetch_array($query))
    {
     $eid=$row['eid'];
     $erid=$row['erid'];
    }
    $query = "INSERT INTO report (eid, erid, cid,salary)
               VALUES ('$eid','$erid','$cid','$salary')";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = " Report Added Successfully!";
        header('Location: report.php');
        exit(0);
        
    }else
    {
        header('Location: report.php');
        exit(0);
        $_SESSION['message'] = " 1Something Is Wrong";
    }

   }else{
        header('Location: report.php');
        exit(0);
        $_SESSION['message'] = " 2Something Is Wrong";
       
   }
}
}


if(isset($_POST['add_employeer']))
{
    $fname = $_POST['fname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $cid = $_POST['cid'];

    $query = "INSERT INTO employeer (fname,address,phone,cid) 
    VALUES('$fname','$address','$phone','$cid')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employeer Added Successfully!";
        header('Location: view_employeer.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something Is Wrong";
        header('Location: view_employeer.php');
        exit(0);
    }
}

?>