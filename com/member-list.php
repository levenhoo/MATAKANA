<?php
$result_data = $database->select("member","*");
?>
<table class="table table-bordered">
  <thead>
  <tr>
    <td><?php print $lang['table-field-member-table-ename']; ?></td>
    <td><?php print $lang['table-field-member-table-name']; ?></td>
    <td><?php print $lang['table-field-member-table-dayofbirth']; ?></td>
    <td><?php print $lang['table-field-member-table-phone']; ?></td>
    <td><?php print $lang['table-field-member-table-contact']; ?></td>
  </tr>
  </thead>
  <tbody>
  <?php foreach($result_data as $table_row): ?>
    <tr>
      <td><?php echo $table_row["member_no"] ?></td>
      <td><?php echo $table_row["member_name"] ?></td>
      <td><?php echo $table_row["company"] ?></td>
      <td><?php echo $table_row["phone"] ?></td>
      <td><?php echo $table_row["contact"] ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>