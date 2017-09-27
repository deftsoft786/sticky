<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
    'class'=>'form-control',
    'placeholder'=>'Email or Username'
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
    'class'=>'form-control',
    'placeholder'=>'Password'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
    'class'=>'form-control'
);


?>



        <div class="form-box" id="login-box">
            <div class="header">
            <img src="<?php echo base_url('assets/images/stick.png'); ?>" class="logo-login" />
            </div>
           <?php echo form_open($this->uri->uri_string()); ?>
                <div class="body bg-gray">
                    <div class="form-group">
                        <?php echo form_input($login); ?>
						<span style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_password($password); ?>
										<span style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
                    </div> 
                    
                    <?php if ($show_captcha) {
	                                   	if ($use_recaptcha) { ?>
								<div class="form-group">
									<div class="col-lg-6">
									  <div id="recaptcha_image"></div>
									</div>
                                    <div class="col-lg-6">
                                        <a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
                            			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
                            			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-6">
                                        <div class="recaptcha_only_if_image">Enter the words above</div>
    			                         <div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
                                    </div>
                                    <div class="col-lg-6">
                                    <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" class="form-control" />
                                    <div style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></div>
		                            <?php echo $recaptcha_html; ?>
                                    </div>
                                    
                                    
								</div>
                                	<?php } else { ?>
								<div class="form-group">
									<div class="col-lg-12">
										<p>Enter the code exactly as it appears:</p>
			                            <?php echo $captcha_html; ?>
									</div>
								</div>
                                
								<div class="form-group">
									<div class="col-lg-12">
    									<div><?php echo form_label('Confirmation Code', $captcha['id']); ?></div>
                                		<div><?php echo form_input($captcha); ?></div>
                                		<div style="color: red;"><?php echo form_error($captcha['name']); ?></div>
									</div>
								</div>
                                <?php }
                                	} ?>
                    
                             
                    <div class="form-group">
                        <?php echo form_checkbox($remember); ?>
                        <?php echo form_label('Remember me', $remember['id']); ?>
                    </div>
                </div>
                <div class="footer">    
                <button type="submit" class="btn bg-olive btn-block">Login	</button>                                                           
                 <p>	<?php echo anchor('/auth/forgot_password/', 'Forgot password?'); ?></p>
                    
                    
                </div>
            	<?php echo form_close(); ?>

        </div>



