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
                        <div class="col-lg-8">
                            <table class="table table-bordered" id="tblFacility">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Fasilitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($facilities as $i => $item): ?>
                                    <tr key="<?= $item->id ?>">
                                        <td class="align-baseline" data-bind="index"><?= $i+1 ?></td>
                                        <td class="align-baseline" data-bind="nama"><?= $item->nama_fasilitas ?></td>
                                        <td class="align-baseline">
                                            <a href="#" onclick="showUpdate('<?= $item->id ?>')" data-bs-toggle="modal" class="btn btn-warning">Edit</a>
                                            <a href="#" onclick="hapusData('<?= $item->id ?>')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Tampilan menambahkan data -->
                        <div class="col-lg-4">
                            <h4>Tambah data baru</h4>
                            <form id="formNewData">
                                <div class="mb-3">
                                    <label for="txt_nama" class="form-label">Nama Fasilitas</label>
                                    <input type="text" name="txt_nama" id="txt_nama" class="form-control" placeholder="Nama Fasilitas" required>
                                </div>
                                <div class="mb-3 d-flex justify-content-end">
                                    <button class="btn btn-success btn-sm" type="submit">Tambah</button>
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

    <!-- Modal -->
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form id="formUpdate">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateLabel">Update Fasilitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="mb-3">
                            <label for="updateName" class="form-label">Nama Fasilitas Baru</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#tblFacility').DataTable();

            $('#formUpdate').on('submit', function(e){
                e.preventDefault();
                
                const id = $('#formUpdate input[name=id]').val()
                const nama = $('#formUpdate input[name=nama]').val()

                $.ajax({
                    url: '<?= base_url('admin/facility/')?>' + id,
                    method: 'post',
                    dataType: 'json',
                    data: {
                        nama
                    },
                    success: function(res) {
                        location.reload()
                        // console.log(res);
                    },
                    error: function (res) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Gagal',
                            text: 'Gagal mengubah data'
                        })
                    }
                })
            })

            $('#formNewData').on('submit', function(e) {
                e.preventDefault();

                const nama = $('#txt_nama').val();
                $.ajax({
                    url: '<?= base_url('admin/facility'); ?>',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        'nama': nama
                    },
                    success: function(res) {
                        if (res.success) {
                            const data = res.data;
                            const latestRow = $('td[data-bind=index]:last').text();
                            const newLine = `
                            <tr key="${ data.id }">
                                <td class="align-baseline" data-bind="index">${ latestRow * 1 + 1 }</td>
                                <td class="align-baseline" data-bind="nama">${ data.nama_fasilitas }</td>
                                <td class="align-baseline">
                                    <a href="<?= base_url('fasilitas/edit')?>" class="btn btn-warning">Edit</a>
                                    <a href="#" onclick="hapusData('${ data.id }')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            `;
                            
                            $('.dataTables_empty').parent('tr').remove()
                            $('#tblFacility tbody').append(newLine);
                            $('#tblFacility').DataTable();
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Berhasil menambahkakn data',
                            });

                            $('#txt_nama').val('');
                        }
                    },
                    error: function(res) {
                        Swal.fire({
                            icon: 'error',
                            title: 'error',
                            text: 'Gagal menambahkan data',
                        })
                        console.log(res);
                    }
                })
            })

        });

        function showUpdate(id) {
            $('#formUpdate input[name=id]').val(id)
            const nama = $('#formUpdate input[name=nama]').val($('tr[key=' + id + '] td[data-bind=nama]').text())
            
            // document.getElementById('update').show()
            $('#update').modal('show')
        }

        function hapusData(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '<?= base_url('admin/facility/')?>' + id,
                            method: 'delete',
                            dataType: 'json',
                            success: function(res) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses',
                                    text: 'Berhasil menambahkakn data',
                                })

                                $('tr[key=' + id + ']').remove();
                                $('td[data-bind=index]').each((i, e) => {
                                    e.innerHTML = i + 1;
                                })
                                $('#tblFacility').DataTable();
                            },
                            error: function(res) {
                                Swal.fire({
                                    icon: 'danger',
                                    title: 'Gagal',
                                    text: 'Gagal menambahkakn data',
                                })
                                console.log(res);
                            }
                        })
                    }
                })
            }
    </script>
</body>

</html>