<?php
    
$dispensary_name = array(
  'name'  => 'dispensary_name',
  'id'  => 'dispensary_name',
  'value' => set_value('dispensary_name',@$details[0]['store_name']),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Dispensary Name'
);
$street = array(
  'name'  => 'street',
  'id'  => 'street',
  'value' => set_value('street',@$details[0]['street']),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Street'
);
$city = array(
  'name'  => 'city',
  'id'  => 'city',
  'value' => set_value('city',@$details[0]['city']),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'City'
);
$state = array(
  'name'  => 'state',
  'id'  => 'state',
  'value' => set_value('state',@$details[0]['state']),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'State'
);
$zip_code = array(
  'name'  => 'zip_code',
  'id'  => 'zip_code',
  'value' => set_value('zip_code',@$details[0]['zip_code']),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Zip Code'
);
$contact_first_name=array(
  'name'  => 'contact_first_name',
  'id'  => 'contact_first_name',
  'value' => set_value('contact_first_name',@$details[0]['contact_first_name']),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'First Name'
);
$contact_last_name=array(
  'name'  => 'contact_last_name',
  'id'  => 'contact_last_name',
  'value' => set_value('contact_last_name',@$details[0]['contact_last_name']),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Last Name'
);
$contact_number=array(
  'name'  => 'contact_number',
  'id'  => 'contact_number',
  'value' => set_value('contact_number',@$details[0]['contact_number']),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Phone Number'
);
$email=array(
  'name'  => 'email',
  'id'  => 'email',
  'value' => set_value('email',@$details[0]['email']),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Email'
);
$unique_name = array(
  'name'  => 'unique_name',
  'id'  => 'unique_name',
  'value' => set_value('unique_name',@$details[0]["unique_name"]),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Dispensary Slug'
);
$latitude= array(
    'name'  => 'latitude',
    'id'  => 'latitude',
    'value' => set_value('latitude',@$details[0]["latitude"]),
    'class' => 'form-control',
    'placeholder' => 'Latitude'

);
$longitude= array(
    'name'  => 'longitude',
    'id'  => 'longitude',
    'value' => set_value('longitude',@$details[0]["longitude"]),
    'class' => 'form-control',
    'placeholder' => 'Longitude'

);
$store_type = array(
                  'dispensary'  => 'Dispensary',
                  'delivery'    => 'Delivery',
                  'both'   => 'Both',
                  );
//Profile
$description=array(
  'name'  => 'description',
  'id'  => 'description',
  'value' => set_value('description',@$details[0]['description']),
  'class' => 'form-control',
  'placeholder' => 'Description',
   'rows'        => '5',
   'cols'        => '10'
);
$first_time_patients=array(
  'name'  => 'first_time_patients',
  'id'  => 'first_time_patients',
  'value' => set_value('first_time_patients',@$details[0]['first_time_patients']),
  'class' => 'form-control ftp',
  'placeholder' => 'First Time Patients',
  'style' =>'display:none',
  'rows'        => '5',
  'cols'        => '10'
);
$announcement=array(
  'name'  => 'announcement',
  'id'  => 'announcement',
  'value' => set_value('announcement',@$details[0]['announcement']),
  'class' => 'form-control ann',
  'placeholder' => 'Announcement',
  'style' =>'display:none',
  'rows'        => '5',
   'cols'        => '10'
);
//social media links
$fb_link= array(
    'name'  => 'fb_link',
    'id'  => 'fb_link',
    'value' => set_value('fb_link',@$details[0]["fb_link"]),
    'class' => 'form-control',
    'placeholder' => 'Facebook Url'

);
$ints_link= array(
    'name'  => 'ints_link',
    'id'  => 'ints_link',
    'value' => set_value('ints_link',@$details[0]["ints_link"]),
    'class' => 'form-control',
    'placeholder' => 'Instagram Url'

);
$twitter_link= array(
    'name'  => 'twitter_link',
    'id'  => 'twitter_link',
    'value' => set_value('twitter_link',@$details[0]["twitter_link"]),
    'class' => 'form-control',
    'placeholder' => 'Twitter Url'

);
$pinterest_link= array(
    'name'  => 'pinterest_link',
    'id'  => 'pinterest_link',
    'value' => set_value('pinterest_link',@$details[0]["pinterest_link"]),
    'class' => 'form-control',
    'placeholder' => 'Pinterest Url'

);
$you_tube_link= array(
    'name'  => 'you_tube_link',
    'id'  => 'you_tube_link',
    'value' => set_value('you_tube_link',@$details[0]["you_tube_link"]),
    'class' => 'form-control',
    'placeholder' => 'You Tube Url'

);
$deal=array(
  'name'  => 'deal',
  'id'  => 'deal',
  'value' => set_value('deal',@$deals[0]['deal']),
  'class' => 'form-control',
  'placeholder' => 'Deal Title',
  
);

$deal_description = array(
  'name'  => 'deal_description',
  'id'  => 'deal_description',
  'value' => set_value('deal_description'),
  'class' => 'form-control',
  'placeholder' => 'Description',
   'rows'        => '5',
   'cols'        => '10'
); 
$how_to_use = array(
  'name'  => 'how_to_use',
  'id'  => 'how_to_use',
  'value' => set_value('how_to_use'), 
    'class' => 'form-control',
    'placeholder' => 'How to use',
    'rows'        => '5',
   'cols'        => '10'
);
$terms_of_use = array(
  'name'  => 'terms_of_use',
  'id'  => 'terms_of_use',
  'value' => set_value('terms_of_use'),
  'class' => 'form-control',
  'placeholder' => 'Terms of Use',
  'rows'        => '5',
   'cols'        => '10'
);

$start_time = array(
    'name' => 'start_time',
    'id' => 'start_time',
    'class' => 'form-control',
    'placeholder' => 'Start Time',    
);
$end_time = array(
    'name' => 'end_time',
    'id' => 'end_time',
    'class' => 'form-control',
    'placeholder' => 'End Time',    
);

//Product Tab
$product_name=array(
    'name'  => 'product_name',
    'id'  => 'product_name',
    'value' => set_value('product_name'),
    'class' => 'form-control',
    'placeholder' => 'Product Name'
    );
    $product_description = array(
  'name'  => 'product_description',
  'id'  => 'product_description',
  'value' => set_value('product_description'),
  'class' => 'form-control',
  'placeholder' => 'Description',
   'rows'        => '5',
   'cols'        => '10'
); 
?>
               
 <aside class="right-side">      
     <section class="content-header">
                    <h1 class="pull-left">
                        <?php echo @$title; ?>:&nbsp;<h5 class="pull-left"><?php echo $details[0]['store_name'];?>
                        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="loader" class="pull-right" style="display: none;"/>
                             </h5> </h1>
                     
                    
                    <div class="clearfix"></div>
                </section>

    <div class="clearfix"></div>          
              

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
                           
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Basic Info</a></li>
                                    <li><a href="#tab_2" data-toggle="tab" id="profile_tab">Profile</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">Media</a></li>
                                    <li><a href="#tab_4" data-toggle="tab">Deal</a></li>
                                    <li><a href="#tab_5" data-toggle="tab">Products</a></li>
                                    
                                    
                                </ul>
                                <div class="tab-content">
