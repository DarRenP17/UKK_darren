<?= view('layout/header')?>

<?= view('layout/nav')?>

<div class="row">

    <div class="col-lg-12">
        <div class="card">
        <div class="card-title">
            <p>Tabel Peminjaman</p>
            </div>

        <div class="card-body">
			<?php  if(session()->get('level')!= "peminjam"){ ?>
        <a href="<?= base_url('/peminjaman/input')?>"> <button type="button" class="btn btn-success" >
										Tambah Peminjaman
									</button> </a>
									<?php } ?>
		<?php  if(session()->get('level')!= "peminjam"){ ?>
        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">	
		<?php  }else{?>	
			<table id="bootstrap-data-table" class="table table-striped table-bordered">	
				<?php } ?>
			<thead>
						<tr>
							<th style="text-align: center;" width="1000px">No.</th>
							<th style="text-align: center;" width="1000px">Judul</th>
							<th style="text-align: center;" width="1000px">Peminjam</th>
							<th style="text-align: center;" width="1000px">Tanggal Peminjaman</th>
							<th style="text-align: center;" width="1000px">Tanggal Pengembalian</th>
                            <th style="text-align: center;" width="1000px">Status</th>
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
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->namaLengkap ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->tanggalPeminjaman ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->tanggalPengembalian ?></td>
                            <td style="text-align: center;" class="text-capitalize">
                            
                            <?php if($dataa->statusPeminjaman == 1)
                            { echo "Belum Dikembalikan"; }elseif($dataa->statusPeminjaman == 2){
								echo "Sudah Dikembalikan";
							} ?>
                        </td>
							<td>
							<div class="text-center mb-1">
							<?php if($dataa->statusPeminjaman == 1){?>
									<a href="<?= base_url('/peminjaman/pengembalian/'.$dataa->peminjamanID ) ?>" class="btn btn-warning">
										Pengembalian
									</a>
							<?php } ?>
									<a href="<?= base_url('/peminjaman/hapus/'.$dataa->peminjamanID )?>"><button type="button" class="btn btn-danger" >
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

