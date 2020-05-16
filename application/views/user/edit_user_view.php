<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Edit User</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="<?= base_url('user/update'); ?>" method="POST">
            <div class="card-body">

              <div class="form-group">
                <label>Username</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                  </div>
                  <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $user['user_username']; ?>" autocomplete="off" readonly>
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
                  <input type="text" name="fullname" class="form-control" placeholder="Nama Lengkap" value="<?= $user['user_fullname']; ?>" autocomplete="off" required>
                </div>
                <?= form_error('fullname', '<small class="form-text text-danger">', '</small>'); ?>
              </div>

              <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $user['user_email']; ?>">
                </div>
                <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="">Level</label>
                <select class="form-control" name="level" required>
                  <option value="">- Level -</option>
                  <?php foreach ($levels as $level) : ?>
                    <option value="<?= $level['uvel_level']; ?>" <?= ($level['uvel_level'] == $user['user_level'] ? 'selected' : '') ?>><?= $level['uvel_nama']; ?></option>
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