<?php

?>
 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 class="pull-left">
                        <?php echo @$title; ?>
                        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="loader1" style="margin-top:-4px;margin-left:0px;"/>
                    </h1>
                    <div class="pull-right" >
                    <a href="#" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#add_store_owner" ><span class="glyphicon glyphicon-plus-sign "></span>  Add</a>
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
                                                   <th>Store Name</th>
                                                   
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




 


   <!--View Store List model -->
<div class="modal fade" id="view_store_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 65%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Stores</h4>
      </div>
      <div class="modal-body">
       <div id="response_view_store_list"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
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
            "sAjaxSource": "<?php echo site_url('store/get_store_list')."/".$store_id; ?>",
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
            
            links += '<a href="#" data-staff_id="'+aData[4]+'" title="View Details" class="btn btn-primary btn-xs view_store" style="margin-right:5px;" ><span class="glyphicon glyphicon-search"></span></a>';  
            
            if(aData[2]==3)
            links +='<a href="#" data-staff_id="'+aData[4]+'" title="Approve" class="btn btn-success btn-xs approve_store"  style="margin-right:5px;"><span class="fa fa-check"></span></a>';
            else
            links +='<a href="#" data-staff_id="'+aData[4]+'" title="Disapprove" class="btn btn-danger btn-xs disapprove_store"  style="margin-right:5px;"><span class="fa fa-times"></span></a>';
            
            $('td:eq(2)', nRow).html( links);
            
            
           

            var dateSplit = aData[1].split("-");            
            day = dateSplit[2].split(' ');
            var curr_date = day[0];
            var curr_month = dateSplit[1]; //Months are zero based
            var curr_year = dateSplit[0];
            $('td:eq(1)', nRow).html(curr_month + "-" + curr_date + "-" + curr_year );
			
            
            
            return nRow;
		},
        aoColumnDefs: [
       
          {
             bSortable: false,
             aTargets: [2]
          },
        
          
          {
             bSearchable: false,
             aTargets: [2]
          }
        ]
    });  
    
 





 //View user
 $(document).on('click','.view_store',function(e){
    e.preventDefault();
    id = $(this).attr('data-staff_id');
    $.ajax({
       url:'<?php echo site_url('store/view_store_details/') ?>/'+id,
       dataType: 'html',
       success:function(result)
       {
        $('#response_view_store_list').html(result);
       } 
    });
    $('#view_store_modal').modal('show');
 });
  
//Region disable
  $(document).on('click','.disapprove_store',function(e){
    e.preventDefault();
    
    var response = confirm('Are you sure want to disapprove this store?');
    if(response)
    {
    id = $(this).attr('data-staff_id');
    $('#loader2').show();
    $.ajax({
        url:'<?php echo site_url('store/disapprove_store/')?>/'+id,
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
  $(document).on('click','.approve_store',function(e){
    e.preventDefault();
    id=$(this).attr('data-staff_id');
    $('#loader2').show();
    $.ajax({
        url:'<?php echo site_url('store/approve_store/')?>/'+id,
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