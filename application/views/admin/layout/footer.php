  <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Your company &copy; 2017-2019</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
    </div>
  </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url() ?>assets/admin/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="<?php echo base_url() ?>assets/admin/js/front.js"></script>
    <script src="<?php echo base_url() ?>assets/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/tinymce/jquery.tinymce.min.js"></script>
    <script src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js"></script>
    <script>
      $(document).ready( function () {
          $('.datatables').DataTable();
      } );
    </script>
     <script>tinymce.init({
      selector: 'textarea',
      height: 300,
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code help wordcount'
      ],
      toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css']
    });</script>
  </body>
</html>