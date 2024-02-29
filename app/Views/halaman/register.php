<?= view('layout/header')?>


<div class="unix-login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="login-content">
                    <div class="card">
                    <div class="login-form">
                        <h4>Registrasi Perpustakaan Game</h4>
                        <?php if(!empty($error)) { 
                        implode('', $errors->all('<div style="color: red;">:message</div>')); 
                        } ?>
                        <form action="/home/aksi_registrasi" method="POST">
                            <div class="form-group">
                                <label>Nama Lengkap </label>
                                <input type="text" id="namaLengkap" name="namaLengkap" class="form-control" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="example@gmail.com">
                            </div>

                            <div class="form-group">
                                <label>Alamat </label>
                                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat">
                            </div>
                           

                            <div class="form-group">
                                <label>Username </label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label>Password </label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            </div>
                           
                          <button type="submit" class="btn btn-primary col-lg-12">Registrasi</button>
                      </form><br>

                      <h4>Sudah punya akun?<a href="/home">Tekan Tulisan biru ini</a></h4>
                  </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<?= view('layout/footer')?>