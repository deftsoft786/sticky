<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$ban_reason = array(
  'name'  => 'ban_reason',
  'id'  => 'ban_reason',
  'placeholder' =>'Ban Reason',
  'class' => 'form-control',
  'placeholder' => 'Enter reason....'
);


?>
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
                                <th>Email</th>
                                <th>Created</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>

        </div>

    </section><!-- /.content -->
</aside>
<!--View user Modal -->
<div class="modal fade" id="view_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 50%;" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">User Details</h4>
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

<!--ban user Modal -->
<div class="modal fade" id="ban_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 50%;" >
        <div class="modal-content">
             <form name="ban_user_form" id="ban_user_form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ban Reason</h4>
            </div>
            <div class="modal-body">
            
              
                   
                <div class="form-group">
                         <label class="control-label">Ban Reason </label>
                         <?php echo form_textarea($ban_reason); ?>
                </div>
                <input type="hidden" name="ban_user_id" id="ban_user_id">
            </div>
            <div class="modal-footer">
                <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="ban_loader" style="display: none"/>
                <button type="submit"  class="btn btn-success" >Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
               
                <div id="ban_alert_area" style="margin-top: 10px"></div> 
            </div>
             </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script>
$(document).ready(function(){
            var filter = 0;
        ajax_datatable = $('table#ajax_datatable').dataTable({
            "bServerSide": true,
            "sAjaxSource": "<?php echo site_url('user/get_user_list'); ?>",
            "sPaginationType": "full_numbers",
            "fnServerData": function (sSource, aoData, fnCallback)
            {
                $('#loader1').show();
                aoData.push({name: "filter", value: filter});
                $.ajax({
                    "dataType": 'json',
                    "type": "POST",
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback
                });
            },
            "fnDrawCallback": function () {
                $('#loader1').fadeOut();
            },
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                var links = "";

                links += '<a href="#" data-user_id="' + aData[2] + '" title="View Details" class="btn btn-primary btn-xs view_user" style="margin-right:5px;" ><span class="glyphicon glyphicon-search"></span></a>';
                 if (aData[3] == '1')
                    links += '<a href="#" data-user_id="' +  aData[2] + '" title="Un Banned User" class="btn btn-success btn-xs unbanned_user" style="margin-right:5px;"><span class="fa fa-check"></sapn>';
                else
                    links += '<a href="#" data-user_id="' + aData[2] + '" title="Banned User" class="btn btn-warning btn-xs banned_user" style="margin-right:5px;"><span class="fa fa-times"></sapn>';
                $('td:eq(2)', nRow).html(links);



                var dateSplit = aData[1].split("-");
                day = dateSplit[2].split(' ');
                var curr_date = day[0];
                var curr_month = dateSplit[1]; //Months are zero based
                var curr_year = dateSplit[0];
                $('td:eq(1)', nRow).html(curr_month + "-" + curr_date + "-" + curr_year);



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
                },
            ]
        });
});

// view user

 $(document).on('click', '.view_user', function (e) {
            e.preventDefault();
            id = $(this).attr('data-user_id');
            $.ajax({
                url: '<?php echo site_url('user/view_user/') ?>/' + id,
                dataType: 'html',
                success: function (result)
                {
                    $('#response_view').html(result);
                }
            });
            $('#view_user').modal('show');
        })

//show Banned user model

$(document).on('click','.banned_user',function(e){
 e.preventDefault();
 document.getElementById('ban_user_form').reset();
 var ban_user_id = $(this).attr('data-user_id');
 $('#ban_user_id').val(ban_user_id);
 $('#ban_user').modal('show');
})



 //user Ban
        $(document).on('submit', '#ban_user_form', function (e) {
            e.preventDefault();

             //validation
             
              if ($.trim($('#ban_reason').val()) == "") {
                $('#ban_reason').css('border', '1px solid red');
                $('#ban_reason').focus();
                return false;
            }
            else {
                $('#ban_reason').css('border', '1px solid #cccccc');
            }


            var response = confirm('Are you sure want to Ban this user?');
            if (response)
            {
               
                $('#ban_loader').show();
                 var values = $('#ban_user_form').serialize();
                $.ajax({
                    url: '<?php echo site_url('user/ban_user') ?>',
                    dataType: 'json',
                     type:'POST',
                     data:values,
                    success: function (result)

                    {
                       if(result.status == 1)
                       {
                            $('#ban_alert_area').empty().html('<div class="alert alert-success alert-dismiss" id="disappear"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + result.message + '</div>');
                        setTimeout(function () {
                            $('#disappear').fadeOut('slow')
                        }, 3000);
                        ajax_datatable.fnDraw();
                        
                       }
                       else
                       {
                            $('#ban_alert_area').empty().html('<div class="alert alert-danger alert-dismiss" id="disappear"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + result.message + '</div>');
                        setTimeout(function () {
                            $('#disappear').fadeOut('slow')
                        }, 3000);
                       }
                       
                        $('#ban_loader').fadeOut();
                    }
                });
                return false;
            }
        });
 
//user UnBan

        $(document).on('click', '.unbanned_user', function (e) {
            e.preventDefault();

            id = $(this).attr('data-user_id');
            $('#loader2').show();
            $.ajax({
                url: '<?php echo site_url('user/un_ban_user/') ?>/' + id,
                dataType: 'json',
                success: function (result)

                {
                    $('#alert_area').empty().html('<div class="alert alert-success alert-dismiss" id="disappear"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + result.message + '</div>');
                    setTimeout(function () {
                        $('#disappear').fadeOut('slow')
                    }, 3000);
                    $('#loader1').fadeOut();
                    ajax_datatable.fnDraw();
                }
            });
            return false;

        });

        
</script>