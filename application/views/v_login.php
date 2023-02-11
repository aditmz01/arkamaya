<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Arkamaya - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>asset/css/sb-admin-2.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>asset/css/style.css" rel="stylesheet">

</head>

<body class="bg-dark" id="login">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <?php if (isset($error_message)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error_message ?>
                    </div>
                <?php } ?>
                <form action="<?= site_url('login/aksi_login') ?>" method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                            <label for="inputUsername">Username</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me">
                                Remember Password
                            </label>
                        </div>
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" value="login">
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>asset/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>asset/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>