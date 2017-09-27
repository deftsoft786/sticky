<?php
if(count($featured_deals)>0)
{
 $featured_deals_ids = array();   
 foreach($featured_deals as $val)
 {
    array_push($featured_deals_ids,$val["deal_id"]);
 }   
}
$date_format = $this->config->item('date_format', 'tank_auth');

$options = array(
    '' => 'Select Menu Type',
    'video'    => 'Video',
    'picture'   => 'Picture',
    'popular_store'   => 'Popular Store',              
 );
 
$video_url_home =array(
    'name' =>'video_url_home',
    'id' => 'video_url_home',
    'value' => set_value('video_url_home',@$details[0]["video_url_home"]),
    'class' =>'form-control',
    'placeholder' =>'Video URL',
    'required'=>''
); 

?> 

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.multiselect.filter.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.multiselect.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-ui-1.8.23.custom.css'); ?>" />
<style>
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

.well-lg {
    padding-bottom: 300px;
}

.pic-thumb {
    height: auto;
}

.fileinput-new {
    position: relative;
}

.pic-thumb {
    width: 210px;
    height: 160px;
    padding: 5px;
}
.remove_image {
    position: absolute;
    z-index: 1;
    top: 1px;
    left: 195px;
    font-size: 17px;
    line-height: 14px;
    background: #3C8DBC;
    color: #fff;
    border-radius: 50%;
    height: 15px;
    width: 15px;
    padding-left: 3px;
}

