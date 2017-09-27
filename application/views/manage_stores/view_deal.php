<?php
if($details)
  {
    
    $date_format = $this->config->item('date_format', 'tank_auth');
?>
    <table class="table table-bordered table-striped">
         <tr>
            <td style="width: 150px;"><strong>Deal Title:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["deal"]); ?></td>
        </tr>
         <tr>
            <td><strong>Start Time:</strong></td>
            <td><?php if($details[0]["start_time"]!="" && $details[0]["start_time"]!='0000-00-00 00:00:00') echo date('Y-m-d H:i:s',strtotime($details[0]["start_time"])); else echo "-"; ?></td>
        </tr>
        <tr>
            <td><strong>End Time:</strong></td>
            <td><?php if($details[0]["end_time"]!="" && $details[0]["end_time"]!='0000-00-00 00:00:00') echo date('Y-m-d H:i:s',strtotime($details[0]["end_time"])); else echo "-"; ?></td>
        </tr>
         <tr>
            <td style="width: 150px;"><strong>Store Name:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["store_name"]); ?></td>
        </tr>
        <tr>
            <td style="width: 150px;"><strong>Product Category:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["product_category_name"]); ?></td>
        </tr>
        <tr>
            <td><strong>Description:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["description"]); ?></td>
        </tr>
         <tr>
            <td><strong>How to use:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["how_to_use"]); ?></td>
        </tr>
        <tr>
            <td><strong>Terms of use:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["terms_of_use"]); ?></td>
        </tr>
        <tr>
            <td><strong>Added:</strong></td>
            <td><?php if($details[0]["deals_created"]!="" && $details[0]["deals_created"]!='0000-00-00 00:00:00') echo date($date_format,strtotime($details[0]["deals_created"])); else echo "-"; ?></td>
        </tr>
    </table>
      <div class="clearfix"></div>
<?php } ?>
