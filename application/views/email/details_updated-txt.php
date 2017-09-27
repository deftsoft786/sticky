

Administrator has updated your account details for  <?php echo $site_name; ?>. <?php echo $site_name; ?>. We listed your sign in details below. Make sure you keep them safe.
Follow this link to login on the site:

<?php echo site_url('/auth/login/'); ?>
<?php if (strlen($username) > 0) { ?>
Your username: <?php echo $username; ?>
<?php } ?>
Your email address: <?php echo $email; ?>
<?php if($banned==0) $status = 'Active'; else $status='Disabled'; { ?>
Account Status: <?php echo $status; ?>
<?php } ?>
<?php if ($role >2) { 
if($role==3) $role_name = 'Beheerder'; else $role_name='Gebruiker';  ?>    
Role: <?php echo $role_name; ?><?php
} ?>

Have fun!
The <?php echo $site_name; ?> Team