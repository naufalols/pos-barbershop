<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Selamat Datang di Barber Bois!</h1>
                </div>
                <?= $this->session->flashdata('pesan'); ?>
                <form method="post" action="<?= base_url('auth'); ?>" class="user">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="username"  placeholder="Masukkan Email Anda" name="username" value="<?= set_value('username')?>">
                     <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Kata sandi" name="katasandi">
                     <?= form_error('katasandi', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <button type="submit" class="ui primary button">
                    Login
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="#">Lupa password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth/registrasi');?>">Registrasi</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
