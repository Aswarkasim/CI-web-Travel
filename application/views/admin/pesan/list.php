          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/kategori') ?>">Kategori</a></li>
            </ul>
          </div>  

<section class="tables">   
            <div class="container-fluid">
              <div class="row">
              
                
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4"><?php echo $title ?></h3>
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
                     <!-- Tambah -->
                                           
                        <table class="table table-striped table-hover datatables">
                          <thead>
                            <tr>
                              <th width="10%">Tanggal</th>
                              <th>Email</th>
                              <th>Kategori</th>
                              <th width="25%">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php ; foreach($pesan as $pesan){ ?>
                            <tr>
                              <th scope="row"><?php echo $pesan->tgl_pesan ?></th>
                              <td><?php echo $pesan->email_pesan ?></td>
                              <td><?php echo $pesan->nama_pesan ?></td>
                              <td>
                                <?php include('detail.php'); 
                                      include('hapus.php'); ?>
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
          