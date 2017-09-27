<?php


$sub_region_name = array(
  'name'  => 'sub_region_name',
  'id'  => 'sub_region_name_edit',
  'value' => set_value('sub_region_name',@$details[0]["sub_region_name"]),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Sub Region Name'
);
$latitude= array(
    'name'  => 'latitude',
    'id'  => 'latitude_edit',
    'value' => set_value('latitude',@$details[0]["latitude"]),
    'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Latitude'

);
$longitude= array(
    'name'  => 'longitude',
    'id'  => 'longitude_edit',
    'value' => set_value('longitude',@$details[0]["longitude"]),
    'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Longitude'

);
$address = array(
    'name'  => 'address',
    'id'  => 'address_edit',
    'value' => set_value('address',@$details[0]["address"]),
    'class' => 'form-control',
    'placeholder' => 'Address'
    
);

$unique_name = array(
  'name'  => 'unique_name',
  'id'  => 'unique_name',
  'value' => set_value('unique_name',@$details[0]["unique_name"]),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Sub Region Slug'
);

?>
<form role="form" id="edit_region_form" name="edit_region_form">
 <div class="modal-body" style="overflow: auto;">
     

         <div class="form-group">
                 <label class="control-label" for="region_id_edit">Region Name</label>
                 
                 <?php echo form_dropdown('region_id',@$regions,@$details[0]["region_id"],'class = form-control id = region_id_edit'); ?>
                 <span class="red"><?php echo form_error(@$regions['name']); ?><?php echo isset($errors[@$regions['name']])?$errors[$regions['name']]:''; ?></span>
                
                 </div>                
                <div class="form-group">
                <label class="control-label" for="topic">Sub Region Name</label>
                 <?php echo form_input($sub_region_name); ?>
                 <span class="red" id="region_err"><?php echo form_error($sub_region_name['name']); ?><?php echo isset($errors[$sub_region_name['name']])?$errors[$sub_region_name['name']]:''; ?></span>
                </div>
                <div class="form-group">
                <label class="control-label" for="topic"> Sub Region Slug</label>
                 <?php echo form_input($unique_name); ?>
                 <span class="red" id="region_err"><small style="color: red;">Please edit with caution, will effect URL.</small><?php echo form_error($unique_name['name']); ?><?php echo isset($errors[$unique_name['name']])?$errors[$unique_name['name']]:''; ?></span>
                </div>
               <div class="row">
                <div class="form-group col-md-6">
                <label class="control-label" for="login">Latitude:</label>
                 <?php echo form_input($latitude); ?>
                 <span class="red"><?php echo form_error($latitude['name']); ?><?php echo isset($errors[$latitude['name']])?$errors[$latitude['name']]:''; ?></span>
                </div>
                
                <div class="form-group col-md-6">
                 <label class="control-label" for="login">Longitude:</label>
                 <?php echo form_input($longitude); ?>
                 <span class="red"><?php echo form_error($longitude['name']); ?><?php echo isset($errors[$longitude['name']])?$errors[$longitude['name']]:''; ?></span>
                </div>
                </div>
                 <div class="form-group">
                 <label class="control-label" for="login">Address:</label>
                 <?php echo form_input($address); ?>
                 <span class="red"><?php echo form_error($address['name']); ?><?php echo isset($errors[$address['name']])?$errors[$address['name']]:''; ?></span>
                </div>
            
               
       </div>
      <div class="modal-footer">
       
        <button type="submit" class="btn btn-success pull-right">Update</button>
         <button type="button" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right: 5px;">Back</button>
        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="edit_region_form_loader" class="pull-right" style="display: none;"/>
          <div class="clearfix"></div>
          <div id="edit_region_form_res" style="margin-top:5px;"></div>
      </div>
      </form>

