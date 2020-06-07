<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">

          <div class="card-header">
            <button type="button" class="btn btn-info btn-tambah">
              <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
            </button>
          </div>
          <!-- /.card-header -->

          <div class="tampil-tambah"></div>

          <div class="card-body">
            <ul class="todo-list" data-widget="todo-list">
              <?php foreach ($menus as $menu) :
                // Query untuk mencari data sub menu
                $this->db->select("*");
                $this->db->from("tbmaster_menu");
                $this->db->where("menu_parent_id =", $menu['menu_id']);

                $sub_menu = $this->db->get();

                // periksa apakah ada sub menu
                if ($sub_menu->num_rows() > 0) {
              ?>
                  <li class="<?= $menu['menu_is_active'] != '1' ? 'done' : '' ?>">
                    <!-- drag handle -->
                    <span>
                      <i class="<?= $menu['menu_icon']; ?>"></i>
                    </span>
                    <!-- todo text -->
                    <span class="text"><?= $menu['menu_name']; ?></span>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-edit btn-edit" data-id="<?= $menu['menu_id']; ?>"></i>
                      <!-- <i class="fas fa-trash-o"></i> -->
                    </div>
                  </li>
                  <?php foreach ($sub_menu->result_array() as $sub) : ?>
                    <li class="<?= $sub['menu_is_active'] != '1' ? 'done' : '' ?>">
                      <ul>
                        <li>
                          <span>
                            <i class="<?= $sub['menu_icon']; ?>"></i>
                          </span>
                          <!-- todo text -->
                          <span class="text"><?= $sub['menu_name']; ?></span>
                          <!-- General tools such as edit or delete-->
                          <div class="tools">
                            <i class="fas fa-edit btn-edit" data-id="<?= $sub['menu_id']; ?>"></i>
                          </div>
                        </li>
                      </ul>
                    </li>
                  <?php endforeach; ?>
                <?php } else { ?>

                  <li class="<?= $menu['menu_is_active'] != '1' ? 'done' : '' ?>">
                    <span>
                      <i class="<?= $menu['menu_icon']; ?>"></i>
                    </span>
                    <!-- todo text -->
                    <span class="text"><?= $menu['menu_name']; ?></span>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-edit btn-edit" data-id="<?= $menu['menu_id']; ?>"></i>
                    </div>
                  </li>
              <?php }
              endforeach; ?>
            </ul>

          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>