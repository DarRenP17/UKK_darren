<?= view('layout/header')?>

<?= view('layout/nav')?>

<div class="row">

    <div class="col-lg-12">
        <div class="card">
        <div class="card-title">
            <p>Tabel Koleksi Buku</p>
            </div>

        <div class="card-body">
       
        <table id="bootstrap-data-table" class="table table-striped table-bordered">					<thead>
						<tr>
							<th style="text-align: center;" width="1000px">No.</th>
							<th style="text-align: center;" width="1000px">Judul</th>
							<th style="text-align: center;" width="1000px">Penulis</th>
							<th style="text-align: center;" width="1000px">Penerbit</th>
							<th style="text-align: center;" width="1000px">Tahun Terbit</th>
                            <th style="text-align: center;" width="1000px">Kategori</th>
							<th style="text-align: center;" width="1300px">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                    $no=1;
                    foreach ($data as $dataa){?>
						<tr>
							<td style="text-align: center;" class="text-capitalize"><?php echo $no++ ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->judul ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->penulis ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->penerbit ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->tahunTerbit ?></td>
                            <td style="text-align: center;" class="text-capitalize">
                            
                            <?php foreach($kategori[$dataa->bukuID] as $gori)
                            { echo $gori->namaKategori.", "; }?>
                        </td>
							<td>
							<div class="text-center mb-1">

                            <a href="<?= base_url('/buku/Ulasan/'.$dataa->bukuID) ?>" class="btn btn-primary">
										Ulasan
									</a>
                              
									<a href="<?= base_url('/koleksi/hapus/'.$dataa->bukuID) ?>" class="btn btn-danger">
										hapus dari Koleksi
									</a>
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