<!-------------------------------------Basic Info------------------------------------------------->
                                    <div class="tab-pane active" id="tab_1">
                                        <form role="form" id="store_edit_form" name="store_edit_form">
            
               <div class="clearfix"></div> 
               <div class="form-group">  
               <div class="col-md-6">
                <label class="control-label" for="login">Dispensary Name:</label>
                 <?php echo form_input($dispensary_name); ?>
                 <span class="red" id="region_err"><?php echo form_error($dispensary_name['name']); ?><?php echo isset($errors[$dispensary_name['name']])?$errors[$dispensary_name['name']]:''; ?></span>
                </div>
                 <div class="col-md-6">
                <label class="control-label" for="topic"> Dispensary  Slug</label>
                 <?php echo form_input($unique_name); ?>
                 <span class="red" id="region_err"><small style="color: red;">Please edit with caution, will effect URL.</small><?php echo form_error($unique_name['name']); ?><?php echo isset($errors[$unique_name['name']])?$errors[$unique_name['name']]:''; ?></span>
                </div>
                </div>
       <div class="form-group">
                
                 <div class="col-md-3">
                <label class="control-label" for="street">Street:</label>
                 <?php echo form_input($street); ?>
                 <span class="red" id="region_err"><?php echo form_error($street['name']); ?><?php echo isset($errors[$street['name']])?$errors[$street['name']]:''; ?></span>
                </div>
                <div class="col-md-3">
                <label class="control-label" for="city">City:</label>
                 <?php echo form_input($city); ?>
                 <span class="red" id="region_err"><?php echo form_error($city['name']); ?><?php echo isset($errors[$city['name']])?$errors[$city['name']]:''; ?></span>
                </div>
                <div class="col-md-3">
                <label class="control-label" for="state">State:</label>
                 <?php echo form_input($state); ?>
                 <span class="red" id="region_err"><?php echo form_error($state['name']); ?><?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?></span>
                </div>
                <div class="col-md-3">
                <label class="control-label" for="zip_code">Zip Code:</label>
                 <?php echo form_input($zip_code); ?>
                 <span class="red" id="region_err"><?php echo form_error($zip_code['name']); ?><?php echo isset($errors[$zip_code['name']])?$errors[$zip_code['name']]:''; ?></span>
                </div>
       </div>
       <div class="form-group">
                
                 <div class="col-md-3">
                <label class="control-label" for="contact_first_name">Contact First Name:</label>
                 <?php echo form_input($contact_first_name); ?>
                 <span class="red" id="region_err"><?php echo form_error($contact_first_name['name']); ?><?php echo isset($errors[$contact_first_name['name']])?$errors[$contact_first_name['name']]:''; ?></span>
                </div>
                <div class="col-md-3">
                <label class="control-label" for="contact_last_name">Contact Last Name:</label>
                 <?php echo form_input($contact_last_name); ?>
                 <span class="red" id="region_err"><?php echo form_error($contact_last_name['name']); ?><?php echo isset($errors[$contact_last_name['name']])?$errors[$contact_last_name['name']]:''; ?></span>
                </div>
                <div class="col-md-3">
                <label class="control-label" for="contact_number">Phone Number:</label>
                 <?php echo form_input($contact_number); ?>
                 <span class="red" id="region_err"><?php echo form_error($contact_number['name']); ?><?php echo isset($errors[$contact_number['name']])?$errors[$contact_number['name']]:''; ?></span>
                </div>
                <div class="col-md-3">
                <label class="control-label" for="email">Email:</label>
                 <?php echo form_input($email); ?>
                 <span class="red" id="region_err"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></span>
                </div>
       </div> 
       <div class="form-group">
                <div class="col-md-3">
                <label class="control-label" for="dir_id">Region:</label>                 
                 <?php echo form_dropdown('region_id',@$regions,$details[0]['region_id'],'class = form-control id = region_id'); ?>
                 <span class="red" id="topic_err"><?php echo form_error(@$regions['name']); ?><?php echo isset($errors[@$regions['name']])?$errors[$regions['name']]:''; ?></span>
                
                </div>  
                <div class="col-md-3">
                <label class="control-label" for="dir_id">Sub Region:</label>                 
                 <?php echo form_dropdown('sub_region_id',@$sub_regions,$details[0]['sub_region_id'],'class = form-control id = sub_region_id'); ?>
                 <span class="red" id="topic_err"><?php echo form_error(@$sub_regions['name']); ?><?php echo isset($errors[@$sub_regions['name']])?$errors[$sub_regions['name']]:''; ?></span>
                 
                </div> 
                <div class="col-md-3">
                <label class="control-label" for="dir_id">Dispansary Type:</label>                 
                 <?php echo form_dropdown('store_type',@$store_type,'0','class = form-control id = sub_region_id'); ?>
                 <span class="red" id="topic_err"><?php echo form_error(@$store_type['name']); ?><?php echo isset($errors[@$store_type['name']])?$errors[$store_type['name']]:''; ?></span>
                </div> 
                    
       </div>
        <div class="clearfix"></div>   
       <div class="form-group">
                <div class="col-md-3">
               <label class="control-label" for="dir_id">Latitude:</label>              
               <?php echo form_input($latitude); ?>
               <input type="hidden" name="old_latitude" id="old_latitude" value="<?php echo $details[0]['latitude'];?>"/>
               <span class="red" id="region_err"><?php echo form_error($latitude['name']); ?><?php echo isset($errors[$latitude['name']])?$errors[$latitude['name']]:''; ?></span>
       </div>
       <div class="col-md-3">
               <label class="control-label" for="dir_id">Longitude:</label>              
               <?php echo form_input($longitude); ?>
               <input type="hidden" name="old_longitude" id="old_longitude" value="<?php echo $details[0]['longitude'];?>"/>
               <span class="red" id="region_err"><?php echo form_error($longitude['name']); ?><?php echo isset($errors[$longitude['name']])?$errors[$longitude['name']]:''; ?></span>
       </div>
       </div>
                
               <div class="clearfix"></div>    
       
      
        <div class="form-group form-actions">
                        <div class="col-lg-12">
        <button type="submit" class="btn btn-success pull-right">Update</button>
          <div class="clearfix"></div>
          <div id="add_res" style="margin-top:5px;"></div>
          </div>
          </div>
     
      </form>
      </div><!-- /.tab-pane -->
      <script>
var js_site_url = function (urlText) {
        var urlTmp = "<?php echo site_url('" + urlText + "'); ?>";
        return urlTmp;
    }

 //for edit

 $(document).on('change', "select[name='region_id']", function () {
        var source_url = js_site_url('manage_stores/get_sub_region_by_region_id/' + $(this).val());
        get_options_for_dropdown(source_url, 'sub_region_id', 'alert_area', 'loader');
    });
 

