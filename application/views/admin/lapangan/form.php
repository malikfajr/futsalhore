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
                        <div class="col-md-10 mx-auto">
                            <form action="<?= base_url() ?>admin/lapangan<?= !empty($id) ? '/' . $id : ''?>" method="post">
                                <?php 
                                    if (!empty($id)) {
                                        echo "<input type='hidden' name='id' value='$id'>";
                                    }
                                ?>
                                
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lapangan</label>
                                    <input type="text" 
                                        class="form-control" 
                                        name="nama" id="nama" 
                                        placeholder="Nama Lapangan"
                                        value="<?= $lapangan->nama_lapangan ?? ''?>"/>
                                </div>

                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga Lapangan</label>
                                    <input type="number" 
                                        class="form-control" 
                                        name="harga" id="harga" 
                                        placeholder="Harga"
                                        value="<?= $lapangan->harga_lapangan ?? ''?>"/>
                                </div>

                                <div class="mb-3">
                                    <label for="fasilitas" class="form-label">fasilitas Lapangan</label>
                                    <select 
                                        name="fasilitas[]" 
                                        id="fasilitas" 
                                        class="form-control" 
                                        multiple>
                                        <?php foreach ($fasilitas as $index => $item) : ?>
                                            <option 
                                                value="<?= $item->id ?>">
                                                    <?= $item->nama_fasilitas ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
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

    <!-- Optional script for select2 -->
    <script src="<?= base_url('asset/') ?>js/select2.min.js"></script>
    <script>
        $(function() {
            $('#fasilitas').select2({
                placeholder: "Masukkan Beberapa Fasilitas"
            });
        });
    </script>
</body>

</html>