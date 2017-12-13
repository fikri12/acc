<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{title}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="{adminlte}dist/img/favicon.ico">
    <link rel="stylesheet" href="{adminlte}bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{adminlte}dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{adminlte}dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="{adminlte}plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="{adminlte}plugins/morris/morris.css">
    <link rel="stylesheet" href="{adminlte}plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="{adminlte}plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="{adminlte}plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="{adminlte}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="{adminlte}plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="{adminlte}plugins/select2/select2.min.css">
    <link rel="stylesheet" href="{adminlte}plugins/jquery-toastr/jquery.toast.min.css">
    <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <!-- jQuery 2.1.4 -->
    <script src="{adminlte}plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="{adminlte}bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{adminlte}plugins/morris/morris.min.js"></script>
    <script src="{adminlte}plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{adminlte}plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{adminlte}plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{adminlte}plugins/knob/jquery.knob.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{adminlte}plugins/daterangepicker/daterangepicker.js"></script>
    <script src="{adminlte}plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="{adminlte}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="{adminlte}plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="{adminlte}plugins/select2/select2.full.min.js"></script>
    <script src="{adminlte}plugins/fastclick/fastclick.min.js"></script>
    <script src="{adminlte}plugins/jquery-toastr/jquery.toast.min.js"></script>
    <script src="{adminlte}dist/js/app.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="../../index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <!--<img class="logo-mini" src="{adminlte}dist/img/BHP Logo.png"/>-->
                <span class="logo-mini"><b>B</b>HP</span>
                <!-- logo for regular state and mobile devices -->
                <img src="{adminlte}dist/img/editbhp.png"/>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{adminlte}dist/img/fikri.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">{usernama}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{adminlte}dist/img/fikri.png" class="img-circle" alt="User Image">
                                    <p>
                                        {usernama} - Web Developer
                                        <small>Member since Nov. 2017</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{site_url}/auth/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <?php echo $this->load->view('menu') ?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1><?= ($this->uri->segment(1) == 'master') ? 'Master' : 'Transaksi' ?> <small>{title}</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">General Elements</li>
                    </ol>
                </section>

                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <?php if($this->session->flashdata('confirm')): ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <?= $this->session->flashdata('message_flash') ?>
                                </div>
                              <?php endif ?>

                              <?php if($this->session->flashdata('error')): ?>
                                  <div class="alert alert-danger alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                      <?= $this->session->flashdata('message_flash') ?>
                                  </div>
                                <?php endif ?>
                        </div>
                    </div>

                    <?php $this->load->view($content) ?>
                </section>
            </div>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> Beta-Internal
                </div>
                <strong>Copyright &copy; 2017 <a href="#"></a></strong> All rights reserved.
            </footer>
            <div class="control-sidebar-bg"></div>
    </div>

<script type="text/javascript">
    function number(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $('input.number').keyup(function(event) {
        if(event.which >= 37 && event.which <= 40) return;
        // format number
        $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });

     setInterval(getNotif,20000);

    function getNotif(){
      $.ajax({
        url  : '<?php echo site_url().'dashboard/get_notif/'; ?>',
        method : 'get',
        dataType : 'json',
        success: function(data){

          if(data.code == '1'){
            if(parseInt(data.total) > 0){
              var json_notif = data.notif;
              for(var i = 0;i < json_notif.length;i++){
                showNotif(json_notif[i].id,json_notif[i].judul_notif,json_notif[i].isi_notif,'info',json_notif[i].action);

              }

            }
          }
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
      });
    }

    function showNotif(id,title,msg,type,action = 1){
      $.toast({
          heading: title,
          text: msg,
          position: 'bottom-right',
          icon: type,
          hideAfter: false,
          stack: true,
          afterHidden: function () {
            updateNotif(id);
            if('<?php echo $this->session->userdata('akses');?>' != '2' && action == 0){
              showConfirmToast(id);
            }
          }
      });
    }

    function showConfirmToast(id){

      $.toast({
          heading: 'What do you wanna do ?',
          text: '<a href="javascript:void(0)" onclick="do_confirm(\''+id+'\',\'reject\');">Approve</a> or <a href="javascript:void(0);" onclick="do_confirm(\''+id+'\',\'reject\');">Reject</a> ?',
          position: 'bottom-right',
          icon: 'warning',
          hideAfter: false,
          stack: true,
          afterShown: function(){

          },
          afterHidden: function () {

          }
      });
    }

    function updateNotif(id){
      $.ajax({
        url  : '<?php echo site_url().'dashboard/read_notif/'; ?>',
        method : 'post',
        data: {
          id : id
        },
        dataType : 'json',
        success: function(data){
          if(data.code == '1'){

          }
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
      });
    }

    function do_confirm(id,type){
      $.toast().reset('all');
      $.ajax({
        url : '<?php echo site_url().'dashboard/do_confirm/';?>',
        data:{
          id   : id,
          type : type
        },
        method: 'post',
        dataType: 'json',
        success: function(data){
          if(data){
            showToast('Information',data.msg,'success');
          }
        },
        error: function(data){
          showToast('Information','Error','error');
        }
      }).done( function(){

      });

    }

    function showToast(title,msg,type){
      $.toast({
          heading: title,
          text: msg,
          position: 'bottom-right',
          icon: type,
          stack: true,
      });
    }

</script>
</body>
</html>
