<?php include 'condb.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale-scale=1.0" />
    <title>Thai Herbs</title>
    <!-- Site Metas -->
    <link href="bootstrsp/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
    <style>
        .ii{
            margin-left:40% ;
        }

    </style>
</head>


<body>
    <?php include 'header1.php'; ?>
    <div class="container">
        <br><br>
        <div class="row">
            <h4 class="ii">ยาสมุนไพรไทย(ชนิดผง)</h4>
            <?php
            $sql = "SELECT * FROM product where type_id = 300";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-sm-3">
                    <div class="text-center">
                        <img src="<?= $row['image'] ?>" width="200" height="250" class="mt-5 p-2 my-2 border"> <br>
                        ID: <?= $row['pro_id'] ?><br>
                        <h5 class="text-success"><?= $row['pro_name'] ?></h5>
                        ราคา <?= $row['price'] ?> บาท <br>
                        <a class="btn btn-outline-primary" href="sh_product_detail.php?action=show&id=<?=$row['pro_id']?>">รายละเอียด </a>
                    </div>
                </div>
                <br>
            <?php
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>

</html>