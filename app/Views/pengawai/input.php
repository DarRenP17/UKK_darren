<?= view('layout/header')?>

<?= view('layout/nav')?>


<div class="col-md-12 col-sm-12 col-xs-12">


    <div class="card">
        <div class="card-body">
        <a href="<?= base_url('/Pengawai')?>" class="btn btn-primary">Kembali</a></button>
            <div class="basic-form">
                <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('pengawai/aksi_input')?>" method="post">

                 <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Pegawai<span style="color: red;">*</span></label>
                        <input type="text" id="nama_pegawai" name="nama_pegawai" 
                        class="form-control text-capitalize" placeholder="Nama Pegawai" >
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Alamat<span style="color: red;">*</span></label>
                        <input type="text" id="alamat" name="alamat" 
                        class="form-control text-capitalize" placeholder="Alamat" autocomplete="on" >
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">email<span style="color: red;">*</span></label>
                        <input type="email" id="email" name="email" 
                        class="form-control text-capitalize" placeholder="Email" autocomplete="on" >
                    </div>
                   
                    <div class="mb-3 col-md-6">
                    <label class="form-label     ">Username<span style="color: red;">*</span></label>
                    <input type="text" id="username" name="username" 
                    class="form-control text-capitalize" placeholder="Username" >
                </div>

           
                <div class="mb-3 col-md-6">
                    <label class="form-label">Level<span style="color: red;">*</span></label>
                    <div class="col-12">
                        <select id="level" class="form-control col-12" name="level" required="required">
                            <option value="admin" selected>Admin</option>
                            <option value="petugas">Petugas</option>
                      </select>
                  </div>
              </div>
          </div>
         
          <button type="submit" id="updateButton" class="btn btn-success">input Data</button>
      </form>
  </div>
</div>
</div>
</div>

<?= view('layout/footer')?>