$(document).ready(function(){
       
 
        
    $("#store_edit_form").submit(function(){

  var street=$.trim($('#street').val());
  var city=$.trim($('#city').val());
  var state=$.trim($('#state').val());
  var zip_code=$.trim($('#zip_code').val());
  var address=street+" "+city+" "+state+" "+zip_code;
  

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
    if($.trim($('#unique_name').val())==""){
        $('#unique_name').css('border','1px solid red');
        $('#unique_name').focus();return false;
    }
    else{
       $('#unique_name').css('border','1px solid #cccccc');  
    }
     if($.trim($('#latitude').val())==""){
        $('#latitude').css('border','1px solid red');
        $('#latitude').focus();return false;
    }
    else{
       $('#latitude').css('border','1px solid #cccccc');  
    }
     if($.trim($('#longitude').val())==""){
        $('#longitude').css('border','1px solid red');
        $('#longitude').focus();return false;
    }
    else{
       $('#longitude').css('border','1px solid #cccccc');  
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
     
      
if($.trim($('#latitude').val()) == $.trim($('#old_latitude').val()) && $.trim($('#longitude').val()) == $.trim($('#old_longitude').val()) ){  

          jQuery.ajax({
    type: "GET",
    dataType: "json",
    url: "http://maps.googleapis.com/maps/api/geocode/json",
    data: {'address': address,'sensor':false},
    success: function(data){
        if(data.results.length){
            jQuery('#old_latitude').val(data.results[0].geometry.location.lat);
        jQuery('#old_longitude').val(data.results[0].geometry.location.lng);
        var values = $('#store_edit_form').serialize();
                $.ajax({
                url:'<?php echo site_url('manage_stores/update_store_basic_info/'.$details[0]["store_id"]); ?>',
                dataType:'json',
                type:'POST',
                data:values,
                success:function(result){                                       
                    if(result.status==1)
                        {                                        
                        $('#alert_area').html('<div class="alert alert-success" id="disappear_add"  >'+result.message+'</div>'); 
                        setTimeout(function(){$('#disappear_add').fadeOut('slow')},3000)
                        $('#loader').fadeOut();
                       
                                        
                        }
                        else
                        {                                        
                        $('#alert_area').empty().html('<div class="alert alert-danger">'+result.message+'</div>');
                        $('#loader').fadeOut();
                        }
                    }
                    });    
        }else{
        jQuery('#latitude').val('invalid address');
        jQuery('#longitude').val('invalid address');
       }}
           });
 return false;
}else{
     var values = $('#store_edit_form').serialize();
                $.ajax({
                url:'<?php echo site_url('manage_stores/update_store_basic_info/'.$details[0]["store_id"]); ?>',
                dataType:'json',
                type:'POST',
                data:values,
                success:function(result){                                       
                    if(result.status==1)
                        {                                        
                        $('#alert_area').html('<div class="alert alert-success" id="disappear_add"  >'+result.message+'</div>'); 
                        setTimeout(function(){$('#disappear_add').fadeOut('slow')},3000)
                        $('#loader').fadeOut();
                       
                                        
                        }
                        else
                        {                                        
                        $('#alert_area').empty().html('<div class="alert alert-danger">'+result.message+'</div>');
                        $('#loader').fadeOut();
                        }
                    }
                    }); 
                     return false; 
  }
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
<!--------------------------------------Profile-------------------------------------------------->   
      <div class="tab-pane" id="tab_2">
       <!-- bootstrap slider -->
        <link href="<?php echo base_url('assets/css/bootstrap-slider/slider.css')?>" rel="stylesheet" type="text/css" />
       
      <form role="form" id="store_profile_edit_form" name="store_profile_edit_form">            
               <div class="clearfix"></div> 
               <div class="form-group"> 
               <div class="col-md-6">
               
               <div id="upload_file" style="float: left;">
               <?php if($details[0]['store_logo']){ ?>
                <div class="thumbnail" style="width: 200px; height: 150px;">
	           <img src="<?php echo base_url('uploads/media')."/".$details[0]['store_logo'];?>" style="width: 200px; height: 130px; alt="">
               <input type="hidden" value="<?php echo $details[0]['store_logo'];?>" name="avater" />
               </div>
               <?php }else{ ?>
                
               <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
	           <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
               </div>
               
               <?php } ?>
               </div>
             
             <a href="#" class="btn btn-success btn-sm" id="upload_dp_link" style="margin-left: 10px;"><span class="glyphicon glyphicon-plus-sign" style="margin-right: 5px;"></span>Upload</a>
            
             
                
                 <div class="clearfix"></div>        
                <label class="control-label" for="description">Description:</label>
                 <?php echo form_textarea($description); ?>
                 <span class="red" id="region_err"><?php echo form_error($description['name']); ?><?php echo isset($errors[$description['name']])?$errors[$description['name']]:''; ?></span>
                </div>                              
                <div class="col-md-6">
                <div class="form-group">
                 <label for="first_time_patients" class="control-label pull-left" id="">First Time Patients</label>
                  <div class="checkbox levelling">
                   <input type="checkbox" name="show_first_time_patients" id="first_time_patients" value="<?php if($details[0]['show_first_time_patients']==1) echo 1;else echo 0; ?>" <?php if($details[0]['show_first_time_patients']==1) echo "checked";?>/>
                   </div>
                
                <?php echo form_textarea($first_time_patients); ?>
                <span class="red" id="region_err"><?php echo form_error($first_time_patients['name']); ?><?php echo isset($errors[$first_time_patients['name']])?$errors[$first_time_patients['name']]:''; ?></span>
               </div>
               <label for="announcement" class="control-label pull-left" id="">Announcement</label>
               <div class="checkbox levelling">
               <input type="checkbox" name="show_announcement" id="announcement" value="<?php if($details[0]['show_announcement']==1) echo 1;else echo 0; ?>" <?php if($details[0]['show_announcement']==1) echo "checked";?>  />             
               </div>
                <?php echo form_textarea($announcement); ?>
                <span class="red" id="region_err"><?php echo form_error($announcement['name']); ?><?php echo isset($errors[$announcement['name']])?$errors[$announcement['name']]:''; ?></span>
                
                </div>
                </div>
                <div class="clearfix"></div>
                <hr /> 
                <div class="form-group">
                 
               <div class="col-md-6">  
               <table class="table">
               <!--Table Heading-->
               <tr>
               <th style="width: 10px">Open</th>
               <th style="width: 100px">Day</th>
               <th>Working Hours</th>                                            
               </tr>
               <!--Table Content-->
               <tr>
               <td><div class="checkbox working_hours">
               <input type="checkbox" name="show_mon" id="show_mon"  <?php if($w_hours[0]['show_mon']==1) echo "checked";?>  />             
               </div></td>
               <td>Monday</td>
               <td>
               <div id="time-range">
               
                <p>Time Range: <span class="slider-time"><?php echo date('h:i A',strtotime($w_hours[0]['monday_start']));?></span> - <span class="slider-time2"><?php echo date('h:i A',strtotime($w_hours[0]['monday_end']));?></span></p>
                    <div class="sliders_step1">
                        <div id="slider-range"></div>
                    </div>
                    <input  type="hidden" name="mon_start" id="mon_start" value="<?php echo date('h:i A',strtotime($w_hours[0]['monday_start']));?>"/>
                    <input  type="hidden" name="mon_end" id="mon_end" value="<?php echo date('h:i A',strtotime($w_hours[0]['monday_end']));?>"/>
                    </div>
               </td>
                 </tr>  
                <tr>
               <td><div class="checkbox working_hours">
               <input type="checkbox" name="show_tues" id="show_tues" <?php if($w_hours[0]['show_tues']==1) echo "checked";?>  />             
               </div></td>
               <td>Tuesday</td>
               <td>
               <div id="time-range-2">
               
                <p>Time Range: <span class="slider-time-tues"><?php echo date('h:i A',strtotime($w_hours[0]['tuesday_start']));?></span> - <span class="slider-time-tues2"><?php echo date('h:i A',strtotime($w_hours[0]['tuesday_end']));?></span></p>
                    <div class="sliders_step1">
                        <div id="slider-range-2"></div>
                    </div>
                    <input  type="hidden" name="tues_start" id="tues_start" value="<?php echo date('h:i A',strtotime($w_hours[0]['tuesday_start']));?>"/>
                    <input  type="hidden" name="tues_end" id="tues_end" value="<?php echo date('h:i A',strtotime($w_hours[0]['tuesday_end']));?>"/>
                    </div> </td>
                 </tr>  
                 <tr>
               <td><div class="checkbox working_hours">
               <input type="checkbox" name="show_wed" id="show_wed" <?php if($w_hours[0]['show_wed']==1) echo "checked";?>  />             
               </div></td>
               <td>Wednesday</td>
               <td>
               <div id="time-range-3">
               
                <p>Time Range: <span class="slider-time-3"><?php echo date('h:i A',strtotime($w_hours[0]['wednesday_start']));?></span> - <span class="slider-time2-3"><?php echo date('h:i A',strtotime($w_hours[0]['wednesday_end']));?></span></p>
                    <div class="sliders_step1">
                        <div id="slider-range-3"></div>
                    </div>
                    <input  type="hidden" name="wed_start" id="wed_start" value="<?php echo date('h:i A',strtotime($w_hours[0]['wednesday_start']));?>"/>
                    <input  type="hidden" name="wed_end" id="wed_end" value="<?php echo date('h:i A',strtotime($w_hours[0]['wednesday_end']));?>"/>
                    </div> </td>
                 </tr>   
                  <tr>
               <td><div class="checkbox working_hours">
               <input type="checkbox" name="show_thu" id="show_thu" <?php if($w_hours[0]['show_thu']==1) echo "checked";?>  />             
               </div></td>
               <td>Thursday</td>
               <td>
                <div id="time-range-4">
               
                <p>Time Range: <span class="slider-time-4"><?php echo date('h:i A',strtotime($w_hours[0]['thursday_start']));?></span> - <span class="slider-time2-4"><?php echo date('h:i A',strtotime($w_hours[0]['thursday_end']));?></span></p>
                    <div class="sliders_step1">
                        <div id="slider-range-4"></div>
                    </div>
                    <input  type="hidden" name="thu_start" id="thu_start" value="<?php echo date('h:i A',strtotime($w_hours[0]['thursday_start']));?>"/>
                    <input  type="hidden" name="thu_end" id="thu_end" value="<?php echo date('h:i A',strtotime($w_hours[0]['thursday_end']));?>"/>
                    </div>

               </td>
                 </tr>   
                 <tr>
               <td><div class="checkbox working_hours">
               <input type="checkbox" name="show_fri" id="show_fri" <?php if($w_hours[0]['show_fri']==1) echo "checked";?>  />             
               </div></td>
               <td>Friday</td>
               <td>
                <div id="time-range-5">
               
                <p>Time Range: <span class="slider-time-5"><?php echo date('h:i A',strtotime($w_hours[0]['friday_start']));?></span> - <span class="slider-time2-5"><?php echo date('h:i A',strtotime($w_hours[0]['friday_end']));?></span></p>
                    <div class="sliders_step1">
                        <div id="slider-range-5"></div>
                    </div>
                    <input  type="hidden" name="fri_start" id="fri_start" value="<?php echo date('h:i A',strtotime($w_hours[0]['friday_start']));?>"/>
                    <input  type="hidden" name="fri_end" id="fri_end" value="<?php echo date('h:i A',strtotime($w_hours[0]['friday_end']));?>"/>
                    </div>

               </td>
                 </tr>
                 <tr>
               <td><div class="checkbox working_hours">
               <input type="checkbox" name="show_sat" id="show_sat" <?php if($w_hours[0]['show_sat']==1) echo "checked";?>  />             
               </div></td>
               <td>Saturday</td>
               <td>
               <div id="time-range-6">
               
                <p>Time Range: <span class="slider-time-6"><?php echo date('h:i A',strtotime($w_hours[0]['saturday_start']));?></span> - <span class="slider-time2-6"><?php echo date('h:i A',strtotime($w_hours[0]['saturday_end']));?></span></p>
                    <div class="sliders_step1">
                        <div id="slider-range-6"></div>
                    </div>
                    <input  type="hidden" name="sat_start" id="sat_start" value="<?php echo date('h:i A',strtotime($w_hours[0]['saturday_start']));?>"/>
                    <input  type="hidden" name="sat_end" id="sat_end" value="<?php echo date('h:i A',strtotime($w_hours[0]['saturday_end']));?>"/>
                    </div>

               </td>
                 </tr>  
                 <tr>
               <td><div class="checkbox working_hours">
               <input type="checkbox" name="show_sun" id="show_sun" <?php if($w_hours[0]['show_sun']==1) echo "checked";?>  />             
               </div></td>
               <td>Sunday</td>
               <td>
                <div id="time-range-7">
               
                <p>Time Range: <span class="slider-time-7"><?php echo date('h:i A',strtotime($w_hours[0]['sunday_start']));?></span> - <span class="slider-time2-7"><?php echo date('h:i A',strtotime($w_hours[0]['sunday_end']));?></span></p>
                    <div class="sliders_step1">
                        <div id="slider-range-7"></div>
                    </div>
                    <input  type="hidden" name="sun_start" id="sun_start" value="<?php echo date('h:i A',strtotime($w_hours[0]['sunday_start']));?>"/>
                    <input  type="hidden" name="sun_end" id="sun_end" value="<?php echo date('h:i A',strtotime($w_hours[0]['sunday_end']));?>"/>
                    </div>
               </td>
                 </tr>     
                                    
               </table>  
             
                 </div>                              
                <div class="col-md-6">
                  
                <label class="control-label" for="fb_link">Facebook Url:</label>
                 <?php echo form_input($fb_link); ?>
                 <span class="red" id="region_err"><?php echo form_error($fb_link['name']); ?><?php echo isset($errors[$fb_link['name']])?$errors[$fb_link['name']]:''; ?></span>
                  <label class="control-label" for="ints_link">Instagram Url:</label>
                 <?php echo form_input($ints_link); ?>
                 <span class="red" id="region_err"><?php echo form_error($ints_link['name']); ?><?php echo isset($errors[$ints_link['name']])?$errors[$ints_link['name']]:''; ?></span>
                  <label class="control-label" for="twitter_link">Twitter Url:</label>
                 <?php echo form_input($twitter_link); ?>
                 <span class="red" id="region_err"><?php echo form_error($twitter_link['name']); ?><?php echo isset($errors[$twitter_link['name']])?$errors[$twitter_link['name']]:''; ?></span>
                  <label class="control-label" for="pinterest_link">Pinterest Url:</label>
                 <?php echo form_input($pinterest_link); ?>
                 <span class="red" id="region_err"><?php echo form_error($pinterest_link['name']); ?><?php echo isset($errors[$pinterest_link['name']])?$errors[$pinterest_link['name']]:''; ?></span>
                  <label class="control-label" for="you_tube_link">You Tube Url:</label>
                 <?php echo form_input($you_tube_link); ?>
                 <span class="red" id="region_err"><?php echo form_error($you_tube_link['name']); ?><?php echo isset($errors[$you_tube_link['name']])?$errors[$you_tube_link['name']]:''; ?></span>
                    
                </div>
                </div>   
       
        <div class="clearfix"></div> 
        <div class="form-group form-actions">
        <div class="col-lg-12">
        <button type="submit" class="btn btn-success pull-right">Update</button>
          <div class="clearfix"></div>
          <div id="add_res" style="margin-top:5px;"></div>
          </div>
          </div>
     
      </form>
       <form name="attachment_form"  id="attachment_form"  action="<?php echo site_url('manage_stores/do_upload'); ?>" method="post" accept-charset="utf-8" >
            <input type="file" name="image_file" value="" id="image_file" style="display:none;"  /> 
            <input  type="hidden" name="path_deal" value="media"/>
            </form>
                           </div><!-- /.tab-pane -->
                               
                               

      
               
<script src="<?php echo base_url('assets/js/jquery.form.js'); ?>"></script>           
      
<script>
 $('#profile_tab').on('shown.bs.tab', function (e) {
  e.target // newly activated tab
 var total_hours=(<?php echo date('H',strtotime($w_hours[0]['monday_start']));?>)*60;
 var total_minutes=<?php echo date('i',strtotime($w_hours[0]['monday_start']));?>;
 var total_minutes = total_hours + total_minutes; 
 var total_hours1=(<?php echo date('H',strtotime($w_hours[0]['monday_end']));?>)*60;
 var total_minutes1=<?php echo date('i',strtotime($w_hours[0]['monday_end']));?>;
 var total_minutes1 = total_hours1 + total_minutes1; 
   $("#slider-range").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 15,
    values: [total_minutes,total_minutes1],
    slide: function (e, ui) {
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);

        if (hours1.length == 1) hours1 = '0' + hours1;
        if (minutes1.length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 12) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        }
        if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        }



        $('.slider-time').html(hours1 + ':' + minutes1);
        $('#mon_start').val(hours1 + ':' + minutes1);
       

        var hours2 = Math.floor(ui.values[1] / 60);
        var minutes2 = ui.values[1] - (hours2 * 60);

        if (hours2.length == 1) hours2 = '0' + hours2;
        if (minutes2.length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 12) {
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2 + " PM";
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        }

        $('.slider-time2').html(hours2 + ':' + minutes2);
        $('#mon_end').val(hours2 + ':' + minutes2);
    }
});
var total_hours_tues=(<?php echo date('H',strtotime($w_hours[0]['tuesday_start']));?>)*60;
 var total_minutes_tues=<?php echo date('i',strtotime($w_hours[0]['tuesday_start']));?>;
 var total_minutes_tues = total_hours_tues + total_minutes_tues; 
 var total_hours_tues1=(<?php echo date('H',strtotime($w_hours[0]['tuesday_end']));?>)*60;
 var total_minutes_tues1=<?php echo date('i',strtotime($w_hours[0]['tuesday_end']));?>;
 var total_minutes_tues1 = total_hours_tues1 + total_minutes_tues1; 
   $("#slider-range-2").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 15,
    values: [total_minutes_tues,total_minutes_tues1],
    slide: function (e, ui) {
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);

        if (hours1.length == 1) hours1 = '0' + hours1;
        if (minutes1.length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 12) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        }
        if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        }



        $('.slider-time-tues').html(hours1 + ':' + minutes1);
        $('#tues_start').val(hours1 + ':' + minutes1);
       

        var hours2 = Math.floor(ui.values[1] / 60);
        var minutes2 = ui.values[1] - (hours2 * 60);

        if (hours2.length == 1) hours2 = '0' + hours2;
        if (minutes2.length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 12) {
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2 + " PM";
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        }

        $('.slider-time-tues2').html(hours2 + ':' + minutes2);
        $('#tues_end').val(hours2 + ':' + minutes2);
    }
});
//wednesday
var total_hours_wed=(<?php echo date('H',strtotime($w_hours[0]['wednesday_start']));?>)*60;
 var total_minutes_wed=<?php echo date('i',strtotime($w_hours[0]['wednesday_start']));?>;
 var total_minutes_wed = total_hours_wed + total_minutes_wed; 
 var total_hours_wed1=(<?php echo date('H',strtotime($w_hours[0]['wednesday_end']));?>)*60;
 var total_minutes_wed1=<?php echo date('i',strtotime($w_hours[0]['wednesday_end']));?>;
 var total_minutes_wed1 = total_hours_wed1 + total_minutes_wed1; 
   $("#slider-range-3").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 15,
    values: [total_minutes_wed,total_minutes_wed1],
    slide: function (e, ui) {
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);

        if (hours1.length == 1) hours1 = '0' + hours1;
        if (minutes1.length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 12) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        }
        if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        }



        $('.slider-time-3').html(hours1 + ':' + minutes1);
        $('#wed_start').val(hours1 + ':' + minutes1);
       

        var hours2 = Math.floor(ui.values[1] / 60);
        var minutes2 = ui.values[1] - (hours2 * 60);

        if (hours2.length == 1) hours2 = '0' + hours2;
        if (minutes2.length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 12) {
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2 + " PM";
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        }

        $('.slider-time2-3').html(hours2 + ':' + minutes2);
        $('#wed_end').val(hours2 + ':' + minutes2);
    }
 });   
    //thursday
    var total_hours_thu=(<?php echo date('H',strtotime($w_hours[0]['thursday_start']));?>)*60;
 var total_minutes_thu=<?php echo date('i',strtotime($w_hours[0]['thursday_start']));?>;
 var total_minutes_thu = total_hours_thu + total_minutes_thu; 
 var total_hours_thu1=(<?php echo date('H',strtotime($w_hours[0]['thursday_end']));?>)*60;
 var total_minutes_thu1=<?php echo date('i',strtotime($w_hours[0]['thursday_end']));?>;
 var total_minutes_thu1 = total_hours_thu1 + total_minutes_thu1; 
   $("#slider-range-4").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 15,
    values: [total_minutes_thu,total_minutes_thu1],
    slide: function (e, ui) {
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);

        if (hours1.length == 1) hours1 = '0' + hours1;
        if (minutes1.length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 12) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        }
        if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        }



        $('.slider-time-4').html(hours1 + ':' + minutes1);
        $('#thu_start').val(hours1 + ':' + minutes1);
       

        var hours2 = Math.floor(ui.values[1] / 60);
        var minutes2 = ui.values[1] - (hours2 * 60);

        if (hours2.length == 1) hours2 = '0' + hours2;
        if (minutes2.length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 12) {
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2 + " PM";
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        }

        $('.slider-time2-4').html(hours2 + ':' + minutes2);
        $('#thu_end').val(hours2 + ':' + minutes2);
    }
});
//friday
    var total_hours_fri=(<?php echo date('H',strtotime($w_hours[0]['friday_start']));?>)*60;
 var total_minutes_fri=<?php echo date('i',strtotime($w_hours[0]['friday_start']));?>;
 var total_minutes_fri = total_hours_fri + total_minutes_fri; 
 var total_hours_fri1=(<?php echo date('H',strtotime($w_hours[0]['friday_end']));?>)*60;
 var total_minutes_fri1=<?php echo date('i',strtotime($w_hours[0]['friday_end']));?>;
 var total_minutes_fri1 = total_hours_fri1 + total_minutes_fri1; 
   $("#slider-range-5").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 15,
    values: [total_minutes_fri,total_minutes_fri1],
    slide: function (e, ui) {
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);

        if (hours1.length == 1) hours1 = '0' + hours1;
        if (minutes1.length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 12) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        }
        if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        }



        $('.slider-time-5').html(hours1 + ':' + minutes1);
        $('#fri_start').val(hours1 + ':' + minutes1);
       

        var hours2 = Math.floor(ui.values[1] / 60);
        var minutes2 = ui.values[1] - (hours2 * 60);

        if (hours2.length == 1) hours2 = '0' + hours2;
        if (minutes2.length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 12) {
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2 + " PM";
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        }

        $('.slider-time2-5').html(hours2 + ':' + minutes2);
        $('#fri_end').val(hours2 + ':' + minutes2);
    }
    });