</style>
<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Homepage Settings
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Homepage_settings</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="row">
      
      
        <div class="col-lg-12">
        <?php
      $msg = $this->session->flashdata('message');
      $class = $this->session->flashdata('class');
      if($msg)
      {
        echo "<div class='alert alert-dismissable alert-".$class."' id='message_box' ><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$msg."</div>";
      }
      ?>
      <div id="add_res"></div>
        <div class='alert alert-success' id="saved" style="display: none;">Saved <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button></div> 
                       <div class='alert alert-danger' id="sort_err" style="display: none;">Error!</div> 
                      <div class="clearfix"></div>
                    
        <div class="well-lg">
        <div class="col-md-12">
        
                      <div class="col-md-3">
                        <h4>Show Latest Deals</h4>
                        </div>
                        <div class="col-md-3">
                         <button type="button"  class="show_deal pull-right <?php echo ($details[0]["show_latest_deals"]==0)? "selected" : "unselected" ; ?> toggle-btn" id="latest-off"  data-target="#latest-on" data-update="#latest"  data-value="0" style="padding: 0px;">OFF</button>
                        <button type="button" class="show_deal pull-right <?php echo ($details[0]["show_latest_deals"]!=0)? "selected" : "unselected" ; ?>  toggle-btn" id="latest-on" data-target="#latest-off"  data-update="#latest"  data-value="1"  style="padding: 0px;">ON</button>
                        <input type="hidden" name="latest" id="latest" value="<?php echo $details[0]["show_latest_deals"]; ?>" />
                      
                       

                      </div>
                      <div class="clearfix"></div>
                      <hr />
                        <div class="col-md-3">
                        <h4>Show Popular Deals</h4>
                        </div>
                        <div class="col-md-3">
                       <button type="button"  class="show_deal pull-right <?php echo ($details[0]["show_popular_deals"]==0)? "selected" : "unselected" ; ?> toggle-btn" id="status-off"  data-target="#status-on" data-update="#banned"  data-value="0" style="padding: 0px;">OFF</button>
                        <button type="button" class="show_deal pull-right <?php echo ($details[0]["show_popular_deals"]!=0)? "selected" : "unselected" ; ?>  toggle-btn" id="status-on" data-target="#status-off"  data-update="#banned"  data-value="1"  style="padding: 0px;">ON</button>
                        <input type="hidden" name="banned" id="banned" value="<?php echo $details[0]["show_popular_deals"]; ?>" />
                      
                      </div>
                       <div class="clearfix"></div>
                      <hr />
             <div class="col-md-3">
                        <h4>Show Featured Deals</h4>
                        </div>
                        <div class="col-md-3">
                       <button type="button"  class="show_deal pull-right <?php echo ($details[0]["show_featured_deal"]==0)? "selected" : "unselected" ; ?> toggle-btn" id="featured-off"  data-target="#featured-on" data-update="#featured"  data-value="0" style="padding: 0px;">OFF</button>
                        <button type="button" class="show_deal pull-right <?php echo ($details[0]["show_featured_deal"]!=0)? "selected" : "unselected" ; ?>  toggle-btn" id="featured-on" data-target="#featured-off"  data-update="#featured"  data-value="1"  style="padding: 0px;">ON</button>
                        <input type="hidden" name="featured" id="featured" value="<?php echo $details[0]["show_featured_deal"]; ?>" />
                      
                      </div>
                      <div class="clearfix" style="margin-bottom: 15px;"></div>
        <?php echo form_open(site_url('homepage_settings/update_homepage_deals'),array('class'=>'form-inline','id'=>'manage_homepage_2')); ?>
				            <input  type="hidden" name="list_no" value="1"/>
                        <div class="col-md-3">
                             <label class="control-label" for="basicinput">Select Featured Deals</label>
						</div>	
                        <div class="col-md-6">  
                            <select name="deals[]" multiple="multiple" style="width:324px;" id="list_one" >
                        	<?php
                            if(count($all_deals)>0)
                            {
                                foreach($all_deals as $val)
                                {
                                    if(is_int(array_search($val["deal_id"],$featured_deals_ids))) {$add_on = 'selected="selected"';}
                                    else  {$add_on = "";}
                                    echo '<option value="'.$val["deal_id"].'" '.$add_on.' >'.$val["deal"].'</option>';
                                }
                            }
                            ?>
                        	</select>
                            &nbsp;<button type="submit" class="btn">Update</button>
                         </div>
                          
                        </form>
                         <div class="clearfix"></div>
                        <hr style="border-top: 0px;" />
                          <table class="table table-striped table-bordered table-condensed">
								  <thead>
									<tr>
									  <th style="width: 50px;">Sort</th>
									  <th>Deal Name</th>
			                         <th>Start Time</th>
                                     <th>End Time</th>
									</tr>
								  </thead>
								  <tbody id="list_topic">
                                  <?php if($featured_deals){
                                   
                                    foreach($featured_deals as $val){ ?>                          
									<tr id="listItem_<?php echo $val["deal_id"]; ?>">
					                   <td><img src="<?php echo base_url('assets/img/arrow.png'); ?>" style="cursor: move;" alt="move" width="16" height="16" class="handle" /></td>
                                      <td><?php echo $val['deal'];?></td>
                                      <td><?php if($val["start_time"]!="" && $val["start_time"]!='0000-00-00 00:00:00') echo date('Y-m-d H:i:s',strtotime($val["start_time"])); else echo "-"; ?></td>
                                      <td><?php if($val["end_time"]!="" && $val["end_time"]!='0000-00-00 00:00:00') echo date('Y-m-d H:i:s',strtotime($val["end_time"])); else echo "-"; ?></td>
       
										</tr>
								<?php } } ?>
								  </tbody>
								</table>
        </div>
         <div class="clearfix"></div>
        <hr />
        <div class="col-md-12">
         <div class="col-md-3">
         <h4>Video URL:</h4>
            </div>
         <div class="col-md-5"> 
           <?php echo form_open('',array('class'=>'form-inline','id'=>'update_video_url')); ?>
				            
                <div class="input-group">
                    <input type="text" class="form-control" id="video_url" name="video_url" value="<?php echo $details[0]['video_url'];?>" placeholder="Video URL">
                        <span class="input-group-btn">
                    <input type="submit" class="btn" value="Update"/>
                        </span>
                </div><!-- /input-group -->						  
       <?php echo form_close(); ?>             
                      
        </div>                
          </div>           
  
                     
        <div class="clearfix"></div>
        <hr />
        <div class="col-md-12">
        <div id="alert_area"></div>
        <div class="clearfix"></div>
         <div class="col-md-3">
         <h4>Popular Store:</h4>
            </div>
         <div class="col-md-5"> 
           <?php echo form_open('',array('id'=>'update_store')); ?>
				            
                <div class="form-group"> 
                        <label class="control-label" for="menu_type">Menu Type:</label>
                          <?php echo form_dropdown('menu_type', @$options, isset($details) ? $details[0]["type"]:'',
                           "class='form-control' id='menu_type' required='' "); ?>  
                </div>
                
                <!-- store -->
                <div class="form-group" id="store_div" style="display: none;">               
                        <label class="control-label" for="store_id">Store:</label>
                        <?php echo form_dropdown('store_id', @$all_stores, isset($details) ? @$details[0]["featured_store_id"]:'', "class='form-control'  id = 'store_id' required='' "); ?> 
                </div>
                
                <!-- video url -->
                <div class="form-group" id="video_div" style="display: none;">
                      <label class="control-label" for="video_url_home">Video Url:</label>
                      <?php echo form_input($video_url_home); ?> 
                </div>
                
                <!-- image -->
                
                <div class="form-group" id="picture_div" style="display: none;">                       
                    <div id="upload_file_profile" style="float: left;">                                 
                        <?php
                        $url = base_url('uploads/home_page').'/'.$details[0]['image'];
                        if(URL_exists($url) && @$details[0]["image"]){ 
                        ?>
                        <div class=" fileinput-new thumbnail pic-thumb">
                        <a href="#" class="remove_image" title="Remove">&times;</a>
                        <img src="<?php echo $url;?>" alt="">
                        <input type="hidden" value="<?php echo @$details[0]["image"];?>" name="home_image" />
                        </div>
                        <?php 
                        } else{ 
                        ?>                              
                        <div class="fileinput-new thumbnail pic-thumb">
                        <img src="<?php echo base_url('assets/img/placeholder.png'); ?>" alt="">
                        </div>               
                        <?php 
                        } 
                        ?>
                            
                    </div>           
                    <a href="#" class="btn btn-primary btn-sm" id="upload_profile_link" style="margin-left: 5px;margin-top: 30px;"><span class="glyphicon glyphicon-plus-sign" style="margin-right: 5px;"></span>Upload</a>
                    <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="loader_image" style="margin-top:5px;margin-left:15px; display: none;"/>
                    <span id="pic_id" style="color: red;"></span>
                </div>
                
                
                
                <!--<div class="input-group">
                    <span class="input-group-btn">
                    <input type="submit" class="btn" value="Update"/>
                        </span>
                </div> -->  <!-- /input-group -->
                <div class="clearfix"></div>
                <div class="form-group">
                      <input type="submit" class="btn" value="Update"/> 
                </div>
                
                						  
       <?php echo form_close(); ?>             
                      
        </div>                
          </div>    
       <hr />
       
          </div>
        </div>
                </div>
                        
                       
                         
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            <form name="attachment_form"  id="attachment_form"  action="<?php echo site_url('homepage_settings/do_upload'); ?>" method="post" accept-charset="utf-8" >
                <input type="file" name="image_file" value="" id="image_file" style="display:none;"  /> 
                <input  type="hidden" name="path" value="home_page"/>
            </form>

  <script src="<?php echo base_url('assets/js/jquery.form.js'); ?>"></script>                     
 <script src="<?php echo base_url('assets/js/jquery-ui-1.8.23.custom.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.multiselect.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.multiselect.filter.min.js')?>"></script>                                    
