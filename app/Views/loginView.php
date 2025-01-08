<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login | Zircos - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo baseUrl();?>/templates/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="<?php echo baseUrl();?>/templates/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo baseUrl();?>/templates/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    </head>

    <body>

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="text-center account-logo-box">
                                <div class="mt-2 mb-2">
                                    <a href="index.html" class="text-success">
                                        <span><img src="<?php echo baseUrl();?>/templates/assets/images/logo.png" alt="" height="36"></span>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">
                                <?= validation_list_errors();
                                $errors=validation_errors();
                               
                                ?>

                                <form  method="post" action="<?php echo baseUrl();?>/SiginController/loginAuth">

                                    <div class="form-group">
                                        <input class="form-control" type="text" id="username" placeholder="Username" name="username" value="<?= set_value('username');?>">
                                        <?php if(isset($errors['username'])){?>
                                        <span class="text-danger"><?= validation_show_error('username');?></span>
                                        <?php }?>
                                        
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" type="password" id="password" placeholder="Password" name="password"  value="<?= set_value('password');?>">
                                        <?php if(isset($errors['password'])){?>
                                        <span class="text-danger"><?= validation_show_error('password');?></span>
                                        <?php }?>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox checkbox-success">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group text-center mt-4 pt-2">
                                        <div class="col-sm-12">
                                            <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock mr-1"></i> Forgot your password?</a>
                                        </div>
                                    </div>

                                    <div class="form-group account-btn text-center mt-2">
                                        <div class="col-12">
                                            <button class="btn width-md btn-bordered btn-danger waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-5">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-primary ml-1"><b>Sign Up</b></a></p>
                            </div>
                        </div>

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="<?php echo baseUrl();?>/templates/assets/js/vendor.min.js"></script>

        <!-- App js -->
       

    </body>

</html>