<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
      <head>
          <meta charset="utf-8" />
          <title>Cari Lapangan</title>
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta content="width=device-width, initial-scale=1" name="viewport" />
          <meta content="" name="description" />
          <meta content="" name="author" />
          <!-- BEGIN GLOBAL MANDATORY STYLES -->
          <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" /> -->
          <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')?>" rel="stylesheet" type="text/css" />
          <!-- END GLOBAL MANDATORY STYLES -->
          <!-- BEGIN PAGE LEVEL PLUGINS -->
          <!-- E:\penting\htdocs\ci_metronik\assets\metronic_v4.5.6\theme\assets\global\plugins\bootstrap-daterangepicker\daterangepicker.min.css -->
          <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/morris/morris.css')?>" rel="stylesheet" type="text/css" />


          <?php for ($i=0; $i < sizeof($plugin_head) ; $i++) {?>
            <link href="<?php echo $plugin_head[$i];?>" rel="stylesheet" type="text/css" />
          <?php }?>
          <!-- END PAGE LEVEL PLUGINS -->
          <!-- BEGIN THEME GLOBAL STYLES -->
          <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/css/components.min.css')?>" rel="stylesheet" id="style_components" type="text/css" />
          <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/css/plugins.min.css')?>" rel="stylesheet" type="text/css" />
          <!-- END THEME GLOBAL STYLES -->

          <!-- BEGIN THEME LAYOUT STYLES -->
          <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/layouts/layout/css/layout.min.css')?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/layouts/layout/css/themes/darkblue.min.css')?>" rel="stylesheet" type="text/css" id="style_color" />
          <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/layouts/layout/css/custom.min.css')?>" rel="stylesheet" type="text/css" />

          <link href="<?php echo base_url('assets/css/mycss.css')?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/select2/css/select2.min.css')?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/select2/css/select2-bootstrap.min.css')?>" rel="stylesheet" type="text/css" />


          <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/jquery.min.js')?>" type="text/javascript"></script>
          <script src="<?php echo base_url('assets/js/function.js')?>" type="text/javascript"></script>

          <!-- END THEME LAYOUT STYLES -->
          <link rel="shortcut icon" href="favicon.ico" />
        </head>
