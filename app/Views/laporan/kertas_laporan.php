<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-transform: capitalize;
    }

    .container {
      max-width: 8000px;
      margin: 0 auto;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header img {
      width: 100%;
      height: auto;
    }

    .table-container {
      margin-top: 20px;
    }

    table {
      width: 100%; 
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Laporan Buku</h1>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Judul</th>
            <th class="text-center">Penulis</th>
            <th class="text-center">Penerbit</th>
            <th class="text-center">Tahun Terbit</th>]
            <th class="text-center">Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0; 
          $no = 1;

          foreach ($data as $dataa) {
            ?>
            <tr>
              <td class="text-capitalize text-center"><?= $no++?></td>
              <td class="text-capitalize text-center"><?= $dataa->judul?></td>
              <td class="text-capitalize text-center"><?= $dataa->penulis?></td>
              <td class="text-capitalize text-center"><?= $dataa->penerbit?></td>
              <td class="text-center text-capitalize"><?= $dataa->tahunTerbit?></td>
              <td class="text-center text-capitalize"><?= $dataa->tanggal?></td>
            </tr>
<?php } ?>

        </tbody>
      </table>
    </div>
  </div>

  <script>
    window.print();
  </script>
</body>
</html>
