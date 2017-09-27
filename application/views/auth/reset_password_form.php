<?php
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'class'=>'form-control',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
    'placeholder' =>'New Password'

);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'class'=>'form-control',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
    'placeholder' =>'Confirm Password'
);
?>



<div class="form-box" id="login-box">
            <div class="header">
            <img src="<?php echo base_url('assets/images/stick.png'); ?>" class="logo-login" />
            </div>
           <?php echo form_open($this->uri->uri_string(),array('class'=>'form-horizontal','role'=>'form','id'=>'login_form')); ?>
							<div class="body bg-gray">
                            	<div class="form-group">
                                    <div class="col-lg-12">
                                       <?php echo form_password($new_password); ?>
										<span style="color: red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?>
										</span>
									</div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-lg-12">
                                       	<?php echo form_password($confirm_new_password); ?>
										<span style="color: red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?>
										</span>
									</div>
                                 </div>
								</div>
                                <div class="footer">  
                                        <button type="submit" class="btn  bg-olive">
											Change Password
										</button>
                                    </div>
                	<?php echo form_close(); ?>

        </div>
