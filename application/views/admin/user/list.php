          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/user') ?>">Admin</a></li>
            </ul>
          </div>  

<section class="tables">   
            <div class="container-fluid">
              <div class="row">
              
                
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">List Admin</h3>
                    </div>
                    <div class="card-body">

                      <?php 
                          if($this->session->flashdata('msg')){
                            echo '<div class="alert alert-success"><i class="fa fa-check"></i> ';
                            echo $this->session->flashdata('msg');
                            echo '</div>';
                          }
                       ?>
      

                      <div class="table-responsive"> 
                      <p>
                        <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                      </p>                      
                        <table class="table table-striped table-hover datatables">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Foto</th>
                              <th>E-Mail</th>
                              <th>Nama</th>
                              <th>Username</th>
                              <th>Level</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach($user as $user){ ?>
                            <tr>
                              <th scope="row"><?php echo $no++ ?></th>
                              <td><img src="<?php echo base_url('assets/uploads/images/thumbs/'.$user->foto) ?>" class="img img-thumbnail" width=70px></td>
                              <td><?php echo $user->email ?></td>
                              <td><?php echo $user->nama ?></td>
                              <td><?php echo $user->username ?></td>
                              <td><?php echo $user->level ?></td>
                              <td>
                                <a href="<?php echo base_url('admin/user/edit/'.$user->id_admin) ?>" class="btn btn-primary"><i class="fa fa-pencil" ></i></a>
                                <?php include('hapus.php'); ?>
                              </td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </section>