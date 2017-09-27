<?php
    

$deal=array(
  'name'  => 'deal_edit',
  'id'  => 'deal_edit',
  'value' => set_value('deal',@$deals[0]['deal']),
  'class' => 'form-control',
  'placeholder' => 'Deal Title',
  
);

$deal_description = array(
  'name'  => 'deal_description_edit',
  'id'  => 'deal_description_edit',
  'value' => set_value('deal_description',@$deals[0]['description']),
  'class' => 'form-control',
  'placeholder' => 'Description',
   'rows'        => '5',
   'cols'        => '10'
); 
$how_to_use = array(
  'name'  => 'how_to_use_edit',
  'id'  => 'how_to_use_edit',
  'value' => set_value('how_to_use',@$deals[0]['how_to_use']),
  'class' => 'form-control',
  'placeholder' => 'How to use',
  'rows'        => '5',
  'cols'        => '10'
);
$terms_of_use = array(
  'name'  => 'terms_of_use_edit',
  'id'  => 'terms_of_use_edit',
  'value' => set_value('terms_of_use',@$deals[0]['terms_of_use']),
  'class' => 'form-control',
  'placeholder' => 'Terms of Use',
  'rows'        => '5',
  'cols'        => '10'
);


$deal_slug = array(
  'name'  => 'deal_slug',
  'id'  => 'deal_slug',
  'value' => set_value('deal_slug',@$deals[0]["deals_slug"]),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Deal Slug'
);

?>
               
 <form role="form" id="edit_deal_form" name="edit_deal_form">
 <div class="modal-body" style="overflow: auto;">
     
<div class="clearfix"></div>   
               <div class="form-group">
               <div class="col-md-6">
                <div class="form-group">
                <label class="control-label" for="street">Deal Title:</label>
                 <?php echo form_input($deal); ?>
                 <span class="red" id="region_err"><?php echo form_error($deal['name']); ?><?php echo isset($errors[$deal['name']])?$errors[$deal['name']]:''; ?></span>
                                 
                </div>
                <div class="form-group">
                <label class="control-label" for="topic"> Deal  Slug</label>
                 <?php echo form_input($deal_slug); ?>
                 <span class="red" id="region_err"><small style="color: red;">Please edit with caution, will effect URL.</small><?php echo form_error($deal_slug['name']); ?><?php echo isset($errors[$deal_slug['name']])?$errors[$deal_slug['name']]:''; ?></span>
                
                </div>
                <div class="form-group">
                <label class="control-label" for="street">Description:</label>
                 <?php echo form_textarea($deal_description); ?>
                 <span class="red" id="region_err"><?php echo form_error($deal_description['name']); ?><?php echo isset($errors[$deal_description['name']])?$errors[$deal_description['name']]:''; ?></span>
                </div>
                <div class="form-group">         
                <label class="control-label" for="dir_id">Product Category:</label>                 
                 <?php echo form_dropdown('product_category_id',@$product_categories,$deals[0]['product_category_id'],'class = form-control id = profuct_category_id_edit'); ?>
                 <span class="red" id="topic_err"><?php echo form_error(@$product_categories['name']); ?><?php echo isset($errors[@$product_categories['name']])?$errors[$product_categories['name']]:''; ?></span>
                </div>
                </div> 
               <div class="col-md-6">
               
              <div id="upload_file_deal_edit" style="float: left;">
               <?php if($deals[0]['deal_image']){ ?>
                <div class="thumbnail" style="width: 200px; height: 150px;">
	           <img src="<?php echo base_url('uploads/deals_images')."/".$deals[0]['deal_image'];?>" style="width: 200px; height: 130px; alt="">
               <input type="hidden" value="<?php echo $deals[0]['deal_image'];?>" name="deal_avater" />
               </div>
               <?php }else{ ?>
                
               <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
	           <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
               </div>
               
               <?php } ?>
               </div>
             
             <a href="#" class="btn btn-success btn-sm" id="upload_deal_link_edit" style="margin-left: 10px;"><span class="glyphicon glyphicon-plus-sign"style="margin-right: 5px;"></span>Upload</a>
            
             
                 </div>
                </div>
                 <div class="clearfix"></div> 
                 <div class="form-group">
                 
                 
                 <div class="col-md-6">
               
                 <label class="control-label" for="street">Start Time:</label>
                 <input type="text" name="start_time_edit" id="start_time_edit" class="form-control" value="<?php if($deals[0]["start_time"]!="" && $deals[0]["start_time"]!='0000-00-00 00:00:00') echo date('d.m.Y H:i',strtotime($deals[0]["start_time"])); else echo "-"; ?>" />
                 <span class="red" id="topic_err"><?php echo form_error('start_time_edit'); ?><?php echo isset($errors['start_time_edit'])?$errors['start_time_edit']:''; ?></span>
                
                </div>
               
                <div class="col-md-6">
                 <label class="control-label" for="street">End Time:</label>
                 <div id="end_time_edit_err"></div>
                  <input type="text" name="end_time_edit" id="end_time_edit" class="form-control" value="<?php if($deals[0]["end_time"]!="" && $deals[0]["end_time"]!='0000-00-00 00:00:00') echo date('d.m.Y H:i',strtotime($deals[0]["end_time"])); else echo "-"; ?>" />
                 <span class="red" id="topic_err"><?php echo form_error('end_time_edit'); ?><?php echo isset($errors['end_time_edit'])?$errors['end_time_edit']:''; ?></span>
                
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
       
        <button type="submit" class="btn btn-success pull-right">Update</button>
         <button type="button" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right: 5px;">Back</button>
        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="loader_edit" class="pull-right" style="display: none;"/>
          <div class="clearfix"></div>
          <div id="edit_deal_res" style="margin-top:5px;"></div>
      </div>
      </div>
      </form>
       <form name="attachment_form_deal_edit"  id="attachment_form_deal_edit"  action="<?php echo site_url('deals/do_upload'); ?>" method="post" accept-charset="utf-8" >
            <input type="file" name="image_file" value="" id="image_file_2" style="display:none;"  /> 
            <input  type="hidden" name="path" value="deals_images"/>
            </form>
                   
      
