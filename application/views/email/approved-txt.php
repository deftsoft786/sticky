<?php echo $site_name; ?> account approved!

Your account has been approved on <?php echo $site_name; ?>. We listed your sign in details below, make sure you keep them safe.

Follow this link to login on the site:

<?php echo $site_url.'auth/login/'; ?>

<?php if (strlen($username) > 0) { ?>
Your username: <?php echo $username; ?>
<?php } ?>
Your email address: <?php echo $email; ?>



Have fun!
The <?php echo $site_name; ?> Team