<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title><?php echo $subject; ?>!</title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">

A new job has been posted on needgr8r.org under <?php echo $job_cat; ?>.<br />
You might be interested in this job. 
<br />
<br />

<b><?php echo $job_title; ?></b><br />

<?php echo $job_budget; ?>  | <?php echo $job_cat; ?>  |  Posted:  <?php echo date('m-d-Y',strtotime($job_created)); ?>
<br /><br />
<b>Job description:</b><br />
<?php echo nl2br($job_desc); ?>

<br />
<br />
<?php echo $site_name; ?> Team<br />
start sooner, stay longer, and be more productive
<br /><br />
<small><strong>Please do not respond to the email. To view details of job, please login at <a href="http://needgr8r.org/">Needgr8r.org</a>.</strong></small><br />
<small>You can control type of emails you can receive from the communication tab on edit profile page </small>
</td>
</tr>
</table>
</div>
</body>
</html>