//saturady
    var total_hours_sat=(<?php echo date('H',strtotime($w_hours[0]['saturday_start']));?>)*60;
 var total_minutes_sat=<?php echo date('i',strtotime($w_hours[0]['saturday_start']));?>;
 var total_minutes_sat = total_hours_sat + total_minutes_sat; 
 var total_hours_sat1=(<?php echo date('H',strtotime($w_hours[0]['saturday_end']));?>)*60;
 var total_minutes_sat1=<?php echo date('i',strtotime($w_hours[0]['saturday_end']));?>;
 var total_minutes_sat1 = total_hours_sat1 + total_minutes_sat1; 
   $("#slider-range-6").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 15,
    values: [total_minutes_sat,total_minutes_sat1],
    slide: function (e, ui) {
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);

        if (hours1.length == 1) hours1 = '0' + hours1;
        if (minutes1.length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 12) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        }
        if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        }



        $('.slider-time-6').html(hours1 + ':' + minutes1);
        $('#sat_start').val(hours1 + ':' + minutes1);
       

        var hours2 = Math.floor(ui.values[1] / 60);
        var minutes2 = ui.values[1] - (hours2 * 60);

        if (hours2.length == 1) hours2 = '0' + hours2;
        if (minutes2.length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 12) {
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2 + " PM";
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        }

        $('.slider-time2-6').html(hours2 + ':' + minutes2);
        $('#sat_end').val(hours2 + ':' + minutes2);
    }
    });

