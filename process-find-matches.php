<?php
  $sql = 'SELECT * FROM items WHERE item_name';
  $result = mysqli_query($cn, $sql) or die(mysqli_error($cn));

  while ($row = mysqli_fetch_assoc($result)) {
    echo $row['item_name'];
  }

?>
