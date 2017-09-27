<?php

if($images)
{
    $image_path = $this->config->item('images_folder');
    foreach($images as $image){
    
?>
<div class="col-md-3" style="margin-top: 10px; height: 180px">
    <a href="#" data-image_id='<?php echo $image['image_id'] ?>' class="edit_caption"> <img src="<?php echo base_url('uploads/user_images/'.$image['image_thumb']);  ?>" width="200" height="150" alt="<?php echo $image['original_imagename']?>"/></a>
</div>
   
<?php
    }//foreach
    
}//if
?>
