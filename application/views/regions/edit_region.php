<?php


$region_name = array(
  'name'  => 'region_name',
  'id'  => 'region_name_edit',
  'value' => set_value('region_name',@$details[0]["region_name"]),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Region Name'
);

$unique_name = array(
  'name'  => 'unique_name',
  'id'  => 'unique_name',
  'value' => set_value('unique_name',@$details[0]["unique_name"]),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Region Slug'
);

?>
<form role="form" id="edit_region_form" name="edit_region_form">
 <div class="modal-body" style="overflow: auto;">
     
                
                <div class="form-group">
                <label class="control-label" for="topic">Region Name</label>
                 <?php echo form_input($region_name); ?>
                 <span class="red" id="region_err"><?php echo form_error($region_name['name']); ?><?php echo isset($errors[$region_name['name']])?$errors[$region_name['name']]:''; ?></span>
                </div>
                <div class="form-group">
                <label class="control-label" for="topic">Region Slug</label>
                 <?php echo form_input($unique_name); ?>
                 <span class="red" id="region_err"><small style="color: red;">Please edit with caution, will effect URL.</small><?php echo form_error($unique_name['name']); ?><?php echo isset($errors[$unique_name['name']])?$errors[$unique_name['name']]:''; ?></span>
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
     
 $("#edit_region_form").submit(function(){

   
    
    if($.trim($('#region_name_edit').val())==""){
        $('#region_name_edit').css('border','1px solid red');
        $('#region_name_edit').focus();return false;
    }
    else{
       $('#region_name_edit').css('border','1px solid #cccccc');  
    }
    
     if($.trim($('#unique_name').val())==""){
        $('#unique_name').css('border','1px solid red');
        $('#unique_name').focus();return false;
    }
    else{
       $('#unique_name').css('border','1px solid #cccccc');  
    }
   
   
                        
                            $('#edit_region_form_loader').fadeIn();
                            
                            
                             var region_slug_name = $('#unique_name').val(); //chek slug in edit mode
                             var region_slug_name =   region_slug_name.replace(/ /g,'-');
                             var region_id = <?php echo $details[0]["region_id"]; ?>
                           
                          
                            $.ajax({
                            url:'<?php echo site_url('regions/chk_unique_slug'); ?>',
                            dataType:'json',
                            type:'POST',
                            data: { region_slug: region_slug_name, region_id: region_id },
                            success:function(result){
                           
                             if(result.status==1)
                             {      
                                    $('#unique_name').val(result.message);
                                    var values = $('#edit_region_form').serialize();
                                    $.ajax({
                                    url:'<?php echo site_url('regions/update/'.$details[0]["region_id"]); ?>',
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