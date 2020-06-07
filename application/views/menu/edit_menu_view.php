<form action="<?= base_url('menu/update'); ?>" method="POST">
  <!-- Modal -->
  <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Nama Menu</label>
            <input value="<?= $menu['menu_name']; ?>" type="text" class="form-control" name="menu" id="" aria-describedby="helpId" placeholder="Nama Menu" required>
          </div>
          <div class="form-group">
            <label for="">Link / URL</label>
            <input value="<?= $menu['menu_url']; ?>" type="text" class="form-control" name="url" aria-describedby="helpId" placeholder="Url">
          </div>
          <div class="form-group">
            <label for="">Icon</label>
            <input value="<?= $menu['menu_icon']; ?>" type="text" class="form-control" name="icon" id="" aria-describedby="helpId" placeholder="Icon Font Awesome" required>

          </div>
          <div class="form-group">
            <label for="">Parent</label>
            <select class="form-control" name="parent" required>
              <option value="">- PILIH PARENT -</option>
              <option value="NULL" <?= ($menu['menu_parent_id'] == NULL) ? 'selected' : ''; ?>>PARENT</option>
              <?php foreach ($parents as $parent) : ?>
                <option value="<?= $parent['menu_id']; ?>" <?= ($menu['menu_parent_id'] == $parent['menu_id']) ? 'selected' : ''; ?>><?= $parent['menu_name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="">Aktif</label>
            <select class="form-control" name="status">
              <option value="1" <?= ($menu['menu_is_active'] == '1') ? 'selected' : ''; ?>>YA</option>
              <option value="0" <?= ($menu['menu_is_active'] == '0') ? 'selected' : ''; ?>>TIDAK</option>
            </select>
          </div>
        </div>
        <div class=" modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="hidden" name="id" value="<?= $menu['menu_id']; ?>">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>