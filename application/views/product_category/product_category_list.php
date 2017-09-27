<?php
$product_cat_name = array(
  'name'  => 'product_cat_name',
  'id'  => 'product_cat_name',
  'value' => set_value('product_cat_name'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Category Name'
);






?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.multiselect.filter.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.multiselect.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-ui-1.8.23.custom.css'); ?>" />

<style>
.ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl
{
      border-top-left-radius:0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
}
.ui-multiselect-all span,.ui-multiselect-none span
{
    font-size: 10px;
    color:#333;
}

#upper_content { 
    position: relative;
   
    margin: 10px;
    
}

.ui-multiselect-checkboxes label {
font-size: 12px;
padding: 0px 5px;
}
.ui-state-default .ui-icon {
    background-image: none;
}    
</style>
 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 class="pull-left">
                        <?php echo @$title; ?>
                        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="loader1" style="margin-top:-4px;margin-left:0px;"/>
                    </h1>
                    <div class="pull-right" >
                    <a href="#" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#add_product_cat" ><span class="glyphicon glyphicon-plus-sign "></span>  Add</a>
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
                                                   <th>Product Category Name</th>
                                                   <th>Created By</th>
                                                   <th>Created</th>
                                                   <th>Status</th>
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
<div class="modal fade" id="add_product_cat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Product Category</h4>
      </div>
      <div class="modal-body">
       <form role="form" id="add_product_cat_form" name="add_product_cat_form">
              
               <div class="clearfix"></div>   
               
                <div class="form-group">
                <label class="control-label" for="login">Product Category Name:</label>
                 <?php echo form_input($product_cat_name); ?>
                 <span class="red" id="region_err"><?php echo form_error($product_cat_name['name']); ?><?php echo isset($errors[$product_cat_name['name']])?$errors[$product_cat_name['name']]:''; ?></span>
                </div>
               <div class="clearfix"></div> 
               <div class="form-group">
                <label class="control-label" for="login">Selects Units:</label>
                <div class="clearfix"></div>
               <select name="product_units[]" multiple="multiple" style="width:558px" id="list_one_manager" class="form-control check" >
                            	<?php
                            if(count($product_units)>0)
                            {
                             foreach($product_units as $val)
                                {
                                    $add_on = "";                              
                                   echo '<option value="'.$val["product_unit_id"].'" '.$add_on.' >'.$val["unit_name"].'</option>';
                                }
                            }
                            ?>
                        	</select>
                         
                         </div>   
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
        <h4 class="modal-title" id="myModalLabel">Product Category Details</h4>
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




 <!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Product Category</h4>
      </div>
      <div id="edit_form_response">
      
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Delete Topic Modal -->
<div class="modal fade" id="delete_product_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirm</h4>
      </div>
      <div id="delete_form_response">
      
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui-1.8.23.custom.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.multiselect.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.multiselect.filter.min.js')?>"></script>

<script>
$(document).ready(function(){
   
        $("#list_one_manager").multiselect().multiselectfilter();
        
        
   
        
       var filter = 0; 
       ajax_datatable = $('table#ajax_datatable').dataTable({
            "bServerSide": true,
            "sAjaxSource": "<?php echo site_url('product_categories/get_product_category_list'); ?>",
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
            
            links += '<a href="#" data-cat_id="'+aData[4]+'" title="View Details" class="btn btn-primary btn-xs view_product_cat" style="margin-right:5px;" ><span class="glyphicon glyphicon-search"></span></a>';  
            
            links += '<a href="#" data-cat_id="'+aData[4]+'" title="Edit Details" class="btn btn-primary btn-xs edit_product_cat" style="margin-right:5px;" ><span class="glyphicon glyphicon-pencil"></span></a>';  
             if(aData[3]=='2')
            links +='<a href="#" data-cat_id="'+aData[4]+'" title="Enable"class="btn btn-success btn-xs enable_product_cat" style="margin-right:5px;"><span class="fa fa-check"></sapn>';
            else
            links +='<a href="#" data-cat_id="'+aData[4]+'" title="Disable"class="btn btn-warning btn-xs disable_product_cat" style="margin-right:5px;"><span class="fa fa-times"></sapn>';
            
            links +='<a href="#" data-cat_id="'+aData[4]+'" title="Delete" class="btn btn-danger btn-xs delete_product_cat"  style="margin-right:5px;"><span class="glyphicon glyphicon-trash"></span></a>';
            $('td:eq(4)', nRow).html( links);
            
            
           

            var dateSplit = aData[2].split("-");            
            day = dateSplit[2].split(' ');
            var curr_date = day[0];
            var curr_month = dateSplit[1]; //Months are zero based
            var curr_year = dateSplit[0];
            $('td:eq(2)', nRow).html(curr_month + "-" + curr_date + "-" + curr_year );
            
             if(aData[1]==1) var role_name = 'Administrator';
            if(aData[1]==2) var role_name = 'Reviewer';
            $('td:eq(1)', nRow).html(role_name);
            
             if(aData[3]==1) var role_name = 'Active';
            if(aData[3]==2) var role_name = 'Suspended';
            $('td:eq(3)', nRow).html(role_name);
			
            
            
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
    
 

 $("#add_product_cat_form").submit(function(){

   if($.trim($('#product_cat_name').val())==""){
        $('#product_cat_name').css('border','1px solid red');
        $('#product_cat_name').focus();return false;
    }
    else{
       $('#product_cat_name').css('border','1px solid #cccccc');  
    }
    
    var options = $('#list_one_manager > option:selected');
     if(options.length == 0){
        
        $('.ui-multiselect').css('border','1px solid red');
        $('.ui-multiselect').focus();return false;
        }else
        {
           $('.ui-multiselect').css('border','1px solid #cccccc'); 
        }
        
    

    
    $('#loader').fadeIn();
    var values = $('#add_product_cat_form').serialize();
    $.ajax({
    url:'<?php echo site_url('product_categories/add'); ?>',
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
        $('#add_product_cat_form')[0].reset();
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
 $(document).on('click','.view_product_cat',function(e){
    e.preventDefault();
    id = $(this).attr('data-cat_id');
    $.ajax({
       url:'<?php echo site_url('product_categories/view_product_category/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        $('#response_view').html(result);
       } 
    });
    $('#view_modal').modal('show');
 });
  


//Edit user
 $(document).on('click','.edit_product_cat',function(e){
    e.preventDefault();
    id = $(this).attr('data-cat_id');
    $.ajax({
       url:'<?php echo site_url('product_categories/edit_product_category/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        $('#edit_form_response').html(result);
       } 
    });
    $('#editModal').modal('show');
 }); 


 


  //delete_topic
 $(document).on('click','.delete_product_cat',function(e){
    e.preventDefault();
     $('#delete_form_response').empty();
     id = $(this).attr('data-cat_id');
    $.ajax({
       url:'<?php echo site_url('product_categories/delete_product_category/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        
        $('#delete_form_response').html(result);
       } 
    });
    $('#delete_product_category').modal('show');
    
 });   
//Region disable
  $(document).on('click','.disable_product_cat',function(e){
    e.preventDefault();
    
    var response = confirm('Are you sure want to disable this product category?');
    if(response)
    {
    id = $(this).attr('data-cat_id');
    $('#loader2').show();
    $.ajax({
        url:'<?php echo site_url('product_categories/disable_product_category/')?>/'+id,
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
  $(document).on('click','.enable_product_cat',function(e){
    e.preventDefault();
    id=$(this).attr('data-cat_id');
    $('#loader2').show();
    $.ajax({
        url:'<?php echo site_url('product_categories/enable_product_category/')?>/'+id,
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
 

</script>