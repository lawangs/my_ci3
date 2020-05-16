<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Tambah User</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="<?= base_url('user/store'); ?>" method="POST">
            <div class="card-body">

              <div class="form-group">
                <label>Username</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                  </div>
                  <input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>" autocomplete="off">
                </div>
                <?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
              </div>

              <div class="form-group">
                <label>Nama Lengkap</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-id-card" aria-hidden="true"></i>
                    </span>
                  </div>
                  <input type="text" name="fullname" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('fullname'); ?>" autocomplete="off">
                </div>
                <?= form_error('fullname', '<small class="form-text text-danger">', '</small>'); ?>
              </div>

              <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
              </div>

              <div class="form-group">
                <label>Ulangi Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                  </div>
                  <input type="password" name="password2" class="form-control" placeholder="Ulangi Password">
                </div>
                <?= form_error('password2', '<small class="form-text text-danger">', '</small>'); ?>
              </div>

              <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                </div>
                <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
              </div>

              <div class="form-group">
                <label for="">Level</label>
                <select class="form-control" name="level">
                  <option value="">- Level -</option>
                  <?php foreach ($levels as $level) : ?>
                    <option value="<?= $level['uvel_level']; ?>"><?= $level['uvel_nama']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('level', '<small class="form-text text-danger">', '</small>'); ?>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>