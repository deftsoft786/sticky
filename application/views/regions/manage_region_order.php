<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><?php echo $title;?>
                   
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo $title;?></li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                <div class="row">
      
        <div class="col-lg-12">
        <?php
      $msg = $this->session->flashdata('text');
      $class = $this->session->flashdata('class');
      if($msg)
      {
        echo "<div class='alert alert-dismissable alert-".$class."' id='message_box' ><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$msg."</div>";
      }
      ?>
        <div class="well-lg">
         <div class="clearfix"></div>
                      <div class='alert alert-success' id="saved" style="display: none;">Saved <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button></div> 
                       <div class='alert alert-danger' id="sort_err" style="display: none;">Error!</div> 
                      <div class="clearfix"></div>
                    <table class="table table-bordered table-condensed" style="font-size: 85%;" id="list_table">
                    
                                <?php
                                if(count($regions)>0)
                                {
                                ?>
                                <thead>
                                <tr>
                                    <th style="width: 50px;">Sort</th>
                                    <th>Region Name</th>
                                    <th>Added On</th>
                                 </tr>
                                 </thead>
                                 <tbody id="list_topic">
                                 <?php
                                 foreach($regions as $var=>$val)
                                 {
                                 ?>
                                  <tr id="listItem_<?php echo $val["region_id"]; ?>">
                                       <td><img src="<?php echo base_url('assets/images/arrow.png'); ?>" style="cursor: move;" alt="move" width="16" height="16" class="handle" /></td>
                                        <td><?php echo htmlspecialchars($val["region_name"]); ?></td>
                                        <?php
                                      //sanitizing date
                                         if($val["created"]!='1970-01-01' && $val["created"]!='0000-00-00' ) 
                                         {$date =date('m-d-Y',strtotime($val["created"])); }  
                                         else{$date="-"; }
                                        ?>
                                        <td><?php echo $date; ?></td>
                                        
                                        
                                  </tr>
                                  
                                  
                                 <?php
                                 }
                                echo '</tbody>';
                                }
                                else
                                {
                                  echo "<div class='alert alert-info' id='message_box' >No Records Found!</div>";  
                                } 
                                 ?> 
                            </table>
                
                    
                   	
                    <div class="controls-row text-center">
                      <a href="<?php echo site_url('regions');?>" class="btn btn-default">Back</a>              
                          <br /> <br />               
        </div>
        </div>
        </div>
        </section>
        </aside>
        


<script>
$(document).ready(function(){

     $("#list_topic").sortable({ 
            handle : '.handle',
            helper : 'fixHelper', 
            update : function () { 
               new_order = $('#list_topic').sortable('toArray').toString();
               $.ajax({
                    url:'<?php echo site_url('regions/sorter'); ?>',
                    data:{"new_order":new_order},
                    type:'POST',
                    dataType:'json',
                    success:function(result){
                        $('#saved').fadeOut();
                        $('#sort_err').fadeOut();
                        if(result=="0")
                        {
                            $('#sort_err').fadeIn();    
                          
                        }
                        else
                        {
                          $('#saved').fadeIn();  
                        }
                    }
               });
            } 
        }).disableSelection(); 
        jQuery.browser = {};
(function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
})();
});    
</script>