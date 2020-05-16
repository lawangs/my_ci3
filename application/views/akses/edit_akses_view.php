<div class="card">

  <div class="card-header">
    <h5><?= $level['uvel_nama']; ?></h5>
  </div>
  <!-- /.card-header -->

  <div class="card-body">
    <table id="datatable-polos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
      <thead class="text-center">
        <tr>
          <th>Menu</th>
          <th>Baca</th>
          <th>Tambah</th>
          <th>Ubah</th>
          <th>Hapus</th>
        </tr>
      </thead>

      <tbody>
        <?php
        function access($id, $aktif, $jenis)
        {
          return
            '<div class="icheck-success d-inline">
              <input name="akses' . $id . '" ' . ($aktif == '1' ? 'checked' : '') . 'class="check" type="checkbox" id="checkbox' . $jenis . $id . '">
              <label for="checkbox' . $jenis . $id . '"></label>
            </div>';
        }
        foreach ($akses as $akses) : ?>
          <tr>
            <td><?= $akses['menu_name']; ?></td>

            <td class="text-center">
              <?= access($akses['uac_id'], $akses['uac_baca'], 'baca'); ?>
            </td>

            <?php if ($akses['menu_parent_id'] != NULL) { ?>

              <td class="text-center">
                <div class="icheck-success d-inline">
                  <input class="check" type="checkbox" id="checkboxCreate<?= $akses['uac_id']; ?>" <?= ($akses['uac_tambah'] == '1' ? 'checked' : ''); ?> data-menu="<?= $akses['uac_menu_id']; ?>" data-level="<?= $akses['uac_user_level']; ?>" data-jenis="tambah">
                  <label for="checkboxCreate<?= $akses['uac_id']; ?>"></label>
                </div>
              </td>

              <td class="text-center">
                <div class="icheck-success d-inline">
                  <input class="check" type="checkbox" id="checkboxUpdate<?= $akses['uac_id']; ?>" <?= ($akses['uac_ubah'] == '1' ? 'checked' : ''); ?> data-menu="<?= $akses['uac_menu_id']; ?>" data-level="<?= $akses['uac_user_level']; ?>" data-jenis="ubah">
                  <label for="checkboxUpdate<?= $akses['uac_id']; ?>"></label>
                </div>
              </td>

              <td class="text-center">
                <div class="icheck-success d-inline">
                  <input class="check" type="checkbox" id="checkboxDelete<?= $akses['uac_id']; ?>" <?= ($akses['uac_hapus'] == '1' ? 'checked' : ''); ?> data-menu="<?= $akses['uac_menu_id']; ?>" data-level="<?= $akses['uac_user_level']; ?>" data-jenis="hapus">
                  <label for="checkboxDelete<?= $akses['uac_id']; ?>"></label>
                </div>
              </td>

            <?php } else { ?>
              <td colspan="3"></td>
            <?php } ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->

</div>
<!-- /.card -->

<script>
  $('.check').on('click', function() {

    const menuId = $(this).data('menu');
    const level = $(this).data('level');
    const jenis = $(this).data('jenis');

    $.ajax({
      url: "<?= base_url('akses/update'); ?>",
      // method: "POST",
      type: 'POST',
      data: {
        menuId: menuId,
        level: level,
        jenis: jenis,
      },
      success: function() {
        toastr["success"]("", "Berhasil");
      },
      statusCode: {
        401: function() {
          window.location = "<?= base_url() ?>auth"
        },
        403: function() {
          Swal.fire({
            icon: 'error',
            title: 'Access Not Granted.',
            timer: 1500,
            showConfirmButton: false,
          })
        }
      }
    })
  });
</script>