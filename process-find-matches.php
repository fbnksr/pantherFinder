
<?php
  $sql = 'SELECT id, first, last FROM user';

  $result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
  $id = '4267233'; 
  while ($row = mysqli_fetch_assoc($result)) {
    if ($_SESSION["id"] == $row['id']) {
      echo $row['first'];
    }
  }
?>
