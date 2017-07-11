<!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      <meta content="" name="description" />
      <meta content="" name="author" />
      <!-- BEGIN GLOBAL MANDATORY STYLES -->
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet')?>" type="text/css" />
      <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')?>" rel="stylesheet" type="text/css" />
      <!-- END GLOBAL MANDATORY STYLES -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <!-- <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/select2/css/select2.min.css')?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/select2/css/select2-bootstrap.min.css')?>" rel="stylesheet" type="text/css" /> -->
      <!-- END PAGE LEVEL PLUGINS -->
      <!-- BEGIN THEME GLOBAL STYLES -->
      <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/css/components.min.css')?>" rel="stylesheet" id="style_components" type="text/css" />
      <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/css/plugins.min.css')?>" rel="stylesheet" type="text/css" />
      <!-- END THEME GLOBAL STYLES -->
      <!-- BEGIN PAGE LEVEL STYLES -->
      <link href="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/pages/css/login-2.min.css')?>" rel="stylesheet" type="text/css" />
      <!-- END PAGE LEVEL STYLES -->
      <!-- BEGIN THEME LAYOUT STYLES -->
      <!-- END THEME LAYOUT STYLES -->
      <link rel="shortcut icon" href="favicon.ico" /> </head>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style media="screen">
          .alert{
            display: none;
          }
        </style>
    </head>
    <body class="login">
      <div class="logo">
          <a href="index.html">
              <img src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/pages/img/logo-big-white.png')?>" style="height: 17px;" alt="" /> </a>
      </div>
        <div class="content">
                <div class="alert alert-danger">
                  <strong>Info!</strong> Log in error, Username dan Password tidak sesuai
                </div>
                <div class="alert alert-info">
                  <strong>Info!</strong> Log in success
                </div>
                <form id="login_form" action="<?php echo site_url('auth/login') ?>" method="post">
                    <div class="form-title">
                        <span class="form-title">Welcome.</span>
                        <span class="form-subtitle">Please login.</span>
                    </div>
                    <div class="form-group">
                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                        <label class="control-label visible-ie8 visible-ie9">Username</label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" id="username" name="username" />
                    </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" id="password" name="password" />
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn red btn-block uppercase">Login</button>
                    </div>
                </form>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/jquery.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/js.cookie.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/jquery.blockui.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/jquery-validation/js/additional-methods.min.js')?>" type="text/javascript"></script>
        <!-- <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/plugins/select2/js/select2.full.min.js')?>" type="text/javascript"></script> -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/global/scripts/app.min.js')?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/pages/scripts/login.min.js')?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            // $(function () {
            //     $('input').iCheck({
            //         checkboxClass: 'icheckbox_square-blue',
            //         radioClass: 'iradio_square-blue',
            //         increaseArea: '20%' // optional
            //     });
            // });

            $(function(){
              $('#username').focus();
            });

            // this is the id of the form
            $("#login_form").submit(function(e) {

                var url = '<?php echo site_url('auth/login')?>'; // the script where you handle the form input.

                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#login_form").serialize(), // serializes the form's elements.
                       success: function(data)
                       {
                           login_response(data)
                       }
                     });

                e.preventDefault(); // avoid to execute the actual submit of the form.
            });

            function login_response(data){
              if (data == 1) {
                $(".alert-danger").fadeOut();
                setTimeout(function(){ $(".alert-info").fadeIn(); }, 800);
                setTimeout(function(){ window.location.href = 'admin'; }, 1500);
              } else {
                $(".alert-danger").fadeIn();
                $('#username').val('');
                $('#password').val('');

                $('#username').focus();
              }
            }

        </script>
    </body>
</html>
