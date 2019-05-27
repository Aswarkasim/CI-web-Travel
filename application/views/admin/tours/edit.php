          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/tours') ?>">Paket Tour</a></li>
              <li class="breadcrumb-item">Tambah</li>
            </ul>
          </div>  

 <!-- Form Elements -->
 <br>
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4"><?php echo $title ?></h3>
                    </div>
                    <div class="card-body">

                      <?php 

                        echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ',' </div>');

                        if(isset($error)){
                          echo '<div class="alert alert-warning">';
                          echo $error;
                          echo '</div>';
                        }

                       
                        echo form_open_multipart('admin/tours/edit/'.$tours->id_paket);
                       ?>

                      <form class="form-horizontal" method="post">

                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Nama Paket</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_paket" placeholder="Nama Paket" value="<?php echo $tours->nama_paket ?>">
                          </div>
                        </div>
                        
                        
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Deskripsi</label>
                          <div class="col-sm-9">
                            <textarea name="deskripsi" class="form-control"><?php echo $tours->deskripsi ?></textarea>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Rincian Harga</label>
                          <div class="col-sm-9">
                            <textarea name="harga" class="form-control"><?php echo $tours->hrg_dewasa ?></textarea>
                          </div>
                        </div>

                        
                        
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Kategori</label>
                          <div class="col-sm-9">
                            <select name="kategori" class="form-control">
                              <option value="">-Pilih kategori-</option>
                              <?php foreach($kategori as $kategori){ ?>
                                 <option value="<?php echo $kategori->id_kategori ?>" <?php if($tours->id_kategori==$kategori->id_kategori){echo "selected"; } ?>><?php echo $kategori->kategori ?></option>
                            <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Gambar</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control" name="gambar">
                            <img src="<?php echo base_url('assets/uploads/images/thumbs/'.$tours->gambar) ?>" alt="" class="img img-thumbnail">
                          </div>
                        </div>


                        <hr class="line">
                        <div class="form-group row">
                          <div class="col-sm-4 offset-sm-3">
                            <a href="<?php echo base_url('admin/tours') ?>" class="btn btn-secondary"> Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>


                      </form>

                      <?php form_close() ?>
                    </div>
                  </div>
                </div>