//sunday
    var total_hours_sun=(<?php echo date('H',strtotime($w_hours[0]['sunday_start']));?>)*60;
 var total_minutes_sun=<?php echo date('i',strtotime($w_hours[0]['sunday_start']));?>;
 var total_minutes_sun = total_hours_sun + total_minutes_sun; 
 var total_hours_sun1=(<?php echo date('H',strtotime($w_hours[0]['sunday_end']));?>)*60;
 var total_minutes_sun1=<?php echo date('i',strtotime($w_hours[0]['sunday_end']));?>;
 var total_minutes_sun1 = total_hours_sun1 + total_minutes_sun1; 
   $("#slider-range-7").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 15,
    values: [total_minutes_sun,total_minutes_sun1],
    slide: function (e, ui) {
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);

        if (hours1.length == 1) hours1 = '0' + hours1;
        if (minutes1.length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 12) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        }
        if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        }



        $('.slider-time-7').html(hours1 + ':' + minutes1);
        $('#sun_start').val(hours1 + ':' + minutes1);
       

        var hours2 = Math.floor(ui.values[1] / 60);
        var minutes2 = ui.values[1] - (hours2 * 60);

        if (hours2.length == 1) hours2 = '0' + hours2;
        if (minutes2.length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 12) {
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2 + " PM";
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        }

        $('.slider-time2-7').html(hours2 + ':' + minutes2);
        $('#sun_end').val(hours2 + ':' + minutes2);
    }
    });

  });


