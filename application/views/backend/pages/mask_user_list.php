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
                        <h1 class="mt-4">All User List</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Mask User List And Assign Mask ... <span><?php echo $this->session->flashdata('message'); ?></span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%">
                                        <thead style="font-size:13px;">
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Number</th>
                                                <th>Home Address</th>
                                                <th>Ref.Code</th>
                                                <th>Mask No</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody style="font-size:13px;">
                                            <?php 
                                            $sl=0;
                                            if($all_user_info){
                                            foreach($all_user_info as $all_user_info_data){ 
                                                $sl++;
                                                ?>
                                            <tr>
                                                <td><?php echo $sl; ?></td>
                                                <td><?php echo $all_user_info_data->user_name;?></td>
                                                <td><?php echo $all_user_info_data->user_email;?></td>
                                                <td><?php echo $all_user_info_data->user_number;?></td>
                                                <td><?php echo $all_user_info_data->user_home_address;?></td>
                                                <td><?php echo $all_user_info_data->user_ref_code;?></td>
                                                <td><?php echo $all_user_info_data->user_mask;?></td>
                                                <td>
                                                    <button data-toggle="modal" class="btn btn-success btn-sm" data-id="<?php echo $all_user_info_data->user_id;?>" id="assign_mask" data-target="#assign_mask_modal">Assign Mask</button>

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
