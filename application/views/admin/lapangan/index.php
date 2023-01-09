<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once __DIR__ . '/../partials/header.php';
    ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            require_once __DIR__ . '/../partials/sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once __DIR__ . '/../partials/navbar.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $title ?? 'Dashboard' ?></h1>
                        <a href="<?= base_url('admin/lapangan/add') ?>" class="btn btn-success">Tambah Data</a>
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

    <!-- Page level plugins -->
    <script src="<?= base_url('asset/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('asset/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#tblLapangan').DataTable();
        });

 </script>
</body>

</html>