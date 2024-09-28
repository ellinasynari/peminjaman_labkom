<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sistem Peminjaman Labkom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- CSS Links -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/Flattern/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/Flattern/css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/Flattern/css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/Flattern/css/jcarousel.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/Flattern/css/flexslider.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/Flattern/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/Flattern/skins/default.css" rel="stylesheet" />
    
    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/Flattern/ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/Flattern/ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/Flattern/ico/apple-touch-icon-72-precomposed.png" />
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/logo/logo-aswaja.png">
</head>

<body>
<div id="wrapper">
    <!-- start header -->
    <header>
        <div class="container">
            <div class="row nomargin">
                <div class="span12">
                    <div class="headnav">
                        <ul>
                            <?php if ($this->session->userdata('login_status') != 'admin'): ?>
                                <li><a href="#Profile" data-toggle="modal"><i class="icon-user"></i>Profile</a></li>
                            <?php endif ?>
                            <li><a href="<?php echo $this->session->userdata('login_status') == 'admin' ? base_url('admin/logout') : base_url('auth/logout'); ?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span4">
                    <div class="logo">
                        <a href="https://smait-wanareja.assyifa-boardingschool.sch.id/"><h4>SMAIT </h4></a>
                        <h1>Assyifa Boarding School Wanareja</h1>
                    </div>
                </div>
                <div class="span8">
                    <div class="navbar navbar-static-top">
                        <div class="navigation">
                            <nav>
                                <ul class="nav topnav">
                                    <?php if ($this->session->userdata('login_status') == 'admin'){ ?>
                                        <li class="dropdown">
                                            <a href="<?php echo base_url('admin'); ?>">Home</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="<?php echo base_url('admin/setting'); ?>">Setting</a>
                                        </li>
                                    <?php } else { ?>
                                    <li class="dropdown active">
                                        <a href="<?php echo base_url('user'); ?>">Home </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

    <!-- Content Section -->
    <div id="content">
        <?php echo isset($contents) ? $contents : 'Content not available.'; ?>
    </div>

    <!-- Modal Profile -->
    <div id="Profile" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="ProfileLabel">Setting Profile</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo base_url(); ?>user/Profile" class="form-horizontal">
                        <div class="form-group">
                            <label for="nama_user" class="col-sm-4 control-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?php echo $this->session->userdata('nama'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="NIM_NIP" class="col-sm-4 control-label">NIS/NIP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="NIM_NIP" name="NIM_NIP" value="<?php echo $this->session->userdata('NIM_NIP'); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user" class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="user" name="user" value="<?php echo $this->session->userdata('user'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_pass" class="col-sm-4 control-label">Last Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="last_pass" name="last_pass" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="col-sm-4 control-label">New Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="pass" name="pass" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_pass" class="col-sm-4 control-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" required>
                            </div>
                        </div>
                        <input type="hidden" id="id_user" name="id_user" value="<?php echo $this->session->userdata('id'); ?>">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8 text-right">
                                <button type="submit" name="save" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div id="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="span6">
                        <div class="copyright">
                            <p>
                                <span>&copy; Sistem Peminjaman Labkom - Assyifa Wanareja.</span>
                            </p>
                            <div class="credits">
                                Bring to you by <a href="">Ellin Asynari</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- JavaScript Section -->
<script src="<?php echo base_url(); ?>assets/Flattern/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/Flattern/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/Flattern/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo base_url(); ?>assets/user/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/user/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/Flattern/js/custom.js"></script>
</body>
</html>
