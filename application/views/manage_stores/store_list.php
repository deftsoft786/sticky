<?php
$dispensary_name = array(
  'name'  => 'dispensary_name',
  'id'  => 'dispensary_name',
  'value' => set_value('dispensary_name'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Dispensary Name'
);
$street = array(
  'name'  => 'street',
  'id'  => 'street',
  'value' => set_value('street'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Street'
);
$city = array(
  'name'  => 'city',
  'id'  => 'city',
  'value' => set_value('city'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'City'
);
$state = array(
  'name'  => 'state',
  'id'  => 'state',
  'value' => set_value('state'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'State'
);
$zip_code = array(
  'name'  => 'zip_code',
  'id'  => 'zip_code',
  'value' => set_value('zip_code'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Zip Code'
);
$contact_first_name=array(
  'name'  => 'contact_first_name',
  'id'  => 'contact_first_name',
  'value' => set_value('contact_first_name'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'First Name'
);
$contact_last_name=array(
  'name'  => 'contact_last_name',
  'id'  => 'contact_last_name',
  'value' => set_value('contact_last_name'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Last Name'
);
$contact_number=array(
  'name'  => 'contact_number',
  'id'  => 'contact_number',
  'value' => set_value('contact_number'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Phone Number'
);
$email=array(
  'name'  => 'email',
  'id'  => 'email',
  'value' => set_value('email'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Email'
);
$store_type = array(
                  'dispensary'  => 'Dispensary',
                  'delivery'    => 'Delivery',
                  'doctor'    =>'Doctor',
                  'both'   => 'Both',
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
                     
                   <a href="#" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#add_store" ><span class="glyphicon glyphicon-plus-sign "></span>  Add Store</a>
                    
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
                                                   <th>Store Name</th>
                                                   <th>Sub Region</th>
                                                   <th>Region</th>
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
<!--View Modal -->
<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Store Details</h4>
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
<!--Add Region Modal -->
<div class="modal fade" id="add_store" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 80%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Store
         <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="loader4" style="display: none"/>
        </h4>
         <div id='dd_res'></div>
      </div>
      <div class="modal-body">
       <form role="form" id="store_add_form" name="store_add_form">
            
               <div class="clearfix"></div>   
               <div class="form-group">
                <label class="control-label" for="login">Dispensary Name:</label>
                 <?php echo form_input($dispensary_name); ?>
                 <span class="red" id="region_err"><?php echo form_error($dispensary_name['name']); ?><?php echo isset($errors[$dispensary_name['name']])?$errors[$dispensary_name['name']]:''; ?></span>
                </div>
       <div class="row">
                
                 <div class="form-group col-md-3">
                <label class="control-label" for="street">Street:</label>
                 <?php echo form_input($street); ?>
                 <span class="red" id="region_err"><?php echo form_error($street['name']); ?><?php echo isset($errors[$street['name']])?$errors[$street['name']]:''; ?></span>
                </div>
                <div class="form-group col-md-3">
                <label class="control-label" for="city">City:</label>
                 <?php echo form_input($city); ?>
                 <span class="red" id="region_err"><?php echo form_error($city['name']); ?><?php echo isset($errors[$city['name']])?$errors[$city['name']]:''; ?></span>
                </div>
                <div class="form-group col-md-3">
                <label class="control-label" for="state">State:</label>
                 <?php echo form_input($state); ?>
                 <span class="red" id="region_err"><?php echo form_error($state['name']); ?><?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?></span>
                </div>
                <div class="form-group col-md-3">
                <label class="control-label" for="zip_code">Zip Code:</label>
                 <?php echo form_input($zip_code); ?>
                 <span class="red" id="region_err"><?php echo form_error($zip_code['name']); ?><?php echo isset($errors[$zip_code['name']])?$errors[$zip_code['name']]:''; ?></span>
                </div>
       </div>
       <div class="row">
                
                 <div class="form-group col-md-3">
                <label class="control-label" for="contact_first_name">Contact First Name:</label>
                 <?php echo form_input($contact_first_name); ?>
                 <span class="red" id="region_err"><?php echo form_error($contact_first_name['name']); ?><?php echo isset($errors[$contact_first_name['name']])?$errors[$contact_first_name['name']]:''; ?></span>
                </div>
                <div class="form-group col-md-3">
                <label class="control-label" for="contact_last_name">Contact Last Name:</label>
                 <?php echo form_input($contact_last_name); ?>
                 <span class="red" id="region_err"><?php echo form_error($contact_last_name['name']); ?><?php echo isset($errors[$contact_last_name['name']])?$errors[$contact_last_name['name']]:''; ?></span>
                </div>
                <div class="form-group col-md-3">
                <label class="control-label" for="contact_number">Phone Number:</label>
                 <?php echo form_input($contact_number); ?>
                 <span class="red" id="region_err"><?php echo form_error($contact_number['name']); ?><?php echo isset($errors[$contact_number['name']])?$errors[$contact_number['name']]:''; ?></span>
                </div>
                <div class="form-group col-md-3">
                <label class="control-label" for="email">Email:</label>
                 <?php echo form_input($email); ?>
                 <span class="red" id="region_err"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></span>
                </div>
       </div> 
       <div class="row">
                <div class="form-group col-md-3">
                <label class="control-label" for="dir_id">Region:</label>                 
                 <?php echo form_dropdown('region_id',@$regions,'0','class = form-control id = region_id'); ?>
                 <span class="red" id="topic_err"><?php echo form_error(@$regions['name']); ?><?php echo isset($errors[@$regions['name']])?$errors[$regions['name']]:''; ?></span>
                </div>  
                <div class="form-group col-md-3">
                <label class="control-label" for="dir_id">Sub Region:</label>                 
                 <?php echo form_dropdown('sub_region_id',@$sub_regions,'0','class = form-control id = sub_region_id'); ?>
                 <span class="red" id="topic_err"><?php echo form_error(@$sub_regions['name']); ?><?php echo isset($errors[@$sub_regions['name']])?$errors[$sub_regions['name']]:''; ?></span>
                </div> 
                <div class="form-group col-md-3">
                <label class="control-label" for="dir_id">Dispansary Type:</label>                 
                 <?php echo form_dropdown('store_type',@$store_type,'0','class = form-control id = sub_region_id'); ?>
                 <span class="red" id="topic_err"><?php echo form_error(@$store_type['name']); ?><?php echo isset($errors[@$store_type['name']])?$errors[$store_type['name']]:''; ?></span>
                </div> 
                <input type="hidden" id="latitude" name="latitude" value=""/>
                <input type="hidden" id="longitude" name="longitude" value=""/>     
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












<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>

<script>
var js_site_url = function (urlText) {
        var urlTmp = "<?php echo site_url('" + urlText + "'); ?>";
        return urlTmp;
    }
 $("select[name='region_id']").change(function () {
            var source_url = js_site_url('manage_stores/get_sub_region_by_region_id/' + $(this).val());
            get_options_for_dropdown(source_url, 'sub_region_id', 'dd_res', 'loader4')
 });

$(document).ready(function(){
   
        
        
       var filter = 0; 
       ajax_datatable = $('table#ajax_datatable').dataTable({
            "bServerSide": true,
            "sAjaxSource": "<?php echo site_url('manage_stores/get_store_list'); ?>",
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
            
            links += '<a href="#" data-store_id="'+aData[5]+'" title="View Details" class="btn btn-primary btn-xs view_user" style="margin-right:5px;" ><span class="glyphicon glyphicon-search"></span></a>';  
            links += '<a href="<?php echo site_url('/manage_stores/edit');?>/'+aData[5]+'" data-store_id="'+aData[6]+'" title="Edit Details" class="btn btn-primary btn-xs edit_user" style="margin-right:5px;" ><span class="glyphicon glyphicon-pencil"></span></a>';  
            if(aData[4]=='2')
            links +='<a href="#" data-store_id="'+aData[5]+'" title="Active"class="btn btn-success btn-xs active_store" style="margin-right:5px;"><span class="fa fa-check"></sapn>';
            else
            links +='<a href="#" data-store_id="'+aData[5]+'" title="Inactive"class="btn btn-warning btn-xs inactive_store" style="margin-right:5px;"><span class="fa fa-times"></sapn>';
            
            links +='<a href="#" data-store_id="'+aData[5]+'" title="Delete" class="btn btn-danger btn-xs delete_user"  style="margin-right:5px;"><span class="glyphicon glyphicon-trash"></span></a>';
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
    
 

 $("#store_add_form").submit(function(){

  var street=$.trim($('#street').val());
  var city=$.trim($('#city').val());
  var state=$.trim($('#state').val());
  var zip_code=$.trim($('#zip_code').val());
  var address=street+ ","+city+","+state+","+zip_code;
  console.log(address);
  

    if($.trim($('#dispensary_name').val())==""){
        $('#dispensary_name').css('border','1px solid red');
        $('#dispensary_name').focus();return false;
    }
    else{
       $('#dispensary_name').css('border','1px solid #cccccc');  
    }
    
     if($.trim($('#street').val())==""){
        $('#street').css('border','1px solid red');
        $('#street').focus();return false;
    }
    else{
       $('#street').css('border','1px solid #cccccc');  
    }
     if($.trim($('#city').val())==""){
        $('#city').css('border','1px solid red');
        $('#city').focus();return false;
    }
    else{
       $('#city').css('border','1px solid #cccccc');  
    }
    if($.trim($('#state').val())==""){
        $('#state').css('border','1px solid red');
        $('#state').focus();return false;
    }
    else{
       $('#state').css('border','1px solid #cccccc');  
    }
    if($.trim($('#zip_code').val())==""){
        $('#zip_code').css('border','1px solid red');
        $('#zip_code').focus();return false;
    }
    else{
       $('#zip_code').css('border','1px solid #cccccc');  
    }
    if($.trim($('#contact_first_name').val())==""){
        $('#contact_first_name').css('border','1px solid red');
        $('#contact_first_name').focus();return false;
    }
    else{
       $('#contact_first_name').css('border','1px solid #cccccc');  
    }
    if($.trim($('#contact_last_name').val())==""){
        $('#contact_last_name').css('border','1px solid red');
        $('#contact_last_name').focus();return false;
    }
    else{
       $('#contact_last_name').css('border','1px solid #cccccc');  
    }
    
     if($.trim($('#contact_number').val())==""){
        $('#contact_number').css('border','1px solid red');
        $('#contact_number').focus();return false;
    }
    else{
       $('#contact_number').css('border','1px solid #cccccc');  
    }
    if($.trim($('#email').val())==""){
        $('#email').css('border','1px solid red');
        $('#email').focus();return false;
    }
    else{
       $('#email').css('border','1px solid #cccccc');  
    }
    if($.trim($('#region_id').val())=='0'){
        $('#region_id').css('border','1px solid red');
        $('#region_id').focus();return false;
    }
    else{
       $('#region_id').css('border','1px solid #cccccc');  
    }
    if($.trim($('#sub_region_id').val())=='0'){
        $('#sub_region_id').css('border','1px solid red');
        $('#sub_region_id').focus();return false;
    }
    else{
       $('#sub_region_id').css('border','1px solid #cccccc');  
    }

    
    



    if(!validateEmail($.trim($('#email').val()))){
        $('#email').css('border','1px solid red');
       
        $('#email').focus();return false; 
    }
    else{
       $('#email').css('border','1px solid #cccccc'); 
       
    }

    $('#loader').fadeIn();
   
  // var address='B-56+Sector-64+Noida+up+india';//address which you want Longitude and Latitude
jQuery.ajax({
    type: "GET",
    dataType: "json",
    url: "http://maps.googleapis.com/maps/api/geocode/json",
    data: {'address': address,'sensor':false},
    success: function(data){
        if(data.results.length){
            jQuery('#latitude').val(data.results[0].geometry.location.lat);
            jQuery('#longitude').val(data.results[0].geometry.location.lng);
             var values = $('#store_add_form').serialize();
    $.ajax({
    url:'<?php echo site_url('manage_stores/add'); ?>',
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
        $('#store_add_form')[0].reset();
        ajax_datatable.fnDraw();
        
     }
     else
     {
        
        $('#add_res').empty().html('<div class="alert alert-danger">'+result.message+'</div>');
        $('#loader').fadeOut();
     } 
     
      
    }
   });
        }else{
        jQuery('#latitude').val('invalid address');
        jQuery('#longitude').val('invalid address');
        $('#add_res').empty().html('<div class="alert alert-danger">Invalid Address</div>');
        $('#loader').fadeOut();
       }
    }
});
   
 return false;

 });

//function for view sub region details
$(document).on('click','.view_user',function(e){
    e.preventDefault();
    id = $(this).attr('data-store_id');
    $.ajax({
       url:'<?php echo site_url('manage_stores/view_store/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        $('#response_view').html(result);
        
       } 
    });
    $('#view_modal').modal('show');
})
  
 //Delete user
 $(document).on('click','.delete_user',function(e){
    e.preventDefault();
    var response = confirm('Are you sure want to delete this store?');
    if(response){
    id = $(this).attr('data-store_id');
    $.ajax({
       url:'<?php echo site_url('manage_stores/delete_store/') ?>/'+id,
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

//Region disable
  $(document).on('click','.inactive_store',function(e){
    e.preventDefault();
    
    var response = confirm('Are you sure want to deactivate this store?');
    if(response)
    {
    id = $(this).attr('data-store_id');
    $('#loader2').show();
    $.ajax({
        url:'<?php echo site_url('manage_stores/deactivate_store/')?>/'+id,
        dataType:'json',
        success:function(result)
        
        {
            $('#alert_area').empty().html('<div class="alert alert-success alert-dismissa" id="disappear"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+result.message+'</div>');
            setTimeout(function(){$('#disappear').fadeOut('slow')},3000);
            $('#loader1').fadeOut();
            ajax_datatable.fnDraw();
        }        
    });
    return false;
    }
  });
    //Region enable
  $(document).on('click','.active_store',function(e){
    e.preventDefault();
    id=$(this).attr('data-store_id');
    $('#loader2').show();
    $.ajax({
        url:'<?php echo site_url('manage_stores/active_store/')?>/'+id,
        dataType:'json',
        success:function(result)
        
        {
            $('#alert_area').empty().html('<div class="alert alert-success alert-dismissa" id="disappear"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+result.message+'</div>');
            setTimeout(function(){$('#disappear').fadeOut('slow')},3000);
            $('#loader1').fadeOut();
            ajax_datatable.fnDraw();
        }        
    });
    return false;
    
  });

  

});

 function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
  function get_options_for_dropdown(source_url, target_id, res_div_id, loader_id)
    {

        $("#" + target_id + " option:gt(0)").remove();
        $('#' + loader_id).fadeIn();
        $.ajax({
            url: source_url,
            dataType: 'json',
            type: 'GET',
            success: function (result) {
               if (result.status == 0)
                {
                    //$('#' + res_div_id).empty().html('<div class="alert alert-danger  alert-dismissible"  style="margin-top:5px;" ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' + result.message + '</div>');
                    $("#" + target_id + " option:gt(0)").remove();
                }
                else
                {

                    $('#' + res_div_id).empty();
                    var newOptions = result.data;
                    console.log(newOptions);
                    //newOptions.sort(); 
                    $.each(newOptions, function (key, value) {
                           $('#' + target_id).append($("<option></option>").attr("value", key).text(value));
                       // $('#' + target_id).append($("<option></option>").attr("value", key).text(value));
                    });
                }
                $('#' + loader_id).fadeOut();
            }
        });
    }
 
 

</script>