 </div><!-- ./wrapper -->
    <!-- Bootstrap -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>  
         <!-- App -->      
        <script src="<?php echo base_url('assets/js/app.js') ?>" type="text/javascript"></script> 
 
         
    </body>
 <script>
  $(document).ready(function(){
        // to display number of comment pending
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
       
      
    });
    
    
 </script>   
</html>