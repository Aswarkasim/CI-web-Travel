<?php 

  $id_admin     = $this->session->userdata('id_admin');
  $user_aktif   = $this->user_model->detail($id_admin);

  $query = $this->db->query("SELECT * FROM tbl_pesan WHERE status_pesan='1'");
  $jum_pesan = $query->num_rows();

 ?>

<!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo base_url('assets/uploads/images/thumbs/'.$user_aktif->foto) ?>" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4"><?php echo $user_aktif->nama ?></h1>
              <p><?php  echo $user_aktif->level ?></p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">

                    <li class="<?php if($this->uri->segment(2)=="dashboard"){echo "active";} ?>"><a href="<?php echo base_url('admin/dashboard') ?>"> <i class="icon-home"></i>Dashboard </a></li>

                    <li class="<?php if($this->uri->segment(2)=="banner"){echo "active";} ?>"><a href="<?php echo base_url('admin/banner') ?>"> <i class="fa fa-photo"></i>Banner </a></li>

                    <li class="<?php if($this->uri->segment(2)=="tours"){echo "active";} ?>"><a href="#dropDownTours" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Tours </a>
                      <ul id="dropDownTours" class="collapse list-unstyled ">
                        <li class="<?php if($this->uri->segment(2)=="tours"){echo "active";} ?>"><a href="<?php echo base_url('admin/tours') ?>">Paket Tours</a></li>
                        <li class="<?php if($this->uri->segment(2)=="kategori"){echo "active";} ?>"><a href="<?php echo base_url('admin/kategori') ?>">Kategori</a></li>
                      </ul>
                    </li>


                    <li class="<?php if($this->uri->segment(2)=="pesan"){echo "active";} ?>"><a href="<?php echo base_url('admin/pesan') ?>"> <i class="icon-mail"></i>Pesan <span class="badge bg-orange badge-corner"><?php echo $jum_pesan ?></span></a></li>

                    <li class="<?php if($this->uri->segment(2)=="master"){echo "active";} ?>"><a href="#dropDownMaster" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Master </a>
                      <ul id="dropDownMaster" class="collapse list-unstyled ">
                        <li class="<?php if($this->uri->segment(3)=="keterangan"){echo "active";} ?>"><a href="<?php echo base_url('admin/master/keterangan') ?>">Keterangan</a></li>
                        <li class="<?php if($this->uri->segment(3)=="ketentuan"){echo "active";} ?>"><a href="<?php echo base_url('admin/master/ketentuan') ?>">Ketentuan Pemesanan</a></li>
                        <li class="<?php if($this->uri->segment(3)=="tentang"){echo "active";} ?>"><a href="<?php echo base_url('admin/master/tentang') ?>">Tentang Kami</a></li>
                      </ul>
                    </li>

                   
                    <li class="<?php if($this->uri->segment(2)=="user"){echo "active";} ?>"><a href="<?php echo base_url('admin/user') ?>"> <i class="icon-interface-windows"></i>Admin </a></li>

                    <li><a href=""> <i class="icon-padnote"></i>Pengaturan </a></li>


          </ul>

        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom"><?php echo $title ?></h2>
            </div>
          </header>



         