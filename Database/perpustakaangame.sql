-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Feb 2024 pada 12.45
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaangame`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `bukuID` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahunTerbit` int(11) NOT NULL,
  `stok` int(10) NOT NULL DEFAULT 1,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`bukuID`, `judul`, `penulis`, `penerbit`, `tahunTerbit`, `stok`, `tanggal`) VALUES
(1, 'komik plant vs zombie', 'hei', 'erlang', 2015, 1, '2024-02-29'),
(3, 'komik cerita mobile legends', 'hola', 'erlangga', 2018, 1, '2024-02-29'),
(4, 'komik cerita karakter brawlhalla', 'kevin', 'erlangga', 2020, 1, '2024-02-29'),
(5, 'komik left 4 dead 2', 'steam', 'steam', 2017, 1, '2024-02-29'),
(6, 'komik portal', 'valve', 'steam', 2015, 1, '2024-02-29'),
(7, 'komik genshin impact', 'valve', 'erlangga', 2023, 1, '2024-02-29'),
(8, 'komik minecraft', 'mojang', 'microsoft', 2021, 1, '2024-02-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `kategoriID` int(11) NOT NULL,
  `namaKategori` varchar(255) NOT NULL,
  `jumlah_buku` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategoribuku`
--

INSERT INTO `kategoribuku` (`kategoriID`, `namaKategori`, `jumlah_buku`) VALUES
(1, 'Komik', 7),
(2, 'Game', 3),
(3, 'FPS', 0),
(4, 'Strategy', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `kategoriBukuID` int(11) NOT NULL,
  `bukuID` int(11) NOT NULL,
  `kategoriID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`kategoriBukuID`, `bukuID`, `kategoriID`) VALUES
(1, 1, 2),
(2, 1, 1),
(5, 3, 2),
(6, 4, 1),
(7, 5, 1),
(8, 6, 1),
(9, 7, 1),
(10, 8, 1),
(11, 9, 2),
(12, 9, 1);

--
-- Trigger `kategoribuku_relasi`
--
DELIMITER $$
CREATE TRIGGER `after delete` AFTER DELETE ON `kategoribuku_relasi` FOR EACH ROW BEGIN
 UPDATE kategoribuku
    SET jumlah_buku = jumlah_buku - 1
    WHERE kategoriID = OLD.kategoriID;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after insert` AFTER INSERT ON `kategoribuku_relasi` FOR EACH ROW BEGIN
 UPDATE kategoribuku
    SET jumlah_buku = jumlah_buku + 1
    WHERE kategoriID = NEW.kategoriID;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `koleksiID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bukuID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjamanID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bukuID_peminjaman` int(11) NOT NULL,
  `tanggalPeminjaman` date NOT NULL DEFAULT current_timestamp(),
  `tanggalPengembalian` date NOT NULL,
  `statusPeminjaman` varchar(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`peminjamanID`, `userID`, `bukuID_peminjaman`, `tanggalPeminjaman`, `tanggalPengembalian`, `statusPeminjaman`) VALUES
(1, 1, 1, '2024-02-29', '2024-03-02', '2'),
(4, 6, 1, '2024-02-29', '2024-03-01', '2'),
(7, 6, 9, '2024-02-29', '2024-03-01', '1');

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `after delete peminjaman` AFTER DELETE ON `peminjaman` FOR EACH ROW BEGIN
    IF OLD.statusPeminjaman = 1 THEN
        UPDATE buku
        SET stok = stok + 1
        WHERE bukuID = OLD.bukuID_peminjaman;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after insert peminjaman` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
    UPDATE buku
    SET stok = stok - 1
    WHERE bukuID = NEW.bukuID_peminjaman;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after update peminjaman` AFTER UPDATE ON `peminjaman` FOR EACH ROW BEGIN
    IF NEW.statusPeminjaman = 2 THEN
        UPDATE buku
        SET stok = stok + 1
        WHERE bukuID = NEW.bukuID_peminjaman;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `ulasanID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bukuID` int(11) NOT NULL,
  `ulasan` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ulasanbuku`
--

INSERT INTO `ulasanbuku` (`ulasanID`, `userID`, `bukuID`, `ulasan`, `rating`, `tanggal`) VALUES
(1, 1, 1, 'tes2', 3, '2024-02-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','petugas','peminjam') NOT NULL,
  `email` varchar(255) NOT NULL,
  `namaLengkap` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `email`, `namaLengkap`, `alamat`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', 'Naruto', 'Konoha'),
(3, 'rere', '095e3a1cb5cbb579195f0a6eacc84483', 'petugas', 're@gmail.com', 'rere', 'rere'),
(4, 'naruto', 'cf9ee5bcb36b4936dd7064ee9b2f139e', 'peminjam', 'halo@gmail.com', 'uzumaki', 'halo');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`bukuID`);

--
-- Indeks untuk tabel `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indeks untuk tabel `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`kategoriBukuID`);

--
-- Indeks untuk tabel `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`koleksiID`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjamanID`);

--
-- Indeks untuk tabel `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`ulasanID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nama unik` (`namaLengkap`) USING HASH;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `bukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategoribuku`
--
ALTER TABLE `kategoribuku`
  MODIFY `kategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `kategoriBukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `koleksiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjamanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `ulasanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
