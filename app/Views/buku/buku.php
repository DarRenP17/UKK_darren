<?= view('layout/header')?>

<?= view('layout/nav')?>

<div class="row">

    <div class="col-lg-12">
        <div class="card">
        <div class="card-title">
            <p>Tabel Buku</p>
            </div>

        <div class="card-body">
			<?php  if(session()->get('level')!= "peminjam"){ ?>
        <a href="<?= base_url('/buku/input')?>"> <button type="button" class="btn btn-success" >
										Tambah buku
									</button> </a>
									<?php } ?>
        <table id="bootstrap-data-table" class="table table-striped table-bordered">					<thead>
						<tr>
							<th style="text-align: center;" width="1000px">No.</th>
							<th style="text-align: center;" width="1000px">Judul</th>
							<th style="text-align: center;" width="1000px">Penulis</th>
							<th style="text-align: center;" width="1000px">Penerbit</th>
							<th style="text-align: center;" width="1000px">Tahun Terbit</th>
                            <th style="text-align: center;" width="1000px">Kategori</th>
							<th style="text-align: center;" width="1000px">Stok</th>

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
						<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->stok ?></td>

							<td>
							<div class="text-center mb-1">

                            <a href="<?= base_url('/buku/Ulasan/'.$dataa->bukuID) ?>" class="btn btn-primary">
										Ulasan
									</a>
									<?php  if(session()->get('level')== "peminjam"){ ?>
									<?php if(empty($koleksi[$dataa->bukuID])) {?>
									<a href="<?= base_url('/koleksi/tambahKoleksi/'.$dataa->bukuID) ?>" class="btn btn-info">
										Masukan Ke Koleksi
									</a>
									<?php }else{ ?>
										<a href="<?= base_url('/koleksi/hapusKoleksi/'.$koleksi[$dataa->bukuID]->koleksiID) ?>" class="btn btn-secondary">
										hapus dari Koleksi
									</a>
									<?php } } ?>
									<?php  if(session()->get('level')!= "peminjam"){ ?>
									<a href="<?= base_url('/buku/edit/'.$dataa->bukuID) ?>" class="btn btn-warning">
										Edit
									</a>
									<a href="<?= base_url('/buku/hapus/'.$dataa->bukuID)?>"><button type="button" class="btn btn-danger" >
										Delete
									</button> </a>
									<?php } ?>
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

