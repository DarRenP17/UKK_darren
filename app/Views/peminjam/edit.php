 

 <?= view('layout/header')?>

<?= view('layout/nav')?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
        <a href="<?= base_url('/peminjam')?>" class="btn btn-primary">Kembali</a></button>
            <div class="basic-form">
                <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('peminjam/aksi_edit')?>" method="post">
                 <input type="hidden" name="id" value="<?= $data->id_user ?>">

                 <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Peminjam<span style="color: red;">*</span></label>
                        <input type="text" id="nama_pegawai" name="nama_pegawai" 
                        class="form-control text-capitalize" placeholder="Nama Pegawai" value="<?= $data->namaLengkap?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Alamat<span style="color: red;">*</span></label>
                        <input type="text" id="alamat" name="alamat" 
                        class="form-control text-capitalize" placeholder="Alamat" autocomplete="on"  value="<?= $data->alamat?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">email<span style="color: red;">*</span></label>
                        <input type="text" id="email" name="email" 
                        class="form-control text-capitalize" placeholder="Email" autocomplete="on"  value="<?= $data->email?>">
                    </div>

              
                   
          </div>
         
          <button type="submit" id="updateButton" class="btn btn-success">Edit Data</button>
      </form>
  </div>
</div>
</div>
</div>

<?= view('layout/footer')?>
