<!-- secobary album -->
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Wisata Karossa</h1>
			<p>Kenyamanan dan Kepuasan anda adalah kebahagiaan kami</p>
        </div>
      </section>
      
<!-- end seconday album -->
<div class="container">
	<div class="row">
  		<div class="col-md-9">
  			<div class="row">
            <?php foreach($tours as $tours){ ?>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="<?php echo base_url('assets/uploads/images/thumbs/'.$tours->gambar) ?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><b><?php echo $tours->nama_paket ?></b></p>
                  <small class="text-mute"><?php echo $tours->kategori ?></small>
                  <p><?php echo character_limiter($tours->deskripsi, 50) ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="<?php echo base_url('tours/baca/'.$tours->slug) ?>" class="btn btn-sm btn-outline-secondary">Pesan</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <?php } ?>
       	</div>
		</div>

		<div class="col-md-3">
			<div class="row">
				<div class="kategori">
					<div class="col-md-12">
					<h5>Kategori</h5>
					<ul class="navbar-nav mr-auto">
						<?php foreach($kategori as $kategori){ ?>
	              		<li class="nav-item">
	                		<a class="nav-link" href="<?php echo base_url('home') ?>"><b><?php echo $kategori->kategori ?></b></a>
	              		</li>
	              	<?php } ?>
	              	</ul>
	              </div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="kategori">
						<h5>Paket Promo</h5>
						<ul class="navbar-nav mr-auto">
							<?php foreach($toursPromo as $toursPromo){ ?>
		              		<li class="nav-item">
		                		<a  href="<?php echo base_url('home') ?>"><b><?php echo $toursPromo->nama_paket ?></b></a>
		              		</li>
		              	<?php } ?>
		              	</ul>
					</div>
				</div>
		</div>

		</div>
    </div>
</div>