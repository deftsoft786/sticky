<?php
if($details)
  {
    
    $date_format = $this->config->item('date_format', 'tank_auth');
?>
    <table class="table table-bordered table-striped">
         <tr>
            <td style="width: 150px;"><strong>Category Name:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["product_category_name"]); ?></td>
        </tr>
        <?php if($product_units){ $i=1;
            foreach($product_units as $var){ ?>
         <tr>
            <td><strong>Unit-<?php echo $i;?>:</strong></td>
            <td><?php  echo $var["unit_name"]?></td>
        </tr>
  <?php $i++;} } ?>
        <tr>
            <td><strong>Added:</strong></td>
            <td><?php if($details[0]["created"]!="" && $details[0]["created"]!='0000-00-00 00:00:00') echo date($date_format,strtotime($details[0]["created"])); else echo "-"; ?></td>
        </tr>
    </table>
      <div class="clearfix"></div>
<?php } ?>
