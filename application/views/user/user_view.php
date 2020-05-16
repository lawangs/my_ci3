<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">

          <div class="card-header">
            <a href="<?= base_url('user/create'); ?>" type="button" class="btn btn-info">
              <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
            </a>
          </div>
          <!-- /.card-header -->

          <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Username</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Status</th>
                  <!-- <th>Last IP Login</th> -->
                  <th>Create By</th>
                  <th>Create Dt</th>
                  <th>Modify BY</th>
                  <th>Modify Dt</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 0;
                foreach ($users as $user) :
                  $no++;
                  $active = $user['user_is_active'];
                ?>
                  <tr>
                    <td class="text-center"><?= $no; ?></td>
                    <td class="text-center">
                      <a href="<?= base_url('user/edit/') . $user['user_username']; ?>" class="badge badge-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-user-edit"></i></a>
                      <?php if ($active == '1') { ?>
                        <a href="<?= base_url('user/deactivated/') . $user['user_username']; ?>" class="badge badge-danger tombol-deactivated" data-toggle="tooltip" data-placement="top" title="NonAktifkan"><i class="fas fa-user-slash"></i></a>
                      <?php } else { ?>
                        <a href="<?= base_url('user/activated/') . $user['user_username']; ?>" class="badge badge-success tombol-activated" data-toggle="tooltip" data-placement="top" title="Aktifkan"><i class="fas fa-user-check"></i></a>
                      <?php } ?>
                      <a href="<?= base_url('user/destroy/') . $user['user_username']; ?>" class="badge badge-danger tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></a>
                    </td>
                    <td><?= $user['user_username']; ?></td>
                    <td><?= $user['user_fullname']; ?></td>
                    <td><?= $user['user_email']; ?></td>
                    <td><?= $user['uvel_nama']; ?></td>
                    <td class="text-center">
                      <?php

                      if ($active == '1') { ?>
                        <span class="badge badge-success">Aktif</span>
                      <?php } else { ?>
                        <span class="badge badge-danger">NonAktif</span>
                      <?php } ?>
                    </td>
                    <!-- <td><?= $user['user_ip_address']; ?></td> -->
                    <td><?= $user['user_created_by']; ?></td>
                    <td><?= $user['user_created_at']; ?></td>
                    <td><?= $user['user_updated_by']; ?></td>
                    <td><?= $user['user_updated_at']; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
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