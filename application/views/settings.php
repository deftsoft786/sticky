<?php



$first_name = array(
	'name'	=> 'first_name',
	'id'	=> 'first_name',
	'value' => @$profile_info->first_name,
	'maxlength'	=> 80,
	'size'	=> 30,
     'class'=>'form-control',
    'placeholder'=>'First Name'
);
$last_name = array(
	'name'	=> 'last_name',
	'id'	=> 'last_name',
	'value' => @$profile_info->last_name,
	'maxlength'	=> 80,
	'size'	=> 30,
     'class'=>'form-control',
    'placeholder'=>'Last Name'
);


$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value' => @$profile_info->email,
	'maxlength'	=> 80,
	'size'	=> 30,
     'class'=>'form-control',
    'placeholder'=>'Email'
);
$new_email = array(
	'name'	=> 'email',
	'id'	=> 'new_email',
    'maxlength'	=> 80,
	'size'	=> 30,
     'class'=>'form-control',
    'placeholder'=>'Email'
);
$vpassword = array(
	'name'	=> 'password',
	'id'	=> 'vpassword',
	'maxlength'	=> 80,
	'class'=>'form-control',
    'placeholder'=>'Current Password'
);



$password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'maxlength'	=> 80,
	'class'=>'form-control',
    'placeholder'=>'Current Password'
);

$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> 80,
	'class'=>'form-control',
    'placeholder'=>'New Password'
);

$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> 80,
	'class'=>'form-control',
    'placeholder'=>'Confirm New Password'
);



?> 
<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Settings
                    <small>Change your basic and login settings.</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Settings</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="row">
      
      
        <div class="col-lg-12">
        <?php
      $msg = $this->session->flashdata('message');
      $class = $this->session->flashdata('class');
      if($msg)
      {
        echo "<div class='alert alert-dismissable alert-".$class."' id='message_box' ><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$msg."</div>";
      }
      ?>
        <div class="well-lg">
        
        <h4>Change Basic Information</h4>
         <?php echo form_open(site_url('settings/profile_edit'),  array('class'=>'form-horizontal','role'=>'form','id'=>'basic_form')); ?>
        <div class="form-group">
            
            <div class="col-lg-6">
                <label class="control-label">First Name</label>
              <?php echo form_input($first_name); ?> 
                <span style="color: red;"><?php echo form_error($first_name['name']); ?><?php echo isset($errors[$first_name['name']])?$errors[$first_name['name']]:''; ?></span>
            </div>
            <div class="col-lg-6">
                <label class="control-label">Last Name</label>
              <?php echo form_input($last_name); ?> 
                 <span style="color: red;"><?php echo form_error($last_name['name']); ?><?php echo isset($errors[$last_name['name']])?$errors[$last_name['name']]:''; ?></span>
            </div>
            
          </div>
         <div class="form-group form-actions">
            <div class="col-lg-12 text-right">
              <button type="submit" class="btn btn-success">Save Changes</button>
            </div>
          </div>
        <?php echo form_close(); ?>
        
        
        
        <hr />
        <h4>Change Email</h4>
        <?php echo form_open(site_url('/auth/change_email'),  array('class'=>'form-horizontal','role'=>'form','id'=>'email_form')); ?>
                                    <div class="form-group">
                                        
                                        <div class="col-lg-12">
                                            <label class="control-label">Email</label>
                                          <?php echo form_input($email); ?> 
                                            <span style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></span>
                                        </div>
                                      </div>
                                     
                                        
                                     
                                      
                                      <div class="form-group form-actions">
                                       <div class="col-lg-12 text-right">
                                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#changeEmail">Change Email</button>
                                        </div>
                                      </div>
            <?php echo form_close(); ?>	
            <hr />
            <h4>Change Password</h4>
            <?php echo form_open(site_url('/auth/change_password'),  array('class'=>'form-horizontal margin-top-20','role'=>'form','id'=>'password_form')); ?>
                                    <div class="form-group">
                                        
                                        <div class="col-lg-12">
                                            <label class="control-label">Current Password</label>
                                          <?php echo form_password($password); ?> 
                                            <span style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></span>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        
                                        <div class="col-lg-12">
                                            <label class="control-label">New Password</label>
                                          <?php echo form_password($new_password); ?> 
                                            <span style="color: red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></span>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        
                                        <div class="col-lg-12">
                                            <label class="control-label">Confirm New Password</label>
                                          <?php echo form_password($confirm_new_password); ?> 
                                            <span style="color: red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></span>
                                        </div>
                                      </div>
                                     
                                        
                                     
                                      
                                      <div class="form-group form-actions">
                                        <div class="col-lg-12 text-right">
                                          <button type="submit" class="btn btn-success">Change Password</button>
                                        </div>
                                      </div>
            <?php echo form_close(); ?>			
        
        </div>
        </div>
      </div>
                        
                       
                         
                </section><!-- /.content -->
            </aside><!-- /.right-side -->







