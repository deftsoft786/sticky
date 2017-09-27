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
            <td><strong>Comment:</strong></td>
            <td><?php echo nl2br(htmlspecialchars($details[0]["body"])); ?></td>
        </tr>
        
        <tr>
            <td><strong>Author Email:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["email"]); ?></td>
        </tr>
        
        <tr>
            <td><strong>Created:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["created"]); ?></td>
        </tr>
        
        
        
    </table>
<?php 
}
?>