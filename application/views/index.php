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
                    
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $title ?? 'Profile' ?></h1>
                    </div> -->

                    <!-- Content Row -->
                    <form action="<?= base_url() ?>" class="form-inline" method="get">
                        <div class="form-group d-flex align-items-baseline">
                            <label for="tanggal" class="form-label mr-2">Tanggal</label>
                            <input type="date" class="form-control mb-2 ms-sm-2" name="tanggal" id="tanggal" min="<?= date('Y-m-d') ?>" value="<?= $tanggal ?>">
                        </div>
                        <div class="form-group ml-3 d-flex align-items-baseline">
                            <label for="lapangan" class="form-label mr-2">Lapangan</label>
                            <select name="kode_lapangan" id="lapangan" class="form-control">
                                <option value="" disabled selected>Pilih lapangan</option>
                                <?php foreach ($lapangan as $item) : ?>
                                    <option value="<?= $item->kode_lapangan ?>" <?= $item->kode_lapangan == $kode_lapangan ? 'selected' : '' ?>><?= $item->nama_lapangan ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group ml-3 d-flex align-items-baseline">
                            <input type="submit" class="btn btn-success" value="Filter">
                        </div>
                        <a href="<?= base_url('booking') ?>" class="btn btn-success ml-5">Pesan</a>
                    </form>
                    <div class="row">
                        <!-- Diisi kontent -->
                        <div class="col-md-12">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lapangan</th>
                                        <th>Fasilitas</th>
                                        <th>Nama Pemesan</th>
                                        <th>Tanggal</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tabel_lapangan as $i => $item) :?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td><?= $item->nama_lapangan ?></td>
                                            <td><?= $item->fasilitas ?></td>
                                            <td><?= $item->nama_user ?></td>
                                            <td><?= $item->tanggal ?></td>
                                            <td><?= $item->waktu_mulai ?></td>
                                            <td><?= $item->waktu_selesai ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12 mt-5">
                            <label for="#"><h3>Daftar Lapangan & Fasilitasnya</h3></label>
                            <table class="table table-bordered" id="allTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lapangan</th>
                                        <th>Fasilitas</th>
                                        <th>Harga Perjam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lapangan_all as $i => $item) :?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td><?= $item->nama_lapangan ?></td>
                                            <td><?= $item->fasilitas ?></td>
                                            <td><?= number_format($item->harga_perjam, 2) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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

    <!-- Page level plugins -->
    <script src="<?= base_url('asset/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('asset/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        $(function() {
            $('#dataTable').DataTable()
        })
    </script>

</body>

</html>