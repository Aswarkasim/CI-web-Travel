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
		<div class="col-md-8">
			<img src="<?php echo base_url('assets/uploads/images/'.$tours->gambar) ?>" width="100%" class="img img-thumbnail">
			<p>
				<h1><?php echo $tours->nama_paket ?></h1>
				<small><?php echo $tours->kategori ?></small>
			</p>
			<p>
				<?php echo $tours->deskripsi ?>
				<div class="table-responsive">
					<?php echo $tours->hrg_dewasa ?>
				</div>
			</p>

			<div class="form-group">
				<a href="<?php echo base_url('home/ketentuan') ?>" class="btn btn-info">Pesan Sekarang</a>
			</div>
		</div>
	</div>
</div>