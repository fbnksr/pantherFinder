<?php
$sql = 'SELECT
id, item_name, item_description, item_location, date_turned_in, claimed
  FROM
items
  ORDER BY
date_turned_in ASC';
$result = mysqli_query($cn, $sql) or
  die(mysqli_error($cn));

while ($row = mysqli_fetch_assoc($result)) {
  if ($row['claimed'] == 0) {
    date_default_timezone_set('America/New_York');
    $date = date('M j, Y g:i A', $row['date_turned_in']);

    echo '
    <tr class="clickable-row">
      <td class="col-xs-1 class="clickable-row"">' . $row['id'] . '</td>
      <td class="col-xs-2 class="clickable-row"">' . $row['item_name'] . '</td>
      <td class="col-xs-2 class="clickable-row"">' . $row['item_description'] . '</td>
      <td class="col-xs-2 class="clickable-row"">' . $row['item_location'] . '</td>
      <td class="col-xs-3 class="clickable-row"">' . $date . '</td>
    </tr>
    ';
  }
}
?>
