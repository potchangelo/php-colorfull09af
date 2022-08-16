<?php require("utils/db.php"); ?>
<?php
function createColor($connection) {
  $code = mysqli_real_escape_string($connection, $_POST["code"]);
  $title = mysqli_real_escape_string($connection, $_POST["title"]);
  $sql = "INSERT INTO color (code, title) VALUES ('$code', '$title');";
  $result = mysqli_query($connection, $sql);
  return $result;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require("html-components/head.php"); ?>
  <title>เพิ่มสีใหม่ | Colorfull 09AF</title>
</head>

<body>
  <?php require("html-components/header.php"); ?>
  <section class="section">
    <div class="container">
      <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
        <?php $result = createColor($connection); ?>
        <?php if ($result) : ?>
          <h3>เพิ่มสีใหม่เรียบร้อย</h3>
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
        <h3>เพิ่มสีใหม่</h3>
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
    </div>
  </section>
</body>

</html>

<?php mysqli_close($connection); ?>
