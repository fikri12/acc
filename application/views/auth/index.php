<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{title}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="{adminlte}dist/img/favicon.ico">
    <link rel="stylesheet" href="{adminlte}bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{adminlte}dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{adminlte}dist/css/skins/_all-skins.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="{adminlte}dist/img/editbhp.png"/></div>
        <?php if($this->session->flashdata('error_login')): ?>
            <?= $this->session->flashdata('error_login') ?>
        <?php endif ?>
        <?php if($this->session->flashdata('success_logout')): ?>
            <?= $this->session->flashdata('success_logout') ?>
        <?php endif ?>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{site_url}/auth/aksi" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
