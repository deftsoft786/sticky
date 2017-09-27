<?php
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class'=>'form-control',
    'placeholder' => $login_label
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
                                     <label class="control-label" for="login">Please enter your username/email</label>
										<?php echo form_input($login); ?>
										<span style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
										</span>
									</div>
                                    
								
								</div>
								</div>
                                <div class="footer">  
                                        <a href="<?php echo site_url('auth/login'); ?>" class="btn btn-default">Cancel</a>  
                                         <button type="submit" class="btn  bg-olive">
											Get a new password
										</button>
                                    </div>
                	<?php echo form_close(); ?>

        </div>




















