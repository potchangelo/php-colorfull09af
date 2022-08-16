<?php require("utils/db.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสีใหม่ | Colorfull 09AF</title>
</head>

<body>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
        <?php
        $code = mysqli_real_escape_string($connection, $_POST["code"]);
        $title = mysqli_real_escape_string($connection, $_POST["title"]);
        $sql = "INSERT INTO color (code, title) VALUES ('$code', '$title');";
        $result = mysqli_query($connection, $sql);
        ?>
        <?php if ($result) : ?>
            <h2>เพิ่มสีใหม่เรียบร้อย</h2>
            <p>
                <a href="./">กลับหน้าแรก</a>
            </p>
        <?php else : ?>
            <h2>เพิ่มสีใหม่ผิดพลาด</h2>
            <p>
                <a href="new-color.php">เพิ่มสีใหม่อีกครั้ง</a>
            </p>
        <?php endif; ?>
    <?php else : ?>
        <h2>เพิ่มสีใหม่</h2>
        <form method="post">
            <p>
                <label>โค้ดสี</label>
                <input type="color" name="code">
            </p>
            <p>
                <label>ชื่อสี</label>
                <input type="text" name="title">
            </p>
            <p>
                <button type="submit">บันทึก</button>
            </p>
        </form>
    <?php endif; ?>
</body>

</html>

<?php mysqli_close($connection); ?>
