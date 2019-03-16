<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/jquery.timepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/icomoon.css">
    <?php
    if(isset($custom_css))
      if(!empty($custom_css)){
        foreach($custom_css as $css){
          echo "<link rel='stylesheet' href='".base_url().$css."'></script>";
        }
      }
    ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/style.css">
  </head>
  <body>
    
    <?php $this->load->view("default/menu"); ?>
    <!-- END nav -->
    
  	<?php if(isset($slide)) $this->load->view($slide); ?>

		<?php $this->load->view($temp); ?>

		<?php $this->load->view("default/footer"); ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo base_url(); ?>assets/default/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/aos.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/bootstrap-datepicker.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/google-map.js"></script>
  <script src="<?php echo base_url(); ?>assets/default/js/main.js"></script>
  <?php
  if(isset($custom_script))
    if(!empty($custom_script)){
      foreach($custom_script as $script){
        echo "<script src='".base_url().$script."'></script>";
      }
    }
  ?>
    
  </body>
</html>