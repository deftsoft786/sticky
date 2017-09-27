<?php
$first_name_add_user = array(
  'name'  => 'first_name',
  'id'  => 'first_name_add_user',
  'value' => set_value('first_name'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'First Name'
);


$last_name_add_user = array(
  'name'  => 'last_name',
  'id'  => 'last_name_add_user',
  'value' => set_value('last_name'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Last Name'
);


$username_add_user = array(
  'name'  => 'username',
  'id'  => 'username_add_user',
  'value' => set_value('username'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Username'
);

$email_add_user = array(
  'name'  => 'email',
  'id'  => 'email_add_user',
  'value' => set_value('first_name'),
  'class' => 'form-control',
    'placeholder' => 'E-mail'
);


$password_add_user = array(
  'name'  => 'password',
  'id'  => 'password_add_user',
  
  'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
  'size'  => 30,
    'class' => 'form-control',
    'placeholder' => 'Password'
);
$confirm_password_add_user = array(
  'name'  => 'confirm_password',
  'id'  => 'confirm_password_add_user',
  'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
  'size'  => 30,
    'class' => 'form-control',
    'placeholder' => 'Confirm Password'
);

?>
 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 class="pull-left">
                        <?php echo @$title; ?>
                        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="loader1" style="margin-top:-4px;margin-left:0px;"/>
                    </h1>
                    <div class="pull-right" >
                    <a href="#" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#add_store_owner" ><span class="glyphicon glyphicon-plus-sign "></span>  Add</a>
                    </div>
                    <div class="clearfix"></div>
                </section>

                <!-- Main content -->
                <section class="content">
                
                        <div class="row">
                                  <div class="col-md-12">
                                  <?php
                                  $msg = $this->session->flashdata('text');
                                  $class = $this->session->flashdata('class');
                                  if($msg)
                                  {
                                    echo '<div class="alert alert-'.$class.' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                    echo $msg;
                                    echo '</div> <div  class="clearfix"></div>';
                                    
                                  }
                                  ?>
                                  <div id="alert_area"></div> 
                                  <div class="well-lg" style="overflow: auto;">
                                   <table id="ajax_datatable" class="table table-striped users-list">
                                        <thead>
                                            <tr class="tableheader tableheader-blue" >
                                                   <th>First Name</th>
                                                   <th>Last Name</th>
                                                   <th>E-mail</th>
                                                   <th>Created</th>
                                                   <th class="actions">Actions</th>
                                            </tr>
                                        </thead>
                                    </table>
                                            
                                   
                                  </div>
                                  
                                  </div>
                                  
                                  </div>
                       
                         
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
<!--Add User Modal -->
<div class="modal fade" id="add_store_owner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Store Owner</h4>
      </div>
      <div class="modal-body">
       <form role="form" id="user_add_form" name="user_add_form">
              
               <div class="clearfix"></div>   
               <div class="form-group col-md-6">
                <label class="control-label" for="login">Email:</label>
                 <?php echo form_input($email_add_user); ?>
                 <span class="red" id="email_err"><?php echo form_error($email_add_user['name']); ?><?php echo isset($errors[$email_add_user['name']])?$errors[$email_add_user['name']]:''; ?></span>
                </div>
                    <div class="form-group col-md-6">
                <label class="control-label" for="login">Username:</label>
                 <?php echo form_input($username_add_user); ?>
                 <span class="red" id="email_err"><?php echo form_error($username_add_user['name']); ?><?php echo isset($errors[$username_add_user['name']])?$errors[$username_add_user['name']]:''; ?></span>
                </div>

              <div class="form-group col-md-6">
                <label class="control-label" for="login">First Name:</label>
                 <?php echo form_input($first_name_add_user); ?>
                 <span class="red"><?php echo form_error($first_name_add_user['name']); ?><?php echo isset($errors[$first_name_add_user['name']])?$errors[$first_name_add_user['name']]:''; ?></span>
                </div>
              <div class="form-group col-md-6">
                 <label class="control-label" for="login">Last Name:</label>
                 <?php echo form_input($last_name_add_user); ?>
                 <span class="red"><?php echo form_error($last_name_add_user['name']); ?><?php echo isset($errors[$last_name_add_user['name']])?$errors[$last_name_add_user['name']]:''; ?></span>
                </div>
              
              <div class="form-group col-md-6">
                <label class="control-label" for="login">Password:</label>
                 <?php echo form_password($password_add_user); ?>
                 <span class="red" id="password_err"><?php echo form_error($password_add_user['name']); ?><?php echo isset($errors[$password_add_user['name']])?$errors[$password_add_user['name']]:''; ?></span>
                </div>
              <div class="form-group col-md-6">
                 <label class="control-label" for="login">Confirm Password:</label>
                 <?php echo form_password($confirm_password_add_user); ?>
                 <span class="red" id="confirm_password_err"><?php echo form_error($confirm_password_add_user['name']); ?><?php echo isset($errors[$confirm_password_add_user['name']])?$errors[$confirm_password_add_user['name']]:''; ?></span>
                </div>
                 <div class="clearfix"></div>   
                <div class="form-group col-md-12 ">
                 <div class="checkbox">
                    <label>
                      <input type="checkbox" name="send_mail"> Send email with account information
                    </label>
                  </div>
               </div>  
               <div class="clearfix"></div>    
       </div>
      <div class="modal-footer">
       
        <button type="submit" class="btn btn-success pull-right">Add</button>
         <button type="button" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right: 5px;">Back</button>
        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="loader" class="pull-right" style="display: none;"/>
          <div class="clearfix"></div>
          <div id="add_res" style="margin-top:5px;"></div>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




   <!--View Modal -->
<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Store Owner Details</h4>
      </div>
      <div class="modal-body">
       <div id="response_view"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


   <!--View Store List model -->
<div class="modal fade" id="view_store_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Stores</h4>
      </div>
      <div class="modal-body">
       <div id="response_view_store_list"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


 <!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Store Owner</h4>
      </div>
      <div id="edit_form_response">
      
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>

<script>
$(document).ready(function(){
   
        
        
       var filter = 0; 
       ajax_datatable = $('table#ajax_datatable').dataTable({
            "bServerSide": true,
            "sAjaxSource": "<?php echo site_url('store/get_store_owner_list'); ?>",
            "sPaginationType": "full_numbers",
            "fnServerData": function(sSource,aoData,fnCallback)
            {
                $('#loader1').show();
                aoData.push({name: "filter", value: filter });
                $.ajax({
                    "dataType": 'json', 
                    "type": "POST", 
                    "url": sSource, 
                    "data": aoData, 
                    "success": fnCallback
                });
            },
            "fnDrawCallback" : function() {
              $('#loader1').fadeOut();
             },
            
              
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            var links="";
            
            links += '<a href="#" data-staff_id="'+aData[4]+'" title="View Details" class="btn btn-primary btn-xs view_user" style="margin-right:5px;" ><span class="glyphicon glyphicon-search"></span></a>';  
            links += '<a href="<?php echo site_url('/store/view_store');?>/'+aData[4]+'" data-staff_id="'+aData[4]+'" title="Approve Store" class="btn btn-primary btn-xs" style="margin-right:5px;" ><i class="fa fa-university"></i></a>';  
            
            links += '<a href="#" data-staff_id="'+aData[4]+'" title="Edit Details" class="btn btn-primary btn-xs edit_user" style="margin-right:5px;" ><span class="glyphicon glyphicon-pencil"></span></a>';  
            
            links +='<a href="#" data-staff_id="'+aData[4]+'" title="Delete" class="btn btn-danger btn-xs delete_user"  style="margin-right:5px;"><span class="glyphicon glyphicon-trash"></span></a>';
            $('td:eq(4)', nRow).html( links);
            
            
           

            var dateSplit = aData[3].split("-");            
            day = dateSplit[2].split(' ');
            var curr_date = day[0];
            var curr_month = dateSplit[1]; //Months are zero based
            var curr_year = dateSplit[0];
            $('td:eq(3)', nRow).html(curr_month + "-" + curr_date + "-" + curr_year );
			
            
            
            return nRow;
		},
        aoColumnDefs: [
       
          {
             bSortable: false,
             aTargets: [4]
          },
        
          
          {
             bSearchable: false,
             aTargets: [4]
          }
        ]
    });  
    
 

 $("#user_add_form").submit(function(){

   if($.trim($('#email_add_user').val())==""){
        $('#email_add_user').css('border','1px solid red');
        $('#email_add_user').focus();return false;
    }
    else{
       $('#email_add_user').css('border','1px solid #cccccc');  
    }
    



    if(!validateEmail($.trim($('#email_add_user').val()))){
        $('#email_add_user').css('border','1px solid red');
        $('#email_err').html('Ongeldig E-mailadres');
        $('#email_add_user').focus();return false; 
    }
    else{
       $('#email_add_user').css('border','1px solid #cccccc'); 
       $('#email_err').html(''); 
    }

    if($.trim($('#username_add_user').val())==""){
        $('#username_add_user').css('border','1px solid red');
        $('#username_add_user').focus();return false;
    }
    else{
       $('#username_add_user').css('border','1px solid #cccccc');  
    }

    if($.trim($('#username_add_user').val()).length <= 3){
        $('#username_add_user').css('border','1px solid red');
        $('#username_add_user').focus();return false;
    }
    else{
       $('#username_add_user').css('border','1px solid #cccccc');  
    }

    if($.trim($('#password_add_user').val())==""){
        $('#password_add_user').css('border','1px solid red');
        $('#password_add_user').focus();return false;
    }
    else{
       $('#password_add_user').css('border','1px solid #cccccc');  
    }
    
    if($.trim($('#password_add_user').val()).length<8){
        $('#password_add_user').css('border','1px solid red');
        $('#password_err').html('Password should at least 8 char long.');
        $('#password_add_user').focus();return false;
    }
    else{
       $('#password_add_user').css('border','1px solid #cccccc');  
       $('#password_err').html('');
    }
    
    
    if($.trim($('#confirm_password_add_user').val())!=$.trim($('#password_add_user').val())){
        $('#confirm_password_add_user').css('border','1px solid red');
        $('#confirm_password_err').html('Confirm Password did not match.');
        $('#confirm_password_add_user').focus();return false;
    }
    else{
       $('#confirm_password_add_user').css('border','1px solid #cccccc'); 
       $('#confirm_password_err').html(''); 
    }
    
    $('#loader').fadeIn();
    var values = $('#user_add_form').serialize();
    $.ajax({
    url:'<?php echo site_url('store/add'); ?>',
    dataType:'json',
    type:'POST',
    data:values,
    success:function(result){
     console.log(result);  
     if(result.status==1)
     {
        
        $('#add_res').html('<div class="alert alert-success" id="disappear_add"  >'+result.message+'</div>'); 
        setTimeout(function(){$('#disappear_add').fadeOut('slow')},3000)
        $('#loader').fadeOut();
        $('#user_add_form')[0].reset();
        ajax_datatable.fnDraw();
        
     }
     else
     {
        
        $('#add_res').empty().html('<div class="alert alert-danger">'+result.message+'</div>');
        $('#loader').fadeOut();
     } 
     
      
    }
   });
   
 return false;

 });



//View user
 $(document).on('click','.view_user',function(e){
    e.preventDefault();
    id = $(this).attr('data-staff_id');
    $.ajax({
       url:'<?php echo site_url('store/view_member/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        $('#response_view').html(result);
       } 
    });
    $('#view_modal').modal('show');
 });
 //View user
 $(document).on('click','.view_store',function(e){
    e.preventDefault();
    id = $(this).attr('data-staff_id');
    $.ajax({
       url:'<?php echo site_url('store/view_store/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        $('#response_view_store_list').html(result);
       } 
    });
    $('#view_store_modal').modal('show');
 });
  


//Edit user
 $(document).on('click','.edit_user, #basic',function(e){
    e.preventDefault();
    $('#edit_form_response').empty();
    id = $(this).attr('data-staff_id');
    $.ajax({
       url:'<?php echo site_url('store/edit_user/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        $('#edit_form_response').html(result);
       } 
    });
    $('#editModal').modal('show');
 }); 


  //Edit Account details of user
 $(document).on('click','#conto',function(e){
    e.preventDefault();
    id = $(this).attr('data-staff_id');
    $.ajax({
       url:'<?php echo site_url('store/edit_user/') ?>/'+id+'/account',
       dataType: 'html',
       success:function(result)
       {
        $('#edit_form_response').empty().html(result);
       } 
    });
    $('#editModal').modal('show');
 });
 


 //Delete user
 $(document).on('click','.delete_user',function(e){
    e.preventDefault();
    var response = confirm('Are you sure want to delete this staff member?');
    if(response){
    id = $(this).attr('data-staff_id');
    $.ajax({
       url:'<?php echo site_url('store/delete/') ?>/'+id,
       dataType: 'json',
       success:function(result)
       {
        if(result.status==1)
        {
            $('#alert_area').empty().html('<div class="alert alert-success  alert-dismissable" id="disappear"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+result.message+'</div>');
            setTimeout(function(){$('#disappear').fadeOut('slow')},3000);
            ajax_datatable.fnDraw();
        }
        else
        {
            $('#alert_area').empty().html('<div class="alert alert-danger  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+result.message+'</div>');
        }
       } 
    });
    }
    return false;
    
 });   




});

 function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 
 

</script>