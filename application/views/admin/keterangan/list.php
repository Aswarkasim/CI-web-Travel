          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/master') ?>">Keterangan</a></li>
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

                                           
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Keterangan Harga</th>
                              <th width="25%">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $keterangan ?></td>
                              <td>
                                <a href="<?php echo base_url('admin/master/keteranganEdit') ?>" class="btn btn-primary"><i class="fa fa-pencil" ></i></a>
                              </td>
                            </tr> 
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </section>