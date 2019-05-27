

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

        <?php $i =1; foreach($slider as $slider){ ?>
          <div class="carousel-item <?php if($i==1){echo "active";} ?>">
            <img class="first-slide" src="<?php echo base_url('assets/uploads/images/'.$slider->gambar) ?>" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-center">
                <h1><?php echo $slider->judul ?></h1>
                <p><?php echo $slider->keterangan ?></p>
              </div>
            </div>
          </div>
      <?php $i++; } ?>
          

        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </main>


<!-- album -->
 
 <main role="main">

    <div class="album py-5 bg-light">
      <div class="container">
 
     <div class="text-center">
      <h1>Paket Tour</h1> 
       <p>Paket Tour yang kami tawarkan mewakili seluruh komponen aspek wisata Pulau Lombok.</p>
       <p><b>Untuk mendapat harga terbaik dan termurah, segera hubungi kami sekarang !</b></p> 

       <hr>
     </div>

      

          <div class="row">
  
            <?php foreach($tours as $tours){ ?>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="<?php echo base_url('assets/uploads/images/thumbs/'.$tours->gambar) ?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><b><?php echo $tours->nama_paket ?></b></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                     <a href="<?php echo base_url('tours/baca/'.$tours->slug) ?>" class="btn btn-sm btn-outline-secondary">Pesan</a></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <?php } ?>

          </div>

           <div class="text-center">
             <a href="<?php echo base_url('tours') ?>" class="btn btn-primary">Lihat Semua</a>
           </div>

        </div>
      </div>

    </main>

    <!--Paket Promo-->


<main role="main jumbotron-heading">

    <div class="album py-5 bg-light">
      <div class="container">
 
     <div class="text-center">
      <h1>Paket Promo</h1> 
       <p>Paket Promo yang kami tawarkan</p>

       <hr>
     </div>

      

          <div class="row">
  
            <?php foreach($toursPromo as $toursPromo){ ?>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="<?php echo base_url('assets/uploads/images/thumbs/'.$toursPromo->gambar) ?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><b><?php echo $toursPromo->nama_paket ?></b></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Lihat</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <?php } ?>

          </div>

           <div class="text-center">
             <a href="<?php echo base_url('tours') ?>" class="btn btn-primary">Lihat Semua</a>
           </div>

        </div>
      </div>

    </main>

    <!-- end album -->

<!-- secobary album -->
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Kenapa Harus Memilih Karossa Tour & Travel ?</h1>
          </p>
        </div>
      </section>
      
<!-- end seconday album -->


      <!-- marketing -->

      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
           <span class="fa fa-check"></span>
            <h2>Heading</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          </div><!-- /.col-lg-4 -->

           <div class="col-lg-4">
           <span class="fa fa-check"></span>
            <h2>Heading</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          </div><!-- /.col-lg-4 -->

           <div class="col-lg-4">
           <span class="fa fa-check"></span>
            <h2>Heading</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div>





