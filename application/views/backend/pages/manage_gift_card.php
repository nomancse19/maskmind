<style>

.btn-sm {
padding: 0.25rem 0.25rem;
font-size: 0.875rem;
line-height: 1.0;
border-radius: 0.2rem;

}
</style>
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Manage Gift Card</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Add Gift Card And Manage ... <span><?php echo $this->session->flashdata('message'); ?></span>
                            </div>
                            <div class="card-body">
                            <hr>
                        <div>
                            <form class="form-inline" action="<?php echo base_url();?>super_admin/gift_card_token_generate" method="post">
                            <label for="email">How Much Token:</label>&nbsp;&nbsp;&nbsp;
                            <input type="number" class="form-control" value='1' name="token_count" placeholder="Enter Number That How Much Token You Want." id="email">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label for="pwd">Token Mask Value:</label>&nbsp;&nbsp;
                            <input type="number" class="form-control" name="gift_card_mask_number" placeholder="Enter Token Mask Value.That The Gift Mask." id="pwd">
                            
                            &nbsp;&nbsp;&nbsp; <button type="submit" class="btn btn-primary">Generate Auto Token.</button>
                            </form> 
                        </div>
                        <hr>
                        <br>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%">
                                        <thead style="font-size:13px;">
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>Token</th>
                                                <th>QR Code</th>
                                                <th>Mask No</th>
                                                <th>Is Used?</th>
                                                <th>Used User</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody style="font-size:13px;">
                                            <?php 
                                            $sl=0;
                                            if($gift_card_info){
                                            foreach($gift_card_info as $all_gift_card_info){ 
                                                $sl++;
                                                ?>
                                            <tr>
                                                <td><?php echo $sl; ?></td>
                                                <td><?php echo $all_gift_card_info->gift_card_created_date;?></td>
                                                <td><?php echo $all_gift_card_info->gift_card_token;?></td>
                                                <td>
                                                <img width="50" height="50" src="<?php echo base_url().'/'.$all_gift_card_info->gift_card_token_qr_code;?>" alt="">
                                                </td>
                                                <td><?php echo $all_gift_card_info->gift_card_mask_number;?></td>
                                                <td>
                                                    <?php 
                                                     if($all_gift_card_info->gift_card_is_used==0){
                                                         echo "<span style='color:blue;font-weight:bold;'>No, Active</span>";
                                                     }else{
                                                        echo "<span style='color:red;font-weight:bold;'>Yes, Used</span>";
                                                     }
                                                     
                                                     ?>
                                            
                                                 </td>
                                                <td><?php echo $all_gift_card_info->gift_card_used_user_id;?></td>
                                                <td>
                                                     <a href="<?php echo base_url().'super_admin/delete_giftcard/'.$all_gift_card_info->gift_card_id;?>">Delete</a> || <a href="<?php echo base_url().$all_gift_card_info->gift_card_token_qr_code;?>">Download</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php } ?>
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



<div class="modal fade" id="assign_mask_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="editdata">

    


    </div>
  </div>
</div>


</main>
