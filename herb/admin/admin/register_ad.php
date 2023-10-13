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
            <div class="col-md-4">
                <div class="alert alert-info" role="alert">
                    สมัครสมาชิก
                </div>

                <form method="POST" action="insert_register_ad.php">
                    ชื่อ <input type="text" name="firstname" class="form-control" required>
                    นามสกุล <input type="text" name="lastname" class="form-control" required>
                    เบอร์โทรศัพท์ <input type="text" name="telephone"  maxlength="10" class="form-control" required>
                    Username <input type="text" name="username" maxlength="10" class="form-control" required>
                    Password <input type="password" name="password"  class="form-control" required>
                    <br>
                    <input type="submit" name="submit" class="btn btn-primary" value="บันทึก">
                    <input type="reset" name="cancel" class="btn btn-primary" value="ยกเลิก">
                    <br><br>
                    <a href="login_ad.php"> Login </a>
                </form>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
</body>

</html>