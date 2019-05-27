<!-- Modal Form-->
<button type="button" data-toggle="modal" data-target="#KategoriTambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>

<div class="col-lg-4">
<div class="card-body text-center">
  <!-- Modal-->
  <div id="KategoriTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="exampleModalLabel" class="modal-title">Tambah Kategori</h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <?php echo form_open('admin/kategori') ?>
        <div class="modal-body">

           <div class="form-group row">
              <label class="col-sm-3 form-control-label">Kategori</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="kategori" placeholder="Nama Kategori" value="<?php echo set_value('kategori') ?>">
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Tambahkan">
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
</div>