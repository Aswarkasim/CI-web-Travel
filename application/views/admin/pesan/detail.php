<!-- Modal Form-->
<button type="button" data-toggle="modal" data-target="#Detail<?php echo $pesan->id_pesan ?>" class="btn btn-info"><i class="fa fa-eye"></i></button>

<div class="col-lg-4">
<div class="card-body text-center">
  <!-- Modal-->
  <div id="Detail<?php echo $pesan->id_pesan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="exampleModalLabel" class="modal-title">Hapus <?php echo $pesan->nama_pesan ?></h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <p>
            <div class="form-group">
              <h4><?php echo $pesan->nama_pesan ?></h4>
              <smal class="text-mute"><?php echo $pesan->email_pesan ?></smal>
              <hr class="line">
              <p><?php echo $pesan->isi_pesan ?></p>
              <div class="float-right">
                <small class="text-mute"><?php echo $pesan->tgl_pesan ?></small>
              </div>
            </div>
          </p>
          
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>