<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">F Hore <sup>Beta</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(2) == null ? 'active' : ''?>">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(2) == 'facility' ? 'active' : ''?>">
                <a class="nav-link" href="<?= base_url('admin/facility')?>">
                    <i class="fas fa-dharmachakra"></i>
                    <span>Fasilitas</span>
                </a>
            </li>

            <li class="nav-item <?= $this->uri->segment(2) == 'lapangan' ? 'active' : ''?>">
                <a class="nav-link" href="<?= base_url('admin/lapangan')?>">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Lapangan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>