<!-- Modal Form-->
<button type="button" data-toggle="modal" data-target="#Hapus<?php echo $pesan->id_pesan ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>

<div class="col-lg-4">
<div class="card-body text-center">
  <!-- Modal-->
  <div id="Hapus<?php echo $pesan->id_pesan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="exampleModalLabel" class="modal-title">Hapus <?php echo $pesan->nama_pesan ?></h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <p>
            <div class="alert alert-warning"><i class="fa fa-warning"></i> 
                Anda yakin ingin  menghapus pesan <?php echo $pesan->nama_pesan ?>
            </div>
          </p>
          
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
          <a href="<?php echo base_url('admin/pesan/hapus/'.$pesan->id_pesan) ?>" class="btn btn-danger">
            <i class="fa fa-trash"></i> Hapus
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>