<script>
 $(document).ready(function(){
                             
  function validate_latitude_longitude(latitude,longitude)
 {
    if($.trim($("#"+latitude).val())==""){
        $("#"+latitude).css('border','1px solid red');
        $("#"+latitude).focus();
        $("#"+longitude).css('border','1px solid red');
        return false;
    }
    else{
        if($.trim($("#"+longitude).val())=="")
        {
        $("#"+longitude).css('border','1px solid red');
        $("#"+longitude).focus();
        return false;
        }
       $("#"+latitude).css('border','1px solid #cccccc'); 
       $("#"+longitude).css('border','1px solid #cccccc'); 
       return true; 
    }
     
    }
    function validate_address(address)
    {
      if($.trim($("#"+address).val())==""){
        $("#"+address).css('border','1px solid red');
        $("#"+address).focus();return false;
    }
    else{
       $("#"+address).css('border','1px solid #cccccc');  
       return true;
    }  
    }
     
 $("#edit_region_form").submit(function(){

   
    
    if($.trim($('#sub_region_name_edit').val())==""){
        $('#sub_region_name_edit').css('border','1px solid red');
        $('#sub_region_name_edit').focus();return false;
    }
    else{
       $('#sub_region_name_edit').css('border','1px solid #cccccc');  
    }
    
     if($.trim($('#unique_name').val())==""){
        $('#unique_name').css('border','1px solid red');
        $('#unique_name').focus();return false;
    }
    else{
       $('#unique_name').css('border','1px solid #cccccc');  
    }
      
      if(!validate_latitude_longitude('latitude_edit','longitude_edit'))
      {
        var response_address =   validate_address('address_edit');
      }else{
        $("#address_edit").css('border','1px solid #cccccc');
        var response_address = true;  
      }
      if(!validate_address('address_edit'))
      {
        var response_latitude_longitude =   validate_latitude_longitude('latitude_edit','longitude_edit');
      }else
      {
         $("#latitude_edit").css('border','1px solid #cccccc');
         $("#longitude_edit").css('border','1px solid #cccccc');
             var response_latitude_longitude= true;
      }
      if(!response_latitude_longitude || !response_address)
      return false;
   
   
                        
                            $('#edit_region_form_loader').fadeIn();
                            
                            
                             var sub_region_slug = $('#unique_name').val(); //chek slug in edit mode
                             var sub_region_slug =   sub_region_slug.replace(/ /g,'-');
                             var sub_region_id = <?php echo $details[0]["sub_region_id"]; ?>
                           
                          
                            $.ajax({
                            url:'<?php echo site_url('sub_regions/chk_unique_slug'); ?>',
                            dataType:'json',
                            type:'POST',
                            data: { sub_region_slug: sub_region_slug, sub_region_id: sub_region_id },
                            success:function(result){
                           
                             if(result.status==1)
                             {      
                                    $('#unique_name').val(result.message);
                                    var values = $('#edit_region_form').serialize();
                                    $.ajax({
                                    url:'<?php echo site_url('sub_regions/update/'.$details[0]["sub_region_id"]); ?>',
                                    dataType:'json',
                                    type:'POST',
                                    data:values,
                                    success:function(result){

                                     if(result.status==1)
                                     {
                                        $('#edit_region_form_res').html('<div class="alert alert-success" id="disappear0" style="margin-top:5px;"  >'+result.message+'</div>'); 
                                        setTimeout(function(){$('#disappear0').fadeOut('slow')},3000)
                                        $('#edit_region_form_loader').fadeOut();
                                        ajax_datatable.fnDraw();
                                     }
                                     else
                                     {

                                        $('#edit_region_form_res').empty().html('<div class="alert alert-danger" id="disappear1"  style="margin-top:5px;" >'+result.message+'</div>');
                                         setTimeout(function(){$('#disappear1').fadeOut('slow')},3000)
                                        $('#edit_region_form_loader').fadeOut();
                                     } 
                                    }
                                   }); // inner ajax
                             }
                             else
                             {
                                
                                $('#edit_region_form_res').empty().html('<div class="alert alert-danger" id="disappear2" style="margin-top:5px;" >'+result.message+'</div>');
                                 setTimeout(function(){$('#disappear2').fadeOut('slow')},3000)
                                $('#edit_region_form_loader').fadeOut();
                             } 
                            }
                           }); // outer ajax
                            
                            
                          
                           
                            return false;
                            
                            
                        
                        });
  
                    });
                    </script>