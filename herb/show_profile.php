<?php include 'condb.php';
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
    <title>show Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'header1.php'; ?>
    <div class="container px-4">

        <div class="row">
            <div class="col-md-5">
                <div class="alert alert-info h4" role="alert">
                    ข้อมูลสมาชิก
                </div>

                <form method="POST" action="update_profile.php" enctype="multipart/form-data">
                    <?php

                    $sql = "SELECT * FROM member  where id='" . $_SESSION['userid'] . "'";
                    $hand = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($hand)) {

                    ?>
                        <div class="mb-3 mt-3">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['userid']; ?>" />
                            <img src="<?= $row['image_pro'] ?>" width="100"><br>
                            <label>รูปภาพ:</label>
                            <input type="file" name="fileToUpload" value=<?= $row['image_pro'] ?>><br>


                            <label>ชื่อผู้ใช้ :</label>
                            <input type="text" name="username" class="form-control" readonly value=<?= $row['username'] ?>> <br>

                            <label>ชื่อ :</label>
                            <textarea class="form-control" name="name"> <?= $row['name'] ?></textarea> <br>

                            <label>นามสกุล :</label>
                            <textarea class="form-control" name="lastname"> <?= $row['lastname'] ?></textarea> <br>

                            <label>เบอร์โทรศัพท์:</label>
                            <input type="number" name="telephone" class="form-control" value=<?= $row['telephone'] ?>><br>

                        </div>
                        <button type="submit" name="edit" class="btn btn-success">แก้ไข</button>
                </form>

            <?php }
                    mysqli_close($conn);
            ?>
            </div>



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