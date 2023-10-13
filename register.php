<?php
include 'condb.php';
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4  bg-light text-dark">
                <div class="alert alert-info" role="alert">
                    <h4>สมัครสมาชิก</h4>
                </div>
                <form method="POST" action="insert_register.php" enctype="multipart/form-data">
                    <label>รูปภาพโปรไฟล์:</label><br>
                    <input type="file" name="fileToUpload" id="fileToUpload" required><br>
                    ชื่อ <input type="text" name="firstname" class="form-control" required>
                    นามสกุล <input type="text" name="lastname" class="form-control" required>
                    เบอร์โทรศัพท์ <input type="text" name="telephone" maxlength="10" class="form-control" required>
                    Username <input type="text" name="username" class="form-control" required>
                    Password <input type="password" name="password" class="form-control" required>
                    <br>

                    <br>

                    <button type="submit" name="save" class="btn btn-primary" value="บันทึก">บันทึก</button>
                    <a href="index.php" type="reset" name="cancel" class="btn btn-primary" value="ยกเลิก">ยกเลิก</a>
                    
                    
                    <br><br>
                    <a href="login.php"> Login </a>
                </form>
            </div>
            
        </div>

</body>

</html>        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>