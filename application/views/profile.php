<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once __DIR__ . '/admin/partials/header.php';
    ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper container">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once __DIR__ . '/admin/partials/navbar.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $title ?? 'Profile' ?></h1>
                    </div>

                    <?php if (isset($this->session->success)):?>
                        <div class="alert alert-success" role="alert">
                        <?= $this->session->success; ?>
                        </div>
                    <?php endif;?>
                    <?php if (isset($this->session->failed)):?>
                        <div class="alert alert-danger" role="alert">
                        <?= $this->session->failed; ?>
                        </div>
                    <?php endif;?>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Diisi kontent -->
                        <div class="col-md-6 d-inline">
                            <a href="#editProfile" data-bs-toggle="modal"  class="btn btn-success w-full my-2 ">EDIT PROFILE</a>
                            <a href="#editPassModal" data-bs-toggle="modal" class="btn btn-success w-full my-2">EDIT PASSWORD</a>
                        </div>
                        <?php if ($this->session->admin):?>
                        <div class="col-md-6 d-flex align-item-end">
                            <a href="<?= base_url('admin')?>" class="ms-auto btn btn-success w-full my-2">Dashboard</a>
                        </div>
                        <?php endif; ?>
                        <div class="col-md-12">
                            <div class="mb-3 mt-5">
                                <img src="<?= base_url() . ($user->foto != '' ? $user->foto :'asset/img/undraw_profile.svg') ?>" width="150" alt="foto" loading="lazy" srcset="">
                            </div>
                            <div class="mb-3">
                                <table>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?= $user->nama ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= $user->alamat ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="<?= base_url('profile/update') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nama"class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $user->nama ?>" id="nama" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="foto"class="form-label">foto</label>
                        <input type="file" class="form-control" name="foto" id="foto" accept="image/*" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat"class="form-label">alamat</label>
                        <textarea name="alamat" class="form-control" rows="10">
                            <?= $user->alamat ?>
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>


    <!-- Edit Password Modal -->
    <div class="modal fade" id="editPassModal" tabindex="-1" aria-labelledby="editPassModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPassModalLabel">Edit Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="<?= base_url('edit/password') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="pass1" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="pass1" id="pass1" require>
                    </div>
                    <div class="mb-3">
                        <label for="pass2" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="pass2" id="pass2" require>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('asset/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('asset/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('asset/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('asset/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>