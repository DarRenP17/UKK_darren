

<?= view('layout/header')?>

<?= view('layout/nav')?>

<div class="row">
   

    <style>
    .card {
        border: 1px solid #e5e5e5;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        overflow: hidden; 
    }

    .card-bg {
        background-size: 100% 100%;
        height: 150px;
        position: relative;
    }

    .card-body {
        padding: 20px;
    }

    table {
        width: 100%;
        margin-bottom: 0;
        border-collapse: collapse; 
    }

    th, td {
        border: none;
        padding: 4px; 
        text-align: left;
    }

    th {
        width: 40%;
        font-weight: normal;
    }

    .form-group {
        margin-bottom: 15px;
    }

    hr {
        margin-top: 15px;
        margin-bottom: 20px;
        border: 0;
        border-top: 1px solid #000000;
    }
    </style>

    <div class="col-md-5 col-sm-5 col-xs-5">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('Profile/ganti_pw')?>" method="post">
                
                <div class="item form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12">Ganti Password Baru<span style="color: black;"> :</span>
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group">
                      <input type="password" placeholder="Ganti Password Baru" name="p1" class="form-control col-md-12 col-xs-12" data-validate-length-range="6" data-validate-words="2" id="newPassword" >
                      <span class="input-group-text" id="togglePassword"><i class="fa fa-eye" aria-hidden="true"></i></span>
                  </div>
              </div>
          </div>
          <div class="item form-group">
              <label class="control-label col-md-12 col-sm-12 col-xs-12">Verifikasi Password Baru<span style="color: black;"> :</span>
              </label>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="input-group">
                    <input type="password" placeholder="Verifikasi Password Baru" name="pw" class="form-control col-md-12 col-xs-12" data-validate-length-range="6" data-validate-words="2" id="verifyPassword">
                    <span class="input-group-text" id="togglePasswordVerify"><i class="fa fa-eye" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <small class="form-text text-danger" id="passwordMismatchAlert" style="display: none;">Password yang anda masukkan harus sama.</small>
        <div class="ln_solid"></div>
        <div class="form-groupp">
            <div class="col-md-12 float-right">
                <button id="submitButton" type="submit" class="btn btn-info" disabled>Ganti Password</button>
            </div>
        </div>
        <style>
            .form-groupp .col-md-12 {
                text-align: right;
            }
        </style>
  </form>
</div>
</div>
</div>

<div class="col-md-5 col-sm-5 col-xs-5">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('Profile/ganti_profile')?>" method="post">
                
                <div class="item form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12">Username<span style="color: black;"> :</span>
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group">
                    <input type="text" id="username" name="username" 
                        class="form-control text-capitalize" placeholder="Username" value="<?= $data->username?>">
                  </div>
              </div>
          </div>
          <div class="item form-group">
              <label class="control-label col-md-12 col-sm-12 col-xs-12">Nama Lengkap<span style="color: black;"> :</span>
              </label>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="input-group">
                <input type="text" id="namaLengkap" name="namaLengkap" 
                        class="form-control text-capitalize" placeholder="Nama Lengkap" value="<?= $data->namaLengkap?>">
                </div>
            </div>
        </div>

        <div class="item form-group">
              <label class="control-label col-md-12 col-sm-12 col-xs-12">Alamat<span style="color: black;"> :</span>
              </label>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="input-group">
                <input type="text" id="alamat" name="alamat" 
                        class="form-control text-capitalize" placeholder="alamat"  value="<?= $data->alamat?>">
                </div>
            </div>
        </div>

        <div class="item form-group">
              <label class="control-label col-md-12 col-sm-12 col-xs-12">Email<span style="color: black;"> :</span>
              </label>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="input-group">
                <input type="text" id="email" name="email" 
                        class="form-control text-capitalize" placeholder="Email" value="<?= $data->email?>" >
                </div>
            </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-groupp">
            <div class="col-md-12 float-right">
                <button id="submitButton" type="submit" class="btn btn-info" >Ganti data</button>
            </div>
        </div>
        <style>
            .form-groupp .col-md-12 {
                text-align: right;
            }
        </style>
  </form>
</div>
</div>
</div>
</div>


<?= view('layout/footer')?>
