<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="pull-left">
            <?php echo @$title; ?>
            <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="loader1" style="margin-top:-4px;margin-left:0px;"/>
        </h1>
     
        <div class="clearfix"></div>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <?php
                $msg = $this->session->flashdata('text');
                $class = $this->session->flashdata('class');
                if ($msg) {
                    echo '<div class="alert alert-' . $class . ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
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
                                <th>Email</th>
                                <th>Comment</th>                                
                                <th style="width:150px">Created</th>
                                <th class="actions" style="width:150px">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>

        </div>

    </section><!-- /.content -->
</aside>
<!--View Modal -->
<div class="modal fade" id="view_comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 50%;" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Review Details</h4>
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



<!--<script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>-->
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>

<script>

    $(document).ready(function () {
              
        
            ajax_datatable = $('table#ajax_datatable').dataTable({
            "bServerSide": true,
            "sAjaxSource": "<?php echo site_url('comments/get_comment_list/'); ?>",
            "sPaginationType": "full_numbers",
            "fnServerData": function (sSource, aoData, fnCallback)
            {
                $('#loader1').show();
              
                $.ajax({
                    "dataType": 'json',
                    "type": "POST",
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback
                });
            },
               "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                if(aData[5]==1)
                {
                  $(nRow).find("td").css('background-color', 'rgb(255, 237, 210)');//pending
                }
                 if(aData[5]==2)
                {
                  $(nRow).find("td").css('background-color', 'rgb(209, 248, 232)');//approved
                }
                 if(aData[5]==3)
                {
                  $(nRow).find("td").css('background-color', 'rgb(248, 209, 209)');//disapproved
                }
                
                
             },      
            "fnDrawCallback": function () {
                $('#loader1').fadeOut();
            },
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                var links = "";

                 if(aData[5]=="1"){ 
                    links += '<a class="btn btn-xs btn-success update_c_status comment_pending" href="#" title="Approve Comment" data-comment_id="'+aData[4]+'" data-status="2"  style="margin-right:5px;" ><span class="glyphicon glyphicon-ok"></span></a>';
                    links += '<a class="btn btn-xs btn-warning update_c_status comment_pending" href="#" title="Disapprove Comment" data-comment_id="'+aData[4]+'" data-status="3"  style="margin-right:5px;"  ><span class="glyphicon glyphicon-remove"></span></a>';
           }
            if(aData[5]=="2"){ 
                   links += '<a class="btn btn-xs btn-warning update_c_status" href="#" title="Disapprove Comment" data-comment_id="'+aData[4]+'"  data-status="3"  style="margin-right:5px;"  ><span class="glyphicon glyphicon-remove"></span></a>';
           }
            if(aData[5]=="3"){ 
                    links += '<a class="btn btn-xs btn-success update_c_status" href="#" title="Approve Comment" data-comment_id="'+aData[4]+'"  data-status="2"  style="margin-right:5px;"  ><span class="glyphicon glyphicon-ok"></span></a>';
           }
                links += '<a href="#" data-comment_id="' + aData[4] + '" title="View" class="btn btn-info btn-xs view_comment"  style="margin-right:5px;"><span class="glyphicon glyphicon-search"></span></a>';
                links += '<a href="#" data-comment_id="' + aData[4] + '" title="Delete" class="btn btn-danger btn-xs delete_comment"  style="margin-right:5px;"><span class="glyphicon glyphicon-trash"></span></a>';
                $('td:eq(4)', nRow).html(links);

                if(aData[2].length >75)
                {
                var  short_comment = aData[2].substring(0,75);
                 $('td:eq(2)', nRow).html(short_comment+'.......');
                }
               
                
                var dateSplit = aData[3].split("-");
                day = dateSplit[2].split(' ');
                var curr_date = day[0];
                var curr_month = dateSplit[1]; //Months are zero based
                var curr_year = dateSplit[0];
                $('td:eq(3)', nRow).html(curr_month + "-" + curr_date + "-" + curr_year);



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
                },
               

            ],
                 
        });
        
      
        });//ready
    
    
      //update status
  
   $(document).on('click','.update_c_status',function(e){
    e.preventDefault();
    cid = $(this).attr('data-comment_id')
    status  = $(this).attr('data-status');
     $('#loader1').show();
     $.ajax({
        url: '<?php echo site_url('comments/update_comment_status/'); ?>/'+cid+'/'+status,
        dataType:'json',
        type:'POST',
        success:function(result){
            if(result.status==1){
                 $('#alert_area').empty().html('<div class="alert alert-' + result.class + '  alert-dismissable" id="disappear"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + result.message + '</div>');
                        setTimeout(function () {
                            $('#disappear').fadeOut('slow')
                        }, 3000);
                        $('#loader1').fadeOut();
                 ajax_datatable.fnDraw();
            }
         }
       });              
    
});
    
  
//view comment 

   //function for view video details
        $(document).on('click', '.view_comment', function (e) {
            e.preventDefault();
            id = $(this).attr('data-comment_id');
            $.ajax({
                url: '<?php echo site_url('comments/view_comment/') ?>/' + id,
                dataType: 'html',
                success: function (result)
                {
                    $('#response_view').html(result);
                }
            });
            $('#view_comment').modal('show');
        })




       //Delete comment
        $(document).on('click', '.delete_comment', function (e) {
            e.preventDefault();
            var response = confirm('Are you sure want to delete?');
            if (response)
            {
                id = $(this).attr('data-comment_id');
                $('#loader1').show();
                $.ajax({
                    url: '<?php echo site_url('comments/delete_comment/') ?>/' + id,
                    dataType: 'json',
                    success: function (result)
                    {

                        $('#alert_area').empty().html('<div class="alert alert-' + result.class + '  alert-dismissable" id="disappear"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + result.message + '</div>');
                        setTimeout(function () {
                            $('#disappear').fadeOut('slow')
                        }, 3000);
                        $('#loader1').fadeOut();
                        ajax_datatable.fnDraw();
                    }
                });
            }
            else
            {
                return false;

            }

        });
$(document).on('click','.comment_pending' ,function(){
  update_approval_count(); 
});        
        
</script>