<!-- Change Email -->
<div class="modal fade" id="changeEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Enter password to change email</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open(site_url('/auth/change_email'),  array('class'=>'form-horizontal','role'=>'form','id'=>'new_email_form')); ?>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label class="control-label">Password</label>
                                          <?php echo form_password($vpassword); ?> 
                                            <span style="color: red;"><?php echo form_error($vpassword['name']); ?><?php echo isset($errors[$vpassword['name']])?$errors[$vpassword['name']]:''; ?></span>
                                        </div>
                                      </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label class="control-label">Email</label>
                                          <?php echo form_input($new_email); ?> 
                                            <span style="color: red;"><?php echo form_error($new_email['name']); ?><?php echo isset($errors[$new_email['name']])?$errors[$new_email['name']]:''; ?></span>
                                        </div>
                                      </div>                    
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
        <div class="clearfix" ></div>
        <div id="new_email_form_res" class="text-left" ></div>
       <div class="clearfix" ></div>
      </div>
      <?php echo form_close(); ?>	
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
$('#changeEmail').on('show.bs.modal', function (e) {
  $('#new_email').val($('#email').val());
})

$(document).ready(function(){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
     
    
     $('#new_email_form').submit(function(){
        if($.trim($('#vpassword').val()).length==0)
        {
           $('#vpassword').css('border','2px solid red'); 
           $('#vpassword').focus();
           return false; 
        }
        else
        {
             $('#vpassword').css('border','1px solid #cccccc'); 
        }
        if($.trim($('#new_email').val()).length==0 || !regex.test($.trim($('#new_email').val())))
        {
           $('#new_email').css('border','2px solid red'); 
           $('#new_email').focus();
           return false; 
        }
        else
        {
             $('#new_email').css('border','1px solid #cccccc'); 
        }
        
        var values = $('#new_email_form').serialize();
        $.ajax({
        url:'<?php echo site_url('auth/change_email/'); ?>',
        dataType:'json',
        type:'POST',
        data:values,
        success:function(result){
          
         if(result.status==1)
         {
            $('#new_email_form_res').html('<div class="alert alert-success" id="disappear0" style="margin-top:5px;"  >'+result.message+'</div>');
            setTimeout(function(){$('#disappear0').fadeOut('slow')},3000)
            $('#new_email_form')[0].reset();
         }
         else
         {
            $('#new_email_form_res').empty().html('<div class="alert alert-danger"  style="margin-top:5px;" >'+result.message+'</div>');
            $('#vpassword').val('');
         } 
        }
       });
    
    return false;
        
        
    });
    
     $('#password_form').submit(function(){
        if($.trim($('#old_password').val()).length==0)
        {
           $('#old_password').css('border','2px solid red'); 
           $('#old_password').focus();
           return false; 
        }
        else
        {
             $('#old_password').css('border','1px solid #cccccc'); 
        }
        if($.trim($('#new_password').val())==0)
        {
           $('#new_password').css('border','2px solid red'); 
           $('#new_password').focus();
           return false; 
        }
        else
        {
             $('#new_password').css('border','1px solid #cccccc'); 
        }
         if($.trim($('#confirm_new_password').val())==0 || $.trim($('#confirm_new_password').val())!=$.trim($('#new_password').val()) )
        {
           $('#confirm_new_password').css('border','2px solid red'); 
           $('#confirm_new_password').focus();
           return false; 
        }
        else
        {
             $('#confirm_new_password').css('border','1px solid #cccccc'); 
        }
        
    });
    
    
});
</script>