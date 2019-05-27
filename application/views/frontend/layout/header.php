
    <header>
      <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="<?php echo base_url('assets/images/logo.gif') ?>" width="40%"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="float-right">
          <div class="collapse navbar-collapse " id="navbarCollapse">
            <ul class="navbar-nav mr-auto">

              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(1)=="home" && $this->uri->segment(2)=="index"){echo "active";} ?>" href="<?php echo base_url('home/index') ?>"><b>Home</b></a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(1)=="tours" && $this->uri->segment(2)=="index"){echo "active";} ?>" href="<?php echo base_url('tours/index') ?>"><b>Paket Tour</b></a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="promo"){echo "active";} ?>" href="<?php echo base_url('tours/promo') ?>"><b>Promo</b></a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="ketentuan"){echo "active";} ?>" href="<?php echo base_url('home/ketentuan') ?>"><b>Pemesanan</b></a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="hubungi"){echo "active";} ?>" href="<?php echo base_url('home/hubungi') ?>"><b>Hubungi Kami</b></a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="tentang"){echo "active";} ?>" href="<?php echo base_url('home/tentang') ?>"><b>Tentang Kami</b></a>
              </li>

            </ul>
            
          </div>
        </div>
        </div>
      </nav>
    </header>