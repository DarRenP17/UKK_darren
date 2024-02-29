<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="index.html">
                    <!-- <img src="images/logo.png" alt="" /> --><span>Perpustakaan Game</span></a></div>
                    <li class="label">Dashboard</li>
                    <li><a href="/home/dashboard"><i class="ti-dashboard"></i> Dashboard </a></li>
                    <br>
                    <li class="label">Features</li>
                    
                    <?php  if(session()->get('level')== 'admin'){ ?>
                    <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> User <span
                        class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                        <li><a href="<?= base_url('/pengawai')?>">Pengawai</a></li>
                        <li><a href="<?= base_url('/peminjam')?>">Peminjam</a></li>
                     </ul>
                 </li>
                 <?php  }else{}?>
                 
                
                <li><a class="sidebar-sub-toggle"><i class="ti-server"></i> Buku <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                    <li><a href="<?= base_url('/buku')?>">Daftar Buku</a></li>
                     <?php  if(session()->get('level')== "admin"){ ?>
                    <li><a href="<?= base_url('/Kategori')?>">Kategori Buku</a></li>
                    <?php }?>
                    <?php  if(session()->get('level')== "peminjam"){ ?>
                    <li><a href="<?= base_url('/koleksi')?>">Koleksi Buku</a></li>
                    <?php }?>
                    <li><a href="<?= base_url('/peminjaman')?>">Peminjaman Buku</a></li>
                        
                    </ul>
                </li>
               

               <?php  if(session()->get('level')!= "peminjam"){ ?>

                <li class="label">Laporan</li>
              <li><a href="/laporan"><i class="ti-book"></i> Laporan</a></li>

              <?php  }else{}?>

              <br>
              <li class="label">Account</li>
              <li><a href="/Profile"><i class="ti-info-alt"></i> Profile</a></li>
              <li><a href="/home/logout"><i class="ti-close"></i> Logout</a></li>
          </ul>
      </div>
  </div>
</div>
<!-- /# sidebar -->









<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">

                    <div class="header-icon" data-toggle="dropdown">
                        <span class="user-avatar">
                         
                         <?= session()->get('Nama')?>
                     </span>

                 </div>
             </div>
         </div>
     </div>
 </div>
</div>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome <?= session()->get('Nama')?></span></h1>
                        </div>
                    </div>
                </div>
            </div>
<section id="main-content">