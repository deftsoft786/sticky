<?php
//echo "<pre>";
//print_r($product_cost);
//die;
//Product Tab
$product_name=array(
    'name'  => 'product_name_edit',
    'id'  => 'product_name_edit',
    'value' => set_value('product_name_edit',$details[0]["product_name"]),
    'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Product Name'
    );
    $product_description = array(
  'name'  => 'product_description_edit',
  'id'  => 'product_description_edit',
  'value' => set_value('product_description_edit',$details[0]["description"]),
  'class' => 'form-control',
  'placeholder' => 'Description',
   'rows'        => '5',
   'cols'        => '10'
);
?>
<form role="form" id="edit_product" name="edit_product">
 <div class="modal-body" style="overflow: auto;">
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
                 <?php echo form_dropdown('product_category_id',@$product_categories,$details[0]['product_category_id'],'class = form-control id = product_category_id_for_product_edit'); ?>
                 <span class="red" id="topic_err"><?php echo form_error(@$product_categories['name']); ?><?php echo isset($errors[@$product_categories['name']])?$errors[$product_categories['name']]:''; ?></span>
                </div>
                <div class="clearfix"></div>
                <div id="cost_input_box">
                <?php if($product_cost){  echo'<div class="row">'; $i=1;
                 foreach($product_cost as $var){ 
                  echo'<div class="col-md-3"><div class="form-group"><input type="text" name="edit_product_cost[]" value="'.$var["cost"].'" id="product_name_edit_'.$i.'" maxlength="80" class="form-control edit_product_cost" placeholder="'.$var["unit_label"].'"><input type="hidden" name="product_units[]" value="'.$var["product_unit_id"].'" id="product_cost_hidden_edit" maxlength="80" class="form-control" placeholder="Product Cost"></div></div>';
                    $i++;
                    }
                    echo '</div>'; 
                    }?>
                </div>
                 <div id="add_text_box_on_edit"></div>
                  <div class="clearfix"></div>                 
       </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success pull-right">Update</button>
         <button type="button" class="btn btn-default pull-right" data-dismiss="modal" style="margin-right: 5px;">Back</button>
        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="edit_product_loader" class="pull-right" style="display: none;"/>
          <div class="clearfix"></div>
          <div id="edit_product_res" style="margin-top:5px;"></div>
          <div id="add_product_res_edit" style="margin-top:5px;"></div>
          
      </div>
      </form>
<script>
 $(document).ready(function(){
    $('#product_category_id_for_product_edit').change(function(){
     var product_cat_id=$('#product_category_id_for_product_edit').val();
     console.log(product_cat_id);
       $.ajax({
    url:'<?php echo site_url('products/get_unit_count/'.$details[0]["store_id"])."/"; ?>'+product_cat_id,
    dataType:'json',
    type:'POST',
    data:{product_cat:product_cat_id},
    success:function(result){
        
     if(result.status==1)
     {
        $('#cost_input_box').empty();
        $('#add_text_box_on_edit').html(result.message);
        $('#add_product_res_edit').empty();
        
     }
     else
     {
        $('#add_product_res_edit').empty().html('<div class="alert alert-danger">'+result.message+'</div>');
        $('#cost_input_box').empty();
         $('#add_text_box_on_edit').empty();
        $('#loader_add_product').fadeOut();
     } 
    }
   }); 
   return false
    });
 $("#edit_product").submit(function(){
    var i=1;
    var cost_array_length = $("input[name ='edit_product_cost[]']").length;
    for(i;i<=cost_array_length;i++){
   if($.trim($(".edit_product_cost").val())==""){
        $(".edit_product_cost").css('border','1px solid red');
        $(".edit_product_cost").focus();
        return false;
    }
    else{
       $(".edit_product_cost").css('border','1px solid #cccccc');  
    }
    }
   if($.trim($('#product_category_id_for_product_edit').val())=='0'){
        $('#product_category_id_for_product_edit').css('border','1px solid red');
        $('#product_category_id_for_product_edit').focus();return false;
    }
    else{
       $('#product_category_id_for_product_edit').css('border','1px solid #cccccc');  
    }
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
    
    
    
   
                            $('#edit_product_loader').fadeIn();
                                    var values = $('#edit_product').serialize();
                                    $.ajax({
                                    url:'<?php echo site_url('products/update/'.$details[0]["product_id"])."/"; ?>'+$("#product_category_id_for_product_edit option:selected").val(),
                                    dataType:'json',
                                    type:'POST',
                                    data:values,
                                    success:function(result){
                                     if(result.status==1)
                                     {
                                        $('#edit_product_res').html('<div class="alert alert-success" id="disappear0" style="margin-top:5px;"  >'+result.message+'</div>'); 
                                       
                                        setTimeout(function(){$('#disappear0').fadeOut('slow')},3000)
                                        $('#edit_product_loader').fadeOut();
                                        ajax_datatable.fnDraw();
                                     }
                                     else
                                     {
                                        $('#edit_product_res').empty().html('<div class="alert alert-danger" id="disappear1"  style="margin-top:5px;" >'+result.message+'</div>');
                                         setTimeout(function(){$('#disappear1').fadeOut('slow')},3000)
                                        $('#edit_product_loader').fadeOut();
                                     } 
                                    }
                                   }); // inner ajax                    
                            return false;
                        });
                    });
                    </script>