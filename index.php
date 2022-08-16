<?php require("utils/db.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  $searchTitle = "";
  if (isset($_GET["search"])) {
    $searchTitle = "ค้นหา \"$_GET[search]\" | ";
  }
  ?>
  <title><?php echo $searchTitle; ?>Colorfull 09AF</title>
</head>

<body>
  <h2>Colorfull 09AF</h2>
  <?php
  $searchValue = "";
  if (isset($_GET["search"])) {
    $searchValue = $_GET["search"];
  }
  ?>
  <form>
    <p>
      <input type="search" name="search" value="<?php echo $searchValue; ?>" placeholder="ค้นหาจากชื่อสี">
    </p>
    <p>
      <button type="submit">ค้นหา</button>
    </p>
  </form>
  <?php
  $sql = "SELECT * FROM color ORDER BY created_at DESC";
  $result = mysqli_query($connection, $sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $count_rows = count($rows);
  ?>
  <h3>พบสี <?php echo $count_rows; ?> รายการ</h3>
  <?php foreach ($rows as $row) : ?>
    <div class="color-item" style="border-color: <?php echo $row["code"]; ?>;">
      <h4><?php echo $row["title"]; ?></h4>
      <p><?php echo $row["code"]; ?></p>
    </div>
  <?php endforeach; ?>
</body>

</html>

<?php mysqli_close($connection); ?>
