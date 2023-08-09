<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin');?>">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fas fa fa-th-list"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Menu Utama</div>
            </a>

            <!-- Divider -->
            <?php
            $id_level = $this->session->userdata('id_level');
            $queryMenu = "SELECT menu.id_menu,menu.nama_menu,menu.url,menu.icon
                                  FROM menu
                                  JOIN aksesmenu ON menu.id_menu = aksesmenu.id_menu
                                  WHERE aksesmenu.id_level = $id_level AND menu.aktif='1'
                                  ORDER BY menu.urutan ASC";
            $menu = $this->db->query($queryMenu)->result_array();
            //query menu
            foreach ($menu as $mn) : ?>
                <?php
                $id_menu = $mn['id_menu'];
                $nama_menu = $mn['nama_menu'];
                //menu aktif
                if ($judul == $nama_menu) {
                    $aktif = 'active';
                } else {
                    $aktif = '';
                }

                $querySubMenu = "SELECT * FROM submenu WHERE id_menu=$id_menu and aktif='1' ORDER BY urutan ASC";
                $submenu = $this->db->query($querySubMenu);
                if ($submenu->num_rows() > 0) {


                ?>
                    <hr class="sidebar-divider">
                    <!-- Master -->
                    <li class="nav-item <?= $aktif; ?>">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#<?= 'menu' . $id_menu; ?>" aria-expanded="true" aria-controls="<?= $id_menu; ?>">
                            <i class="<?= $mn['icon']; ?>"></i>
                            <span><?= $mn['nama_menu']; ?></span>
                        </a>
                        <div id="<?= 'menu' . $id_menu; ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <?php foreach ($submenu->result_array() as $submn) : ?>
                                    <a class="collapse-item" href="<?= base_url($submn['url']); ?>"><?= $submn['nama_submenu']; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </li>

                <?php } else { ?>
                    <hr class="sidebar-divider">
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item <?= $aktif; ?>">
                        <a class="nav-link" href="<?= base_url($mn['url']); ?>">
                            <i class="<?= $mn['icon']; ?>"></i>
                            <span><?= $mn['nama_menu']; ?></span></a>
                    </li>
                <?php } ?>
                <!-- Divider -->
            <?php endforeach; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->