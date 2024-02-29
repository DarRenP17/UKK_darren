<?= view('layout/header')?>

<?= view('layout/nav')?>

<div class="row">

    <div class="col-lg-12">
        <div class="card">
        <div class="card-title">
            <p>Tabel Kategori Buku</p>
            </div>

        <div class="card-body">
        <a href="<?= base_url('/kategori/input')?>"> <button type="button" class="btn btn-success" >
										Tambah kategori Buku
									</button> </a>
        <table id="bootstrap-data-table" class="table table-striped table-bordered">					<thead>
						<tr>
							<th style="text-align: center;" width="1000px">No.</th>
							<th style="text-align: center;" width="1000px">Nama Kategori</th>
							<th style="text-align: center;" width="1000px">Jumlah Buku dengan kategori</th>
							
							<th style="text-align: center;" width="1300px">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                    $no=1;
                    foreach ($data as $dataa){?>
						<tr>
							<td style="text-align: center;" class="text-capitalize"><?= $no++ ?></td>
							<td style="text-align: center;" class="text-capitalize"><?= $dataa->namaKategori ?></td>
							<td style="text-align: center;" class="text-capitalize"><?= $dataa->jumlah_buku ?></td>
							
							<td>
							<div class="text-center mb-1">
                           
									<a href="<?= base_url('/kategori/edit/'.$dataa->kategoriID) ?>" class="btn btn-warning">
										Edit
									</a>
									<a href="<?= base_url('/kategori/hapus/'.$dataa->kategoriID)?>"><button type="button" class="btn btn-danger" >
										Delete
									</button> </a>
							</div>
                            </td>

                           
							
						</tr>
                    <?php }?>
					</tbody>
				</table>
          
            </div>
        </div>

    </div>

   







</div>


<?= view('layout/footer')?>

