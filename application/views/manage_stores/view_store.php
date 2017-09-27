<?php
if($details)
  {
    $date_format = $this->config->item('date_format', 'tank_auth');
?>
    <table class="table table-bordered table-striped">
         
        <tr>
            <td style="width: 150px;"><strong>Store Name:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["store_name"]); ?></td>
        </tr>
        <tr>
            <td style="width: 150px;"><strong>Region Name:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["region_name"]); ?></td>
        </tr>
         <tr>
            <td style="width: 150px;"><strong>Sub Region Name:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["sub_region_name"]); ?></td>
        </tr>
        <tr>
            <td><strong>Latitude:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["latitude"]); ?></td>
        </tr>
         <tr>
            <td><strong>Langitude:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["longitude"]); ?></td>
        </tr>
        <tr>
            <td><strong>Contact Person:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["contact_first_name"]." ".$details[0]["contact_last_name"]); ?></td>
        </tr>
        <tr>
            <td><strong>Added:</strong></td>
            <td><?php if($details[0]["created"]!="" && $details[0]["created"]!='0000-00-00 00:00:00') echo date($date_format,strtotime($details[0]["created"])); else echo "-"; ?></td>
        </tr>
    </table>
      <div class="clearfix"></div>
<?php } ?>
