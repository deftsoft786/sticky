<?php
if($details)
{
    $date_format = $this->config->item('date_format', 'tank_auth');
?>
    <table class="table table-striped table-bordered  table-condensed">
        <tr>
            <td><strong>First Name:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["first_name"]); ?></td>
        </tr>
        <tr>
            <td><strong>Last Name:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["last_name"]); ?></td>
        </tr>
         <tr>
            <td><strong>Username:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["username"]); ?></td>
        </tr>
       <tr>
            <td><strong>Email:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["email"]); ?></td>
        </tr>
       <tr>
            <td><strong>Last Sign in IP:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["last_ip"]); ?></td>
        </tr>
        <tr>
            <td><strong>Last Sign at:</strong></td>
            <td><?php if($details[0]["last_login"]!="" && $details[0]["last_login"]!='0000-00-00 00:00:00') echo date($date_format,strtotime($details[0]["last_login"])); else echo "-"; ?></td>
        </tr>
        
        <tr>
            <td><strong>Created:</strong></td>
            <td><?php  echo  date('m-d-Y h:i:s',strtotime($details[0]["created"])); ?></td>
        </tr>
        <tr>
            <td><strong>Last Updated:</strong></td>
            <td><?php echo date('m-d-Y h:i:s',strtotime($details[0]["modified"])); ?></td>
        </tr>
    </table>
    
    
    
<?php    
}
?>