          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/user') ?>">Admin</a></li>
              <li class="breadcrumb-item">Tambah</li>
            </ul>
          </div>  

 <!-- Form Elements -->
 <br>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard5" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Tambah Admin</h3>
                    </div>
                    <div class="card-body">

                      <?php 

                        echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ',' </div>');

                        if(isset($error)){
                          echo '<div class="alert alert-warning">';
                          echo $error;
                          echo '</div>';
                        }

                       
                        echo form_open('admin/kategori/edit/'.$kategori->id_kategori);
                       ?>

                      <form class="form-horizontal" method="post">

                         <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Kategori</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="kategori" placeholder="Nama Kategori" value="<?php echo $kategori->kategori ?>">
                          </div>
                        </div>


                        <hr class="line">
                        <div class="form-group row">
                          <div class="col-sm-4 offset-sm-3">
                            <a href="<?php echo base_url('admin/user') ?>" class="btn btn-secondary"> Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>


                      </form>

                      <?php form_close() ?>
                    </div>
                  </div>
                </div>
