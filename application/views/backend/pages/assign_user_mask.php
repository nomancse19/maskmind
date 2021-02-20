<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Mask</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span style="color:blue;font-weight:bold;">Your Select:  User Number -<?php echo $user_data->user_number; ?>... And User Email-<?php echo $user_data->user_email; ?></span> 
        <form action="<?php echo base_url().'super_admin/save_assign_mask/'.$user_data->user_id;?>" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">User Earn Mask:</label>
            <input type="number" readonly class="form-control" name='user_earn_mask' id='user_earn_mask' value="<?php echo $user_data->user_mask; ?>">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Enter User Given Mask:</label>
            <input type="number" class="form-control" id="user_given_mask" name='user_given_mask' required>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="mask" >
      </div>
     </form>
      

      </div>

      <script>
        var user_mask='<?php echo $user_data->user_mask; ?>';
        $("#user_given_mask").keyup(function(){
            var given_mask= parseInt($('#user_given_mask').val());
            if(given_mask>user_mask){
              alert('Your Given Mask Must Be Less Then User Mask');
              $('#user_given_mask').val('');
            }
        });

      </script>
    
