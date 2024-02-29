<?= view('layout/header')?>

<?= view('layout/nav')?>


<div class="col-md-12 col-sm-12 col-xs-12">


    <div class="card">
        <div class="card-body">
        <a href="<?= base_url('/Buku')?>" class="btn btn-primary">Kembali</a></button>
            <div class="basic-form">
                <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('buku/aksi_edit')?>" method="post">
                <input type="hidden" name="id" value="<?= $buku->bukuID ?>">
                 <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Judul Buku<span style="color: red;">*</span></label>
                        <input type="text" id="judul" name="judul" 
                        class="form-control text-capitalize" placeholder="Judul"  value="<?= $buku->judul?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Penulis Buku<span style="color: red;">*</span></label>
                        <input type="text" id="penulis" name="penulis" 
                        class="form-control text-capitalize" placeholder="Penulis" autocomplete="on"  value="<?= $buku->penulis?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Penerbit<span style="color: red;">*</span></label>
                        <input type="text" id="penerbit" name="penerbit" 
                        class="form-control text-capitalize" placeholder="Penerbit" autocomplete="on" value="<?= $buku->penerbit?>" >
                    </div>
                   
                    <div class="mb-3 col-md-6">
                    <label class="form-label     ">Tahun terbit<span style="color: red;">*</span></label>
                    <input type="text" id="tahun" name="tahun" 
                    class="form-control text-capitalize" placeholder="Tahun Terbit" value="<?= $buku->tahunTerbit?>" >
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label     ">Stok<Stok style="color: red;">*</span></label>
                    <input type="number" id="stok" name="stok" 
                    class="form-control text-capitalize" placeholder="Stok" value="<?= $buku->stok?>" >
                </div>

         



              </div>
          </div>
         
          <button type="submit" id="updateButton" class="btn btn-success">Edit Data</button>
      </form>
  </div>
</div>
</div>
</div>

<?= view('layout/footer')?>
