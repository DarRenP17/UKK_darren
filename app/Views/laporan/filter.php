<?= view('layout/header')?>

<?= view('layout/nav')?>


<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title">
                            <h4>Laporan Buku</h4>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form id="Laporanbuku" method="post" target="_blank">

                                    <?php if(session()->has('error')): ?>
                                        <div class="alert alert-danger">
                                            <?= session()->getFlashdata('error') ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <label>Tanggal awal</label>
                                        <input required type="date" id="awal" name="awal"  class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal akhir</label>
                                        <input required type="date" id="akhir" name="akhir"  class="form-control" >
                                    </div>
                                    
                                        <!-- <button type="submit" class="btn btn-default">Submit</button> -->
                                    <a href="javascript:void(0);" onclick="generatePrintBuku()" class="btn btn-box btn-warning" title="Print"> <i class="ti-file"></i> Print</a>

                                    <a href="javascript:void(0);" onclick="generatePDBukun()" class="btn btn-box btn-danger" title="PDF"> <i class="ti-file"></i> PDF</a>

                                </form>
                            </div>
                        </div>
                    </div>

              
		</div>
                </div>
            </div>
        </div>
    </div>

    <script>

function generatePrintBuku() {
    var form = document.getElementById("Laporanbuku");
    form.action = "/laporan/print";
    form.submit();
}

  function generatePDBukun() {
    var form = document.getElementById("Laporanbuku");
    form.action = "/laporan/pdf";
    form.submit();
}

</script>

<?= view('layout/footer')?>
