<form role="form" id="delete_cat_form" name="delete_cat_form">
 <div class="modal-body" style="overflow: auto;">
  <p>Are you sure want to delete this Product category?</p>   
        <div class="form-group">
         
         <label class="control-label">
                    <input type="radio" class="cat_value" name="delete_cat" id="move" value="0" checked=""/> <small>Move products to another category.</small>
                  </label>   
                  <div class="clearfix"></div>
                  <?php echo form_dropdown('product_category_id',@$product_categories,$cat_id,'class = form-control, input-sm id = delete_cat_id style="display:none"'); ?>
                 <span class="red" id="topic_err"><?php echo form_error(@$product_categories['name']); ?><?php echo isset($errors[@$product_categories['name']])?$errors[$product_categories['name']]:''; ?></span>
                      
                 <div class="clearfix"></div>
         <label class="control-label">
                    <input type="radio" class="cat_value" name="delete_cat"id="delete_all" value="1" /> <small style="color: red;">Also delete all products under this category.</small>
                 </label>
                  </div>
 </div>
 
      <div class="modal-footer">
       <button type="submit" class="btn btn-success pull-right">Confirm</button>
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right: 5px;">Cancel</button>
        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="delete_cat_form_loader" class="pull-right" style="display: none;"/>
          <div class="clearfix"></div>
          <div id="delete_cat_form_res" style="margin-top:5px;"></div>
      </div>
</form>
<script>
$(document).ready(function(){
 $("#delete_cat_id").show();   
$(document).on('click','.cat_value',function(e){
    if($("#move").is(":checked"))
    $("#delete_cat_id").show();
    else
    $("#delete_cat_id").hide(); 
});
     
$("#delete_cat_form").submit(function(){
    
if ($("#move:checked").val()=='0') {
    if($.trim($('#delete_cat_id').val())=="0"){
        $('#delete_cat_id').css('border','1px solid red');
        $('#delete_cat_id').focus();return false;
    }
    else{
       $('#delete_cat_id').css('border','1px solid #cccccc');  
    }
}
        
$('#delete_cat_form_loader').fadeIn();
var values = $('#delete_cat_form').serialize();
$.ajax({
        url:'<?php echo site_url('product_categories/delete/'.$cat_id); ?>',
        dataType:'json',
        type:'POST',
        data:values,
        success:function(result){
        if(result.status==1)
        {
            $('#delete_cat_form_res').html('<div class="alert alert-success" id="disappear0" style="margin-top:5px;"  >'+result.message+'</div>'); 
            setTimeout(function(){$('#disappear0').fadeOut('slow');$('#delete_product_category').modal('hide'); },3000)
            $('#delete_cat_form_loader').fadeOut();
            ajax_datatable.fnDraw();
            
        }
        else
        {
            $('#delete_cat_form_res').empty().html('<div class="alert alert-danger" id="disappear1"  style="margin-top:5px;" >'+result.message+'</div>');
            setTimeout(function(){$('#disappear1').fadeOut('slow')},3000)
            $('#delete_cat_form_loader').fadeOut();
         } 
       }
       }); // inner ajax
     return false;
     });
});
</script>