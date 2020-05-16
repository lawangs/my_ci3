<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('assets/AdminLTE/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">DEFAULT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php
                $level = $this->authentication->logged['user_level'];
                $this->db->select("*");
                $this->db->from("tbmaster_menu");
                $this->db->join("tbmaster_user_access", "menu_id = uac_menu_id", "left");
                $this->db->where("menu_parent_id =", NULL);
                $this->db->where("menu_is_active = '1'");
                $this->db->where("uac_user_level = '$level'");
                $this->db->where("uac_baca = '1'");

                // Query untuk mencari menu
                $main_menu = $this->db->get()->result_array();
                foreach ($main_menu as $main) :

                    // Query untuk mencari data sub menu
                    $this->db->select("*");
                    $this->db->from("tbmaster_menu");
                    $this->db->join("tbmaster_user_access", "menu_id = uac_menu_id", "left");
                    $this->db->where("menu_parent_id =", $main['menu_id']);
                    $this->db->where("menu_is_active = '1'");
                    $this->db->where("uac_user_level = '$level'");
                    $this->db->where("uac_baca = '1'");

                    $sub_menu = $this->db->get();

                    // periksa apakah ada sub menu
                    if ($sub_menu->num_rows() > 0) {
                ?>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon <?= $main['menu_icon']; ?>"></i>
                                <p>
                                    <?= $main['menu_name']; ?>
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <?php foreach ($sub_menu->result_array() as $sub) : ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() . $sub['menu_url']; ?>" class="nav-link">
                                            <i class="<?= $sub['menu_icon']; ?>"></i>
                                            <p><?= $sub['menu_name']; ?></p>
                                        </a>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon <?= $main['menu_icon']; ?>"></i>
                                <p>
                                    <?= $main['menu_name']; ?>
                                </p>
                            </a>
                        </li>
                <?php }
                endforeach; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>