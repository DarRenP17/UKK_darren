<?= view('layout/header')?>

<?= view('layout/nav')?>


<div class="col-md-12 col-sm-12 col-xs-12">


    <div class="card">
        <div class="card-body">
        <a href="<?= base_url('/Peminjaman')?>" class="btn btn-primary">Kembali</a></button>
            <div class="basic-form">
                <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('peminjaman/aksi_input')?>" method="post">

                 <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Judul Buku<span style="color: red;">*</span></label>
                        <select id="bukuID" name="bukuID" 
                        class="form-control text-capitalize"  >
                        <option value="">-</option>
                        <?php foreach($data as $buku){
                          if($buku->stok != 0) {  ?>
                          <option value="<?= $buku->bukuID ?>"><?= $buku->judul?> tersisa <?= $buku->stok?></option>
                       <?php } } ?>
</select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Lengkap Peminjam Buku<span style="color: red;">*</span></label>
                        <select type="text" id="peminjam" name="peminjam" 
                        class="form-control text-capitalize" autocomplete="on" >
                        <option value="">-</option>
                        <?php foreach($peminjam as $pinjam){ ?>
                          <option value="<?= $pinjam->id_user?>"><?= $pinjam->namaLengkap?></option>
                       <?php } ?>
                          </select>
                    </div>
                    <div class="mb-3 col-md-6">
    <label class="form-label">Tanggal Pengembalian<span style="color: red;">*</span></label>
    <input type="date" id="pengembalian" name="pengembalian" 
           class="form-control text-capitalize" placeholder="Tanggal Pengembalian" autocomplete="on">
</div>

<script>
    // Get today's date
    var today = new Date();

    // Set the minimum date to the next day
    today.setDate(today.getDate() + 1);
    var minDate = today.toISOString().split('T')[0]; // Format: YYYY-MM-DD

    // Set the maximum date to 30 days or next month
    var maxDate = new Date(today);
    maxDate.setDate(maxDate.getDate() + 30);
    if (maxDate.getMonth() != today.getMonth()) { // If next month
        maxDate = new Date(today.getFullYear(), today.getMonth() + 1, 0); // Last day of current month
    }
    maxDate = maxDate.toISOString().split('T')[0]; // Format: YYYY-MM-DD

    // Set the minimum and maximum attributes of the input element
    document.getElementById('pengembalian').setAttribute('min', minDate);
    document.getElementById('pengembalian').setAttribute('max', maxDate);
</script>
           
              

              </div>
          </div>
         
          <button type="submit" id="SubmitButton" class="btn btn-success">input Data</button>
      </form>
  </div>
</div>
</div>
</div>

<?= view('layout/footer')?>
