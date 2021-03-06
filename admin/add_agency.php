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
                    <h4>Add Agency
                    <a href="view_agency.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <lable for="">Full Name</lable>
                            <input type="text" name="fname" class="form-control" placeholder="Agency Full Name" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <lable for="">Address</lable>
                            <textarea name="address" placeholder="Address" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Telephone/Mobile</lable>
                            <input type="text" name="telephone" placeholder="Agency Telephone/Mobile" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Fax</lable>
                            <input type="text" name="fax" placeholder="Agency Fax" class="form-control" required>
                         </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">POBox</lable>
                            <input type="text" name="pobox" placeholder="POBox" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Email</lable>
                            <input type="email" name="email" placeholder="Agency Email" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">Website</lable>
                            <input type="text" name="website" placeholder="Agency Website" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable for="">No. of Employee</lable>
                            <input type="text" name="employeeno" placeholder="No Employee working for Agency" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                        <lable for="">????????? ?????????</lable>
                        <input type="file" name="filetoupload1" id="filetoupload1" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                        <lable for="">????????? ????????????</lable>
                        <input type="file" name="filetoupload2" id="filetoupload2" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                        <lable for="">?????? ??????????????????</lable>
                        <input type="file" name="filetoupload3" id="filetoupload3" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                        <lable for="">Document 4</lable>
                        <input type="file" name="filetoupload4" id="filetoupload4" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                        <lable for="">Document 5</lable>
                        <input type="file" name="filetoupload5" id="filetoupload5" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" name="add_agency" class="btn btn-primary">Add Agency</button>
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