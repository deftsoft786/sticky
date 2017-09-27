<?php
if($details)
  {
    
    $date_format = $this->config->item('date_format', 'tank_auth');
?>
    <table class="table table-bordered table-striped">
         <tr>
            <td style="width: 150px;"><strong>Product Name:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["product_name"]); ?></td>
        </tr>
        <tr>
            <td style="width: 150px;"><strong>Description:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["description"]); ?></td>
        </tr>
         <tr>
            <td style="width: 150px;"><strong>Product Category:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["product_category_name"]); ?></td>
        </tr>
       
     
    </table>
    
      <div class="clearfix"></div>
        <table class="table table-bordered table-striped">
         <tr>
            <td style="width: 150px;"><strong>Unit:</strong></td>
            <?php if($product_cost){foreach($product_cost as $var){ ?>
            <td><?php echo htmlspecialchars($var["unit_label"]); ?></td>
            <?php } }?>
        </tr>
        <tr>
            <td style="width: 150px;"><strong>Cost:</strong></td>
           <?php if($product_cost){foreach($product_cost as $var){ ?>
            <td><?php echo htmlspecialchars($var["cost"]); ?></td>
            <?php } }?>
        </tr>
        
     
    </table>
<?php } ?>
