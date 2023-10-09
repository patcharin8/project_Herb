<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 badge bg-light text-dark">
                <div class="alert alert-info" role="alert">
                    <h4>Login</h4>
                </div> 

                <form method="POST" action="login_check.php">

                    <input type="text" name="username" class="form-control" required placeholder="username"><br>
                    <input type="password" name="password" class="form-control" required placeholder="password">
                    <br>
                    <input type="submit" name="submit" class="btn btn-primary" value="login">

                    <br><br>
                    <a href="register.php"> register </a>
                </form>
            </div>
        </div>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
</body>

</html>