<?php
session_start();
include('config/dbcon.php');
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Post
                    <?php include('message.php'); ?>
                    <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                <form action="code.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <lable for="">Title</lable>
                            <input type="text" name="title" class="form-control" placeholder="Your Post Title">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Date</lable>
                            <input type="date" name="date" class="form-control" placeholder="Date of your post">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">From</lable>
                            <input type="text" name="from" class="form-control" placeholder="From">
                        </div>
                        <div class="col-md-12 mb-3">
                            <lable for="">Description</lable>
                            <textarea name="description" placeholder="Description" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                        <?php
                         $id=$_SESSION['auth_user']['cid'];
                        ?>    
                        
                            <input type="hidden" name="id" value='<?=$id?>'class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" name="add_post" class="btn btn-primary">Add Post</button>
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
include('includes/script.php');
?>