<script>
$(function () {
        $("#start_time_edit").datetimepicker({
            format:'d.m.Y H:i',           
        });
        });
        
        $(function () {
        $("#end_time_edit").datetimepicker({
            format:'d.m.Y H:i',
            onShow:function( ct ){
            this.setOptions({
            minDate:jQuery('#start_time_edit').val()?jQuery('#start_time_edit').val():false           
            })
        },           
        });
        });
 $(document).ready(function(){
                             
 
 //Submit add form
    $("#edit_deal_form").submit(function(){
         var start = $('#start_time_edit').val();
         var end = $('#end_time_edit').val();         

    if($.trim($('#deal_edit').val())==""){
        $('#deal_edit').css('border','1px solid red');
        $('#deal_edit').focus();return false;
    }
    else{
       $('#deal_edit').css('border','1px solid #cccccc');  
    }
    if(moment(end,"DD/MM/YYYY HH:mm:ss").diff(moment(start,"DD/MM/YYYY HH:mm:ss"))<0){
        
         $('#end_time_edit').css('border','1px solid red');
        $('#end_time_edit').focus();
        $('#end_time_edit_err').empty();
        $('#end_time_edit_err').html('<span style="color:red;">End time should be greater than start time.</span>');
        
        return false;
    }
    else{
       $('#end_time_edit').css('border','1px solid #cccccc');  
    
    }
    if($.trim($('#profuct_category_id_edit').val())=='0'){
        $('#profuct_category_id_edit').css('border','1px solid red');
        $('#profuct_category_id_edit').focus();return false;
    }
    else{
       $('#profuct_category_id_edit').css('border','1px solid #cccccc');  
    }
    
    $('#loader_edit').fadeIn();  
 

var values = $('#edit_deal_form').serialize();
    $.ajax({
    url:'<?php echo site_url('deals/update_deal/'.$deals[0]["deal_id"]); ?>',
    dataType:'json',
    type:'POST',
    data:values,
    success:function(result){
     console.log(result);  
     if(result.status==1)
     {
        
        $('#edit_deal_res').html('<div class="alert alert-success" id="disappear_add_1"  >'+result.message+'</div>'); 
        setTimeout(function(){$('#disappear_add_1').fadeOut('slow')},3000)
        $('#loader_edit').fadeOut();
        ajax_datatable.fnDraw();
        
        
     }
     else
     {
        
        $('#edit_deal_res').empty().html('<div class="alert alert-danger">'+result.message+'</div>');
        $('#loader_edit').fadeOut();
     } 
     
      
    }
   });  
 return false;
 });
 
 
 
 $('#upload_deal_link_edit').click(function(e){
       e.preventDefault();
       $('#image_file_2').trigger('click'); 
    });
    
    $('#image_file_2').change(function(){
         $("#attachment_form_deal_edit").submit();
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
            $('#upload_file_deal_edit').empty();
             $('#upload_file_deal_edit').append('<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="'+result.image_path+'" style="width: 200px; height: 130px; alt=""><input type="hidden" value="'+result.filename+'" name="deal_avater" /></div>');
           }
    },
    error: function()
    {
        alert(" ERROR: unable to upload files");
 
    }
 
}; 
$("#attachment_form_deal_edit").ajaxForm(options); 
    
 
 
 
 
 
                    });
                    </script>