$(document).ready(function(){
    
     

               
    
    if ($('#first_time_patients').prop('checked')) {
    $('.ftp').show();
}
if ($('#announcement').prop('checked')) {
    $('.ann').show();
}
    
    $('#first_time_patients').click(function(){//on checkbox click show hide otherwise
    if (this.checked) {
        $('.ftp').show();
        $(this).val( $(":checked").length > 0 ? "1" : "0");
        
    }else
    {
       $('.ftp').hide();  
    }
}) ;
 $('#announcement').click(function(){//on checkbox click show hide otherwise
    if (this.checked) {
        $('.ann').show();
         $(this).val( $(":checked").length > 0 ? "1" : "0");
    }else
    {
       $('.ann').hide();  
    }
}) ;
    
    $("#store_profile_edit_form").submit(function(){

    $('#loader').fadeIn();
  
        
        
                   
            var values = $('#store_profile_edit_form').serialize();
                $.ajax({
                url:'<?php echo site_url('manage_stores/update_store_profile/'.$details[0]["store_id"]); ?>',
                dataType:'json',
                type:'POST',
                data:values,
                success:function(result){                                       
                    if(result.status==1)
                        {                                        
                        $('#alert_area').html('<div class="alert alert-success" id="disappear_add"  >'+result.message+'</div>'); 
                         $('html, body').animate({scrollTop: $('#disappear_add').offset().top-200}, 600);
                        setTimeout(function(){$('#disappear_add').fadeOut('slow')},3000)
                        $('#loader').fadeOut();
                       
                                        
                        }
                        else
                        {                                        
                        $('#alert_area').empty().html('<div class="alert alert-danger">'+result.message+'</div>');
                        $('#loader').fadeOut();
                        }
                    }
                    });
                    
   
 return false;

 });
    
  

     

    
    $('#loader1').fadeOut();
        $('#upload_dp_link').click(function(e){
       e.preventDefault();
       $('#image_file').trigger('click'); 
    });
    
    $('#image_file').change(function(){
         $("#attachment_form").submit();
     });
    
var options = { 
    beforeSend: function() 
    {
        $("#loader1").show();
        
    },
    complete: function(response) 
    {
           $("#loader1").hide();
          
           var result = jQuery.parseJSON(response.responseText);
           
           if(result.status==0)
           {
               $('#upload_alert_area').empty().html('<div class="alert alert-danger  alert-dismissible"  style="margin-top:5px;" ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+result.message+'</div>');
           }
           else if(result.status==1)
           {
            $('#upload_file').empty();
             $('#upload_file').append('<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="'+result.image_path+'" style="width: 200px; height: 130px; alt=""><input type="hidden" value="'+result.filename+'" name="avater" /></div>');
           }
    },
    error: function()
    {
        alert(" ERROR: unable to upload files");
 
    }
 
}; 
$("#attachment_form").ajaxForm(options);   
  });
    
  

</script>
<!---------------------------------Media----------------------------------------------------------->
<div class="tab-pane" id="tab_3">
                                       <form action="<?php echo site_url('image_upload/do_upload/'.$details[0]["store_id"]) ?>"
                          class="dropzone"
                          id="my-awesome-dropzone"></form>
                           <div id="response_view"></div>

      </div>
      
<!--View Modal -->
<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 40%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Image Details</h4>
            </div>
            <div id="image_view"></div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      <script src="<?php echo base_url(); ?>assets/js/dropzone.js" type="text/javascript"></script>
 <script>
var store_id = <?php echo $details[0]["store_id"] ?>;
function load_image(store_id)
{
     $.ajax({
            url: '<?php echo site_url('image_upload/load_images/') ?>/' + store_id,
            dataType: 'html',
            success: function (result)
            {
                $('#response_view').html(result);

            }
        });
}
$(document).ready(function () {

load_image(store_id);

Dropzone.options.myAwesomeDropzone = {
  paramName: "file", // The name that will be used to transfer the file
  parallelUploads: 100,
  uploadMultiple: true,
  acceptedFiles :".jpg,.jpeg,.pjpeg,.gif,.png", 
  success: function(file, response){

                    var obj = jQuery.parseJSON(response);
                    if(obj.status=="0")
                    {
                        $('#alert_area').html('<div class="alert alert-danger alert-dismissible" id="disappear_add"  ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' + obj.message + '</div>');
                      
                    }
                    else{
                        var i=0;
                       $('#alert_area').empty();
                        $.each(obj.images,function(key,val){
                            
                            if(val.image_status=="1"){
                                $('#alert_area').append('<div class="alert alert-success alert-dismissible" id="disappear_add_'+i+'"  ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' + val.message + '</div>');
                             }
                            else{
                                $('#alert_area').append('<div class="alert alert-danger alert-dismissible" id="disappear_add'+i+'"  ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' + val.message + '</div>');  
                            }
                            i++;
                             
                        });
                       
                        load_image(store_id);
                       
                    }   
                    
    setTimeout(function () {$('alert-success').fadeOut('slow');}, 3000);  
                   
  }
};

  });
   //function for view image details
    $(document).on('click', '.edit_caption', function (e) {
        e.preventDefault();
        id = $(this).attr('data-image_id');
        $.ajax({
            url: '<?php echo site_url('image_upload/load_edit/') ?>/' + id,
            dataType: 'html',
            success: function (result)
            {
                $('#image_view').html(result);

            }
        });
        $('#view_modal').modal('show');
    });
    
     //delete image
    $(document).on('click', '.delete_image', function (e) {
        e.preventDefault();
         var response = confirm('Are you sure want to delete this image?');
        if(response){
        id = $(this).attr('data-image_id');
        $.ajax({
            url: '<?php echo site_url('image_upload/delete/') ?>/' + id,
              dataType: 'json',
            success: function (result)
            {  
                $('#view_modal').modal('hide');
               
                
                 load_image(store_id); //reload page by ajax
               // close model
                
              
            }
        });
        }

    });
  
    
    
 </script>
<!---------------------------------Deal------------------------------------------------------------->
<div class="tab-pane" id="tab_4">                   

<div class="well-lg" style="overflow: auto;">
 <a href="#" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#add_deal" style="margin-bottom: 5px;" ><span class="glyphicon glyphicon-plus-sign "></span>  Add Deal</a>
    <div class="clearfix"></div>
    <table id="ajax_datatable" class="table table-striped users-list">
    <thead>
        <tr class="tableheader tableheader-blue" >
                                                   <th>Deal Title</th>
                                                   <th>Store Name</th>                                                   
                                                   <th id="duration">Duration</th>
                                                   <th class="actions">Actions</th>
        </tr>
    </thead>
</table>                                   
</div>
 <!--Add Region Modal -->
<div class="modal fade" id="add_deal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 65%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Deal
         </h4>
         
      </div>
      <div class="modal-body">
       <form role="form" id="deal_add_form" name="deal_add_form">
            
               <div class="clearfix"></div>   
               <div class="form-group">
               <div class="col-md-6">
                <div class="form-group">
                <label class="control-label" for="street">Deal Title:</label>
                 <?php echo form_input($deal); ?>
                 <span class="red" id="region_err"><?php echo form_error($deal['name']); ?><?php echo isset($errors[$deal['name']])?$errors[$deal['name']]:''; ?></span>
                                 
                </div>
                <div class="form-group">
                <label class="control-label" for="street">Description:</label>
                 <?php echo form_textarea($deal_description); ?>
                 <span class="red" id="region_err"><?php echo form_error($deal_description['name']); ?><?php echo isset($errors[$deal_description['name']])?$errors[$deal_description['name']]:''; ?></span>
                </div>
                <div class="form-group">         
                <label class="control-label" for="dir_id">Product Category:</label>                 
                 <?php echo form_dropdown('product_category_id',@$product_categories,'0','class = form-control id = product_category_id'); ?>
                 <span class="red" id="topic_err"><?php echo form_error(@$product_categories['name']); ?><?php echo isset($errors[@$product_categories['name']])?$errors[$product_categories['name']]:''; ?></span>
                </div>
                </div> 
               <div class="col-md-6">
               
               <div id="upload_file_deal" style="float: left;">
               
                              
               <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
	           <img src="<?php echo base_url('assets/img/placeholder.png');?>" alt="">
               </div>               
              
               </div>             
             <a href="#" class="btn btn-success btn-sm" id="upload_deal_link" style="margin-left: 10px;"><span class="glyphicon glyphicon-plus-sign" style="margin-right: 5px;"></span>Upload</a>
            </div>
                </div>
                 <div class="clearfix"></div> 
                 <div class="form-group">
                 
                 
                 <div class="col-md-6">
               
                 <label class="control-label" for="street">Start Time:</label>
                 <?php echo form_input($start_time); ?>
                 <span class="red" id="region_err"><?php echo form_error($start_time['name']); ?><?php echo isset($errors[$start_time['name']])?$errors[$start_time['name']]:''; ?></span>
                </div>
               
                <div class="col-md-6">
                 <label class="control-label" for="street">End Time:</label>
                 <div id="end_time_err"></div>
                 <?php echo form_input($end_time); ?>
                 <span class="red" id="region_err"><?php echo form_error($end_time['name']); ?><?php echo isset($errors[$end_time['name']])?$errors[$end_time['name']]:''; ?></span>
                
                </div>
                 </div>
                  
                 <div class="clearfix"></div> 
                 <div class="form-group">
                 <div class="col-md-6">
                 <label class="control-label" for="street">How to use:</label>
                 <?php echo form_textarea($how_to_use); ?>
                 <span class="red" id="region_err"><?php echo form_error($how_to_use['name']); ?><?php echo isset($errors[$how_to_use['name']])?$errors[$how_to_use['name']]:''; ?></span>
                </div>
                  <div class="col-md-6">
                 <label class="control-label" for="street">Terms of Use:</label>
                 <?php echo form_textarea($terms_of_use); ?>
                 <span class="red" id="region_err"><?php echo form_error($terms_of_use['name']); ?><?php echo isset($errors[$terms_of_use['name']])?$errors[$terms_of_use['name']]:''; ?></span>
                </div>
                </div>
                
        
       
                
               <div class="clearfix"></div>    
       </div>
      <div class="modal-footer">
       
        <button type="submit" class="btn btn-success pull-right">Add</button>
         <button type="button" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right: 5px;">Back</button>
        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="loader_add" class="pull-right" style="display: none;"/>
          <div class="clearfix"></div>
          <div id="add_deal_res" style="margin-top:5px;"></div>
      </div>
      </form>
      <form name="attachment_form_deal"  id="attachment_form_deal"  action="<?php echo site_url('deals/do_upload'); ?>" method="post" accept-charset="utf-8" >
            <input type="file" name="image_file" value="" id="image_file_1" style="display:none;"  /> 
            <input  type="hidden" name="path" value="deals_images"/>
            </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   
 <!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 65%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Deal</h4>
      </div>
      <div id="edit_form_response">
      
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->                              
         <!--View Modal -->
<div class="modal fade" id="view_deal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Deals Detailes</h4>
      </div>
      <div class="modal-body">
       <div id="response_view_deal"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->                                
                                  
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
 <!-- jQuery 1.10.2 -->
        <script src="<?php echo base_url('assets/js/jquery.datetimepicker.js') ?>"></script>
        <script src="http://momentjs.com/downloads/moment.min.js"></script>
        

<script>

$(function () {
        $("#start_time").datetimepicker({
            format:'d.m.Y H:i',           
        });
        });
        
        $(function () {
        $("#end_time").datetimepicker({
            format:'d.m.Y H:i',
            onShow:function( ct ){
            this.setOptions({
            minDate:jQuery('#start_time').val()?jQuery('#start_time').val():false           
            })
        },           
        });
        });
$(document).ready(function(){
        var filter = 0; 
        var ajax_datatable = $('table#ajax_datatable').dataTable({
            "bServerSide": true,
            "sAjaxSource": "<?php echo site_url('deals/get_deals_list')."/".$details[0]["store_id"]; ?>",
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
            
            links += '<a href="#" data-deal_id="'+aData[5]+'" title="View Details" class="btn btn-primary btn-xs view_deal" style="margin-right:5px;" ><span class="glyphicon glyphicon-search"></span></a>';  
            links += '<a href="#" data-deal_id="'+aData[5]+'" title="Edit Details" class="btn btn-primary btn-xs edit_deal" style="margin-right:5px;" ><span class="glyphicon glyphicon-pencil"></span></a>';  
            if(aData[4]=='1')
            links +='<a href="#" data-deal_id="'+aData[5]+'" title="Inactive"class="btn btn-warning btn-xs disable_deal" style="margin-right:5px;"><span class="fa fa-times"></sapn>';
            else            
            links +='<a href="#" data-deal_id="'+aData[5]+'" title="Active"class="btn btn-success btn-xs enable_deal" style="margin-right:5px;"><span class="fa fa-check"></sapn>';
                        
            links +='<a href="#" data-deal_id="'+aData[5]+'" title="Delete" class="btn btn-danger btn-xs delete_deal"  style="margin-right:5px;"><span class="glyphicon glyphicon-trash"></span></a>';
            $('td:eq(3)', nRow).html( links);
            var start = aData[2];
            var end   = aData[3];
            var s =moment(end).diff(moment(start))/3600000;
            $('td:eq(2)', nRow).html(s +" Hours");   
            
            return nRow;
		},
        aoColumnDefs: [
       
          {
             bSortable: false,
             aTargets: [3]
          },
        
          
          {
             bSearchable: false,
             aTargets: [3]
          }
        ]
    });
    //Submit add form
    $("#deal_add_form").submit(function(){
         var start = $('#start_time').val();
         var end = $('#end_time').val();         

    if($.trim($('#deal').val())==""){
        $('#deal').css('border','1px solid red');
        $('#deal').focus();return false;
    }
    else{
       $('#deal').css('border','1px solid #cccccc');  
    }
    if(moment(end,"DD/MM/YYYY HH:mm:ss").diff(moment(start,"DD/MM/YYYY HH:mm:ss"))<0){
        
        $('#end_time').css('border','1px solid red');
        $('#end_time').focus();
        $('#end_time_err').empty();
        $('#end_time_err').html('<span style="color:red;">End time should be greater than start time.</span>');
        return false;
    }
    else{
       $('#end_time').css('border','1px solid #cccccc');  
    
    }
    if($.trim($('#product_category_id').val())=='0'){
        $('#product_category_id').css('border','1px solid red');
        $('#product_category_id').focus();return false;
    }
    else{
       $('#product_category_id').css('border','1px solid #cccccc');  
    }
    
    $('#loader_add').fadeIn();  
 

var values = $('#deal_add_form').serialize();
    $.ajax({
    url:'<?php echo site_url('deals/add/'.$details[0]["store_id"]."/".$details[0]["region_id"]."/".$details[0]["sub_region_id"]); ?>',
    dataType:'json',
    type:'POST',
    data:values,
    success:function(result){
     console.log(result);  
     if(result.status==1)
     {
        
        $('#add_deal_res').html('<div class="alert alert-success" id="disappear_add_1"  >'+result.message+'</div>'); 
        setTimeout(function(){$('#disappear_add_1').fadeOut('slow')},3000)
        $('#loader_add').fadeOut();
        $('#deal_add_form')[0].reset();
         $('#upload_file_deal').empty();
         $('#upload_file_deal').append('<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img src="<?php echo base_url('assets/img/placeholder.png');?>" alt=""></div>');
       ajax_datatable.fnDraw();
        
     }
     else
     {
        
        $('#add_deal_res').empty().html('<div class="alert alert-danger">'+result.message+'</div>');
        $('#loader_add').fadeOut();
     } 
     
      
    }
   });  
 return false;
 });
//deal image upload code 
 $('#upload_deal_link').click(function(e){
       e.preventDefault();
       $('#image_file_1').trigger('click'); 
    });
    
    $('#image_file_1').change(function(){
         $("#attachment_form_deal").submit();
     });
    
var options = { 
    beforeSend: function() 
    {
        //$("#loader1").show();
        
    },
    complete: function(response) 
    {
           //$("#loader1").hide();
          
           var result = jQuery.parseJSON(response.responseText);
           
           if(result.status==0)
           {
               $('#upload_alert_area').empty().html('<div class="alert alert-danger  alert-dismissible"  style="margin-top:5px;" ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+result.message+'</div>');
           }
           else if(result.status==1)
           {
            $('#upload_file_deal').empty();
             $('#upload_file_deal').append('<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="'+result.image_path+'" style="width: 200px; height: 130px; alt=""><input type="hidden" value="'+result.filename+'" name="deal_avater" /></div>');
           }
    },
    error: function()
    {
        alert(" ERROR: unable to upload files");
 
    }
 
}; 
$("#attachment_form_deal").ajaxForm(options); 


        
 //function for view deal details
$(document).on('click','.view_deal',function(e){
    e.preventDefault();
    id = $(this).attr('data-deal_id');
    $.ajax({
       url:'<?php echo site_url('deals/view_deals/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        $('#response_view_deal').html(result);
        
       } 
    });
    $('#view_deal').modal('show');
  });
  //Edit deal
 $(document).on('click','.edit_deal',function(e){
    e.preventDefault();
    $('#edit_form_response').empty();
    id = $(this).attr('data-deal_id');
    $.ajax({
       url:'<?php echo site_url('deals/edit_deal/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        $('#edit_form_response').html(result);
       } 
    });
    $('#editModal').modal('show');
      });
       
 //Delete deal
 $(document).on('click','.delete_deal',function(e){
    e.preventDefault();
    var response = confirm('Are you sure want to delete this deal?');
    if(response){
    id = $(this).attr('data-deal_id');
    $.ajax({
       url:'<?php echo site_url('deals/delete/') ?>/'+id,
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
 //Deal disable
  $(document).on('click','.disable_deal',function(e){
    e.preventDefault();
    
    var response = confirm('Are you sure want to disable this deal?');
    if(response)
    {
    id = $(this).attr('data-deal_id');
    $('#loader2').show();
    $.ajax({
        url:'<?php echo site_url('deals/disable_deal/')?>/'+id,
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
    //Deal enable
  $(document).on('click','.enable_deal',function(e){
    e.preventDefault();
    id=$(this).attr('data-deal_id');
    $('#loader2').show();
    $.ajax({
        url:'<?php echo site_url('deals/enable_deal/')?>/'+id,
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
 </script>

      </div>
      
      
<!---------------------------------------Products-------------------------------------------------->
<div class="tab-pane" id="tab_5">                   

<div class="well-lg" style="overflow: auto;">
 <a href="#" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#add_product" style="margin-bottom: 5px;"><span class="glyphicon glyphicon-plus-sign "></span>  Add Product</a>
    <div class="clearfix"></div>
    <table id="ajax_datatable_2" class="table table-striped users-list">
    <thead>
        <tr class="tableheader tableheader-blue" >
                                                   <th>Product Name</th>
                                                   <th>Product Category</th>                                                   
                                                   <th>Created</th>
                                                   <th class="actions">Actions</th>
        </tr>
    </thead>
</table>                                   
</div>
 <!--Add Region Modal -->
<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Product
         </h4>
         
      </div>
      <div class="modal-body">
       <form role="form" id="product_add_form" name="product_add_form">
            
               
             <div class="form-group">
                <label class="control-label" for="login">Product Name:</label>
                 <?php echo form_input($product_name); ?>
                 <span class="red" id="region_err"><?php echo form_error($product_name['name']); ?><?php echo isset($errors[$product_name['name']])?$errors[$product_name['name']]:''; ?></span>
                </div>
               <div class="form-group">
                <label class="control-label" for="street">Description:</label>
                 <?php echo form_textarea($product_description); ?>
                 <span class="red" id="region_err"><?php echo form_error($product_description['name']); ?><?php echo isset($errors[$product_description['name']])?$errors[$product_description['name']]:''; ?></span>
                </div>               
               <div class="clearfix"></div> 
                <div class="form-group">         
                <label class="control-label" for="dir_id">Product Category:</label>                 
                 <?php echo form_dropdown('product_category_id',@$product_categories,'0','class = form-control id = product_category_id_for_product'); ?>
                 <span class="red" id="topic_err"><?php echo form_error(@$product_categories['name']); ?><?php echo isset($errors[@$product_categories['name']])?$errors[$product_categories['name']]:''; ?></span>
                </div>
                <div class="clearfix"></div>
                 <div id="add_text_box"></div>
                  <div class="clearfix"></div>  
                 
       </div>
      <div class="modal-footer">
       
        <button type="submit" class="btn btn-success pull-right">Add</button>
         <button type="button" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right: 5px;">Back</button>
        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="loader_add_product" class="pull-right" style="display: none;"/>
          <div class="clearfix"></div>
         
          <div id="add_product_res" style="margin-top:5px;"></div>
      </div>
      </form>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   
 <!--Edit Modal -->
<div class="modal fade" id="edit_product_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 65%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
      </div>
      <div id="edit_form_response_product">
      
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->                              
         <!--View Modal -->
<div class="modal fade" id="view_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Product Detailes</h4>
      </div>
      <div class="modal-body">
       <div id="response_view_product"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->                                
                                  
 

<script>


$(document).ready(function(){   
        
       var filter = 0; 
        ajax_datatable = $('table#ajax_datatable_2').dataTable({
            "bServerSide": true,
            "sAjaxSource": "<?php echo site_url('products/get_products_list')."/".$details[0]["store_id"]; ?>",
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
            
            links += '<a href="#" data-product_id="'+aData[4]+'" title="View Details" class="btn btn-primary btn-xs view_product" style="margin-right:5px;" ><span class="glyphicon glyphicon-search"></span></a>';  
            links += '<a href="#" data-product_id="'+aData[4]+'" title="Edit Details" class="btn btn-primary btn-xs edit_product" style="margin-right:5px;" ><span class="glyphicon glyphicon-pencil"></span></a>';  
            if(aData[3]=='1')
            links +='<a href="#" data-product_id="'+aData[4]+'" title="Inactive"class="btn btn-warning btn-xs disable_product" style="margin-right:5px;"><span class="fa fa-times"></sapn>';
            else            
            links +='<a href="#" data-product_id="'+aData[4]+'" title="Active"class="btn btn-success btn-xs enable_product" style="margin-right:5px;"><span class="fa fa-check"></sapn>';
                        
            links +='<a href="#" data-product_id="'+aData[4]+'" title="Delete" class="btn btn-danger btn-xs delete_product"  style="margin-right:5px;"><span class="glyphicon glyphicon-trash"></span></a>';
            $('td:eq(3)', nRow).html( links);
              
            var dateSplit = aData[2].split("-");            
            day = dateSplit[2].split(' ');
            var curr_date = day[0];
            var curr_month = dateSplit[1]; //Months are zero based
            var curr_year = dateSplit[0];
            $('td:eq(2)', nRow).html(curr_month + "-" + curr_date + "-" + curr_year );
            
            return nRow;
		},
        aoColumnDefs: [
       
          {
             bSortable: false,
             aTargets: [3]
          },
        
          
          {
             bSearchable: false,
             aTargets: [3]
          }
        ]
            });//datatable
            
            
            
            
            
            
$('#product_category_id_for_product').change(function(){
     var product_cat_id=$(this).val();
    
       $.ajax({
    url:'<?php echo site_url('products/get_unit_count/'.$details[0]["store_id"])."/"; ?>'+product_cat_id,
    dataType:'json',
    type:'POST',
    data:{product_cat:product_cat_id},
    success:function(result){
        console.log(result);
     
     if(result.status==1)
     {
        
        $('#add_text_box').html(result.message);
        $('#add_product_res').empty();
        
      
        
        
     }
     else
     {
        
        $('#add_product_res').empty().html('<div class="alert alert-danger">'+result.message+'</div>');
        $('#add_text_box').empty();
        $('#loader_add_product').fadeOut();
     } 
     
      
    }
   }); 
   return false
    
    });
            
  //product add form
  $('#product_add_form').submit(function(){
             

    if($.trim($('#product_name').val())==""){
        $('#product_name').css('border','1px solid red');
        $('#product_name').focus();return false;
    }
    else{
       $('#product_name').css('border','1px solid #cccccc');  
    }
   if($.trim($('#product_category_id_for_product').val())=='0'){
        $('#product_category_id_for_product').css('border','1px solid red');
        $('#product_category_id_for_product').focus();return false;
    }
    else{
       $('#product_category_id_for_product').css('border','1px solid #cccccc');  
    }
     $('#add_text_box_on_edit').empty();
    var i=1;
     for(i;i<=$("input[name='product_cost[]']").length;i++) {  
      if($.trim($(".product_unit").val())==""){
         $(".product_unit").css('border','1px solid red');
        $(".product_unit").focus();
             
       return false;
    }
    else{
       $(".product_unit").css('border','1px solid #cccccc');  
    }
    }
     
        
    
    $('#loader_add_product').fadeIn();  
 

var values = $('#product_add_form').serialize();
    $.ajax({
    url:'<?php echo site_url('products/add/'.$details[0]["store_id"])."/"; ?>'+$("#product_category_id_for_product option:selected").val(),
    dataType:'json',
    type:'POST',
    data:values,
    success:function(result){
     console.log(result);  
     if(result.status==1)
     {
        
        $('#add_product_res').html('<div class="alert alert-success" id="disappear_add_1"  >'+result.message+'</div>'); 
        setTimeout(function(){$('#disappear_add_1').fadeOut('slow')},3000)
        $('#loader_add_product').fadeOut();
        $('#product_add_form')[0].reset();
        $('#add_text_box').empty();
        ajax_datatable.fnDraw();
        
     }
     else
     {
        
        $('#add_product_res').empty().html('<div class="alert alert-danger">'+result.message+'</div>');
        $('#loader_add_product').fadeOut();
     } 
     
      
    }
   });  
 return false;
 });
//Delete product
 $(document).on('click','.delete_product',function(e){
    e.preventDefault();
    var response = confirm('Are you sure want to delete this product?');
    if(response){
    id = $(this).attr('data-product_id');
    $.ajax({
       url:'<?php echo site_url('products/delete/') ?>/'+id,
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
  $(document).on('click','.disable_product',function(e){
    e.preventDefault();
    
    var response = confirm('Are you sure want to disable this product?');
    if(response)
    {
    id = $(this).attr('data-product_id');
    $('#loader2').show();
    $.ajax({
        url:'<?php echo site_url('products/disable_product/')?>/'+id,
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
  $(document).on('click','.enable_product',function(e){
    e.preventDefault();
    id=$(this).attr('data-product_id');
    $('#loader2').show();
    $.ajax({
        url:'<?php echo site_url('products/enable_product/')?>/'+id,
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
  
//View user
 $(document).on('click','.view_product',function(e){
    e.preventDefault();
    id = $(this).attr('data-product_id');
    $.ajax({
       url:'<?php echo site_url('products/view_product/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        $('#response_view_product').html(result);
       } 
    });
    $('#view_product').modal('show');
 });
  //Edit deal
 $(document).on('click','.edit_product',function(e){
    e.preventDefault();
    $('#edit_form_response_product').empty();
    id = $(this).attr('data-product_id');
    $.ajax({
       url:'<?php echo site_url('products/edit_product/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        $('#edit_form_response_product').html(result);
        
       } 
    });
    $('#edit_product_model').modal('show');
     
      });
       

    });//document.ready
 </script>

      </div>
       </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div>
                        </div>
                       
                        </section>
                        </aside>
                        
 <!-- Bootstrap -->