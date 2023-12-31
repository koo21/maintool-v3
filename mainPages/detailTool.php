<?php
session_start();
include '../conn/conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php include '../title-footer/title.php'; ?></title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/banner.css">
    <link rel="stylesheet" href="../boot5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="../boot5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include '../banner/banner1.php'; ?>
    <?php
    include 'link.php';
    include '../array/month.php';
    include 'myClass.php';
    $obj = new MyClass;
    $stmt = $coon->prepare(" SELECT* FROM main_tool WHERE tool_id = ? ");
    $stmt->execute([$_GET["id"]]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($r["tool_img"] == "") {
        $toolImg = '../images/imgTool/noImg.jpeg';
    } else {
        $toolImg = $link . $r["tool_img"];
    }

    ?>

    <div class="container" style="margin-top: 15rem;">
        <div class="col-md-12">
            <div class="imgFix">
                <div class="iconStatus"><img src="../images/<?= $iconStatus ?>" alt="" srcset=""></div>
                <img class="card-img-top" src="<?= $toolImg ?>" alt="<?= $r["tool_ad1"] ?>">
            </div>
            <hr>
            <div class="detailText">
                <b>เลขครุภัณฑ์ : </b> <?= $r["tool_as"] ?> <b>ชื่อครุภัณฑ์ : </b> <?= $r["tool_ad1"] ?><br>
                <b>รายละเอียดครุภัณฑ์ : </b> <?= $r["tool_ad2"] ?> <br>
                <b>แหล่งเงิน : </b> <?= $r["tool_fund"] ?> <b>ปีงบประมาณ : </b> <?= $r["tool_year"] ?><br>
                <b>วันที่รับครุภัณฑ์ : </b> <?= $obj->toolCd($r["tool_cd"]) ?>
                <b> วันที่ครอบครอง : </b> <?= $obj->toolOccupy($r["tool_occupy"]) ?> <br>
                <?= $obj->nameRoomFull($r["tool_id_room"]) ?><br>
                <b>ผู้ดูแล : </b> <?= $obj->checkTool($r["tool_check"]) ?> <br>
                <b>ผู้ใช้งาน : </b> <?= $obj->nameUser($r["tool_user_id"]) ?> <br>
                <b>ประเภทอุปกรณ์ : </b> <?= $obj->toolStatus2($r["tool_sta2"]) ?> <br>
                <b>สถานะการใช้งาน : </b> <?= $obj->toolStatus($r["tool_sta"]) ?> <br>
                <b>รายระเอียดอื่นๆ : </b> <?= $r["tool_ad2"] ?> <br>
                <b>ยี่ห้อ : </b> <?= $r["tool_bn"] ?> <br>
                <b>รุ่น : </b> <?= $r["tool_md"] ?> <br>
                <b>คุณสมบัติ : </b> <?= $r["tool_ab"] ?> <br>
                <b>ชื่อบริษัท : </b> <?= $r["tool_company"] ?> <br>
                <b>ที่อยู่ : </b> <?= $r["tool_company_at"] ?> <br>
                <b>เบอร์โทรศัพท์ : </b> <?= $r["tool_company_tel"] ?> <br>
                <b>อายุการรับประกัน : </b> <?= $obj->toolQt($r["tool_qt"]) ?> <br>
                <b>ราคา : </b> <?= $r["tool_ov"] ?> <br>
                <b>Serial Number : </b> <?= $r["tool_sn"] ?> <br>
            </div>
        </div>
    </div>
    <?php include '../title-footer/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</body>

</html>