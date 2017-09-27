<form role="form" id="edit_caption_form" name="edit_caption_form"> 
<div class="modal-body" style="overflow: auto;">
<?php
if($image){
      $image_path = $this->config->item('images_folder');
     
    ?>
    <div id="edit_caption_res"></div>
<img src="<?php echo base_url('uploads/user_images/'.$image[0]['disk_imagename']);  ?>" width="100%"   alt="<?php echo $image[0]['original_imagename']?>"/>

               
       </div>
      <div class="modal-footer">
          <div class="pull-right">
                <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="edit_caption_form_loader"  style="display: none;"/>
                <input type="hidden" name="image_id" value="<?php echo $image[0]['image_id'] ?>"/>
   
            <button type="button" class="btn btn-danger delete_image" data-image_id ="<?php echo $image[0]['image_id'] ?>" style="margin-right: 5px;">Delete</button>  
            <button type="button" class="btn btn-default " data-dismiss="modal" style="margin-right: 5px;">Back</button>
         
      
        </div>
          <div class="clearfix"></div>
          <div id="edit_topic_form_res" style="margin-top:5px;"></div>
      </div>
</form>
<?php
}
else{
    echo 'No data found';
}
?>
