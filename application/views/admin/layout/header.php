 <?php
    $query = $this->db->select('*');
    $query = $this->db->from('tbl_pesan');
    $query = $this->db->where('status_pesan', '1');
    $query = $this->db->get();

    $jum_pesan = $query->num_rows();

    $pesan_masuk = $this->db->select('*');
    $pesan_masuk = $this->db->from('tbl_pesan');
    $pesan_masuk = $this->db->where('status_pesan', '1');
    $pesan_masuk = $this->db->order_by('id_pesan', 'DESC');
    $pesan_masuk = $this->db->limit(5);
    $pesan_masuk = $this->db->get();

    // $pesan_masuk  = $this->db->query("SELECT * tbl_pesan WHERE status_pesan='1' ORDER BY id_pesan DESC LIMIT 5");
    $unread = $pesan_masuk->result();
?>

 <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span>Karosssa </span><strong>Tours & Travel</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                <!-- Messages                        -->
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner"><?php echo $jum_pesan ?></span></a>


                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    
                    <?php foreach($unread as $p){ ?>

                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-body">
                          <h3 class="h5"><?php echo $p->nama_pesan ?></h3>
                            <span><?php echo character_limiter($p->isi_pesan,30); ?></span>
                        </div></a>
                      </li>
                    <?php } ?>
                   
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Baca semua pesan   </strong></a></li>
                  </ul>


                </li>

                <!-- Logout    -->
                <li class="nav-item"><a href="<?php echo base_url('login/logout') ?>" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      
    <div class="page-content d-flex align-items-stretch"> 
