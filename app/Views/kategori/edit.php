<?= view('layout/header')?>

<?= view('layout/nav')?>


<div class="col-md-12 col-sm-12 col-xs-12">


    <div class="card">
        <div class="card-body">
        <a href="<?= base_url('/kategori')?>" class="btn btn-primary">Kembali</a></button>
            <div class="basic-form">
                <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('kategori/aksi_edit')?>" method="post">
                <input type="hidden" name="id" value="<?= $data->kategoriID ?>">
                 <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Kategori<span style="color: red;">*</span></label>
                        <input type="text" id="namaKategori" name="namaKategori" 
                        class="form-control text-capitalize" placeholder="Nama Kategori" value="<?= $data->namaKategori?>">
                    </div>
                   
         
          <button type="submit" id="updateButton" class="btn btn-success">Edit Data</button>
      </form>
  </div>
</div>
</div>
</div>

<?= view('layout/footer')?>
