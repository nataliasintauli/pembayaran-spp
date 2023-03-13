<header>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</header>
<div class="container">
    <h1 class="logo">
        <a href="home.php">Transaksi SPP</a>
    </h1>
    <nav aria-label="primary navigation">
        <?php
        if (@$_SESSION['level'] == 'admin') {
        ?>
            <li><a href="../view/siswa.php">Siswa</a></li>
            <li><a href="../view/kelas.php">Kelas</a></li>
            <li><a href="../view/spp.php">SPP</a></li>
            <li><a href="../view/petugas.php">Petugas</a></li>
            <li><a href="../view/transaksi.php">Transaksi</a></li>
            <li><a href="../view/pembayaran.php">History</a></li>
            <li><a href="../view/laporan.php">Laporan</a></li>
            <li><a href="../login/logout.php">Logout</a></li>
        <?php

        } elseif (@$_SESSION['level'] == 'petugas') {
        ?>
            <li><a href="../view/pembayaran.php">History</a></li>
            <li><a href="../view/transaksi.php">Transaksi</a></li>
            <li><a href="../view/laporan.php">Laporan</a></li>
            <li><a href="../login/logout.php">Logout</a></li>

        <?php
        } elseif (@$_SESSION['level'] == 'siswa') {
        ?>
            <li><a href="../view/pembayaran.php">History</a></li>
            <li><a href="../login/logout.php">Logout</a></li>

        <?php
        }
        ?>
    </nav>
</div>