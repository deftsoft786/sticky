<?php
if($details)
  {
    $date_format = $this->config->item('date_format', 'tank_auth');
?>
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
 <li class="active"><a href="#basic_info" data-toggle="tab">Baisc Information</a></li>
  <li><a href="#profile" data-toggle="tab">Profile</a></li>
  <?php if($w_hours){ ?>
  <li><a href="#working_hours" data-toggle="tab">Working Hours</a></li>
  <?php } ?>
</ul>
 <div class="tab-content">
 <div class="tab-pane fade in active" id="basic_info">
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
  </div>
<div class="tab-pane fade" id="profile">
   <table class="table table-bordered table-striped">
      <?php if($details[0]["description"]){ ?>  
      <tr>
            <td style="width: 150px;"><strong>Description:</strong></td>
            <td><?php echo nl2br(htmlspecialchars($details[0]["description"])); ?></td>
        </tr>
        <?php } ?>
        <?php if($details[0]["first_time_patients"]){ ?>  
      <tr>
            <td style="width: 150px;"><strong>First Time Paitents:</strong></td>
            <td><?php echo nl2br(htmlspecialchars($details[0]["first_time_patients"])); ?></td>
        </tr>
        <?php } ?>
         <?php if($details[0]["announcement"]){ ?>  
      <tr>
            <td style="width: 150px;"><strong>Announcement:</strong></td>
            <td><?php echo nl2br(htmlspecialchars($details[0]["announcement"])); ?></td>
        </tr>
        <?php } ?>
        <?php if($details[0]["email"]){ ?>  
      <tr>
            <td style="width: 150px;"><strong>Email:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["email"]); ?></td>
        </tr>
        <?php } ?>
        <?php if($details[0]["contact_number"]){ ?>  
      <tr>
            <td style="width: 150px;"><strong>Contact Number:</strong></td>
            <td><?php echo htmlspecialchars($details[0]["contact_number"]); ?></td>
        </tr>
        <?php } ?>
         <?php if($details[0]["fb_link"]){ ?>  
      <tr>
            <td style="width: 150px;"><strong>Facebook:</strong></td>
            <td><a  href="<?php echo $details[0]["fb_link"];?>" target="_blank"><i class="fa fa-facebook-official"></i></a></td>
      </tr>
        <?php } ?>
          <?php if($details[0]["twitter_link"]){ ?>  
      <tr>
            <td style="width: 150px;"><strong>Twitter:</strong></td>
            <td><a  href="<?php echo $details[0]["twitter_link"];?>" target="_blank"><i class="fa fa-facebook-official"></i></a></td>
      </tr>
        <?php } ?>
         <?php if($details[0]["pinterest_link"]){ ?>  
      <tr>
            <td style="width: 150px;"><strong>Pinterest:</strong></td>
            <td><a  href="<?php echo $details[0]["pinterest_link"];?>" target="_blank"><i class="fa fa-facebook-official"></i></a></td>
      </tr>
        <?php } ?>
         <?php if($details[0]["you_tube_link"]){ ?>  
      <tr>
            <td style="width: 150px;"><strong>You tube:</strong></td>
           <td> <a  href="<?php echo $details[0]["you_tube_link"];?>" target="_blank"><i class="fa fa-facebook-official"></i></a></td>
      </tr>
        <?php } ?>
    </table>  
</div>
 <?php if($w_hours){ ?>
 	<div class="tab-pane fade" id="working_hours">
   <table class="table table-bordered table-striped">
  <thead>
      <th>Days</th>
      <th>Open</th>
      <th>Close</th>
  </thead>
  <tbody>
    <?php if($w_hours[0]["show_mon"] == 1) { ?>
    <tr>
    <td>Monday</td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["monday_start"])); ?> </td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["monday_end"])); ?> </td>
    </tr>
    <?php } ?>
    <?php if($w_hours[0]["show_tues"] == 1) { ?>
    <tr>
    <td>Tuesday</td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["tuesday_start"])); ?> </td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["tuesday_end"])); ?> </td>
    </tr>
    <?php } ?>
     <?php if($w_hours[0]["show_wed"] == 1) { ?>
    <tr>
    <td>Wednesday</td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["wednesday_start"])); ?> </td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["wednesday_end"])); ?> </td>
    </tr>
    <?php } ?>
     <?php if($w_hours[0]["show_thu"] == 1) { ?>
    <tr>
    <td>Thursday</td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["thursday_start"])); ?> </td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["thursday_end"])); ?> </td>
    </tr>
    <?php } ?>
    <?php if($w_hours[0]["show_fri"] == 1) { ?>
    <tr>
    <td>Friday</td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["friday_start"])); ?> </td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["friday_end"])); ?> </td>
    </tr>
    <?php } ?>
    <?php if($w_hours[0]["show_sat"] == 1) { ?>
    <tr>
    <td>Saturday</td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["saturday_start"])); ?> </td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["saturday_end"])); ?> </td>
    </tr>
    <?php } ?>
     <?php if($w_hours[0]["show_sun"] == 1) { ?>
    <tr>
    <td>Sunday</td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["sunday_start"])); ?> </td>
    <td>    <?php echo date('g:i a.',strtotime($w_hours[0]["sunday_end"])); ?> </td>
    </tr>
    <?php } ?>
    </tbody>    
    </table>  
</div>
<?php } ?>
 </div>
  </div>
      <div class="clearfix"></div>
<?php } ?>