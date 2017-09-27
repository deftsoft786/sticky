<?php
if($details)
{
$username = array(
  'name'  => 'username',
  'id'  => 'username_edit_user',
  'value' => set_value('username', @$details[0]["username"]),
  'maxlength' => 80,
  'size'  => 30,
    'class' => 'form-control',
    'placeholder' => 'Username'
);


$email = array(
  'name'  => 'email',
  'id'  => 'email',
  'value' => set_value('email', @$details[0]["email"]),
  'maxlength' => 80,
  'size'  => 30,
    'class' => 'form-control',
    'placeholder' => 'Email'
);

$first_name = array(
	'name'	=> 'first_name',
	'id'	=> 'first_name',
	'value'	=> set_value('first_name', @$details[0]["first_name"]),
	'maxlength'	=> 80,
	'size'	=> 30,
    'class' => 'form-control',
    'placeholder' => 'First Name'
);


$last_name = array(
	'name'	=> 'last_name',
	'id'	=> 'last_name',
	'value'	=> set_value('last_name', @$details[0]["last_name"]),
	'maxlength'	=> 80,
	'size'	=> 30,
    'class' => 'form-control',
    'placeholder' => 'Last Name'
);


$password = array(
	'name'	=> 'password',
	'id'	=> 'password_user',
	
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
    'class' => 'form-control',
    'placeholder' => 'Password'
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password_user',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
    'class' => 'form-control',
    'placeholder' => 'Confirm Password'
);

$date_format = $this->config->item('date_format', 'tank_auth');
?>
    <?php if($type=='basic'){ ?>
    <form name="business_edit_form_user" id="business_edit_form_user">
        <div class="modal-body" style="overflow: auto;">
           
                       <div class="form-group">
                         <?php echo form_input($first_name); ?>
                         <span class="red"><?php echo form_error($first_name['name']); ?><?php echo isset($errors[$first_name['name']])?$errors[$first_name['name']]:''; ?></span>
                      </div>
                      <div class="form-group">
                         <?php echo form_input($last_name); ?>
                         <span class="red"><?php echo form_error($last_name['name']); ?><?php echo isset($errors[$last_name['name']])?$errors[$last_name['name']]:''; ?></span>
                      </div>
                       
                    <a href="#" id="conto" data-staff_id="<?php echo @$details[0]["uid"]; ?>" >Change account details</a>   
                           
       </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-success pull-right" style="margin-left: 5px;">Save Changes</button>
         <button type="button" class="btn btn-default pull-right" data-dismiss="modal"  style="margin-left: 5px;">Back</button>
          <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="business_edit_form_loader_user" class="pull-right loader"  style="display:none;"/>
          <div class="clearfix"></div>
          <div id="business_edit_form_res_user"></div>
      </div>
      
     
       </form> 
       <script>
                    $(document).ready(function(){
                        $("#business_edit_form_user").submit(function(){
                        
                            $('#business_edit_form_loader_user').fadeIn();
                            var values = $('#business_edit_form_user').serialize();
                            $.ajax({
                            url:'<?php echo site_url('staff/update/'.$details[0]["uid"]); ?>',
                            dataType:'json',
                            type:'POST',
                            data:values,
                            success:function(result){
                            console.log(result);  
                             if(result.status==1)
                             {
                                $('#business_edit_form_res_user').html('<div class="alert alert-success" id="disappear0" style="margin-top:5px;"  >'+result.message+'</div>'); 
                                setTimeout(function(){$('#disappear0').fadeOut('slow')},3000)
                                $('#business_edit_form_loader_user').fadeOut();
                                ajax_datatable.fnDraw();
                             }
                             else
                             {
                                
                                $('#business_edit_form_res_user').empty().html('<div class="alert alert-danger"  style="margin-top:5px;" >'+result.message+'</div>');
                                $('#business_edit_form_loader_user').fadeOut();
                             } 
                            }
                           });
                            return false;
                            
                            
                        
                        });
                    });
                    </script>  
                  
            
      <?php } ?>            
       <?php if($type=='account'){ ?> 
        <div class="modal-body" style="overflow: auto;">
       <form name="business_edit_form_username" id="business_edit_form_username">         
             <div class="form-group">
                     <?php echo form_input($email); ?>
                     <span class="red" id="email_err"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></span>
                  </div>
               <div class="form-group">
                     <?php echo form_input($username); ?>
                     <span class="red" id="email_err"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></span>
                  </div>    
                   <div class="form-group" style="overflow: auto;">
                        <label class="control-label col-md-6" style="margin-top: 15px;">Status</label>
                        <button type="button"  class=" pull-right <?php echo ($details[0]["banned"]!=0)? "selected" : "unselected" ; ?> toggle-btn" id="status-off"  data-target="#status-on" data-update="#banned"  data-value="1" style="padding: 0px;">Disable</button>
                        <button type="button" class=" pull-right <?php echo ($details[0]["banned"]==0)? "selected" : "unselected" ; ?>  toggle-btn" id="status-on" data-target="#status-off"  data-update="#banned"  data-value="0"  style="padding: 0px;">Active</button>
                        <input type="hidden" name="banned" id="banned" value="<?php echo $details[0]["banned"]; ?>" />
                      </div>
                      <div class="form-group" style="overflow: auto;">
                        <label class="control-label col-md-6" style="margin-top: 15px;">Role</label>
                        <button type="button"  class=" pull-right <?php echo ($details[0]["role"]==2)? "selected" : "unselected" ; ?> toggle-btn" id="role-offx"  data-target="#role-onx" data-update="#rolex_edit"  data-value="2" style="padding: 0px;">Reviewer</button>
                        <button type="button" class=" pull-right <?php echo ($details[0]["role"]==1)? "selected" : "unselected" ; ?>  toggle-btn" id="role-onx" data-target="#role-offx"  data-update="#rolex_edit"  data-value="1"  style="padding: 0px;">Administrator</button>
                        <input type="hidden" name="role" id="rolex_edit" value="<?php echo $details[0]["role"]; ?>" />
                      </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="send_mail"> Send notification email with updated information
                    </label>
                  </div>
                    <div class="modal-footer">
                           <input type="submit" class="btn btn-success pull-right" value="Save Changes" style="margin-right: -20px;"/>
                           <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="business_edit_form_username_loader" class="pull-right loader" style="display:none;"/>
                          <div class="clearfix"></div>
                          <div id="business_edit_form_username_res"></div>
                      </div>   
                      
                  
           </form>  
           <script>
            $(document).ready(function(){
                $("#business_edit_form_username").submit(function(){
                if($.trim($('#email').val())==""){
                    $('#email').css('border','1px solid red');
                    $('#email').focus();return false;
                }
                else{
                   $('#email').css('border','1px solid #cccccc');  
                }
                
                if(!validateEmail($.trim($('#email').val()))){
                    $('#email').css('border','1px solid red');
                    $('#email_err').html('Invalid email address');
                    $('#email').focus();return false; 
                }
                else{
                   $('#email').css('border','1px solid #cccccc'); 
                   $('#email_err').html(''); 
                }

                 if($.trim($('#username_edit_user').val())==""){
                    $('#username_edit_user').css('border','1px solid red');
                    $('#username_edit_user').focus();return false;
                }
                else{
                   $('#username_edit_user').css('border','1px solid #cccccc');  
                }

                if($.trim($('#username_edit_user').val()).length <= 3){
                    $('#username_edit_user').css('border','1px solid red');
                    $('#username_edit_user').focus();return false;
                }
                else{
                   $('#username_edit_user').css('border','1px solid #cccccc');  
                }
            
                
                            
                            $('#business_edit_form_username_loader').fadeIn();
                            var values = $('#business_edit_form_username').serialize();
                            $.ajax({
                            url:'<?php echo site_url('staff/update_account_details/'.$details[0]["uid"]); ?>',
                            dataType:'json',
                            type:'POST',
                            data:values,
                            success:function(result){
                            console.log(result);  
                             if(result.status==1)
                             {
                                $('#business_edit_form_username_res').html('<div class="alert alert-success" id="disappear1" style="margin-top:5px;"  >'+result.message+'</div>'); 
                                setTimeout(function(){$('#disappear1').fadeOut('slow')},3000)
                                $('#business_edit_form_username_loader').fadeOut();
                                ajax_datatable.fnDraw();
                             }
                             else
                             {
                                
                                $('#business_edit_form_username_res').empty().html('<div class="alert alert-danger"  style="margin-top:5px;" >'+result.message+'</div>');
                                $('#business_edit_form_username_loader').fadeOut();
                             } 
                            }
                           });
                            return false;
                });
                
                 $('.toggle-btn').click(function(){
                        if($(this).hasClass('selected')) return false;
                        rival = $(this).attr('data-target'); 
                        toBeUpdated = $(this).attr('data-update'); 
                        toBeUpdatedValue = $(this).attr('data-value'); 
                        $(toBeUpdated).val(toBeUpdatedValue);
                        if($(this).hasClass('selected')){
                            $(this).removeClass('selected').addClass('unselected');
                            $(rival).removeClass('unselected').addClass('selected');
                        }
                        else
                        {
                           $(this).removeClass('unselected').addClass('selected');
                           $(rival).removeClass('selected').addClass('unselected');  
                        }
                       }); 
                
                
            });
            
            function validateEmail(email) { 
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            } 
            </script> 
           
           
                
           <form name="business_edit_form_password_user" id="business_edit_form_password_user">                
                  <div class="form-group">
                     <?php echo form_password($password); ?>
                     <span class="red" id="password_err_user"><?php echo form_error($password['name']); ?><?php echo isset($password[$email['name']])? $password[$email['name']]:''; ?></span>
                  </div>
                   <div class="form-group">
                     <?php echo form_password($confirm_password); ?>
                     <span class="red" id="confirm_password_err_user"><?php echo form_error($confirm_password['name']); ?><?php echo isset($errors[$confirm_password['name']])? $errors[$confirm_password['name']]:''; ?></span>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="send_mail"> Send notification email with updated information
                    </label>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-success pull-right" value="Change Password"  style="margin-right: -20px;"/>
                       <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="business_edit_form_password_loader_user" class="pull-right loader"  style="display:none;"/>
                      <div class="clearfix"></div>
                      <div id="business_edit_form_password_res_user"></div>
                  </div>
               <input type="hidden" name="email" value="<?php echo $details[0]["email"]; ?>" />       
             </form>
              <a href="#" id="basic" data-staff_id="<?php echo @$details[0]["uid"]; ?>" >Change basic details</a>  
          </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
             </div>
      
                      
            <script>
            $(document).ready(function(){
                $("#business_edit_form_password_user").submit(function(){
                if($.trim($('#password_user').val())==""){
                    $('#password_user').css('border','1px solid red');
                    $('#password_user').focus();return false;
                }
                else{
                   $('#password_user').css('border','1px solid #cccccc');  
                }
                
                if($.trim($('#password_user').val()).length<8){
                    $('#password_user').css('border','1px solid red');
                    $('#password_err_user').html('Password should at least 8 char long..');
                    $('#password_user').focus();return false;
                }
                else{
                   $('#password_user').css('border','1px solid #cccccc');  
                   $('#password_err_user').html('');
                }
                
                
                if($.trim($('#confirm_password_user').val())!=$.trim($('#password_user').val())){
                    $('#confirm_password_user').css('border','1px solid red');
                    $('#confirm_password_err_user').html('Confirm Password did not match.');
                    $('#confirm_password_user').focus();return false;
                }
                else{
                   $('#confirm_password_user').css('border','1px solid #cccccc'); 
                   $('#confirm_password_err_user').html(''); 
                }
                
                $('#business_edit_form_password_loader_user').fadeIn();
                            var values = $('#business_edit_form_password_user').serialize();
                            $.ajax({
                            url:'<?php echo site_url('staff/update_password/'.$details[0]["uid"]); ?>',
                            dataType:'json',
                            type:'POST',
                            data:values,
                            success:function(result){
                            console.log(result);  
                             if(result.status==1)
                             {
                                $('#business_edit_form_password_res_user').html('<div class="alert alert-success" id="disappear1" style="margin-top:5px;"  >'+result.message+'</div>'); 
                                setTimeout(function(){$('#disappear1').fadeOut('slow')},3000)
                                $('#business_edit_form_password_loader_user').fadeOut();
                             }
                             else
                             {
                                
                                $('#business_edit_form_password_res_user').empty().html('<div class="alert alert-danger"  style="margin-top:5px;" >'+result.message+'</div>');
                                $('#business_edit_form_password_loader_user').fadeOut();
                             } 
                            }
                           });
                            return false;
                });
            });
            </script> 
            
      <?php } ?>            
<?php    
}
?>
