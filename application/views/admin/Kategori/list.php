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
              
                
                <div class="col-md-6">
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
                        <?php include('tambah.php') ?>
                                           
                        <table class="table table-striped table-hover datatables">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Kategori</th>
                              <th width="25%">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach($kategori as $kategori){ ?>
                            <tr>
                              <th scope="row"><?php echo $no++ ?></th>
                              <td><?php echo $kategori->kategori ?></td>
                              <td>
                                <a href="<?php echo base_url('admin/kategori/edit/'.$kategori->id_kategori) ?>" class="btn btn-primary"><i class="fa fa-pencil" ></i></a>
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