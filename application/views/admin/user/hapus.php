<!-- Modal Form-->
<button type="button" data-toggle="modal" data-target="#Hapus<?php echo $user->id_admin ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>

<div class="col-lg-4">
<div class="card-body text-center">
  <!-- Modal-->
  <div id="Hapus<?php echo $user->id_admin ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="exampleModalLabel" class="modal-title">Hapus <?php echo $user->nama ?></h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <p>
            <div class="alert alert-warning"><i class="fa fa-warning"></i> 
                Anda yakin ingin  menghapus <?php echo $user->nama ?>
            </div>
          </p>
          
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
          <a href="<?php echo base_url('admin/user/hapus/'.$user->id_admin) ?>" class="btn btn-danger">
            <i class="fa fa-trash"></i> Hapus
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>