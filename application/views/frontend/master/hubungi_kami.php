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
			<h1>Hubungi Kami</h1>
				<?php 

					echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ','</div>');

					if($this->session->flashdata('msg')){
						echo '<div class="alert alert-success"><i class="fa fa-check"></i> ';
						echo $this->session->flashdata('msg');
						echo '</div>';
					}

					echo form_open('home/hubungi');
				 ?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama*</label>
						<input name="nama" type="text" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Email*</label>
						<input name="email" type="text" class="form-control">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>No Hp*</label>
						<input type="text" class="form-control" name="nohp">
					</div>

					<div class="form-group">
						<label>Pesan*</label>
						<textarea name="pesan" id="" cols="30" rows="10" class="form-control"></textarea>
					</div>
				</div>
			</div>
			<p>
			<div class="float-right" style="margin-bottom: 40px">
				<input type="submit" class="btn btn-primary" value="Kirim Pesan">
			</div>
		</p>

		<?php echo form_close() ?>

		</div>

		<div class="col-md-6">
			
		</div>
	</div>
</div>