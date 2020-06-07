<form action="<?= base_url('menu/store'); ?>" method="POST">
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
            <input type="text" class="form-control" name="menu" id="" aria-describedby="helpId" placeholder="Nama Menu" required>
          </div>
          <div class="form-group">
            <label for="">Link / URL</label>
            <input type="text" class="form-control" name="url" aria-describedby="helpId" placeholder="Url">
          </div>
          <div class="form-group">
            <label for="">Icon</label>
            <input type="text" class="form-control" name="icon" id="" aria-describedby="helpId" placeholder="Icon Font Awesome" required>

          </div>
          <div class="form-group">
            <label for="">Parent</label>
            <select class="form-control" name="parent" required>
              <option value="">- PILIH PARENT -</option>
              <option value="NULL">PARENT</option>
              <?php foreach ($parents as $parent) : ?>
                <option value="<?= $parent['menu_id']; ?>"><?= $parent['menu_name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class=" modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>