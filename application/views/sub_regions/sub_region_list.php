<?php
$sub_region_name = array(
  'name'  => 'sub_region_name',
  'id'  => 'sub_region_name',
  'value' => set_value('sub_region_name'),
  'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Sub Region Name'
);
$latitude= array(
    'name'  => 'latitude',
    'id'  => 'latitude',
    'value' => set_value('latitude'),
    'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Latitude'

);
$longitude= array(
    'name'  => 'longitude',
    'id'  => 'longitude',
    'value' => set_value('longitude'),
    'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' => 'Longitude'

);
$address = array(
    'name'  => 'address',
    'id'  => 'address',
    'value' => set_value('address'),
    'class' => 'form-control',
    'placeholder' => 'Address'
    
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
                    <a href="#" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#add_sub_region" ><span class="glyphicon glyphicon-plus-sign "></span>  Add</a>
                    
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
                                                   <th>Sub Region Name</th>
                                                   <th>Region Name</th>
                                                   <th>Created By</th>
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
        <h4 class="modal-title" id="myModalLabel">Sub Region Details</h4>
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
<div class="modal fade" id="add_sub_region" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Region</h4>
      </div>
      <div class="modal-body">
       <form role="form" id="sub_region_add_form" name="sub_region_add_form">
       
            
               <div class="form-group">
                <label class="control-label" for="dir_id">Region</label>
                 
                 <?php echo form_dropdown('region_id',@$regions,'0','class = form-control id = region_id'); ?>
                 <span class="red" id="topic_err"><?php echo form_error(@$regions['name']); ?><?php echo isset($errors[@$regions['name']])?$errors[$regions['name']]:''; ?></span>
                </div>
          
              
               <div class="form-group">
                <label class="control-label" for="login">Sub Region Name:</label>
                 <?php echo form_input($sub_region_name); ?>
                 <span class="red" id="region_err"><?php echo form_error($sub_region_name['name']); ?><?php echo isset($errors[$sub_region_name['name']])?$errors[$sub_region_name['name']]:''; ?></span>
                </div>
                <div class="row">
                <div class="form-group col-md-6">
                <label class="control-label" for="login">Latitude:</label>
                 <?php echo form_input($latitude); ?>
                 <span class="red" id="region_err"><?php echo form_error($latitude['name']); ?><?php echo isset($errors[$latitude['name']])?$errors[$latitude['name']]:''; ?></span>
                </div>
                
                <div class="form-group col-md-6">
                 <label class="control-label" for="login">Longitude:</label>
                 <?php echo form_input($longitude); ?>
                 <span class="red" id="region_err"><?php echo form_error($longitude['name']); ?><?php echo isset($errors[$longitude['name']])?$errors[$longitude['name']]:''; ?></span>
                </div>
                </div>
                 <div class="form-group">
                 <label class="control-label" for="login">Address:</label>
                 <?php echo form_input($address); ?>
                 <span class="red" id="region_err"><?php echo form_error($address['name']); ?><?php echo isset($errors[$address['name']])?$errors[$address['name']]:''; ?></span>
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







 <!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Sub Region</h4>
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
            "sAjaxSource": "<?php echo site_url('sub_regions/get_sub_region_list'); ?>",
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
            
            links += '<a href="#" data-region_id="'+aData[5]+'" title="View Details" class="btn btn-primary btn-xs view_user" style="margin-right:5px;" ><span class="glyphicon glyphicon-search"></span></a>';  
            links += '<a href="#" data-region_id="'+aData[5]+'" title="Edit Details" class="btn btn-primary btn-xs edit_user" style="margin-right:5px;" ><span class="glyphicon glyphicon-pencil"></span></a>';  
            if(aData[4]=='1')
            links +='<a href="#" data-region_id="'+aData[5]+'" title="Enable"class="btn btn-success btn-xs enable_region" style="margin-right:5px;"><span class="fa fa-check"></sapn>';
            else
            links +='<a href="#" data-region_id="'+aData[5]+'" title="Disable"class="btn btn-warning btn-xs disable_region" style="margin-right:5px;"><span class="fa fa-times"></sapn>';
            
            links +='<a href="#" data-region_id="'+aData[5]+'" title="Delete" class="btn btn-danger btn-xs delete_user"  style="margin-right:5px;"><span class="glyphicon glyphicon-trash"></span></a>';
            $('td:eq(4)', nRow).html( links);
            
            
            if(aData[2]==1) var role_name = 'Administrator';
            if(aData[2]==2) var role_name = 'Reviewer';
            $('td:eq(2)', nRow).html(role_name);

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
        return false;
    }
    else{
       $("#"+address).css('border','1px solid #cccccc');  
       return true;
    }  
    }

 $("#sub_region_add_form").submit(function(e){

  e.preventDefault();
  if($.trim($('#region_id').val())=='0'){
        $('#region_id').css('border','1px solid red');
        $('#region_id').focus();return false;
    }
    else{
       $('#region_id').css('border','1px solid #cccccc');  
    }

    if($.trim($('#sub_region_name').val())==""){
        $('#sub_region_name').css('border','1px solid red');
        $('#sub_region_name').focus();return false;
    }
    else{
       $('#sub_region_name').css('border','1px solid #cccccc');  
    }
      //var response_latitude_longitude =   validate_latitude_longitude('latitude','longitude');
      //var response_address =   validate_address('address');
      
      if(!validate_latitude_longitude('latitude','longitude'))
      {
        var response_address =   validate_address('address');
      }else{
        $("#address").css('border','1px solid #cccccc');
        var response_address = true;  
      }
      if(!validate_address('address'))
      {
        var response_latitude_longitude =   validate_latitude_longitude('latitude','longitude');
      }else
      {
         $("#latitude").css('border','1px solid #cccccc');
         $("#longitude").css('border','1px solid #cccccc');
             var response_latitude_longitude= true;
      }
      if(!response_latitude_longitude || !response_address)
      return false;
      
      

   

    $('#loader').fadeIn();
    var values = $('#sub_region_add_form').serialize();
    $.ajax({
    url:'<?php echo site_url('sub_regions/add'); ?>',
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
        $('#sub_region_add_form')[0].reset();
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






//Edit user
 $(document).on('click','.edit_user',function(e){
    e.preventDefault();
    $('#edit_form_response').empty();
    id = $(this).attr('data-region_id');
    $.ajax({
       url:'<?php echo site_url('sub_regions/edit_sub_region/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        $('#edit_form_response').html(result);
       } 
    });
    $('#editModal').modal('show');
 }); 

//function for view sub region details
$(document).on('click','.view_user',function(e){
    e.preventDefault();
    id = $(this).attr('data-region_id');
    $.ajax({
       url:'<?php echo site_url('sub_regions/view_sub_region/') ?>/'+id,
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
    var response = confirm('Are you sure want to delete this sub region?');
    if(response){
    id = $(this).attr('data-region_id');
    $.ajax({
       url:'<?php echo site_url('sub_regions/delete_sub_region/') ?>/'+id,
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
  $(document).on('click','.disable_region',function(e){
    e.preventDefault();
    
    var response = confirm('Are you sure want to disable this sub region?');
    if(response)
    {
    id = $(this).attr('data-region_id');
    $('#loader2').show();
    $.ajax({
        url:'<?php echo site_url('sub_regions/disable_sub_region/')?>/'+id,
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
  $(document).on('click','.enable_region',function(e){
    e.preventDefault();
    id=$(this).attr('data-region_id');
    $('#loader2').show();
    $.ajax({
        url:'<?php echo site_url('sub_regions/enable_sub_region/')?>/'+id,
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