<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <div class="card">

          <div class="card-header">
            <a href="<?= base_url('user/create'); ?>" type="button" class="btn btn-info">
              <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
            </a>
          </div>
          <!-- /.card-header -->

          <div class="card-body">
            <table id="datatable-polos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>User Level</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($levels as $level) : ?>
                  <tr>
                    <td><?= $level['uvel_nama']; ?></td>
                    <td class="text-center"><a href="#" class="badge badge-warning btn-show" data-level="<?= $level['uvel_level']; ?>">Akses</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-md-4 -->

      <div class="col-lg-8 tampil-edit"></div>
      <!-- /.col-md-5 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>