<script>
$(document).ready(function(){

  $("#list_one").multiselect().multiselectfilter();
  
     <?php if($details[0]["type"] == 'video'){ ?>
     $('#video_div').show();
     <?php } ?>
     <?php if($details[0]["type"] == 'picture'){ ?>
     $('#picture_div').show();
     <?php } ?>
     <?php if($details[0]["type"] == 'popular_store'){ ?>
     $('#store_div').show();
     <?php } ?>
     
    
     $("#list_topic").sortable({ 
            handle : '.handle',
            helper : 'fixHelper',
            scroll: true,
            cursor : 'move',
            update : function () { 
               new_order = $('#list_topic').sortable('toArray').toString();
               $.ajax({
                    url:'<?php echo site_url('homepage_settings/sorter'); ?>',
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
$('.toggle-btn').click(function(){
        if($(this).hasClass('selected')) return false;
        if($(this).hasClass('dis')) return false;
        rival = $(this).attr('data-target'); 
        toBeUpdated = $(this).attr('data-update'); 
        toBeUpdatedValue = $(this).attr('data-value'); 
        $(toBeUpdated).val(toBeUpdatedValue).change();
        if($(this).hasClass('selected')){
            $(this).removeClass('selected').addClass('unselected');
            $(rival).removeClass('unselected').addClass('selected');
        }
        else
        {
           $(this).removeClass('unselected').addClass('selected');
           $(rival).removeClass('selected').addClass('unselected');  
        }
       }); 
       
$('.show_deal').on('click',function(){
  
   
   var is_popular=$('#banned').val();
   var is_latest=$('#latest').val();
   var is_featured=$('#featured').val();
   
     $.ajax({
    url:'<?php echo site_url('homepage_settings/show_popular_deals/'.$details[0]["homepage_setting_id"]); ?>',
    dataType:'json',
    type:'POST',
    data:{"is_popular":is_popular,"is_latest" : is_latest,"is_featured" : is_featured},
    success:function(result){
     console.log(result);  
      if(result.status==1)
     {
        
        $('#add_res').html('<div class="alert alert-success" id="disappear_add_1"  >'+result.message+'</div>'); 
        setTimeout(function(){$('#disappear_add_1').fadeOut('slow')},3000)
        
       
        
     }
     else
     {
        
        $('#add_res').empty().html('<div class="alert alert-danger">'+result.message+'</div>');
        $('#loader_edit').fadeOut();
     } 
    }
   });
    
}); 

  $("#update_video_url").submit(function(){

                            var values = $('#update_video_url').serialize();
                            $.ajax({
                            url:'<?php echo site_url('homepage_settings/update_video_url/'.$details[0]["homepage_setting_id"]); ?>',
                            dataType:'json',
                            type:'POST',
                            data:values,
                            success:function(result){
                            console.log(result);  
                             if(result.status==1)
                             {
                                $('#add_res').html('<div class="alert alert-success" id="disappear1" style="margin-top:5px;"  >'+result.message+'</div>'); 
                                setTimeout(function(){$('#disappear1').fadeOut('slow')},3000)
                                
                             }
                             else
                             {
                                
                                $('#add_res').empty().html('<div class="alert alert-danger"  style="margin-top:5px;" >'+result.message+'</div>');
                              } 
                            }
                           });
                            return false;
                });
    
  $('#menu_type').on("change",function() {
 
   $('#video_url_home').val('');
   $('#store_id').val('');  
   $('#pic_id').html('');
   $('.remove_image').trigger('click');
    //select option page
    if($('#menu_type').val()=='')
    {
         $('#video_div').hide();
         $('#picture_div').hide();
         $('#store_div').hide();
         $('#store_id').attr('required', '');
         $('#video_url_home').attr('required', '');
         $('#picture').attr('required', '');
    } 
    
    if($('#menu_type').val() == 'video'){
        $('#video_div').show();
        $('#picture_div').hide();
        $('#store_div').hide();
        
        $('#store_id').removeAttr('required', '');
        $('#video_url_home').attr('required', '');
        $('#picture').removeAttr('required', '');
    }

    //select custom page 
    if($('#menu_type').val() == 'picture'){
        $('#video_div').hide();
        $('#picture_div').show();
        $('#store_div').hide();
        
        $('#store_id').removeAttr('required', '');
        $('#video_url_home').removeAttr('required', '');
        $('#picture').attr('required', '');
    }
    
    //select custom page 
    if($('#menu_type').val() == 'popular_store'){
        $('#video_div').hide();
        $('#picture_div').hide();
        $('#store_div').show();
        
        $('#store_id').attr('required', '');
        $('#video_url_home').removeAttr('required', '');
        $('#picture').removeAttr('required', '');
    }
}); 

    ////image upload code 
 $('#upload_profile_link').click(function(e){
       e.preventDefault();
       $('#image_file').trigger('click'); 
    });
    $('#image_file').change(function(){
         $("#attachment_form").submit();
     });
     
    var options = { 
    beforeSend: function() 
    {
        $("#loader_image").show();
    },
    complete: function(response) 
    {
           $("#loader_image").hide();
           var result = jQuery.parseJSON(response.responseText);
            console.log(result);
           if(result.status==0)
           {
               $('#alert_area').empty().html('<div class="alert alert-danger  alert-dismissible"  style="margin-top:5px;" ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+result.message+'</div>');
           }
           else if(result.status==1)
           {
            $('#upload_file_profile').empty();
            $('#alert_area').empty();
            $('#upload_file_profile').append('<div class="fileinput-new thumbnail pic-thumb"><a href="#" class="remove_image" title="Remove">&times;</a><img src="'+result.image_path+'"alt=""><input type="hidden" value="'+result.filename+'" name="home_image" /></div>');
           }
    },
    error: function()
    {
        alert(" ERROR: unable to upload files");
    }
  }; 
$("#attachment_form").ajaxForm(options);

//remove image button
   $(document).on('click','.remove_image',function(e){
       e.preventDefault();
       $('#image_file').val('');
       $('#upload_file_profile').empty();
       $('#upload_file_profile').append('<div class="fileinput-new thumbnail pic-thumb" ><img src="<?php echo base_url('assets/img/placeholder.png'); ?>" alt=""></div>');
});    


  //update store
   $("#update_store").submit(function(){

        if($('#menu_type').val() == 'picture'){
            if($('#image_file').val() == '')
            {
                $('#pic_id').html('Please select a image');
                return false;
            }else{
                $('#pic_id').html('');
            }
        }
        
        
        var values = $('#update_store').serialize();
        $.ajax({
        url:'<?php echo site_url('homepage_settings/update_store/'.$details[0]["homepage_setting_id"]); ?>',
        dataType:'json',
        type:'POST',
        data:values,
        success:function(result){
        console.log(result);  
         if(result.status==1)
         {
            $('#add_res').html('<div class="alert alert-success" id="disappear1" style="margin-top:5px;"  >'+result.message+'</div>'); 
            setTimeout(function(){$('#disappear1').fadeOut('slow')},3000)
            
         }
         else
         {
            
            $('#add_res').empty().html('<div class="alert alert-danger"  style="margin-top:5px;" >'+result.message+'</div>');
          } 
        }
       });
        return false;
       });
});
</script>                                     
          
           
          		
        
     




