<?php
include('authentication.php');
include('config/dbcon.php');


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
        header('Location: add-employee.php');
        exit(0);
    }

}
$target_file='';
$file_path=[4];
$uploadOk=0;
$uploaderror='';
function file_upload($filetoupload,$submitname){
global $uploadOk,$uploaderror,$target_file;


// Check if image file is a actual image or fake image
if(isset($_POST[$submitname])) {
  $check = getimagesize($_FILES[$filetoupload]["tmp_name"]);
  $fname =  $_POST['fname'];
  if (!file_exists('uploads/'.$fname.'/')) {
    mkdir('uploads/'.$fname.'/', 0777, true);
}
$target_dir = "uploads/".$fname.'/';
$target_file = $target_dir . basename($_FILES[$filetoupload]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $uploaderror= "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
    $uploaderror= "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES[$filetoupload]["size"] > 8000000) {
    $uploaderror= "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    $uploaderror= "Sorry, only JPG, JPEG, PNG files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $uploaderror= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES[$filetoupload]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES[$filetoupload]["name"])). " has been uploaded.";
    $uploadOk=1;
  } else {
    $uploaderror= "Sorry, there was an error uploading your file.";
    $uploadOk=0;
  }
}
}

if(isset($_POST['add_agency']))
{
    for ($i=1;$i<=5;$i++){
    file_upload("filetoupload".$i,'add_agency');
    if ($uploadOk==1){
    $file_path[$i-1]=$target_file;
    }else{
        break;
    }
    }

if ($uploadOk==1){
    $file_path1=$file_path[0];
    $file_path2=$file_path[1];
    $file_path3=$file_path[2];
    $file_path4=$file_path[3];
    $file_path5=$file_path[4];
    $fname =  $_POST['fname'];
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];
    $fax = $_POST['fax'];
    $pobox = $_POST['pobox'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $employeeno = $_POST['employeeno'];

    $query = "INSERT INTO company (fname,address,telephone,fax,pobox,email,website,employeeno,
    file1,file2,file3,file4,file5) 
    VALUES('$fname','$address','$telephone','$fax','$pobox','$email','$website','$employeeno',
    '$file_path1','$file_path2','$file_path3','$file_path4','$file_path5')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Agency Added Successfullyy! ";
        header('Location: view_agency.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something Is Wrong";
        header('Location: view_agency.php');
        exit(0);
    }
}else{
   
        $_SESSION['message'] = "File Upload Error ".$uploaderror;
        header('Location: view_agency.php');
        exit(0);
    
}

}


if(isset($_POST['update-agency']))
{
    for ($i=1;$i<=5;$i++){
    file_upload("filetoupload".$i,'update-agency');
    if ($uploadOk==1){
    $file_path[$i-1]=$target_file;
    }else{
        break;
    }
    }

if ($uploadOk==1){
    $file_path1=$file_path[0];
    $file_path2=$file_path[1];
    $file_path3=$file_path[2];
    $file_path4=$file_path[3];
    $file_path5=$file_path[4];
    $fname =  $_POST['fname'];
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];
    $fax = $_POST['fax'];
    $pobox = $_POST['pobox'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $employeeno = $_POST['employeeno'];
    $cid=$_POST['cid'];
    $query = "UPDATE company SET fname='$fname',address='$address',telephone='$telephone',fax='$fax',
    pobox='$pobox',email='$email',website='$website',employeeno='$employeeno',
     file1='$file_path1',file2='$file_path2',file3='$file_path3',
     file4='$file_path4',file5='$file_path5' where cid='$cid'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Agency Updated Successfullyy! ";
        header('Location: view_agency.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something Is Wrong";
        header('Location: view_agency.php');
        exit(0);
    }
}else{
   
        $_SESSION['message'] = "File Upload Error ".$uploaderror;
        header('Location: view_agency.php');
        exit(0);
    
}

}


if(isset($_POST['add_post']))
{
    $title =  $_POST['title'];
    $date =  $_POST['date'];
    $from =  $_POST['from'];
    $description = $_POST['description'];

    $id = $_POST['id'];

    $query = "INSERT INTO post (title,pdate,pfrm,description,author_id) 
    VALUES('$title','$date','$from','$description','$id')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "News Posted Successfully!";
        header('Location: add_post.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something Is Wrong";
        header('Location: add_post.php');
        exit(0);
    }
}



if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];

    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully!";
        header('Location: view-register.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something Is Wrong";
        header('Location: view-register.php');
        exit(0);
    }
}

if(isset($_POST['add_user']))
{
    $cfname= $_POST['cfname'];
    $query = mysqli_query($con,"SELECT cid FROM company where fname='$cfname'");
    while($row=mysqli_fetch_array($query))
    {
     $cid=$row['cid'];
    }
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1':'0';
    $query = "INSERT INTO users (fname,lname,email,password,cid,role_as,status) VALUES('$fname','$lname','$email','$password','$cid','$role_as','$status')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Added Successfully!";
        header('Location: view-register.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something Went Wrong";
        header('Location: view-register.php');
        exit(0);
    }
}








if(isset($_POST['update_user']))
{
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE users SET  fname='$fname', lname='$lname', email='$email', password='$password', role_as='$role_as', status='$status' WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully!";
        header('Location: view-register.php');
        exit(0);
    }

}

if(isset($_POST['update_agency']))
{
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];
    $fax = $_POST['fax'];
    $pobox = $_POST['pobox'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $employeeno = $_POST['employeeno'];

    $query = "UPDATE company SET fname='$fname', address='$address', telephone='$telephone', fax='$fax', pobox='$pobox', email='$email', website='$website', employeeno='$employeeno' WHERE cid='$user_id'";

}
?>