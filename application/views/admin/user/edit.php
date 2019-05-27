          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/user') ?>">Admin</a></li>
              <li class="breadcrumb-item">Edit</li>
            </ul>
          </div> 
 <!-- Form Elements -->
 <br>
                <div class="col-lg-12">
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
                       
                        echo form_open_multipart('admin/user/edit/'.$user->id_admin);
                       ?>

                      <form class="form-horizontal" method="post">

                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Nama</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $user->nama ?>">
                          </div>
                        </div>
                        
                        
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $user->username ?>">
                          </div>
                        </div>

                        
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $user->email ?>">
                          </div>
                        </div>

                        
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Password <small class="text-danger">(kosongkan jika tidak ada perubahan)</small></label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $user->password ?>">
                          </div>
                        </div>

                        
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Ulangi Password</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" name="re_password" placeholder="Ulangi Password" value="<?php echo set_value('re_password') ?>">
                          </div>
                        </div>

                        
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Level</label>
                          <div class="col-sm-9">
                            <select name="level" class="form-control">
                              <option value="Admin">Admin</option>
                              <option value="Super Admin">Super Admin</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Status</label>
                          <div class="col-sm-9">
                            <select name="status" class="form-control">
                              <option value="Aktif">Aktif</option>
                              <option value="Non Aktif">Non Aktif</option>
                            </select>
                          </div>
                        </div>

                        
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Foto</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control-file" name="foto" placeholder="Foto" value="<?php echo $user->foto ?>">
                            <img src="<?php echo base_url('assets/uploads/images/thumbs/'.$user->foto) ?>" alt="Foto">
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
