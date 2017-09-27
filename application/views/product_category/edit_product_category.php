<?php
$product_cat_name = array(
  'name'  => 'product_cat_name_edit',
  'id'  => 'product_cat_name_edit',
  'value' => set_value('product_cat_name_edit',$details[0]['product_category_name']),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Category Name'
);

if(count($product_units)>0)
{
 $list_ids = array();   
 foreach($product_units as $val)
 {
    array_push($list_ids,$val["product_unit_id"]);
 }
}
?>
<form role="form" id="edit_product_category" name="edit_product_category">
 <div class="modal-body" style="overflow: auto;">
          <div class="form-group">
                <label class="control-label" for="login">Product Category Name:</label>
                 <?php echo form_input($product_cat_name); ?>
                 <span class="red" id="region_err"><?php echo form_error($product_cat_name['name']); ?><?php echo isset($errors[$product_cat_name['name']])?$errors[$product_cat_name['name']]:''; ?></span>
                </div>
               <div class="clearfix"></div> 
               <div class="form-group">
                <label class="control-label" for="login">Selects Units:</label>
                <div class="clearfix"></div>
               <select name="product_units_edit[]" multiple="multiple" style="width:558px" id="list_one_manager_edit" class="form-control" >
                            	<?php
                            if(count($product_all_units)>0)
                            {
                             foreach($product_all_units as $val)
                                {                                   
                                if(is_int(array_search($val["product_unit_id"],$list_ids))) {$add_on = 'selected="selected"';}
                                else  {$add_on = "";}                              
                                   echo '<option value="'.$val["product_unit_id"].'" '.$add_on.' >'.$val["unit_name"].'</option>';
                                }
                            }
                            ?>
                        	</select>
                         </div>                    
       </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success pull-right">Update</button>
         <button type="button" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right: 5px;">Back</button>
        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="edit_product_category_loader" class="pull-right" style="display: none;"/>
          <div class="clearfix"></div>
          <div id="edit_product_category_res" style="margin-top:5px;"></div>
      </div>
      </form>
<script>
 $(document).ready(function(){
     $("#list_one_manager_edit").multiselect().multiselectfilter();
 $("#edit_product_category").submit(function(){
    if($.trim($('#product_cat_name_edit').val())==""){
        $('#product_cat_name_edit').css('border','1px solid red');
        $('#product_cat_name_edit').focus();return false;
    }
    else{
       $('#product_cat_name_edit').css('border','1px solid #cccccc');  
    }
      if($.trim($('#list_one_manager_edit').val())=='0'){
        $('#list_one_manager_edit').css('border','1px solid red');
        $('#list_one_manager_edit').focus();return false;
    }
    else{
       $('#list_one_manager_edit').css('border','1px solid #cccccc');  
    }
                            $('#edit_product_category_loader').fadeIn();
                                    var values = $('#edit_product_category').serialize();
                                    $.ajax({
                                    url:'<?php echo site_url('product_categories/update/'.$details[0]["product_category_id"]); ?>',
                                    dataType:'json',
                                    type:'POST',
                                    data:values,
                                    success:function(result){
                                     if(result.status==1)
                                     {
                                        $('#edit_product_category_res').html('<div class="alert alert-success" id="disappear0" style="margin-top:5px;"  >'+result.message+'</div>'); 
                                        setTimeout(function(){$('#disappear0').fadeOut('slow')},3000)
                                        $('#edit_product_category_loader').fadeOut();
                                        ajax_datatable.fnDraw();
                                     }
                                     else
                                     {
                                        $('#edit_product_category_res').empty().html('<div class="alert alert-danger" id="disappear1"  style="margin-top:5px;" >'+result.message+'</div>');
                                         setTimeout(function(){$('#disappear1').fadeOut('slow')},3000)
                                        $('#edit_product_category_loader').fadeOut();
                                     } 
                                    }
                                   }); // inner ajax                    
                            return false;
                        });
                    });
                    </script>