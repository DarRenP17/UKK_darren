<?= view('layout/header')?>


<div class="unix-login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-3">
                <div class="login-content">
                    <div class="card">
                    <div class="login-form">
                        <h4>Login Perpustakaan Game</h4>
                        <?php if(!empty($error)) { 
                        implode('', $errors->all('<div style="color: red;">:message</div>')); 
                        } ?>
                        <form action="/home/aksi_login" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            </div>
                           
                          <button type="submit" class="btn btn-primary col-lg-12 align-right">Login</button>
                      </form><br>

                      <h4>Tidak punya akun?<a href="/home/register">Tekan Tulisan biru ini</a></h4>
                  </div>
                    </div>
              </div>
          </div>
      </div>
  </div>
</div>

<?= view('layout/footer')?>